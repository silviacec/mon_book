<!-- CECI EST L'INDEX DE L'ADMIN !!!! -->
<?php
include "../config.php";

include "../fonctions.php";

include "include/entete_admin.php";

proteger_page();

show_error();
show_success();
?>

<div class="intro">

  <h1>Bienvenue dans votre espace administration</h1>
    <p>Ici vous allez pouvoir modifier le contenu de votre site internet.</p>

    <div class="menu_accueil">
        <a href="<?php echo URL_SITE ?>" target="_blank">Aller au site</a>
        <a href="<?php echo URL_SITE ?>admin/admin_accueil/modifier_accueil.php">Page d'accueil</a>
        <a href="<?php echo URL_SITE ?>admin/admin_projets/projets_liste_admin.php">Projets</a>
        <a href="<?php echo URL_SITE ?>admin/admin_user/user_liste.php">Utilisateurs</a>
        <a href="<?php echo URL_SITE ?>admin/deconnexion.php">Se déconnecter</a>
    </div>



</div>

<?php

include PATH_TEMPLATE . "include/footer.php";
