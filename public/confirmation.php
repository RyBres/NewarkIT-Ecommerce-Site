<?php
session_start();
require_once '../include/smarty.php';
require_once '../include/db.php';
require_once '../include/functions.php';

$navCats = getNavCategories($conn);
$smarty->assign('navCats', $navCats);

$user_id = $_SESSION['user_id'] ?? null;

// Get the most recent order
$stmt = $conn->prepare("
    SELECT o.order_id, o.order_date, o.total, o.shipping_address
    FROM orders o
    WHERE " . ($user_id ? "o.user_id = ?" : "o.user_id IS NULL") . "
    ORDER BY o.order_id DESC
    LIMIT 1
");
if ($user_id) {
    $stmt->bind_param("i", $user_id);
}
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();

$order_items = [];
if ($order) {
    $stmt = $conn->prepare("
        SELECT oi.product_id, oi.quantity, oi.price, p.name
        FROM order_items oi
        JOIN products p ON oi.product_id = p.product_id
        WHERE oi.order_id = ?
    ");
    $stmt->bind_param("i", $order['order_id']);
    $stmt->execute();
    $order_items = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

$smarty->assign('user_logged_in', isset($_SESSION['user_id']));
$smarty->assign('user_name', $_SESSION['user_name'] ?? '');
$smarty->assign('order', $order);
$smarty->assign('order_items', $order_items);
$smarty->assign('title', 'Order Confirmation');
$smarty->assign('error', $_SESSION['error'] ?? null);
unset($_SESSION['error']);

$smarty->display('layouts/header.tpl');
$smarty->display('pages/confirmation.tpl');
$smarty->display('layouts/footer.tpl');
?>
