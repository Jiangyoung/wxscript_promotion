<?php
require_once "smarty/libs/Smarty.class.php";
$smarty = new Smarty();

$smarty->setTemplateDir('view/');
$smarty->setCompileDir('templates_c/');
$smarty->setConfigDir('configs/');
$smarty->setCacheDir('cache/');
$smarty->left_delimiter = "{{";
$smarty->right_delimiter = "}}";

?>