<?php
session_start();

// Include Smarty
include_once 'libs/option.php';

if ($_SESSION["logout"] === true)
	session_destroy();


$smarty->display('head.tpl');
include('php/header.php');
include('php/content.php');
include('php/menu.php');
include('php/footer.php');

?>