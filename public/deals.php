<?php
require_once '../include/db.php';
require_once '../include/smarty.php';
require_once '../include/functions.php';

$products = [];
$res = $conn->query("
    SELECT * FROM products 
    WHERE discount_percent > 0 
    ORDER BY product_id DESC
");

while ($row = $res->fetch_assoc()) {
    $products[] = $row;
}

$smarty->assign('title', 'Deals');
$smarty->assign('products', $products);
$smarty->assign('navCats', getNavCategories($conn));

$smarty->assign('user_logged_in', isset($_SESSION['user_id']));
$smarty->assign('user_name', $_SESSION['user_name'] ?? '');

$smarty->display('layouts/header.tpl');
$smarty->display('pages/deals.tpl');
$smarty->display('layouts/footer.tpl');
?>