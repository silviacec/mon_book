<?php
include "../config.php";

include "../fonctions.php";

include "include/entete_admin.php";


?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Book de Cekcek - page de connexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php
    show_error();
    show_success();
?>


<div class="box_connect">
    <h1>Se connecter</h1>
    <form method="post" action="connexion_reponse.php">
        <input type="text" name="identifiant" placeholder="Votre pseudo">
        <br>
        <input type="mdp" name="mdp" placeholder="Mot de passe">
        <br><br>
        <input type="submit">
    </form>


</div>


</body>
</html>
