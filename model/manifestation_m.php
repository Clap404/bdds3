<?php
	function get_manif_name($desc) {
		$connexion = db_connect();
		if($desc) {
			$req = $connexion->query("SELECT M.id_manif, M.nom_manif,DATE_FORMAT(M.date_manif, '%d/%m/%Y') as datefr, I.nom_iut, I.id_iut FROM Manifestation M, Iut I WHERE M.id_iut=I.id_iut ORDER BY M.nom_manif DESC;");
		}
		else {
			$req = $connexion->query("SELECT M.id_manif, M.nom_manif, DATE_FORMAT(M.date_manif, '%d/%m/%Y') as datefr, I.nom_iut, I.id_iut FROM Manifestation M, Iut I WHERE M.id_iut=I.id_iut ORDER BY M.nom_manif;");
		}
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;	
	}

	function get_manif_date($desc) {
		$connexion = db_connect();
		if($desc) {
			$req = $connexion->query("SELECT M.id_manif, M.nom_manif,DATE_FORMAT(M.date_manif, '%d/%m/%Y') as datefr, I.nom_iut, I.id_iut FROM Manifestation M, Iut I WHERE M.id_iut=I.id_iut ORDER BY M.date_manif DESC;");
		}
		else {
			$req = $connexion->query("SELECT M.id_manif, M.nom_manif, DATE_FORMAT(M.date_manif, '%d/%m/%Y') as datefr, I.nom_iut, I.id_iut FROM Manifestation M, Iut I WHERE M.id_iut=I.id_iut ORDER BY M.date_manif;");
		}
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;	
	}

	function get_manif_iut($desc) {
		$connexion = db_connect();
		if($desc) {
			$req = $connexion->query("SELECT M.id_manif, M.nom_manif,DATE_FORMAT(M.date_manif, '%d/%m/%Y') as datefr, I.nom_iut, I.id_iut FROM Manifestation M, Iut I WHERE M.id_iut=I.id_iut ORDER BY I.nom_iut DESC;");
		}
		else {
			$req = $connexion->query("SELECT M.id_manif, M.nom_manif, DATE_FORMAT(M.date_manif, '%d/%m/%Y') as datefr, I.nom_iut, I.id_iut FROM Manifestation M, Iut I WHERE M.id_iut=I.id_iut ORDER BY I.nom_iut;");
		}
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;	
	}

	function del_manif() {
		$connexion = db_connect();
		$req = $connexion->prepare("DELETE FROM Manifestation WHERE id_manif=?;");
		$req->execute(array($_GET['id']));
		$req->closeCursor();
	}

	function add_manif() {
		$connexion = db_connect();
		$req = $connexion->prepare("INSERT INTO Manifestation VALUES(NULL, ?, ?, ?);");
		$req->execute(array($_POST['name'], $_POST['date'], $_POST['iut']));
		$req->closeCursor();	
	}

	function modif_manif() {
		$connexion = db_connect();
		$req = $connexion->prepare("UPDATE Manifestation SET nom_manif=?, date_manif=?, id_iut=? WHERE id_manif=? ");
		$req->execute(array($_POST['name'], $_POST['date'], $_POST['iut'], $_POST['id']));
		$req->closeCursor();	
	}

	function liste_deroulante() {
		$connexion = db_connect();
		$req = $connexion->query("SELECT id_iut, nom_iut FROM Iut;");
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;
	}