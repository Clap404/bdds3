<?php
    if(isset($_GET['p'])) {
        switch($_GET["p"]) {
            case "iut":
                require("controller/iut.php");
            break;

            case "epreuves":
                require("controller/epreuves.php");
            break;

            case "manifestations":
                require("controller/manifestation.php");
            break;

            default:
               echo "<h1>Erreur</h1>";
            break;
        }
    }
    else {
        require("controller/accueil.php");   
    }
