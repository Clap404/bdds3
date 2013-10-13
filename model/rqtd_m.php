<?php
	function get_rqt1() {
		$connexion = db_connect();
		$req = $connexion->query("SELECT nom_epreuve FROM Epreuve;");
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;
	}

	function get_rqt2() {
		$connexion = db_connect();
		$req = $connexion->query("SELECT nom_etu, CONVERT((DATEDIFF(date_naissance_etu, CURDATE())/12), UNSIGNED) AS age, sexe_etu FROM Etudiant;");
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;	
	}