<?php
	function get_iut_name() {
		$connexion = db_connect();
		$req = $connexion->query("SELECT * FROM Iut ORDER BY nom_iut;");
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;
	}

	function get_iut_adresse() {
		$connexion = db_connect();
		$req = $connexion->query("SELECT * FROM Iut ORDER BY adresse;");
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;
	}

	function get_iut_nbetu() {
		$connexion = db_connect();
		$req = $connexion->query("SELECT * FROM Iut ORDER BY nb_etu;");
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