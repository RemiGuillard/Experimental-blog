<?php

if(!defined('NB_ARTICLE_PAGE')) {
    define('NB_ARTICLE_PAGE', 3);
}

class		News
{

  var $dayTab = array("Mon" => "Lundi",
		      "Tue" => "Mardi",
		      "Wed" => "Mercredi",
		      "Thu" => "Jeudi",
		      "Fri" => "Vendredi",
		      "Sat" => "Samedi",
		      "Sun" => "Dimanche");

  var $monthTab = array("Jan" => "Janvier",
			"Feb" => "Février",
			"Mar" => "Mars",
			"Apr" => "Avril",
			"May" => "Mai",
			"Jun" => "Juin",
			"Jul" => "Juillet",
			"Aug" => "Aout",
			"Sep" => "Septembre",
			"Oct" => "Octobre",
			"Nov" => "Novembre",
			"Dec" => "Décembre");

  function		getDate()
  {
    $date = date('r');
    $day = substr($date, 0, 3);
    $number = intval(substr($date, 5, 2));
    $month = substr($date, 8, 3);
    $year = substr($date, 12, 4);
    $hour = substr($date, 17, 2);
    $min = substr($date, 20, 2);
    $dateString = "Post&eacute; le {$this->dayTab[$day]} {$number} {$this->monthTab[$month]} {$year} &agrave; {$hour}h{$min}";

    return $dateString;
  }

	function	addNews($title, $content)
	{
	  $date = $this->getDate();
                    $query = 'INSERT INTO article (titre, contenu, pubdate) VALUES(' . "'{$title}', '{$content}', '" . $date . "')";
		$result = mysql_query($query);
		return $result;
 	}

	function	delNews($articleId)
	{
		$query = "DELETE FROM `article` WHERE `article_id` = {$articleId}";
		$result = mysql_query($query);
		return $result;
	}
	
	function	editNews($articleId, $title, $content)
	{
		$query = "UPDATE article SET `titre` = {$title}, contenu = {$content} WHERE article_id = {$articleId}";
		$result = mysql_query($query);
		return $result;
	}
	
	function	getArticlesNumber()
	{
		$query = "SELECT COUNT(article_id) FROM `article`";
		$result = mysql_query($query);
		$result = mysql_fetch_row($result);
		return intval($result[0]);
	}
	
	function	getNumberOfPage()
	{
		$nbPage = ceil($this->getArticlesNumber() / NB_ARTICLE_PAGE);
		
		return $nbPage;
	}
		
	function	getPageNumber($number = 1)
	{
		$number = --$number * NB_ARTICLE_PAGE;
		$query = "SELECT * FROM article ORDER BY article_id DESC LIMIT {$number}, " . NB_ARTICLE_PAGE ;
		$result = mysql_query($query);
		$data = true;
		while ($data)
		{
			$data = mysql_fetch_array($result);
			if ($data)
				$page[] = $data;
		}
		return $page;
	}

	function	getNewsWithId($articleId)
	{
		$query = "SELECT * FROM `article` WHERE `article_id` = {$articleId}";
		$result = mysql_query($query);
		$result = mysql_fetch_array($result);
		return $result;
	}
	
	function	existingArticle($articleId)
	{
		$query = "SELECT * FROM article WHERE article_id = {$articleId}";
		$result = mysql_query($query);
		$result = mysql_fetch_array($result);
		if ($result)
			return true;
		return false;
	}
	
}

?>