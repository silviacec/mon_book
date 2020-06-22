<?php

include "include/header.php";
include "fonctions.php";

?>

<main class='page_contact'>
  <div class="bloc">
  </div>

  <div class="vitrine">

    <h1><?php echo MontrerContenu("TITRE_CONTACT")?></h1>

    <div class="pr-20 texte">

      <h2><?php echo MontrerContenu("NOM_CONTACT")?></h2>

      <h4><?php echo MontrerContenu("ADRESSE_CONTACT")?></h4>

      <h4><?php echo MontrerContenu("TEL_CONTACT")?></h4>

      <h3><?php echo MontrerContenu("EMAIL_CONTACT")?></h3>

    </div>
  </div>
</main>

<?php include "template/include/footer.php";
