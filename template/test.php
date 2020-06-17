<?php

  include "../include/header.php";
  include "../fonctions.php";

  function tousLesProjets() {

      global $bdd;
      return $bdd -> query("select nom_projet, GROUP_CONCAT(nom_techno SEPARATOR '<br>') as technos, url_image from projet, techno, projet_techno where techno.id_techno = projet_techno.techno_id and projet_techno.projet_id = projet.id_projet group by projet.nom_projet order by ordre") ->
      fetchAll(PDO::FETCH_ASSOC);

  }


?>

  <main>
    <div class="container">
        <!-- <h1><?php #echo MontrerValeur("TITRE_ACCUEIL")?></h1> changer titre avec ça à l'occasion -->
      <h1>Mes projets...en ordre d'apparition</h1>
<!--A FAIRE si id_techno existe dans le post, afficher les projets correspondants à cet id. Sinon, les afficher comme dessous (voir boutons techno en bas et réflechir à une solution)-->
        <?php foreach(tousLesProjets() as $projet) {
          echo "<div class='vitrine'>
                <h2><a href='page_projet_seul.php'>Le projet: $projet[nom_projet]</a></h2>";

          echo "<div class='affichage_techno'>$projet[technos]</div>";

          echo html_image("$projet[url_image]", "img_pt");

          echo "</div>";
        }

      //   <?php foreach( tousLesMenus() as $menu ) {
      //     echo "<li>";
      //     echo html_a($menu["nom"], URL_SITE . "menu.php?menuAAfficher=$menu[id_menu]");
      //     echo "</li>";
      // }
      // ?>





  <?php include "include/footer.php"; ?>
