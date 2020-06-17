<?php

  include "include/header.php";
  include "fonctions.php";
  include "include/footer.php";

?>

  <main>
        <div class="container">
            <h1><?php echo MontrerValeur("TITRE_CONTACT")?></h1>
            <div class="row">
                <div class="col-6">
                    <div class="pr-20 texte">
                        <?php echo nl2br(MontrerValeur("TEXTE_CONTACT"))?>
                    </div>
                </div>
                <!-- <div class="col-6">
                   <?php echo html_image("image/vrac/accueil.jpg")?>
                </div> -->

            </div>
        <div>
  </main>
