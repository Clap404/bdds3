<?php
	$title = "Etudiants";
	require("config.php");
	require("model/base_model.php");
	require("model/etudiant_m.php");

	if(isset($_GET['act']) && isset($_GET['id'])) {
		if($_GET['act'] === "delete") {
			del_etudiant();
		}
	}
	if(isset($_POST['id'], $_POST['name'], $_POST['date'], $_POST['sexe'], $_POST['iut'])) {
		if(empty($_POST['id']) || empty($_POST['name']) || empty($_POST['date']) || empty($_POST['iut'])) {
		}
		else {
			modif_etudiant();
		}
	}	
	elseif(isset($_POST['name'], $_POST['date'], $_POST['sexe'], $_POST['iut'])) {
		if(empty($_POST['name']) || empty($_POST['date']) || empty($_POST['iut'])) {
		}
		else {
			add_etudiant();
		}
	}	

	require("view/etudiant_v.php");
	require("view/base_template.php");

