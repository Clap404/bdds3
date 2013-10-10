<?php
	function get_iut_name($desc) {
		$connexion = db_connect();
		if($desc === true) {
			$req = $connexion->query("SELECT * FROM Iut ORDER BY nom_iut DESC;");
		}
		else {
			$req = $connexion->query("SELECT * FROM Iut ORDER BY nom_iut;");
		}
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;
	}

	function get_iut_adresse($desc) {
		$connexion = db_connect();
		if($desc) {
			$req = $connexion->query("SELECT * FROM Iut ORDER BY adresse;");
		}
		else {
			$req = $connexion->query("SELECT * FROM Iut ORDER BY adresse DESC;");
		}
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;
	}

	function get_iut_nbetu($desc) {
		$connexion = db_connect();
		if($desc) {
			$req = $connexion->query("SELECT * FROM Iut ORDER BY nb_etu;");
		}
		else {
			$req = $connexion->query("SELECT * FROM Iut ORDER BY nb_etu DESC;");
		}
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;
	}

	function del_iut() {
		$connexion = db_connect();
		$req = $connexion->prepare("DELETE FROM Iut WHERE id_iut = ?;");
		$req->execute(array($_GET['id']));
		$req->closeCursor();
	}

	function add_iut() {
		$connexion = db_connect();
		$req = $connexion->prepare("INSERT INTO Iut VALUES(NULL, ?, ?, ?);");
		$req->execute(array($_POST['name'], $_POST['address'], $_POST['nb_etu']));
		$req->closeCursor();
	}

	function modif_iut() {
		$connexion = db_connect();
		$req = $connexion->prepare("UPDATE Iut SET nom_iut=?, adresse=?, nb_etu=? WHERE id_iut=id_iut;");
		$req->execute();
		$req->closeCursor();
	}
