<?php 

// démarrer la session de l'utilisateur
session_start();

// créer une connexion à la BDD
define('SQL_HOST', 'localhost');
define('SQL_USER', 'root');
define('SQL_PASS', '');
define('SQL_DBNAME', 'avenir');
try {
	$bdd = new PDO("mysql:dbname=".SQL_DBNAME.";host=".SQL_HOST,SQL_USER,SQL_PASS."");
}
catch (Exception $e) {
	die("Erreur : ".$e->getMessage());
}

require_once('functions.php');

?>