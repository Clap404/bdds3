<?php
	function get_name_manif($id) {
		$connexion = db_connect();
		$req = $connexion->prepare("SELECT nom_manif From Manifestation WHERE id_manif = ?;");
		$req->execute(array($id));
		$data = $req->fetch();
		$req->closeCursor();
		return $data;
	}

	function get_name_epreuve($id) {
		$connexion = db_connect();
		$req = $connexion->prepare("SELECT nom_epreuve FROM Epreuve WHERE id_epreuve = ?;");
		$req->execute(array($id));
		$data = $req->fetch();
		$req->closeCursor();
		return $data;
	}

	function get_etus_epreuve() {
		$connexion = db_connect();
		$req = $connexion->prepare("SELECT ET.id_etu, ET.nom_etu, P.resultat, I.nom_iut FROM Etudiant ET, Participe P, Manifestation M, Epreuve EP, Iut I WHERE P.id_manif = M.id_manif AND P.id_epreuve = EP.id_epreuve AND P.id_etu = ET.id_etu AND ET.id_iut = I.id_iut AND P.id_manif = ? AND P.id_epreuve = ?;");
		$req->execute(array($_GET['idManif'], $_GET['idEpreuve']));
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;
	}