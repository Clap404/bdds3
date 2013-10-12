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

	<table>
		<thead>
			<tr>
				<td>id_epreuve</td>
				<td><a href=<?='"?p=epreuves&amp;desc='.(int)!$desc.'"'?>>nom_epreuve</a></td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<form action="?p=epreuves" method="post">
					<td></td>
					<td><input name="name" type="text" placeholder="Nom de l'épreuve"/></td>
					<td><input type="submit" value="Ajouter"/></td>
				</form>
			</tr>

<?php
	foreach ($table_epreuve as $key => $value) {
		?>

			<tr>
				<td><?= $value[0] ?></td>
				<td><?= $value[1] ?></td>

				<td><?= '<a href="?p=epreuves&amp;act=edit&amp;id='.$value[0].'"><img src="public/images/edit.png" class="icon" id="edit"/></a>'?>
				<?= '<a href="?p=epreuves&amp;act=delete&amp;id='.$value[0].'"><img src="public/images/delete.png" class="icon" id="delete"/></a>'?></td>
			</tr>

		<?php
	}
?>
		</tbody>
	</table>
<?php
	$content = ob_get_clean();

