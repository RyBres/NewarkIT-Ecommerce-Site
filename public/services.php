<?php
session_start();
require_once '../include/db.php';
require_once '../include/smarty.php';
require_once '../include/functions.php';

/* grab nav data */
$navCats = getNavCategories($conn);
$smarty->assign('navCats', $navCats);

/* render */
$smarty->assign('user_logged_in', isset($_SESSION['user_id']));
$smarty->assign('user_name', $_SESSION['user_name'] ?? '');

$smarty->display('layouts/header.tpl');
$smarty->display('pages/services.tpl');
$smarty->display('layouts/footer.tpl');
?>