<?php
    require("config.php");
    require("model/base_model.php");
    require("model/profilEtu_m.php");
    $nom_etu = get_etu_name()[0];
    $title = "Profil de ".$nom_etu;

    if(isset($_GET['act']) && isset($_GET['idEtu'])) {
        if($_GET['act'] === "delete"){
            del_participation();  
        }
    }
    if(isset($_POST['idParticipation'])){
        if (preg_match("/[\d]+[\s][\d]+/", $_POST['idParticipation']) === 1){
            $substring = explode(" ", $_POST['idParticipation']);
            $_POST['idManif'] = $substring[0] ;
            $_POST['idEpreuve'] = $substring[1] ;
        }
    }
    if(isset($_POST['idManif'], $_POST['idEpreuve'], $_POST['idEtu'], $_POST['resultat'], $_POST['act'])) {
        if($_POST['act'] === "modif"){
            if(empty($_POST['idManif']) || empty($_POST['idEpreuve']) || empty($_POST['idEtu']) || empty($_POST['resultat'])) {
            }
            else {
                modif_participation();
            }
        }
        else{   
            if(empty($_POST['idManif']) || empty($_POST['idEpreuve']) || empty($_POST['idEtu']) || empty($_POST['resultat'])) {
            }
            else {
                add_participation();
            }
        }
    }

    require("view/profilEtu_v.php");
    require("view/base_template.php");

