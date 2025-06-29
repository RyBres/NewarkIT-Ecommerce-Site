<?php
session_start();
require_once '../include/db.php';
require_once '../include/smarty.php';
require_once '../include/functions.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /login.php");
    exit;
}

$navCats = getNavCategories($conn);
$smarty->assign('navCats', $navCats);
$smarty->assign('title', 'My Account');
$smarty->assign('user_name', $_SESSION['user_name']);

$smarty->assign('user_logged_in', isset($_SESSION['user_id']));
$smarty->assign('user_name', $_SESSION['user_name'] ?? '');

$smarty->display('layouts/header.tpl');
$smarty->display('pages/account.tpl');
$smarty->display('layouts/footer.tpl');
?>