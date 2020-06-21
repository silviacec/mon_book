<?php

include "../../config.php";

include "../../fonctions.php";

include "../include/entete_admin.php";

proteger_page();

if(!isset($_GET["technoASupprimer"])) {
    ajouterErreur("Merci de choisir un projet à supprimer.");

} else {

    $bdd -> query("DELETE FROM techno WHERE id_techno = " . $_GET["technoASupprimer"]);
    ajouterSuccess("La techno a été supprimée.");

}

changeDePage(URL_SITE . "admin/admin_techno/techno_liste_ajout.php");
