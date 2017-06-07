<?php @session_start();
// --------------------------------------------------------------
// Deconnection de la partie "Administration"
// --------------------------------------------------------------
// on vide/detruit les variables de session
$_SESSION['Admin']['Valid']		= false;
// ------------------------------
// Redirection vers la page d'identification
   header('Location: ../index.php');
   exit;
// ------------------------------
