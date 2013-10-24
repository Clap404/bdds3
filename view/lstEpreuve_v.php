<?php
	ob_start();

	$table_contenu = get_epreuves_manif();
	$liste_epreuves = liste_deroulante_epreuves();
?>
	<div class="previous">
			<a href="?p=manifestations">Manifestations</a> / <span class="subsection"><?= $name_manif[0] ?></span>
		<br />
	</div>

	<table>
		<thead>
			<tr>
				<td>ID</td>
				<td>Epreuves</td>
				<td>Actions</td>	
			</tr>
		</thead>
		<tbody>
			<tr id="add">
				<form action=<?= '"?p=lstEpreuve&amp;idManif='.$_GET['idManif'].'"'?> method="post">
					<td></td>
					<td>
						<select name="id">
							<?php 
								foreach ($liste_epreuves as $key => $value) {
									echo '<option value="'.$value[0].'">'.$value[1].'</option>';
								}
							?>
							
						</select>
					</td>
					<input type="hidden" value=<?= '"'.$_GET['idManif'].'"'?> name="idManif"/>
					<input type="hidden" value="add" name="act"/>
					<td><input type="submit" value="Ajouter"/></td>
				</form>
			</tr>
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
