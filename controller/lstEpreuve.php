<?php
	require("config.php");
	require("model/base_model.php");
	require("model/lstEpreuve_m.php");
	$name_manif= get_name_manif($_GET['idManif']);
	$title = "Epreuves de ". $name_manif[0];

	if(isset($_GET['act'], $_GET['id'], $_GET['idManif'])) {
		if($_GET['act'] === "delete") {
			del_epreuve_manif();
		}	
	}
	elseif(isset($_POST['act'], $_POST['id'], $_POST['idManif'])) {
		if($_POST['act'] === "add") {
			add_epreuve_manif();
		}	
	}

	require("view/lstEpreuve_v.php");
	require("view/base_template.php");
