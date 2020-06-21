<?php
include "../../config.php";

include "../../fonctions.php";

include "../include/entete_admin.php";

proteger_page();


if(!empty($_GET["userAAfficher"])) {

  $userAModifier = $bdd -> query("SELECT * from user where id_user = " . $_GET["userAAfficher"]) -> fetch();

} else {
    $userAModifier = [];
}

  show_error();
  show_success();

?>

  <div class="form">

    <form enctype="multipart/form-data" action="modifier_user_reponse.php" method="post">

      <input type="hidden" name="id_user" value="<?php echoKey($userAModifier, "id_user", 0)  ?>">
      <!-- crée un input caché qui me permet de donner la valeur 0 à une nouvelle insertion de projet ou de récupérer l'id_projet d'un projet déjà présent sur la bdd -->
      <div class="field">
          Username<input name="identifiant" placeholder="Pseudo" type="text" value="<?php echoKey($userAModifier, "identifiant")  ?>">
      </div>

      <div class="field">
          Mot de passe<input name="mdp" placeholder="Password" type="text" value="<?php echoKey($userAModifier, "mdp")  ?>">
      </div>
      <input type="submit" value="Envoyer" />

    </form>
  </div>

  <div class="projets">
      <a href="<?php echo URL_SITE ?>admin/index.php" class="button">Revenir à l'accueil</a>
  </div>

<?php

 include "../../template/include/footer.php";
