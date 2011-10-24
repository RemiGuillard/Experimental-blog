<?php

$nbMaxPage = $articles->getNumberOfPage();
$currentPage = 1;

//$smarty->assign('debug', $nbMaxPage);

if (isset($_GET["nbPage"]) && intval($_GET["nbPage"]) > 0 && intval($_GET["nbPage"]) <= $nbMaxPage)
	$currentPage = intval($_GET["nbPage"]);

if (isset($_GET["articleId"]) && intval($_GET["articleId"]) > 0 && $myNews->existingArticle(intval($_GET["articleId"])))
	{
		$pageNews[0] = $articles->getNewsWithId(intval($_GET["articleId"]));
		$smarty->assign('listArticle', $pageNews);
	}
else
    include('./newsByPage.php');

$smarty->display('display.tpl');

?>
