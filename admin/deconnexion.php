<?php

include "../config.php";

include "../fonctions.php";


unset($_SESSION["connected_user"]);

changeDePage( URL_SITE . "/admin/connexion.php");
