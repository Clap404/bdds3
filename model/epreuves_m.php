<?php
	function get_epreuves_name($desc) {
		$connexion = db_connect();
		if($desc) {
			$req = $connexion->query("SELECT * FROM Epreuve ORDER BY nom_epreuve DESC;");
		}
		else {
			$req = $connexion->query("SELECT * FROM Epreuve ORDER BY nom_epreuve;");
		}
		$data = $req->fetchAll();
		$req->closeCursor();
		return $data;	
	}

	function del_epreuve() {
		$connexion = db_connect();
		$req = $connexion->prepare("DELETE FROM Epreuve WHERE id_epreuve = ?;");
		$req->execute(array($_GET['id']));
		$req->closeCursor();
	}

	function modif_epreuve() {
		$connexion = db_connect();
		$req = $connexion->prepare("UPDATE Epreuve SET nom_epreuve=? WHERE id_epreuve=?;");
		$req->execute(array($_POST['name'], $_POST['id']));
		$req->closeCursor();
	}

	function add_epreuve() {
		$connexion = db_connect();
		$req = $connexion->prepare("INSERT INTO Epreuve VALUES(NULL, ?);");
		$req->execute(array($_POST['name']));
		$req->closeCursor();	
	}