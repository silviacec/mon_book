<?php

  include "include/header.php";

  include "fonctions.php";



  echo "<h1>$projetAAfficher[nom_projet]</h1>";
// var_dump($projetAAfficher);
echo html_image("template/img/$id_projet._1.jpg", "img_pt");
foreach ($projetAAfficher as $id_projet) {
  echo html_image("template/img/$id_projet._1.jpg", "img_pt");
  echo html_image("template/img/$id_projet._2.jpg", "img_pt");
  echo html_image("template/img/$id_projet._3.jpg", "img_pt");
}

var_dump($projetAAfficher);
  // if($projetAAfficher = "1"){
  //   echo html_image("template/img/1._1.jpg", "img_pt");
  //   echo html_image("template/img/1._2.jpg", "img_pt");
  //   echo html_image("template/img/1._3.jpg", "img_pt");
  // }

  foreach ($technoAAfficher as $key => $techno) {
    echo "<div>$techno[nom_techno]<div>";
  }

  echo "<p>$projetAAfficher[description]</p>";

  echo "<p>$projetAAfficher[annee], $projetAAfficher[client]</p>";

  echo "<div>$projetAAfficher[lien]";



  include "include/footer.php";
