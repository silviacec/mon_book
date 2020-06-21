<?php

include "config.php";

include PATH_TEMPLATE . "include/header.php";

include "fonctions.php";

$nom_techno = $bdd -> query("select nom_techno from techno where id_techno=$_GET[technoAAfficher]")->fetch();
echo "<h1 class='titre_zoom'>$nom_techno[nom_techno]</h1>";

function afficheProjetParTechno() {

  global $bdd;
  $technoAAfficher = $bdd -> query("select * from projet, techno, projet_techno where projet_techno.techno_id=$_GET[technoAAfficher] and projet_techno.techno_id = techno.id_techno and projet_techno.projet_id=projet.id_projet") -> fetchAll(PDO::FETCH_ASSOC);


  return $technoAAfficher ;
}


foreach(afficheProjetParTechno() as $projetDeCetteTechno) {

  echo "<div class='vitrine'>
          <h2>$projetDeCetteTechno[nom_projet]</h2>
          <p>$projetDeCetteTechno[description]</p>";

          echo html_image("$projetDeCetteTechno[url_image]", "img_pt");

  echo "</div>";
}

 include PATH_TEMPLATE . "include/footer.php";
