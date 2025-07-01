<?php
session_start();
require_once '../include/smarty.php';
require_once '../include/db.php';
require_once '../include/functions.php';

$session_id = session_id();
$navCats = getNavCategories($conn);
$smarty->assign('navCats', $navCats);

$user_id = $_SESSION['user_id'] ?? null;

// Fill user info if available
$userInfo = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'address_line1' => '',
    'address_line2' => '',
    'city' => '',
    'state' => '',
    'zip' => ''
];

if ($user_id) {
    $stmt = $conn->prepare("
        SELECT first_name, last_name, email,
               address_line1, address_line2, city, state, zip
        FROM user_account
        WHERE user_id = ?
    ");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result) {
        $userInfo = array_merge($userInfo, $result);
    }
}

$smarty->assign('userInfo', $userInfo);


// Get cart items
$stmt = $conn->prepare("
    SELECT c.product_id, c.quantity, p.name, p.price, p.discount_percent
    FROM cart c
    JOIN products p ON c.product_id = p.product_id
    WHERE " . ($user_id ? "c.user_id = ?" : "c.session_id = ?")
);
$user_or_session = $user_id ?? $session_id;
$stmt->bind_param("s", $user_or_session);
$stmt->execute();
$result = $stmt->get_result();

$cart = [];
$total = 0;

while ($row = $result->fetch_assoc()) {
    $price = $row['price'] * (1 - $row['discount_percent'] / 100);
    $subtotal = $price * $row['quantity'];
    $row['price'] = $price;
    $row['subtotal'] = $subtotal;
    $cart[] = $row;
    $total += $subtotal;
}

// stock check (after loading cart)
foreach ($cart as $item) {
    $check = $conn->prepare("SELECT quantity FROM inventory WHERE product_id = ?");
    $check->bind_param("i", $item['product_id']);
    $check->execute();
    $res = $check->get_result()->fetch_assoc();

    if ($res['quantity'] < $item['quantity']) {
        $_SESSION['error'] = "Not enough inventory for: " . $item['name'];
        header("Location: ../public/view.php");
        exit;
    }
}

$smarty->assign('user_logged_in', isset($_SESSION['user_id']));
$smarty->assign('user_name', $_SESSION['user_name'] ?? '');
$smarty->assign('cart_items', $cart);
$smarty->assign('cart_total', number_format($total, 2));
$smarty->assign('title', 'Checkout');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address_line1'] . 
          (!empty($_POST['address_line2']) ? ', ' . $_POST['address_line2'] : '') . 
          ', ' . $_POST['city'] . ', ' . $_POST['state'] . ' ' . $_POST['zip'];


    $stmt = $conn->prepare("
        INSERT INTO orders (user_id, order_date, total, shipping_address) 
        VALUES (?, NOW(), ?, ?)
    ");
    $stmt->bind_param("ids", $user_id, $total, $address);
    $stmt->execute();
    $order_id = $stmt->insert_id;

    foreach ($cart as $item) {
        // Insert into order_items
        $stmt = $conn->prepare("
            INSERT INTO order_items (order_id, product_id, quantity, price) 
            VALUES (?, ?, ?, ?)
        ");
        $stmt->bind_param("iiid", $order_id, $item['product_id'], $item['quantity'], $item['price']);
        $stmt->execute();

        // Update inventory
        $updateInventory = $conn->prepare("
            UPDATE inventory SET quantity = quantity - ? WHERE product_id = ?
        ");
        $updateInventory->bind_param("ii", $item['quantity'], $item['product_id']);
        $updateInventory->execute();
    }

    // Clear the cart
    $clearCart = $conn->prepare("
        DELETE FROM cart WHERE " . ($user_id ? "user_id = ?" : "session_id = ?")
    );
    $clearCart->bind_param("s", $user_or_session);
    $clearCart->execute();
	
	// Prepare email content
	$subject = "Order Confirmation from NewarkIT";
	$headers = "From: no-reply@newarkit.com\r\nContent-Type: text/plain; charset=UTF-8";

	$body = "Hello $name,\n\n";
	$body .= "Thank you for your order! Here are the details:\n\n";
	foreach ($cart as $item) {
		$body .= "- {$item['name']} x{$item['quantity']} = $" . number_format($item['subtotal'], 2) . "\n";
	}
	$body .= "\nTotal: $" . number_format($total, 2);
	$body .= "\n\nWe will begin processing your order shortly.\n\n";
	$body .= "Best,\nThe NewarkIT Team";

	// Send email
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		@mail($email, $subject, $body, $headers);
	} else {
		// log / ignore silently
		error_log("Invalid email address on order confirmation: $email");
	}

	
	@mail($email, $subject, $body, $headers);


    header("Location: ../public/confirmation.php");
    exit;
}

$smarty->display('layouts/header.tpl');
$smarty->display('pages/checkout.tpl');
$smarty->display('layouts/footer.tpl');
?>