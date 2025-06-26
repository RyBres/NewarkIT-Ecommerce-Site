<?php
require_once '../include/db.php';
require_once '../include/smarty.php';
require_once '../include/functions.php';

/* 1)  grab nav data */
$navCats = getNavCategories($conn);
$smarty->assign('navCats', $navCats);

/* 3)  render */
$smarty->display('layouts/header.tpl');
$smarty->display('pages/services.tpl');
$smarty->display('layouts/footer.tpl');
?>