<?php 
	ob_start();

	if(isset($_GET['desc'])) {
		$desc = ($_GET['desc'] === "1" ? true : false);
	}
	else {
		$desc = false;
	}

	$table_epreuve = get_epreuves_name($desc);
?>
	<script type="text/javascript">
		window.onload = function(){
			document.querySelector("tr#edit").style.display = "none";
			bindActionBySelector(showEditForm, ".edit");	
		}
	</script>

	<table>
		<thead>
			<tr>
				<td>id_epreuve</td>
				<td><a href=<?='"?p=epreuves&amp;desc='.(int)!$desc.'"'?>>nom_epreuve</a></td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
			<tr id="edit">
				<form action="?p=epreuves" method="post">
					<td><input name="id" type="hidden"/></td>
					<td><input name="name" type="text"/></td>
					<td><input type="submit" value="Modifier"/></td>
				</form>
			</tr>
			<tr id="add">
				<form action="?p=epreuves" method="post">
					<td></td>
					<td><input name="name" type="text" placeholder="Nom de l'épreuve"/></td>
					<td><input type="submit" value="Ajouter"/></td>
				</form>
			</tr>


<?php
	foreach ($table_epreuve as $key => $value) {
		?>

			<tr id=<?= '"x'.$value[0].'"' ?>>
				<td><?= $value[0] ?></td>
				<td><?= $value[1] ?></td>

				<td>
					<a class="edit" id=<?= '"x'.$value[0].'"' ?>><img src="public/images/edit.png" class="icon"/></a>
					<a href=<?= '"?p=epreuves&amp;act=delete&amp;id='.$value[0].'"'
						?> class="delete" id=<?= '"x'.$value[0].'"' ?>><img src="public/images/delete.png" class="icon"/></a>
				</td>
			</tr>

		<?php
	}
?>
		</tbody>
	</table>
<?php
	$content = ob_get_clean();

