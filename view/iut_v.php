<?php
	ob_start();
	
	if(isset($_GET['desc'])) {
		$desc = ($_GET['desc'] === "1" ? true : false);
	}
	else{
		$desc = false;
	}

	if(isset($_GET['order'])) {
		switch($_GET['order']) {
			case "name":
				$table_iut = get_iut_name($desc);
			break;

			case "adresse":
				$table_iut = get_iut_adresse($desc);
			break;

			case "nbetu":
				$table_iut = get_iut_nbetu($desc);
			break;
		}
	}
	else {
		$table_iut = get_iut_name($desc);
	}
?>
	<script type="text/javascript">
		window.onload = function(){
			document.querySelector("tr#edit").style = "display : none;"
			bindActionBySelector(showEditForm, ".edit");	
		}
	</script>

	<table>
		<thead>
			<tr>
				<td>id_iut</td>
				<td><a href=<?='"?p=iut&amp;order=name&amp;desc='.(int)!$desc.'"'?>>nom_iut</a></td>
				<td><a href=<?='"?p=iut&amp;order=adresse&amp;desc='.(int)!$desc.'"'?>>adresse</a></td>
				<td><a href=<?='"?p=iut&amp;order=nbetu&amp;desc='.(int)!$desc.'"'?>>nb_etu</a></td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<tr id="edit">
				<form action="?p=iut" method="post" id="edit">
					<td><input name="id" type="hidden"/></td>
					<td><input name="name" type="text" /></td>
					<td><input name="address" type="text" /></td>
					<td><input name="nb_etu" type="text" /></td>
					<td><input type="submit" value="Modifier" /></td>
				</form>
			</tr>
			<tr id="add">
				<form action="?p=iut" method="post" id="add">
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

			<tr id=<?= '"x'.$value[0].'"' ?>>
				<td><?= $value[0] ?></td>
				<td><?= $value[1] ?></td>
				<td><?= $value[2] ?></td>
				<td><?= $value[3] ?></td>

				<td>
					<!-- href="?p=iut&amp;act=edit&amp;id= " -->
					<a class="edit" id=<?= '"x'.$value[0].'"' ?>><img src="public/images/edit.png" class="icon"/></a>
					<a href=<?= '"?p=iut&amp;act=delete&amp;id='.$value[0].'"'
						?> class="delete" id=<?= '"x'.$value[0].'"' ?>><img src="public/images/delete.png" class="icon"/></a>

				</td>
			</tr>

		<?php
	}
?>
		</tbody>
	</table>
<?php
	//if(isset($_GET['act']) && $_GET['act'] === "add") {
		?>
	<!-- 	<form id="add" method="post">
			<label>Nom de l'iut : </label><input name="name" type="text"/>
			<br/>
			<label>Adresse de l'iut : </label><input name="adresse" type="text"/>
			<br/>
			<label>Nombre d'étudiant : </label><input name="nbetu" type="text"/>
			<br/>
			<input type="submit" value="Ajouter"/>
		</form> -->
<?php
	//}
	$content = ob_get_clean();

