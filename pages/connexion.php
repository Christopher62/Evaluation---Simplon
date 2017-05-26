<?php
  try{
	  $cnx = new PDO("mysql:host=localhost;dbname=Evalsimplon", "root", "codeurKiFFeur");
  }
  catch (Exception $e){
  	die('Erreur : ' . $e->getMessage());
  }
?>
