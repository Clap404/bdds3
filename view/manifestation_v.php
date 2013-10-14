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
				$table_manif = get_manif_name($desc);
			break;

			case "date":
				$table_manif = get_manif_date($desc);
			break;

			case "iut":
				$table_manif = get_manif_iut($desc);
			break;
		}
	}
	else {
		$table_manif = get_manif_name($desc);
	}

	$list = liste_deroulante();

?>
	<script type="text/javascript">
		window.onload = function(){
			document.queryselector("tr#edit").style.display = "none";
			bindActionByselector(showEditForm, ".edit");	
		}
	</script>

	<table>
		<thead>
			<tr>
				<td>id_manif</td>
				<td><a href=<?='"?p=manifestations&amp;order=name&amp;desc='.(int)!$desc.'"'?>>nom_manif</a></td>
				<td><a href=<?='"?p=manifestations&amp;order=date&amp;desc='.(int)!$desc.'"'?>>date_manif</a></td>
				<td><a href=<?='"?p=manifestations&amp;order=iut&amp;desc='.(int)!$desc.'"'?>>nom_iut</a></td></td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
			<tr id="edit">
				<form action="?p=manifestations" method="post">
					<td><input name="id" type="hidden"/></td>
					<td><input name="name" type="text" /></td>
					<td><input name="date" type="date" /></td>
					<td>
						<select name="iut">
							<?php
								foreach ($list as $key => $value) {
									echo '<option value="'.$value[0].'">'.$value[1].'</option>';
								}
							?>
						</select>
					</td>
					<td><input type="submit" value="Modifier"/></td>
				</form>
			</tr>
			<tr id="add">
				<form action="?p=manifestations" method="post">
					<td></td>
					<td><input name="name" type="text" placeholder="Nom de la manifestation"/></td>
					<td><input name="date" type="date" placeholder="aaaa-mm-yy"/></td>
					<td>
						<select name="iut">
							<?php
								foreach ($list as $key => $value) {
									echo '<option value="'.$value[0].'">'.$value[1].'</option>';
								}
							?>
						</select>
					</td>
					<td><input type="submit" value="Ajouter"/></td>
				</form>
			</tr>

<?php
	foreach ($table_manif as $key => $value) {
		?>

			<tr id=<?= '"x'.$value[0].'"' ?>>
				<td><?= $value[0] ?></td>
				<td><?= $value[1] ?></td>
				<td><?= $value[2] ?></td>
				<td><?= $value[3] ?></td>

				<td>
					<a class="edit" id=<?= '"x'.$value[0].'"' ?>><img src="public/images/edit.png" class="icon"/></a>
					<a href=<?= '"?p=manifestations&amp;act=delete&amp;id='.$value[0].'"'
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


