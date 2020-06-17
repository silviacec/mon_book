<!-- permet de se traiter la demande de deconnexion avec un clic sur la page d'acceuil de l'admin-->
<?php

include "../config.php";
include "../fonctions.php";


unset($_SESSION["connected_user"]);

// Je détruits cette variable  car c'est elle que nous testons pour savoir si on est connecté.
// si elle n'existe pas, alors nous ne sommes pas connecté.

changeDePage( URL_SITE . "/admin/connexion.php");
