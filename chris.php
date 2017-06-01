<?php
session_start();
$cnx = new PDO("mysql:host=localhost;dbname=Evalsimplon", "root", "codeurKiFFeur");
// session à récupérer !
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Evaluation - Simplon</title>
    <link rel="stylesheet" href="bootstrap-css/bootstrap.min.css">
    <link rel="stylesheet" href="style/css/christopher.css">
    <link rel="stylesheet" href="style/css/greg.css">
  </head>
  <body>
    <a href="#" id="toTop" class="fa fa-chevron-up fa-2x"></a>
    <nav class="navbar navbar-inverse fixed-top" id="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href=""><img id="logo" src="img/logo.png"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="">Home</a></li>
          <li><a href="">...</a></li>
          <li><a href="">...</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php // si l'utilisateur est connecté affiché le "dropdown" !
          if($_SESSION["login"] == "yes"){
              echo '<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span style="text-transform:uppercase">'.$user.'</span>'.'&nbsp;<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="pages/profil.php?id=".$_SESSION["id"]">Mon Profil</a></li>
                  <li><a href="pages/editionprofil.php?id=".$_SESSION["id"]">Paramètres</a></li>
                  <li class="divider"></li>
                  <li><a href="pages/deconnexion.php">Déconnexion</a></li>
                </ul>
              </li>';
            }
            else{ // sinon affiché les liens pour l'inscription ou la connexion !
              echo '<li><a href="pages/inscription.php">Sign Up</a></li>
              <li><a href="pages/connexion.php">Log In</a></li>';
            }
            ?>
        </ul>
      </div>
    </div>
  </nav>
    <script src="https://use.fontawesome.com/8d66db2fbe.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/christopher.js"></script>
  </body>
</html>
