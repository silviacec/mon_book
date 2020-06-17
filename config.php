<?php
// include "fonctions_utiles.php";
// include "fonctions_contenu_front.php";
// ces deux fichiers (au dessus) peuvent être mis dans un fichier 'fonctions' à part

session_start();

$serveur = 'localhost';
$utilisateur = 'root';
$motdepasse = '';
$nomBaseDeDonnees = "mon_book";


//On établit la connexion
$bdd = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motdepasse, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

define("URL_SITE", "http://localhost/mon_book/");
define("PATH_SITE", __DIR__ . "/");

define("URL_TEMPLATE", URL_SITE . "template/");
define("PATH_TEMPLATE", PATH_SITE . "template/");

define("NOM_DU_SITE", "Les projets de Silvia");
