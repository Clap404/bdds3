<?php
	ob_start();

	if(isset($_GET['desc'])) {
		$desc = ($_GET['desc'] === "1" ? true : false);
	}
	else {
		$desc = false;
	}

	if(isset($_GET['order'])) {
		switch($_GET['order']) {
			case "name":
				$table_etu = get_etudiants_name($desc);
			break;

			case "sexe":
				$table_etu = get_etudiants_sexe($desc);
			break;

			case "date":
				$table_etu = get_etudiants_date($desc);
			break;

			case "iut":
				$table_etu = get_etudiants_iut($desc);
			break;}
	}
	else {
		$table_etu = get_etudiants_name($desc);
	}

	$list = liste_deroulante();
?>

	<table>
		<thead>
			<tr>
				<td>id_etu</td>
				<td><a href=<?='"?p=etudiants&amp;order=name&amp;desc='.(int)!$desc.'"'?>>nom_etu</a></td>
				<td><a href=<?='"?p=etudiants&amp;order=date&amp;desc='.(int)!$desc.'"'?>>date_naissance_etu</a></td>
				<td><a href=<?='"?p=etudiants&amp;order=sexe&amp;desc='.(int)!$desc.'"'?>>sexe_etu</a></td>
				<td><a href=<?='"?p=etudiants&amp;order=iut&amp;desc='.(int)!$desc.'"'?>>id_iut</a></td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<form action="?p=etudiants" method="post">
					<td></td>
					<td><input name="name" type="text" placeholder="Nom de l'étudiant"/></td>
					<td><input name="date" type="date" placeholder="aaaa-mm-jj"></td>
					<td>
						<select name="sexe">
							<option value="0">Homme</option>
							<option value="1">Femme</option>
						</select>
					</td>
					<td>
						<select name="iut">
							<?php 
								foreach ($list as $key => $value) {
									echo '<option value = "'.$value[0].'">'.$value[1].'</option>';
								}
							?>
						</select>
					</td>
					<td><input type="submit" value="Ajouter"/></td>
				</form>
			</tr>

<?php
	foreach ($table_etu as $key => $value) {
		?>

			<tr>
				<td><?= $value[0] ?></td>
				<td><?= $value[1] ?></td>
				<td><?= $value[2] ?></td>
				<td><?= ($value[3] == "1" ? "Femme" : "Homme");?></td>
				<td><?= $value[4] ?></td>

				<td><?= '<a href="?p=etudiants&amp;act=edit&amp;id='.$value[0].'"><img src="public/images/edit.png" class="icon" id="edit"/></a>'?>
				<?= '<a href="?p=etudiants&amp;act=delete&amp;id='.$value[0].'"><img src="public/images/delete.png" class="icon" id="delete"/></a>'?></td>
			</tr>

		<?php
	}
?>
		</tbody>
	</table>
<?php
	$content = ob_get_clean();	