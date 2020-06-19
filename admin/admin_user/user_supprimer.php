<?php

include "../../config.php";

include "../../fonctions.php";

include "../include/entete_admin.php";

proteger_page();

if(!isset($_GET["userASupprimer"])) {
    ajouterErreur("Merci de choisir un projet à supprimer.");

} else {

    $bdd -> query("DELETE FROM user WHERE id_user = " . $_GET["userASupprimer"]);
    ajouterSuccess("Le compte utilisateur a été supprimé.");

}

changeDePage(URL_SITE . "admin/admin_user/user_liste.php");
