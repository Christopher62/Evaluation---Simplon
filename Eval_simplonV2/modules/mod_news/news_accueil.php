<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
<!-- META -->
	<meta charset="utf-8" />
	<title>Serievore</title>
</head>
<body>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Serievore</title>
    <link rel="stylesheet" href="bootstrap-css/bootstrap.min.css">
    <link rel="stylesheet" href="style/css/christopher.css">
    <link rel="stylesheet" href="style/css/greg.css">
  </head>
    <nav class="navbar navbar-inverse fixed-top" id="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href=""><img id="logo" src="upload/images/img/logo.png"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="">Home</a></li>
          <li><a href="index_news_liste.php">Articles</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if($_SESSION["login"] == "yes")// si l'utilisateur est connecté affiché le "dropdown" !
          {
          ?>
          <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span style="text-transform:uppercase"><?php echo $_SESSION["pseudo"]; ?></span>&nbsp;<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="pages/profil.php?id=<?php echo $_SESSION["id"]; ?>">Mon Profil</a></li>
              <li><a href="pages/editionprofil.php?id=<?php echo $_SESSION["id"]; ?>">Paramètres</a></li>
              <li class="divider"></li>
              <li><a href="pages/deconnexion.php">Déconnexion</a></li>
            </ul>
          </li>
          <?php
            }
            else{ // sinon affiché les liens pour l'inscription ou la connexion !
              echo '<li><a href="./admin/index.php">Administration</a></li>';
            }
            ?>
        </ul>
      </div>
    </div>
  </nav>
		<div class="container-fluid">
    <div class="row">
      <div class="col-md-12" id="Presentation">
        <h2>Bienvenus</h2>
        <p>Bienvenus sur notre blog il contiendras des articles sur les séries de tout les continent (Amérique,France,Allemagne ...)</p>
        <p>Nous somme deux a travailler sur ce blog il y a Chris et Greg tout les deux en en formation a simplon et le but de se blog
          et une évaluation de fin de formation PEACE </p>
      </div>
      <div class="col-md-12" id="Voir">
        <a href="./index_news_liste.php"><button>Voir les Articles</button></a>
      </div>
    </div>
  </div>
</body>
<footer><p>&copy;Chris Greg SIMPLON 2017</p> </footer>
</html>
