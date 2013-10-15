<?php
	$title= "Manifestations";
	require("config.php");
	require("model/base_model.php");
	require("model/manifestation_m.php");

	if(isset($_GET['act']) && isset($_GET['id'])) {
		if($_GET['act'] === "delete") {
			del_manif();
		}
	}
	if(isset($_POST['id'], $_POST['name'], $_POST['date'], $_POST['iut'])) {
		if(empty($_POST['id']) || empty($_POST['name']) || empty($_POST['date']) || empty($_POST['iut'])) {
		}
		else {
			modif_manif();
		}
	}
	elseif(isset($_POST['name'], $_POST['date'], $_POST['iut'])) {
		if(empty($_POST['name']) || empty($_POST['date']) || empty($_POST['iut'])) {
		}
		else {
			add_manif();
		}
	}

	require("view/manifestation_v.php");
	require("view/base_template.php");