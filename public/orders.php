<?php
session_start();
require_once '../include/db.php';
require_once '../include/smarty.php';
require_once '../include/functions.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /public/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch orders
$orders = [];
$order_sql = "
    SELECT o.order_id, o.order_date, o.total, o.status,
           oi.product_id, oi.quantity, oi.price,
           p.name, p.image
    FROM orders o
    JOIN order_items oi ON o.order_id = oi.order_id
    JOIN products p ON oi.product_id = p.product_id
    WHERE o.user_id = ?
    ORDER BY o.order_date DESC
";

$stmt = $conn->prepare($order_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$res = $stmt->get_result();

while ($row = $res->fetch_assoc()) {
    $orders[$row['order_id']]['meta'] = [
        'order_date' => $row['order_date'],
        'total' => $row['total'],
        'status' => $row['status']
    ];
    $orders[$row['order_id']]['items'][] = $row;
}

$smarty->assign('title', 'My Orders');
$smarty->assign('orders', $orders);
$smarty->assign('user_logged_in', true);
$smarty->assign('user_name', $_SESSION['user_name'] ?? '');
$smarty->assign('navCats', getNavCategories($conn));

$smarty->display('layouts/header.tpl');
$smarty->display('pages/orders.tpl');
$smarty->display('layouts/footer.tpl');

?>