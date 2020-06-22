<?php
include "../../config.php";

include "../../fonctions.php";

proteger_page();

if(!empty($_POST)) {
  enregistreContenu("TITRE_ACCUEIL", $_POST["titre"]);
  enregistreContenu("TEXTE_ACCUEIL", $_POST["texteAccueil"]);
  enregistreContenu("PAR_ACCUEIL", $_POST["paragrapheAccueil"]);
}

if(!empty($_FILES)) {
    enregistrerFichier($_FILES["imageAccueil"], "template/img/accueil.jpg"); //$fichier et $destination
}

ajouterSuccess("Vos modifications ont été enregistrées");

changeDePage(URL_SITE . "admin/index.php");
