<?php
require_once '../include/db.php';
require_once '../include/smarty.php';
require_once '../include/functions.php';

$productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$product = null;

if ($productId > 0) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
}

if (!$product) {
    die("Product not found.");
}

$smarty->assign('title', $product['name']);
$smarty->assign('product', $product);
$smarty->assign('navCats', getNavCategories($conn));

$smarty->assign('user_logged_in', isset($_SESSION['user_id']));
$smarty->assign('user_name', $_SESSION['user_name'] ?? '');

$smarty->display('layouts/header.tpl');
$smarty->display('pages/product.tpl');
$smarty->display('layouts/footer.tpl');
?>