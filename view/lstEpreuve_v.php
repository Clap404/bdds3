<?php
	ob_start();

	$table_contenu = get_epreuves_manif();
?>
	<div class="previous">
			<a href="?p=manifestations">Manifestations</a>
		<br />
	</div>

	<table>
		<thead>
			<tr>
				<td>id_epreuve</td>
				<td>nom_epreuve</td>
				<td>Action</td>	
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
						<a href=<?= '"?p=lstEpreuve&amp;idManif='.$_GET['idManif'].'&amp;act=delete&amp;id='.$value[0].'"'
							?> class="delete" id=<?= '"x'.$value[0].'"' ?>><img src="public/images/delete.png" class="icon"/></a>
						<a title="Afficher la liste des étudiants participant à cette épreuve" href=<?='"?p=lstEtu&amp;idManif='.$_GET['idManif'].'&amp;idEpreuve='.$value[0].'"'?>><img src="public/images/etu.png" class="icon"/></a>
					</td>

				</tr>
<?php
			}
?>
		</tbody>
	</table>
<?php
	$content = ob_get_clean();
