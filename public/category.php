<?php
require_once '../include/db.php';
require_once '../include/smarty.php';
require_once '../include/functions.php';

$categoryId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch category info
$category = null;
$catRes = $conn->prepare("SELECT name FROM categories WHERE category_id = ?");
$catRes->bind_param("i", $categoryId);
$catRes->execute();
$catRes->bind_result($categoryName);
if ($catRes->fetch()) {
    $category = $categoryName;
}
$catRes->close();

if (!$category) {
    die("Category not found.");
}

// Fetch products in the category
$products = [];
$stmt = $conn->prepare("SELECT * FROM products WHERE category_id = ?");
$stmt->bind_param("i", $categoryId);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}
$stmt->close();

// Assign data to Smarty
$smarty->assign('title', $category);
$smarty->assign('categoryName', $category);
$smarty->assign('products', $products);
$smarty->assign('navCats', getNavCategories($conn));

// Render
$smarty->display('layouts/header.tpl');
$smarty->display('pages/category.tpl');
$smarty->display('layouts/footer.tpl');
?>