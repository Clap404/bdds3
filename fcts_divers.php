<?php
	//Fonction pour générer l'entête html
	function html_header($title) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="public/css/bdds3.css">
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
		<title><?= "Projet BDD S3 | ".$title ?></title>
	</head>

	<body>
		<img src="public/images/iut.png" width="30%"/>
		<h1><?= $title ?></h1>
		<nav>
			<ul>
				<li class="active"><a href="accueil.php">Accueil</a></li>
				<li><a href="#">Manifestations</a></li>
				<li><a href="#">IUT</a></li>
				<li><a href="#">Etudiants</a></li>
				<li><a href="#">Epreuves</a></li>
			</ul>
		</nav>
<?php
	}

	//Fonction pour générer le footer html
	function html_footer() {
?>
		<hr />
		<footer>
			<p>
				Réalisé par Benoît Houdayer et François-Xavier Béligat<br/>
				IUT Belfort Montbeliard<br/>
				2013 - 2014
			</p>
		</footer>
	</body>
</html>
<?php
	}
?>