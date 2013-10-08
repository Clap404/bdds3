<?php
	ob_start();
	if(isset($_GET['order'])) {
		switch($_GET['order']) {
			case "name":
				$table_iut = get_iut_name();
			break;

			case "adresse":
				$table_iut = get_iut_adresse();
			break;

			case "nbetu":
				$table_iut = get_iut_nbetu();
			break;
		}
	}
	else {
		$table_iut = get_iut_name();
	}
?>
	
	<table>
		<thead>
			<tr>
				<td>id_iut</td>
				<td><a href="?p=iut&amp;order=name">nom_iut</a></td>
				<td><a href="?p=iut&amp;order=adresse">adresse</a></td>
				<td><a href="?p=iut&amp;order=nbetu">nb_etu</a></td>
				<td>action</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<form action="?p=iut" method="post">
					<td></td>
					<td><input name="name" type="text" placeholder="Nom de l'iut"/></td>
					<td><input name="address" type="text" placeholder="Adresse de l'iut"/></td>
					<td><input name="nb_etu" type="text" placeholder="Nombre d'étudiants"/></td>
					<td><input type="submit" value="Ajouter"/></td>
				</form>
			</tr>
			
<?php
	foreach ($table_iut as $key => $value) {
		?>

			<tr>
				<td><?= $value[0] ?></td>
				<td><?= $value[1] ?></td>
				<td><?= $value[2] ?></td>
				<td><?= $value[3] ?></td>
				<td><?= '<a href="?p=iut&amp;act=edit&amp;id='.$value[0].'"><img class="icon" src="public/images/edit.png" width="20px"/></a>'?>
				<?= '<a href="?p=iut&amp;act=delete&amp;id='.$value[0].'"><img class="icon" src="public/images/delete.png" width="20px"/></a>'?></td>
			</tr>

		<?php
	}


?>
		</tbody>
	</table>
<?php
	if(isset($_GET['act']) && $_GET['act'] === "add") {
		?>
		<form id="add" method="post">
			<label>Nom de l'iut : </label><input name="name" type="text"/>
			<br/>
			<label>Adresse de l'iut : </label><input name="adresse" type="text"/>
			<br/>
			<label>Nombre d'étudiant : </label><input name="nbetu" type="text"/>
			<br/>
			<input type="submit" value="Ajouter"/>
		</form>
<?php
	}
	$content = ob_get_clean();

