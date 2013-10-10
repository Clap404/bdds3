<?php
	$title = "Epreuves";
	require("config.php");
	require("model/base_model.php");
	require("model/epreuves_m.php");

	if(isset($_GET['act']) && isset($_GET['id'])) {
		if($_GET['act'] === "delete") {
			del_epreuve();
		}
	}
	if(isset($_POST['name'])) {
		if(empty($_POST['name'])) {
		}
		else {
			add_epreuve();
		}
	}

	require("view/epreuves_v.php");
	require("view/base_template.php");
