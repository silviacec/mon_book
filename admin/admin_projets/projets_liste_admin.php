<?php
include "../../config.php";

include "../../fonctions.php";

include "../include/entete_admin.php";

proteger_page();

show_error();
show_success();

?>

<div class="projets">
    <a href="<?php echo URL_SITE ?>admin/index.php">Retour à l'accueil</a>
    <a href="<?php echo URL_SITE ?>admin/admin_projets/modifier_projet.php">Ajouter un projet</a>
</div>

<div class="list">
    <?php
        $results = $bdd -> query("SELECT * FROM projet order by ordre") -> fetchAll();

        if(count($results) == 0) {
            echo "Aucun projet ! Vous pouvez en insérer un nouveau.";
        } else {
            echo "<ul>";

            foreach($results as $result) {
                $lienModifier = html_a("Modifier", URL_SITE . "admin/admin_projets/modifier_projet.php?projetAAfficher=$result[id_projet]");
                $lienSupprimer = html_a("Supprimer", URL_SITE . "admin/admin_projets/projet_supprimer.php?projetASupprimer=$result[id_projet]", "alert", "Êtes-vous sûr de vouloir effacer ce projet ?");

                echo "<li>$result[nom_projet] $lienModifier | $lienSupprimer</li>";

            }

            echo "</ul>";
        }


    ?>

</div>

<?php

include "../../template/include/footer.php";
