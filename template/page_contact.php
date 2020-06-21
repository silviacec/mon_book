<?php

include "include/header.php";
include "fonctions.php";


?>

  <main>
        <div class="vitrine">
            <h1><?php echo MontrerContenu("TITRE_CONTACT")?></h1>
            <div class="row">
                <div class="col-6">
                    <div class="pr-20 texte">
                        <h2><?php echo MontrerContenu("NOM_CONTACT")?></h2>
                        <h4><?php echo MontrerContenu("ADRESSE_CONTACT")?></h4>
                        <h4><?php echo MontrerContenu("TEL_CONTACT")?></h4>
                        <h3><?php echo MontrerContenu("EMAIL_CONTACT")?></h3>
                    </div>
                </div>
                <!-- <div class="col-6">
                   <?php echo html_image("image/vrac/accueil.jpg")?>
                </div> -->

            </div>
        <div>
  </main>
<?php include "template/include/footer.php";
