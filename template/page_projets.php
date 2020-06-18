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

//   function afficheUnProjet() {
//
//       global $bdd;
//       $query = $bdd -> prepare("select * from projet where id_projet=:idProjet");
//       $query -> execute([":idProjet"=> $projetAAfficher]);
//       return $query -> fetch(PDO::FETCH_ASSOC);
//
//   }
//
//   function unMenu ($idMenu) {
//     // retourne toutes les informations du menu qui a comme identifiant $idMenu
//
//     global $bdd;
//
//     $query = $bdd -> prepare("select * from menu where id_menu = :idMenu");
//     $query -> execute([":idMenu" => $idMenu]);
//
//     return $query -> fetch(PDO::FETCH_ASSOC); // on utilise fetch et non fetchAll car nous souhaitons retourner un seul résultat.
//
// }


?>

  <main>
    <div class="container">
        <!-- <h1> #echo MontrerValeur("TITRE_ACCUEIL")?></h1> changer titre avec ça à l'occasion -->
      <h1>Mes projets...en ordre d'apparition</h1>
<!--A FAIRE si id_techno existe dans le post, afficher les projets correspondants à cet id. Sinon, les afficher comme dessous (voir boutons techno en bas et réflechir à une solution)-->
        <?php foreach(tousLesProjets() as $projet) {

          echo "<div class='vitrine'><h2>";
          echo html_a($projet["nom_projet"], URL_SITE . "projet_seul.php?projetAAfficher=$projet[id_projet]");

          echo "</h2><div class='aff  ichage_techno'>$projet[technos]</div>";

          echo html_image("$projet[url_image]", "img_pt");

          echo "</div>";
        }


        ?>
        <form class="" action="index.html" >

</form>
    <div class="liste_techno">
      <h3>Ou selectionnez une technologie pour voir les projets</h3>
      <ul>

        <?php foreach( tousLesTechno() as $techno ) {
            // echo "<form action='techno_reponse.php' method='post'><input type='hidden' name='id_techno'></form>";
            echo "<li>";
            echo html_a($techno["nom_techno"], "template/techno_reponse.php?technoAAfficher=$techno[id_techno]");
            echo "</li>";
        }

        ?>
      </ul>
    </div>
  </div>


  <?php include "include/footer.php"; ?>
