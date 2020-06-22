<?php

include "../../config.php";

include "../../fonctions.php";

include "../include/entete_admin.php";

proteger_page();

if(!empty($_POST)) {

  if($_POST["id_projet"] == 0) {

    $query = $bdd -> prepare ("INSERT INTO projet (nom_projet, description, url_image, annee, client, lien, online ordre) VALUES (:nom_projet, :description, :url_image, :annee, :client, :lien, :online, :ordre)");
    $query -> execute([
        ":nom_projet" => $_POST["nom_projet"],
        ":description" =>  $_POST["description"],
        ":url_image" =>  $_POST["url_image"],
        // ":image_2" =>  $_POST["image_2"],
        // ":image_3" =>  $_POST["image_3"],
        ":annee" => $_POST["annee"],
        ":client" =>  $_POST["client"],
        ":lien" =>  $_POST["lien"],
        ":online" => $_POST["online"],
        ":ordre" =>  $_POST["ordre"],
        ]);

        $projetID = $bdd -> lastInsertId(); // Dans PHP, retourne l'identifiant de la dernière ligne insérée en base.
///ajoute dans table jointure toute les technos du $projetID --> à mettre aussi plus bas dans le modifier


        foreach ($_POST["techno"] as $key => $chaqueTechno) {
          $query = $bdd -> prepare("INSERT into projet_techno (techno_id, projet_id) VALUES (:techno_id, :projet_id)");
          $query -> execute ([
            ":techno_id" => $chaqueTechno,
            ":projet_id" => $projetID,

          ]);
        }


        ajouterSuccess("Vous avez ajouté un nouveau projet $projetID");


    } else {// un id est envoyé alors je modifie un enregistrement.
        $query = $bdd -> prepare ("UPDATE projet SET
                                  nom_projet = :nom_projet,
                                  description = :description,
                                  url_image = :url_image,
                                  -- image_2 = :image_2,
                                  -- image_3 = :image_3,
                                  annee = :annee,
                                  client = :client,
                                  lien = :lien,
                                  online = :online,
                                  ordre = :ordre
                                  WHERE id_projet = :idProjet");

        $query -> execute(
            [ ":nom_projet" => $_POST["nom_projet"],
              ":description" =>  $_POST["description"],
              ":url_image" =>  $_POST["url_image"],
              // ":image_2" =>  $_POST["image_2"],
              // ":image_3" =>  $_POST["image_3"],
              ":annee" => $_POST["annee"],
              ":client" =>  $_POST["client"],
              ":lien" =>  $_POST["lien"],
              ":online" => $_POST["online"],
              ":ordre" =>  $_POST["ordre"],
              ":idProjet" => $_POST["id_projet"],
            ]
        );
// var_dump($query->errorinfo());
        $projetID = $_POST["id_projet"];

        //effacer dans table de jointure techno_id where projet_id = $projetID
        $query = $bdd -> query("DELETE FROM projet_techno WHERE projet_id = $projetID");

        foreach ($_POST["techno"] as $key => $chaqueTechno) {
          $query = $bdd -> prepare("INSERT into projet_techno (techno_id, projet_id) VALUES (:techno_id, :projet_id)");
          $query -> execute ([
            ":techno_id" => $chaqueTechno,
            ":projet_id" => $projetID,

          ]);
        }
        ajouterSuccess("Vous avez modifié le projet  $projetID");
    }
}
//ce truc marche bien et les images s'enregistrent comme je souhaite, mais après je n'arrive pas à les afficher dans modifier_projet
if(!empty($_FILES)) {
    enregistrerFichier($_FILES["url_image"], "template/img/$_POST[nom_projet].jpg");

    enregistrerFichier($_FILES["image_2"], "template/img/$_POST[nom_projet]2.jpg"); // ici on change le chemin d'enregistrement des photos et le nom des dossiers

    enregistrerFichier($_FILES["image_3"], "template/img/$_POST[nom_projet]3.jpg");

}


changeDePage(URL_SITE . "admin/admin_projets/projets_liste_admin.php");
