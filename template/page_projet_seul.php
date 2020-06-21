<?php

  include "include/header.php";

  include "fonctions.php";

  $projetAAfficher = $bdd -> query ("select nom_projet, description, url_image, annee, client, lien FROM projet WHERE id_projet = ($_GET[projetAAfficher])") -> fetch();

  $technoAAfficher = $bdd -> query ("select nom_techno from techno, projet_techno, projet where techno.id_techno = projet_techno.techno_id and projet.id_projet = ($_GET[projetAAfficher]) and projet_techno.projet_id = projet.id_projet") -> fetchAll();
  // var_dump($technoAAfficher);

  echo "<h1>$projetAAfficher[nom_projet]</h1>";



foreach ($projetAAfficher $id_projet) {
  echo html_image("template/img/$id_projet._1.jpg", "img_pt");
  echo html_image("template/img/$id_projet._2.jpg", "img_pt");
  echo html_image("template/img/$id_projet._3.jpg", "img_pt");
}

  foreach ($technoAAfficher as $key => $techno) {
    echo "<div>$techno[nom_techno]<div>";
  }

  echo "<p>$projetAAfficher[description]</p>";

  echo "<p>$projetAAfficher[annee], $projetAAfficher[client]</p>";

  echo "<div>$projetAAfficher[lien]";



  include "include/footer.php";
