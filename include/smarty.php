<?php
require_once __DIR__ . '/../smarty/Smarty.class.php';

$smarty = new Smarty();

$smarty->setTemplateDir(__DIR__ . '/../presentation/templates');
$smarty->setCompileDir(__DIR__ . '/../presentation/templates_c');
$smarty->setCacheDir(__DIR__ . '/../cache');
$smarty->setConfigDir(__DIR__ . '/../include/configs');
?>