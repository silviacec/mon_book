<?php
include "../../config.php";

include "../../fonctions.php";

include "../include/entete_admin.php";

proteger_page();

?>

<!-- formulaire qui affiche les données de la page accueil et permet d'envoyer des requetes de modification + suppression à la bdd -->

<div class="form">

    <form enctype="multipart/form-data" action="modifier_accueil_reponse.php" method="post">

        <div class="field">
          <input type="text" name="titre" value="<?php echo montrerContenu("TITRE_ACCUEIL")?>" placeholder="Titre de la page d'accueil" />
        </div>

        <textarea name="texteAccueil"><?php echo montrerContenu("TEXTE_ACCUEIL")?></textarea>

        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
        <div class="image_admin">
          <?php echo html_image("template/img/accueil.jpg", "mini_image");?>
        </div>

        <p>Choisir une autre image pour la page d'accueil :</p>
        <input name="imageAccueil" type="file"  accept="image/jpeg" />

        <input type="submit" value="Envoyer" />

        <a href="<?php echo URL_SITE ?>admin/index.php" class="button">Retour à l'accueil de l'admin</a>

    </form>

</div>

<?php

include "../../template/include/footer.php";
