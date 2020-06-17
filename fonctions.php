<?php

  function html_image($urlImage, $classHtml = "") {
          // on affiche le tag vers l'image seulement si l'image existe.

          if(is_file(PATH_SITE . $urlImage)) {
              return "<img src='" . URL_SITE . "/$urlImage' class='$classHtml'>";
          }
          return "";
  }

  function MontrerContenu($iduni) {
    // montre la valeur de simpledonnee

    global $bdd;

    // 1 - on verifie si la donnée existe déjà dans la table.
    $query = $bdd -> prepare("SELECT * from general where iduni = :iduni");
    $query -> execute([":iduni" => $iduni]);
    $val = $query ->  fetch(PDO::FETCH_ASSOC);

    if(isset($val["contenu"])) {
        return $val["contenu"];
    }
  }

  function changeDePage($url) {
        // permet de faire une redirection vers $url

        header("location:" . $url);
        exit;
  }

// si la variable $_SESSION["connected_user"] existe, on est connectés et i=on peut poursuivre sur index, sinonon retourne à la page connexion et on ajoute un message d'erreur.

  function proteger_page() {

          if(empty($_SESSION["connected_user"])) {

              changeDePage(URL_SITE . "admin/connexion.php");
          }
  }

  function show_error() {

      if(!empty($_SESSION["erreur"])) {
          echo "<div class='erreur'><ul>";
          foreach ($_SESSION["erreur"] as $erreur) {
              echo "<li>$erreur</li>";
          }
          echo "</ul></div>";
      }
      unset($_SESSION["erreur"]);
  }

  function show_success() {

      if(!empty($_SESSION["success"])) {
          echo "<div class='success'><ul>";
          foreach ($_SESSION["success"] as $success) {
              echo "<li>$success</li>";
          }
          echo "</ul></div>";
      }
      unset($_SESSION["success"]);
  }

  function html_a($text, $lien = "#", $class="", $confirm="") { // le confirm sert à personnaliser l'alert qui s'ouvre lorsqu'on clique pour supprimer
          // fabrique la balise <a href></a>

      if($confirm != "") {
          $confirm = "onclick=\"return confirm('$confirm')\"";
      }

      return "<a href='$lien' class='$class' $confirm >$text</a>";
  }


 function ajouterErreur($texteMessageErreur) {
      // Ajouter un texte dans notre tableau des erreurs.
      $_SESSION["erreur"][] = $texteMessageErreur;
  }

  function ajouterSuccess($texteMessageSuccess) {
      // Ajouter un texte dans notre tableau des success.
      $_SESSION["success"][] = $texteMessageSuccess;
  }

  function enregistreContenu($iduni, $contenu) {

      global $bdd;
      $nbVal = $bdd -> prepare("SELECT count(*) as nbEnregistrement from general where iduni = :iduni");
      $nbVal -> execute([":iduni" => $iduni]);
      $resultNbVal =  $nbVal -> fetch(PDO::FETCH_ASSOC);

      if($resultNbVal["nbEnregistrement"] == 0) {      // s'il n'y a pas d'enregistrement, on l'insère (pas valable pour l'accueil mais utile pour les projets)

        $query = $bdd -> prepare("INSERT into general(iduni, contenu) VALUES ( :iduni, :contenu )");
        $query -> execute([":iduni" => $iduni, ":contenu" => $contenu]);

      } else {
        // sinon on le modifie (seule option pour l'accueil)
        $query = $bdd -> prepare("UPDATE general SET contenu=:contenu WHERE iduni = :iduni");
        $query -> execute([":iduni" => $iduni, ":contenu" => $contenu]);
      }
  }

  function enregistrerFichier($fichier, $destination) { //sert pour les images à ajouter dans les différents formulaires de l'admin

    if($fichier["error"] == UPLOAD_ERR_OK || $fichier["error"] == UPLOAD_ERR_NO_FILE) {
      // voir : https://www.php.net/manual/fr/features.file-upload.errors.php
      if($fichier["error"] == UPLOAD_ERR_OK) {

          verifierCheminFichier($destination);

          move_uploaded_file($fichier["tmp_name"], PATH_SITE . $destination); //Dans PHP, déplace un fichier téléchargé
      }
        } else {
            ajouterErreur("Un fichier n'a pas été enregistré.");
        }
}

function verifierCheminFichier($chemin) {

        $arrChemin = explode("/", $chemin); // Dans PHP, scinde une chaîne de caractères en segments

        $verifChemin = PATH_SITE;
        foreach ($arrChemin as $dossier) {
            if(!strstr($dossier, ".")) { //Dans PHP, Trouve la première occurrence dans une chaîne
                // si il n'y a pas de point dans le nom du dossier, c'est qu'il s'agit d'un dossier
                // (sinon, c'est un fichier)
                $verifChemin .= $dossier ."/";
                // var_dump($verifChemin);
                if(!is_dir($verifChemin)) { // ce n'est pas un dossier, alors nous allons le créer.
                    mkdir($verifChemin);
                }
            }
        }
}

function echoKey($tableau, $cle, $valeurDefaut = "") {
        // ecrit la valeur de la case clé de mon tableau.
    if(!empty($tableau[$cle])) { // c'est comme si on écrivait if(!empty($menuAModifier["id_menu"]))
        echo $tableau[$cle];
    } else {
        echo $valeurDefaut;
    }
}
