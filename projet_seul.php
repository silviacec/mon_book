<?php
include "config.php";

// $projetAAfficher = $bdd -> query ("select nom_projet, description, url_image, annee, client, lien FROM projet WHERE id_projet = ($_GET[projetAAfficher])") -> fetch();
//
// $technoAAfficher = $bdd -> query ("select nom_techno from techno, projet_techno, projet where techno.id_techno = projet_techno.techno_id and projet.id_projet = ($_GET[projetAAfficher]) and projet_techno.projet_id = projet.id_projet") -> fetchAll();
// // var_dump($technoAAfficher);

include PATH_TEMPLATE . "page_projet_seul.php";
