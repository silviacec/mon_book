<?php

  include "include/header.php";

  include "fonctions.php";

  $projetAAfficher = $bdd -> query ("select nom_projet, description, url_image, annee, client, lien FROM projet WHERE id_projet = ($_GET[projetAAfficher])") -> fetch();

  $technoAAfficher = $bdd -> query ("select nom_techno from techno, projet_techno, projet where techno.id_techno = projet_techno.techno_id and projet.id_projet = ($_GET[projetAAfficher]) and projet_techno.projet_id = projet.id_projet") -> fetchAll();
?>
<div class="un_projet">

  <?php



    echo "<div class='zero'>";
    echo html_image("$projetAAfficher[url_image]", "img_pt");

    echo html_image("template/img/" . $projetAAfficher["nom_projet"] . "2.jpg", "img_pt");

    echo html_image("template/img/" . $projetAAfficher["nom_projet"] . "3.jpg", "img_pt");

    echo "</div>";

    echo "<h1>$projetAAfficher[nom_projet]</h1>";
?>

    <div class="one">

    <?php
    foreach ($technoAAfficher as $key => $techno) {
      echo "$techno[nom_techno]<br>";
    }
    ?>

    </div>

    <?php

    echo "<div class='two'><p>$projetAAfficher[description]</p></div>";

    echo "<div class='three'><p>Réalisé en $projetAAfficher[annee] pour $projetAAfficher[client]</p></div>";

    echo "<div class='four'><p>$projetAAfficher[lien]</p></div>";

    ?>
    </div>
<!-- créer une pagination avec <a>page suivante ></a> qui incrémente la valeur du paramètre de GET de la page (id_projet) d'un. Si le num n'est pas un id_projet, de deux...-->
  <?php include "include/footer.php";
