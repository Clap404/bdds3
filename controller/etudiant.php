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
	if(isset($_POST['name'], $_POST['date'], $_POST['sexe'], $_POST['iut'])) {
		echo '<h2>DEBUG : Je suis dans la 1ere condition</h2>';
		if(empty($_POST['name']) || empty($_POST['date']) || empty($_POST['iut'])) {
			echo "<h2>DEBUG : Y'a un truc de vide</h2>";
		}
		else {
			echo '<h2>DEBUG : Ca devrait marcher</h2>';
			add_etudiant();
		}
	}	

	require("view/etudiant_v.php");
	require("view/base_template.php");

