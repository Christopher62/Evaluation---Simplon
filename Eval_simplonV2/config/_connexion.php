<?php
// --------------------------------------------------------------
// Paramètres de connection à la Base de Données sur le serveur
// --------------------------------------------------------------
	$pdo_conn				= array();
	$pdo_conn['hostname']	= 'localhost';		// voir hébergeur ou "localhost" en local
	$pdo_conn['database']	= 'tutoriel'; 	// nom de la BdD
	$pdo_conn['username']	= 'root';			// identifiant "root" en local
	$pdo_conn['password']	= 'Gregory20061994';				// mot de passe (vide en local)
// ------------------------
// connexion à la Base de Données
try {
	// chaine de connexion (DSN)
	$pdo_conn['strConn'] 	= 'mysql:host='.$pdo_conn['hostname'].';dbname='.$pdo_conn['database'];
	$pdo_conn['extraParam']	= array(
							PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,		// rapport d'erreurs sous forme d'exceptions
							PDO::ATTR_PERSISTENT => true, 						// Connexions persistantes
							PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"	// encodage UTF-8
							);
	// Instancie la connexion
	$pdo = new PDO($pdo_conn['strConn'], $pdo_conn['username'], $pdo_conn['password'], $pdo_conn['extraParam']);
}
catch(PDOException $e){
	$msg = 'ERREUR PDO dans ' . $e->getFile().' L.' . $e->getLine().' : ' . $e->getMessage();
	die($msg);
}
// ------------------------
	$pdo_conn				= array();	// on vide
// --------------------------------------------------------------
