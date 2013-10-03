<?php
	ob_start();
	$table_iut = get_iut();
?>
	
	<table>
		<thead>
			<tr>
				<td>id_iut</td>
				<td>nom_iut</td>
				<td>adresse</td>
				<td>nb_etu</td>
				<td>action</td>
			</tr>
		</thead>
		<tbody>
			
<?php
	foreach ($table_iut as $key => $value) {
		?>

			<tr>
				<td><?= $value[0] ?></td>
				<td><?= $value[1] ?></td>
				<td><?= $value[2] ?></td>
				<td><?= $value[3] ?></td>
				<td>plus tard !</td>
			</tr>

		<?php
	}


?>
		</tbody>
	</table>

<?php
	$content = ob_get_clean();