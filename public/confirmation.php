<?php
session_start();
require_once '../include/smarty.php';
require_once '../include/db.php';
require_once '../include/functions.php';

$navCats = getNavCategories($conn);
$smarty->assign('navCats', $navCats);
$smarty->assign('title', 'Thank You!');

$smarty->assign('user_logged_in', isset($_SESSION['user_id']));
$smarty->assign('user_name', $_SESSION['user_name'] ?? '');

$smarty->display('layouts/header.tpl');
$smarty->display('pages/confirmation.tpl');
$smarty->display('layouts/footer.tpl');
?>
