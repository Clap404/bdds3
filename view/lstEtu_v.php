<?php
	ob_start();

	$table_participe = get_etus_epreuve();
?>
	<table>
		<thead>
			<tr>
				<td>id_etu</td>
				<td>nom_etu</td>
				<td>classement</td>
				<td>Iut</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
<?php
			foreach ($table_participe as $key => $value) {
?>
				<tr>
					<td><?= $value[0] ?></td>
					<td><?= $value[1] ?></td>
					<td><?= $value[2] ?></td>
					<td><?= $value[3] ?></td>
					<td>
						<a href=<?= '"?p=lstEtu&amp;idManif='.$_GET['idManif'].'&amp;idEpreuve='.$_GET['idEpreuve'].'&amp;act=delete&amp;id='.$value[0].'"'
							?> class="delete" id=<?= '"x'.$value[0].'"' ?>><img
							src="public/images/delete.png" class="icon"/></a>
					</td>
				</tr>
<?php
			}
?>
		</tbody>
	</table>
<?php
	$content = ob_get_clean();