<?php
	require("config.php");
	require("model/base_model.php");
	require("model/lstEpreuve_m.php");
	$name_manif= get_name_manif($_GET['idManif']);
	$title = "Epreuves de la manifestation : ". $name_manif[0];

	require("view/lstEpreuve_v.php");
	require("view/base_template.php");
