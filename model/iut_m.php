<?php
	function get_iut() {
		$connexion = db_connect();
		$req = $connexion->query("SELECT * FROM Iut;");
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;
	}