<?php

include "../../config.php";

include "../../fonctions.php";

include "../include/entete_admin.php";

proteger_page();

if(!empty($_GET["projetAAfficher"])) {

    $projetAModifier = $bdd -> query("SELECT * from projet where id_projet = " . $_GET["projetAAfficher"]) -> fetch();
} else {
    $projetAModifier = [];
}

?>

<!-- formulaire qui affiche les données de la page projet simple et permet d'envoyer des requetes de modification + ajout (même que la modification mais non pre-rempli) à la bdd -->
<div class="container">

  <div class="projets">

    <a href="<?php echo URL_SITE ?>admin/index.php" class="button">Revenir à l'accueil</a>

    </div>
    <h1>Gestion des projets</h1>

    <?php
    show_error();
    show_success();

    ?>

    <div class="form">

      <form enctype="multipart/form-data" action="modifier_projet_reponse.php" method="post">

        <input type="hidden" name="id_projet" value="<?php echoKey($projetAModifier, "id_projet", 0)  ?>">
        <!-- crée un input caché qui me permet de donner la valeur 0 à une nouvelle insertion de projet ou de récupérer l'id_projet d'un projet déjà présent sur la bdd -->
        <div class="field">
          Nom du projet : <input name="nom_projet" placeholder="Nom du projet" type="text" value="<?php echoKey($projetAModifier, "nom_projet")  ?>">
        </div>

        <div class="field">
          Description : <textarea name="description" placeholder="Description" type="text"><?php echoKey($projetAModifier, "description")  ?></textarea>
        </div>

  <!-- ici boucle foreach pour afficher les technos et leur donner un paramètre d'url GET -->

        <?php

        $technoACocher = $bdd -> query("select * from techno") -> fetchAll();
        foreach ($technoACocher as $key => $techno){

          echo $techno["nom_techno"];
          echo "<input type='checkbox' name='techno[]' value='$techno[id_techno]'/><br>";
        }

        ?>

        <div class="field">
            Adresse de l'image : <input name="url_image" placeholder="Url de l'image" type="text" value="<?php echoKey($projetAModifier, "url_image")?>">
        </div>

        <div class="field">
            Année de création : <input name="annee" placeholder="Année" type="text"  value="<?php echoKey($projetAModifier, "annee")?>">
        </div>

        <div class="field">
            Client : <input name="client" placeholder="Client" type="text"  value="<?php echoKey($projetAModifier, "client")?>">
        </div>

        <div class="field">
            Lien du site : <input name="lien" placeholder="Lien" type="text"  value="<?php echoKey($projetAModifier, "lien")?>">
        </div>

        <div class="field">
          <input type="radio" name="online" value="1">Projet online
          <input type="radio" name="online" value="0">Projet pas encore online
        </div>

        <div class="field">
            Ordre d'affichage <input name="ordre" placeholder="Ordre" type="number"  value="<?php echoKey($projetAModifier, "ordre")?>">
        </div>

        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />

        <div class="image_admin">

        <?php

        if(!empty($_GET["projetAAfficher"])) {
            echo html_image("$projetAModifier[url_image]", "img_pt");
            }

        ?>

        <div>
        Screenshot du projet : <input name="url_image" type="file"  accept="image/jpeg, image/png" />
        </div>

        <div>
        Screenshot 2 : <input name="image_2" type="file"  accept="image/jpeg, image/png" />
        </div>

        <div>
        Screenshot 3 : <input name="image_3" type="file"  accept="image/jpeg, image/png" />
        </div>
      </div>

      <input type="submit" value="Envoyer" />

    </form>
  </div>
</div>

<?php
 include "../../template/include/footer.php";
