<?php
include "../../config.php";

include "../../fonctions.php";

include "../include/entete_admin.php";

proteger_page();


if(!empty($_POST)) {

  if($_POST["id_user"] == 0) {

    $query = $bdd -> prepare ("INSERT INTO user (identifiant, mdp) VALUES (:identifiant, :mdp)");
    $query -> execute([
        ":identifiant" => $_POST["identifiant"],
        ":mdp" =>  $_POST["mdp"],
        ]);


      $userID = $bdd -> lastInsertId(); // Dans PHP, retourne l'identifiant de la dernière ligne insérée en base.
///ajoute dans table jointure toute les technos du $projetID --> à mettre aussi plus bas dans le modifier
  ajouterSuccess("Vous avez ajouté un nouvel utilisateur");


    } else {// un id est envoyé alors je modifie un enregistrement.
        $query = $bdd -> prepare ("UPDATE user SET
                                  identifiant = :identifiant,
                                  mdp = :mdp
                                  WHERE id_user = :idUser");

        $query -> execute(
            [ ":identifiant" => $_POST["identifiant"],
              ":mdp" =>  $_POST["mdp"],
            ]
        );
var_dump($query->errorinfo());
        $userID = $_POST["id_user"];

        ajouterSuccess("Vous avez modifié ce compte utilisateur");
    }


}

changeDePage(URL_SITE . "admin/admin_user/user_liste.php");
