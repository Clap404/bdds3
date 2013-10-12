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
	if(isset($_POST['name'])) {
		if(empty($_POST['name'])) {
		}
		else {
			add_manif();
		}
	}

	require("view/manifestation_v.php");
	require("view/base_template.php");