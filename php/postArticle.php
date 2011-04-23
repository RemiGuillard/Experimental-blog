<?php

// Ajouter champ pour URL (rewritting)
// Se demerder pour choper le datetime
// Voir pour une illu ?

    if (isset($_POST["newsTitle"]) && isset($_POST["newsContent"])
	&& strlen($_POST["newsTitle"]) > 0 && strlen($_POST["newsContent"]) > 0) {
        
        $result = $articles->addNews($_POST["newsTitle"], $_POST["newsContent"]);
	if ($result)
            $smarty->assign('$postStatus', "Article publi&eacute;");
	else
            $smarty->assign('$postStatus', "erreur de publication ...");
    }
    $smarty->display('post.tpl');
?>
