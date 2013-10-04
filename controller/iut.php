<?php 
	$title = "IUT";
	require("config.php");
	require("model/base_model.php");
	require("model/iut_m.php");
	if(isset($_GET['act']) && isset($_GET['id'])) {
		del_iut();
	}
	if(isset($_POST['name'], $_POST['address'], $_POST['nb_etu'])) {
		if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['nb_etu'])) {
		}
		else {
		add_iut();
		}
	}
	require("view/iut_v.php");
	require("view/base_template.php");

