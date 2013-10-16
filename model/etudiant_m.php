<?php 
	//E.id_iut sert à afficher la présélection dans les menus déroulants
	function get_etudiants_name($desc) {
		$connexion = db_connect();
		if($desc) {
			$req = $connexion->query("SELECT E.id_etu, E.nom_etu, DATE_FORMAT(E.date_naissance_etu,'%d/%m/%Y'), E.sexe_etu, I.nom_iut, E.id_iut FROM Etudiant E, Iut I WHERE E.id_iut=I.id_iut ORDER BY E.nom_etu DESC;");
		}
		else {
			$req = $connexion->query("SELECT E.id_etu, E.nom_etu, DATE_FORMAT(E.date_naissance_etu,'%d/%m/%Y'), E.sexe_etu, I.nom_iut, E.id_iut FROM Etudiant E, Iut I WHERE E.id_iut=I.id_iut ORDER BY E.nom_etu;");
		}
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;	

	}

	function get_etudiants_date($desc) {
		$connexion = db_connect();
		if($desc) {
			$req = $connexion->query("SELECT E.id_etu, E.nom_etu, DATE_FORMAT(E.date_naissance_etu,'%d/%m/%Y'), E.sexe_etu, I.nom_iut, E.id_iut FROM Etudiant E, Iut I WHERE E.id_iut=I.id_iut ORDER BY E.date_naissance_etu DESC;");
		}
		else {
			$req = $connexion->query("SELECT E.id_etu, E.nom_etu, DATE_FORMAT(E.date_naissance_etu,'%d/%m/%Y'), E.sexe_etu, I.nom_iut, E.id_iut FROM Etudiant E, Iut I WHERE E.id_iut=I.id_iut ORDER BY E.date_naissance_etu;");
		}
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;	

	}

	function get_etudiants_sexe($desc) {
		$connexion = db_connect();
		if($desc) {
			$req = $connexion->query("SELECT E.id_etu, E.nom_etu, DATE_FORMAT(E.date_naissance_etu,'%d/%m/%Y'), E.sexe_etu, I.nom_iut, E.id_iut FROM Etudiant E, Iut I WHERE E.id_iut=I.id_iut ORDER BY E.sexe_etu DESC;");
		}
		else {
			$req = $connexion->query("SELECT E.id_etu, E.nom_etu, DATE_FORMAT(E.date_naissance_etu,'%d/%m/%Y'), E.sexe_etu, I.nom_iut, E.id_iut FROM Etudiant E, Iut I WHERE E.id_iut=I.id_iut ORDER BY E.sexe_etu;");
		}
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;	

	}

	function get_etudiants_iut($desc) {
		$connexion = db_connect();
		if($desc) {
			$req = $connexion->query("SELECT E.id_etu, E.nom_etu, DATE_FORMAT(E.date_naissance_etu,'%d/%m/%Y'), E.sexe_etu, I.nom_iut, E.id_iut FROM Etudiant E, Iut I WHERE E.id_iut=I.id_iut ORDER BY I.nom_iut DESC;");
		}
		else {
			$req = $connexion->query("SELECT E.id_etu, E.nom_etu, DATE_FORMAT(E.date_naissance_etu,'%d/%m/%Y'), E.sexe_etu, I.nom_iut, E.id_iut FROM Etudiant E, Iut I WHERE E.id_iut=I.id_iut ORDER BY I.nom_iut;");
		}
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;	

	}

	function add_etudiant() {
		$connexion = db_connect();
		$req = $connexion->prepare("INSERT INTO Etudiant VALUES(NULL, ?,?,?,?);");
		$req->execute(array($_POST['name'], $_POST['date'], $_POST['sexe'], $_POST['iut']));
		$req->closeCursor();	
	}

	function modif_etudiant() {
		$connexion = db_connect();
		$req = $connexion->prepare("UPDATE Etudiant SET nom_etu=?, date_naissance_etu=?, sexe_etu=?, id_iut=? WHERE id_etu=? ;");
		$req->execute(array($_POST['name'], $_POST['date'], $_POST['sexe'], $_POST['iut'], $_POST['id']));
		$req->closeCursor();	
	}

	function del_etudiant() {
		$connexion = db_connect();
		$req = $connexion->prepare("DELETE FROM Etudiant WHERE id_etu = ?;");
		$req->execute(array($_GET['id']));
		$req->closeCursor();
	}

	function liste_deroulante() {
		$connexion = db_connect();
		$req = $connexion->query("SELECT id_iut, nom_iut FROM Iut;");
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;
	}
