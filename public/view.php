<?php
session_start();
require_once '../include/db.php';
require_once '../include/smarty.php';
require_once '../include/functions.php';

$session_id = session_id();

$navCats = getNavCategories($conn);
$smarty->assign('navCats', $navCats);

// Fetch cart items joined with product data
$query = "
  SELECT ci.product_id, ci.quantity, 
         p.name, p.price, p.discount_percent, p.image
  FROM cart ci
  JOIN products p ON ci.product_id = p.product_id
  WHERE ci.session_id = ?
";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
$cart_total = 0;

while ($row = $result->fetch_assoc()) {
    $price = $row['price'] * (1 - $row['discount_percent'] / 100);
    $subtotal = $price * $row['quantity'];
    $row['subtotal'] = $subtotal;
    $cart_total += $subtotal;
    $cart_items[] = $row;
}

// Assign to Smarty
$smarty->assign('user_logged_in', isset($_SESSION['user_id']));
$smarty->assign('user_name', $_SESSION['user_name'] ?? '');

$smarty->assign('cart_items', $cart_items);
$smarty->assign('cart_total', $cart_total);
$smarty->assign('title', 'Your Cart');

$smarty->assign('user_logged_in', isset($_SESSION['user_id']));
$smarty->assign('user_name', $_SESSION['user_name'] ?? '');

$smarty->display('layouts/header.tpl');
$smarty->display('pages/cart.tpl');
$smarty->display('layouts/footer.tpl');
?>