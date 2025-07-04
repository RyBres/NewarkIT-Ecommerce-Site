<?php
session_start();
require_once '../include/db.php';
require_once '../include/smarty.php';
require_once '../include/functions.php';

/* Get nav data */
$navCats = getNavCategories($conn);
$smarty->assign('navCats', $navCats);

/* Get products for the home grid */
$products = [];
$prodRes = $conn->query("SELECT *, 
  ROUND(price - (price * discount_percent / 100), 2) AS final_price 
  FROM products 
  WHERE discount_percent > 0
  ORDER BY product_id DESC LIMIT 6");
while ($p = $prodRes->fetch_assoc()) { 
  $products[] = $p; 
}
$smarty->assign('products', $products);
$smarty->assign('title', 'Home');

/* render */
$smarty->assign('user_logged_in', isset($_SESSION['user_id']));

if (isset($_SESSION['user_id'])) {
    $stmt = $conn->prepare("SELECT first_name FROM user_account WHERE user_id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $smarty->assign('user_name', $result['first_name'] ?? '');
} else {
    $smarty->assign('user_name', '');
}


$smarty->display('layouts/header.tpl');
$smarty->display('pages/index.tpl');
$smarty->display('layouts/footer.tpl');
?>