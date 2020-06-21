<?php

  include "include/header.php";
  include "fonctions.php";

  function tousLesProjets() {

      global $bdd;
      return $bdd -> query("select id_projet, nom_projet, GROUP_CONCAT(nom_techno SEPARATOR '<br>') as technos, url_image from projet, techno, projet_techno where techno.id_techno = projet_techno.techno_id and projet_techno.projet_id = projet.id_projet group by projet.nom_projet order by ordre") ->
      fetchAll(PDO::FETCH_ASSOC);

  }

  function tousLesTechno() {

      global $bdd;
      return $bdd -> query("select nom_techno, id_techno from techno order by id_techno") ->
      fetchAll(PDO::FETCH_ASSOC);

  }

?>

  <main class="page_projets">

    <aside class="liste_techno">
      <h3>Ou selectionnez une technologie pour voir les projets</h3>

      <ul>
        <?php foreach( tousLesTechno() as $techno ) {
            echo "<form action='projets_par_techno.php' method='post'><input type='hidden' name='id_techno'></form>";
            echo "<li>";
            echo html_a($techno["nom_techno"], "projets_par_techno.php?technoAAfficher=$techno[id_techno]");
            echo "</li>";
        }
        ?>
      </ul>
    </aside>

    <div class="">

      <h1>Mes projets</h1>

      <?php foreach(tousLesProjets() as $projet) {

        echo "<div class='vitrine'><h2>";
        echo html_a($projet["nom_projet"], URL_SITE . "projet_seul.php?projetAAfficher=$projet[id_projet]");

        echo "</h2><div class='affichage_techno'>$projet[technos]</div>";

        echo html_image("$projet[url_image]", "img_pt");

        echo "</div>";
      }


      ?>

  </div>


  <?php include "template/include/footer.php"; ?>
