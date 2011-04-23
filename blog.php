<?php
session_start();

// Include Smarty
include_once 'libs/option.php';

if ($_SESSION["logout"] === true)
	session_destroy();

include_once('class/mysql.class.php');
$mysql = new Mysql('localhost', 'menelu', 'quolimera');

include_once('class/news.class.php');
$articles = new News();

$smarty->display('head.tpl');
include('php/header.php');
include('php/display.php');
include('php/menu.php');
include('php/footer.php');

?>