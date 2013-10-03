<?php 

	function db_connect() {
		global $DB;
		try {
			$connexion = new PDO($DB['TYPE'].':host='.$DB['HOST'].
				';port='.$DB['PORT']."; dbname=".$DB['NAME'],
				$DB['USER'], $DB['PASS']);
		}
		catch(Exception $e) {
			echo 'Erreur : '.$e->getMessage().'<br />';
			echo 'N° : '.$e->getCode(); 
		}

		return $connexion;
	}
