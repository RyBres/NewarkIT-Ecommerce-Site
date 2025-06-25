<?php
require_once '../include/db.php';
require_once '../include/smarty.php';
require_once '../include/functions.php';

/* 1)  grab nav data */
$navCats = getNavCategories($conn);
$smarty->assign('navCats', $navCats);

/* 2)  pull products for the home grid (e.g. newest 12) */
$products = [];
$prodRes  = $conn->query("SELECT * FROM products ORDER BY id DESC LIMIT 12");
while ($p = $prodRes->fetch_assoc()) { $products[] = $p; }
$smarty->assign('products', $products);
$smarty->assign('title', 'Home');

/* 3)  render */
$smarty->display('layouts/header.tpl');
$smarty->display('pages/index.tpl');
$smarty->display('layouts/footer.tpl');
