<?php
include "../../config.php";

include "../../fonctions.php";

include "../include/entete_admin.php";

proteger_page();

?>

<div>
    <a href="<?php echo URL_SITE ?>admin/index.php">Retour à l'accueil</a>
    <a href="<?php echo URL_SITE ?>admin/admin_user/modifier_user.php">Ajouter un compte utilisateur</a>
</div>

formulaire qui affiche les données des users (tableau) et permet d'envoyer des requetes de
modification
+ suppression
+ ajout (même que la modification mais non pre-rempli) à la bdd
<?php

$tableUser = $bdd -> query("SELECT * FROM user")-> fetchAll();?>

<table>
  <thead>
    <tr>
      <td>Pseudo</td>
      <td>Password</td>
    </tr>
  </thead>


  <?php

  if(count($tableUser) == 0) {
      echo "Aucun utilisateur ! Vous pouvez insérer un nouvel utilisateur à partir de cette page.";
  } else {
      foreach ($tableUser as $user) {

        $modifierUser = html_a("Modifier", URL_SITE . "admin/admin_user/modifier_user.php?userAAfficher=$user[id_user]");

        $supprimerUser = html_a("Supprimer", URL_SITE . "admin/admin_user/user_supprimer.php?userASupprimer=$user[id_user]", "alert", "Êtes-vous sûr de vouloir effacer cet utilisateur ?");

        echo "<tr>
                <td>$user[identifiant]</td>
                <td>$user[mdp]</td>
                <td><a href=''>$modifierUser</a></td>
                <td><a href=''>$supprimerUser</a></td>
              </tr>";

      }
}

  ?>

</table>
