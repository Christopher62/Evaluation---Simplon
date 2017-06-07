<?php if( session_id()=='' ){ session_start(); }
header('Content-type:text/html; charset=UTF-8');	// encodage UTF-8
//error_reporting(E_ALL); 	// en TEST !!
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8" />
<!-- CSS -->
	<link rel="stylesheet" media="screen" type="text/css" href="./template/css/theme_style.css" />
	<link rel="stylesheet" media="screen" type="text/css" href="./modules/mod_news/css/news_style.css" />
<title>News | Liste des News</title>
</head>

<body>
<div id="containerCentrer">

<?php
// ---------------------------------------------------
	include(__DIR__.'/modules/mod_news/news_liste_colonne.php');
// ---------------------------------------------------
?>

	<div id="LienRetourAccueil">
		<a href="./index.php"><span>Retour à l'Accueil</span></a>
	</div>

</div>
</body>
</html>
