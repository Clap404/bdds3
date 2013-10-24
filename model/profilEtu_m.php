<?php
    function get_profil_date($desc) {
        $connexion = db_connect();
        if($desc){
            $req = $connexion->prepare("SELECT M.nom_manif, DATE_FORMAT(M.date_manif,'%d/%m/%Y'), E.nom_epreuve, P.resultat, M.id_manif, E.id_epreuve FROM Etudiant ET, Participe P, Epreuve E, Manifestation M WHERE ET.id_etu=? AND P.id_etu=ET.id_etu AND P.id_epreuve=E.id_epreuve AND P.id_manif=M.id_manif ORDER BY M.date_manif DESC;");
        }
        else{
            $req = $connexion->prepare("SELECT M.nom_manif, DATE_FORMAT(M.date_manif,'%d/%m/%Y'), E.nom_epreuve, P.resultat, M.id_manif, E.id_epreuve FROM Etudiant ET, Participe P, Epreuve E, Manifestation M WHERE ET.id_etu=? AND P.id_etu=ET.id_etu AND P.id_epreuve=E.id_epreuve AND P.id_manif=M.id_manif ORDER BY M.date_manif;");
        }
        $req->execute(array($_GET['idEtu']));
        $data = $req->fetchall();
        $req->closeCursor();
        return $data;
    }

    function get_profil_epreuve($desc) {
        $connexion = db_connect();
        if($desc){
            $req = $connexion->prepare("SELECT M.nom_manif, DATE_FORMAT(M.date_manif,'%d/%m/%Y'), E.nom_epreuve, P.resultat, M.id_manif, E.id_epreuve FROM Etudiant ET, Participe P, Epreuve E, Manifestation M WHERE ET.id_etu=? AND P.id_etu=ET.id_etu AND P.id_epreuve=E.id_epreuve AND P.id_manif=M.id_manif ORDER BY E.nom_epreuve DESC;");
        }
        else{
            $req = $connexion->prepare("SELECT M.nom_manif, DATE_FORMAT(M.date_manif,'%d/%m/%Y'), E.nom_epreuve, P.resultat, M.id_manif, E.id_epreuve FROM Etudiant ET, Participe P, Epreuve E, Manifestation M WHERE ET.id_etu=? AND P.id_etu=ET.id_etu AND P.id_epreuve=E.id_epreuve AND P.id_manif=M.id_manif ORDER BY E.nom_epreuve;");
        }
        $req->execute(array($_GET['idEtu']));
        $data = $req->fetchall();
        $req->closeCursor();
        return $data;
    }

    function get_profil_resultat($desc) {
        $connexion = db_connect();
        if($desc){
            $req = $connexion->prepare("SELECT M.nom_manif, DATE_FORMAT(M.date_manif,'%d/%m/%Y'), E.nom_epreuve, P.resultat, M.id_manif, E.id_epreuve FROM Etudiant ET, Participe P, Epreuve E, Manifestation M WHERE ET.id_etu=? AND P.id_etu=ET.id_etu AND P.id_epreuve=E.id_epreuve AND P.id_manif=M.id_manif ORDER BY P.resultat DESC;");
        }
        else{
            $req = $connexion->prepare("SELECT M.nom_manif, DATE_FORMAT(M.date_manif,'%d/%m/%Y'), E.nom_epreuve, P.resultat, M.id_manif, E.id_epreuve FROM Etudiant ET, Participe P, Epreuve E, Manifestation M WHERE ET.id_etu=? AND P.id_etu=ET.id_etu AND P.id_epreuve=E.id_epreuve AND P.id_manif=M.id_manif ORDER BY P.resultat;");
        }
        $req->execute(array($_GET['idEtu']));
        $data = $req->fetchall();
        $req->closeCursor();
        return $data;
    }

    function get_profil_nom_manif($desc) {
        $connexion = db_connect();
        if($desc){
            $req = $connexion->prepare("SELECT M.nom_manif, DATE_FORMAT(M.date_manif,'%d/%m/%Y'), E.nom_epreuve, P.resultat, M.id_manif, E.id_epreuve FROM Etudiant ET, Participe P, Epreuve E, Manifestation M WHERE ET.id_etu=? AND P.id_etu=ET.id_etu AND P.id_epreuve=E.id_epreuve AND P.id_manif=M.id_manif ORDER BY M.nom_manif DESC;");
        }
        else{
            $req = $connexion->prepare("SELECT M.nom_manif, DATE_FORMAT(M.date_manif,'%d/%m/%Y'), E.nom_epreuve, P.resultat, M.id_manif, E.id_epreuve FROM Etudiant ET, Participe P, Epreuve E, Manifestation M WHERE ET.id_etu=? AND P.id_etu=ET.id_etu AND P.id_epreuve=E.id_epreuve AND P.id_manif=M.id_manif ORDER BY M.nom_manif;");
        }
        $req->execute(array($_GET['idEtu']));
        $data = $req->fetchall();
        $req->closeCursor();
        return $data;
    }

    function get_etu_name() {
        $connexion = db_connect();
        $req = $connexion->prepare("SELECT nom_etu FROM Etudiant WHERE id_etu = ?;");
        $req->execute(array($_GET['idEtu']));
        $data = $req->fetch();
        $req->closeCursor();
        return $data;
    }

    function del_participation() {
        $connexion = db_connect();
        $req = $connexion->prepare("DELETE FROM Participe WHERE id_manif = ? AND id_epreuve = ? AND id_etu = ?;");
        $req->execute(array($_GET['idManif'], $_GET['idEpreuve'], $_GET['idEtu']));
        $req->closeCursor();    
    }

    function modif_participation() {
        $connexion = db_connect();
        $req = $connexion->prepare("UPDATE Participe SET resultat=? WHERE id_manif = ? AND id_epreuve = ? AND id_etu = ?;");
        $req->execute(array($_POST['resultat'] ,$_POST['idManif'], $_POST['idEpreuve'], $_POST['idEtu']));
        $req->closeCursor();    
    }

    function add_participation() {
        $connexion = db_connect();
        $req = $connexion->prepare("INSERT INTO Participe VALUES(?, ?, ?, ?) ;");
        $req->execute(array($_POST['idManif'], $_POST['idEpreuve'], $_POST['idEtu'], $_POST['resultat']) );
        $req->closeCursor();    
    }

    function liste_deroulante_epreuve() {
        $connexion = db_connect();
        $req = $connexion->query("SELECT M.nom_manif, E.nom_epreuve, DATE_FORMAT(M.date_manif,'%d/%m/%Y'), C.id_manif, C.id_epreuve FROM Manifestation M, Epreuve E, Contenu C WHERE C.id_manif=M.id_manif AND C.id_epreuve=E.id_epreuve ORDER BY M.date_manif DESC ;");
        $data = $req->fetchAll();
        $req->closeCursor();
        return $data;
    }