<?php 
	require("config.php");
	require("model/base_model.php");
	require("model/lstEtu_m.php");

	$name_manif = get_name_manif($_GET['idManif']);
	$name_epreuve = get_name_epreuve($_GET['idManif']);
	$title = "Etudiants partcipant à l'épreuve ".$name_epreuve[0]." de la manifestation ".$name_manif[0];

	require("view/lstEtu_v.php");
	require("view/base_template.php");