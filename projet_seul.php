<?php
include "config.php";

$projetAAfficher = $bdd -> query ("select nom_projet, description FROM projet WHERE id_projet = ($_GET[projetAAfficher])") -> fetch();
var_dump($projetAAfficher);
$titre = 'les manif(s) à Paris en 2020';

include PATH_TEMPLATE . "page_projet_seul.php";




  // global $bdd;
  //
  // $projetAAfficher = $bdd -> query ("select nom_projet, description FROM projet WHERE id_projet = ($_GET[projetAAfficher])") -> fetch();
  //
  // return $projetAAfficher;
  //
  // echo "<p>$projetAAfficher</p>";
