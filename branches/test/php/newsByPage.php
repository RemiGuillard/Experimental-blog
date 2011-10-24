<?php

    $indentation = array();
	if ($currentPage > 1)
	{
		$prevPage = $currentPage - 1;
		$indentation[] = "<a href=\"blog.php?nbPage=1\">Premi&egrave;re page</a>  ";
		if ($prevPage != 1)
                    $indentation[] = "<a href=\"blog.php?nbPage=" . $prevPage . "\">Pr&eacute;c&eacute;dente</a>  ";

		//2 pages pr�c�dentes
		if ($currentPage > 2 && $currentPage != $nbMaxPage)
		{
			$prevPage2 = $prevPage - 1;
			$indentation[] = "<a href=\"blog.php?nbPage=" . $prevPage2 . "\">" . $prevPage2 . "</a>  ";
		}
		$indentation[] = "<a href=\"blog.php?nbPage=" . $prevPage . "\">" . $prevPage . "</a>  ";
		
	}

	//current page
	$indentation[] = "<a href=\"blog.php?nbPage=" . $currentPage . "\">". $currentPage . "</a>  ";

	//2 pages suivantes
	if ($currentPage < $nbMaxPage)
	{
		$nextPage = $currentPage + 1;
		$indentation[] = "<a href=\"blog.php?nbPage=" . $nextPage . "\">" . $nextPage . "</a>  ";
		if ($currentPage < $nbMaxPage - 1)
		{	
			$nextPage2 = $currentPage + 2;
			$indentation[] = "<a href=\"blog.php?nbPage=" . $nextPage2 . "\">" . $nextPage2 . "</a>  ";
			$indentation[] = "<a href=\"blog.php?nbPage=" . $nextPage . "\">suivante</a>  ";
		}
	}

	if ($currentPage < $nbMaxPage)
		$indentation[] = "<a href=\"blog.php?nbPage=" . $nbMaxPage . "\">Derni&egrave;re page</a>";


$pageNews = $articles->getPageNumber($currentPage);
$smarty->assign('listArticle', $pageNews);
$smarty->assign('indentation', $indentation);

?>