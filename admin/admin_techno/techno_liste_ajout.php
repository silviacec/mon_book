<?php
include "../../config.php";

include "../../fonctions.php";

include "../include/entete_admin.php";

proteger_page();

?>

<div class="projets">
  <a href="<?php echo URL_SITE ?>admin/index.php">Retour à l'accueil</a>
</div>


<div class="form">

  <form enctype="multipart/form-data" action="ajout_techno_reponse.php" method="post">

    <div class="field">
        Techno à ajouter <input name="nom_techno" placeholder="Techno" type="text" value="">
    </div>

    <input type="submit" value="Envoyer" />

  </form>
</div>

<?php

$tableTechno = $bdd -> query("SELECT * FROM techno")-> fetchAll();?>

<table>

  <?php

  if(count($tableTechno) == 0) {
      echo "Aucune techno ! Vous pouvez insérer une nouvelle techno à partir de cette page.";
  } else {
      foreach ($tableTechno as $techno) {

        $supprimerTechno = html_a("Supprimer", URL_SITE . "admin/admin_techno/techno_supprimer.php?technoASupprimer=$techno[id_techno]", "alert", "Êtes-vous sûr de vouloir effacer cette techno ?");

        echo "<tr>
                <td>$techno[nom_techno]</td>
                <td><a href=''>$supprimerTechno</a></td>
              </tr>";

      }
}

  ?>

</table>

<?php include "../../template/include/footer.php";
