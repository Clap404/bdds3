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

            case "etudiants":
                require("controller/etudiant.php");
            break;

            case "lstEpreuve":
                require("controller/lstEpreuve.php");
            break;

            case "lstEtu":
                require("controller/lstEtu.php");
            break;

            default:
               echo "<h1>Error 404 Not Found : La page demandé n'existe pas</h1><br/><h2>Have you tried to turn it off and on again ?</h2>";
            break;
        }
    }
    else {
        require("controller/accueil.php");   
    }
