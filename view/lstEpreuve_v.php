<?php
	ob_start();

	$table_contenu = get_epreuves_manif();
?>
	<table>
		<thead>
			<tr>
				<td>id_epreuve</td>
				<td>nom_epreuve</td>	
			</tr>
		</thead>
		<tbody>
<?php
			foreach ($table_contenu as $key => $value) {
?>
				<tr>
					<td><?= $value[0] ?></td>
					<td><?= $value[1] ?></td>

					<td>
						<a><img /></a>
						<a><img /></a>
						<a title="étudiant participant à cette épreuves"><img /></a>
				</tr>
<?php
			}
?>
		</tbody>
	</table>
<?php
	$content = ob_get_clean();
