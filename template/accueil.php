<?php

  include "include/header.php";
  include "fonctions.php";

?>

<main>
  <div class="container">

    <h1><?php echo MontrerContenu("TITRE_ACCUEIL")?></h1>

    <div class="vitrine">

      <div class="">
            <?php echo nl2br(MontrerContenu("TEXTE_ACCUEIL"))?>
      </div>

      <div class="">
         <?php echo html_image("template/img/accueil.jpg", "img_pt")?>
      </div>

      </div>

      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

  </div>

</main>

<?php include "include/footer.php"; ?>
