<?php 
	function get_name_manif($id) {
		$connexion = db_connect();
		$req = $connexion->prepare("SELECT nom_manif From Manifestation WHERE id_manif = ?;");
		$req->execute(array($id));
		$data = $req->fetch();
		$req->closeCursor();
		return $data;
	}

	function get_epreuves_manif() {
		$connexion = db_connect();
		$req = $connexion->prepare("SELECT E.id_epreuve, E.nom_epreuve FROM Manifestation M, Epreuve E, Contenu C WHERE C.id_manif = M.id_manif AND C.id_manif = ? AND C.id_epreuve = E.id_epreuve;");
		$req->execute(array($_GET['idManif']));
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;
	}

	function del_epreuve_manif() {
		$connexion = db_connect();
		$req = $connexion->prepare("DELETE FROM Contenu WHERE id_manif = ? AND id_epreuve = ?;");
		$req->execute(array($_GET['idManif'], $_GET['id']));
		$req->closeCursor();
	}