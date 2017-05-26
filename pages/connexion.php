<?php
  try{
	  $cnx = new PDO("mysql:host=localhost;dbname=Evalsimplon", "root", "");
  }
  catch (Exception $e){
  	die('Erreur : ' . $e->getMessage());
  }
?>
