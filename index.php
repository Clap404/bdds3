<?php
    if(isset($_GET['p'])) {
        switch($_GET["p"]) {
            case "iut":
                require("controller/iut.php");
            break;

            default:
               echo "<h1>Erreur</h1>";
            break;
        }
    }
    else {
        require("controller/accueil.php");   
    }
