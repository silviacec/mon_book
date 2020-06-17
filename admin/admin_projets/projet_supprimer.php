<?php

include "../../config.php";

include "../../fonctions.php";

include "../include/entete_admin.php";

proteger_page();

if(!isset($_GET["projetASupprimer"])) {
    ajouterErreur("Merci de choisir un projet à supprimer.");

} else {

    $bdd -> query("DELETE FROM projet WHERE id_projet = " . $_GET["projetASupprimer"]);
    ajouterSuccess("Le projet a été supprimé.");

}

changeDePage(URL_SITE . "admin/admin_projets/projets_liste_admin.php");
