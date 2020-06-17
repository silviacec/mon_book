<?php

  include "include/header.php";

  include "fonctions.php";

  echo "<h1>$projetAAfficher[nom_projet]</h1>";

  echo html_image("$projetAAfficher[url_image]", "img_pt");

  foreach ($technoAAfficher as $key => $techno) {
    echo "<div>$techno[nom_techno]<div>";
  }

  echo "<p>$projetAAfficher[description]</p>";

  echo "<p>$projetAAfficher[annee], $projetAAfficher[client]</p>";

  echo "<div>$projetAAfficher[lien]";



  include "include/footer.php";
