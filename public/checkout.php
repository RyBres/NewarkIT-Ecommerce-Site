<?php
session_start();
require_once '../include/smarty.php';
require_once '../include/db.php';
require_once '../include/functions.php';

$session_id = session_id();
$navCats = getNavCategories($conn);
$smarty->assign('navCats', $navCats);

// Get cart items from cart db
$stmt = $conn->prepare("
	SELECT c.product_id, c.quantity, p.name, p.price, p.discount_percent
	FROM cart c
	JOIN products p ON c.product_id = p.product_id
	WHERE c.session_id = ?
");
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result=$stmt->get_result();

$cart=[];
$total=0;

while ($row = $result->fetch_assoc()) {
	$price = $row['price']*(1-$row['discount_percent']/100);
	$subtotal=$price*$row['quantity'];
	$row['price']=$price;
	$row['subtotal'] = $subtotal;
	$cart[] = $row;
	$total += $subtotal;
}

$smarty->assign('user_logged_in', isset($_SESSION['user_id']));
$smarty->assign('user_name', $_SESSION['user_name'] ?? '');
$user_id=$_SESSION['user_id'] ?? NULL;

$smarty->assign('cart_items', $cart);
$smarty->assign('cart_total', number_format($total,2));
$smarty->assign('title', 'Checkout');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address']; // Ensure that the inputs are valid - probably better for UI to handle that first
	
	$stmt = $conn->prepare("
		INSERT INTO orders (user_id, order_date, total, shipping_address) VALUES (?, NOW(), ?, ?)
	");
	$stmt->bind_param("ids", $user_id, $total, $address);
    $stmt->execute();
    $order_id = $stmt->insert_id;

    // Insert order items
    foreach ($cart as $item) {
        $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiid", $order_id, $item['product_id'], $item['quantity'], $item['price']);
        $stmt->execute();
    }

    // Clear cart
	$stmt = $conn->prepare("DELETE FROM cart WHERE session_id = ?");
	$stmt->bind_param("s", $session_id);
	$stmt->execute();

    // Redirect to confirmation
    header("Location: ../public/confirmation.php");
    exit;
}

$smarty->display('layouts/header.tpl');
$smarty->display('pages/checkout.tpl');
$smarty->display('layouts/footer.tpl');
?>