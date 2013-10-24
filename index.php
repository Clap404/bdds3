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

            case "profilEtu":
                require("controller/profilEtu.php");
            break;

            default:
                echo "
                <meta charset='utf-8'>
                <style>
                body{
                    font-family:courier;
                    background-color:black;
                    color:green;
                }
                .blink {
                    animation: blink 1s steps(5, start) infinite;
                }
                @keyframes blink {
                    to {
                        visibility: hidden;
                    }
                }
                </style>
                <h1>Error 404 Not Found : La page demandée n'existe pas</h1><br/>
                <h2>Have you tried turning it off and on again ? <span class='blink'>▒</span></h2>";
            break;
        }
    }
    else {
        require("controller/accueil.php");   
    }
