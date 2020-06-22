<!-- traite la demande de connexion avec les POST du formulaire -->
<?php
    include "../config.php";
    include "../fonctions.php";


if(empty($_POST["identifiant"]) || empty($_POST["mdp"])) {

    ajouterErreur("Merci d'insérer votre pseudo et le mot de passe !");

    changeDePage(URL_SITE . "admin/connexion.php");

  } else {

      $query = $bdd -> prepare("SELECT * FROM user where identifiant = :idUserStr AND mdp = :motDePasse");

      $query -> execute(
        array(
          ":idUserStr" => $_POST["identifiant"],
          ":motDePasse" => $_POST["mdp"],
        )
      );

      $resultatUtilisateur = $query -> fetchAll(PDO::FETCH_ASSOC);


    if(!empty($resultatUtilisateur)) {

        $_SESSION["connected_user"] = $resultatUtilisateur[0]; //le zéro fait référence au seul tableau contenu dans la variable et qui contient les détails de l'utilisateur connecté en ce moment

        changeDePage("index.php");

    } else {

        ajouterErreur("L'utilisateur n'a pas été trouvé.");
        changeDePage("connexion.php");

    }

}
