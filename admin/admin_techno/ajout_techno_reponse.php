<?php
include "../../config.php";

include "../../fonctions.php";

include "../include/entete_admin.php";

proteger_page();


if(!empty($_POST)) {

  if(!empty($_POST["nom_techno"])) {

    $query = $bdd -> prepare ("INSERT INTO techno (nom_techno) VALUES (:nom_techno)");
    $query -> execute([
        ":nom_techno" => $_POST["nom_techno"],
      ]);


      $technoID = $bdd -> lastInsertId(); // Dans PHP, retourne l'identifiant de la dernière ligne insérée en base.
///ajoute dans table jointure toute les technos du $projetID --> à mettre aussi plus bas dans le modifier
  ajouterSuccess("Vous avez ajouté un nouvel utilisateur");

  }
}

changeDePage(URL_SITE . "admin/admin_techno/techno_liste_ajout.php");
