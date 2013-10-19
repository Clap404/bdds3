<?php
	ob_start();

	$table_participe = get_etus_epreuve();
	$liste_etudiants = liste_deroulante_etudiants();

?>
	<script type="text/javascript">
		window.onload = function(){
			document.querySelector("tr#edit").style.display = "none";
			
			function showEditForm(){
			    restoreLine();
			    resetOptions();

			    var lineId = this.getAttribute("id");
			    var line = document.querySelector("tr#"+lineId);
			    var cells = document.querySelectorAll("tr#"+lineId+" td");
			    var form = document.querySelector("tr#edit");
			    
			    var formFields = document.querySelectorAll("tr#edit td input, tr#edit td select");
			    var selectFields = document.querySelectorAll("tr#edit td select");

			    var currentSelect = 0;

			    for (var i = 0 ; i < formFields.length -1; i++) {
			        if ( formFields[i].tagName === "INPUT") {
			            if (formFields[i].getAttribute("type") === "date") {
			                formFields[i].value = convertDate(cells[i].innerHTML) ;
			         	//ajout de lignes ici
			            } else if(formFields[i].getAttribute("class") === "withSuffix") {
			                formFields[i].value = cells[i].innerHTML.split(" ")[0];
			            } else {
			            	formFields[i].value = cells[i].innerHTML;
			            }
			        
			        } else {
			            var selectDefaultValue = cells[i].getAttribute("value");
			            var defaultOption = selectFields[currentSelect].querySelector("option[value='"+selectDefaultValue+"']");
			            defaultOption.setAttribute("selected","selected" );
			            currentSelect ++;
			        }
			    };

			    line.parentNode.insertBefore(form,line);

			    form.style.display = "table-row";
			    line.style.display = "none";
			    document.lastLine = line;
			};

			bindActionBySelector(showEditForm, ".edit");
		}
	</script>
	<div class="previous">
			<a href="?p=manifestations">Manifestations</a> / <a <?='href="?p=lstEpreuve&amp;idManif='.$_GET['idManif'].'">'.$name_manif[0]?></a> / <span class="subsection"><?= $name_epreuve[0] ?></span>
		<br />
	</div>
	<table>
		<thead>
			<tr>
				<td>id_etu</td>
				<td>Classement</td>
				<td>nom_etu</td>
				<td>Résultat</td>
				<td>Iut</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<tr id="edit">
				<form action=<?= '"?p=lstEtu&amp;idManif='.$_GET['idManif'].'&amp;idEpreuve='.$_GET['idEpreuve'].'"'?> method="post">
					<td><input name="id" type="hidden"/></td>
					<td><input type="text" disabled="disabled" class="withSuffix"/></td>
					<td><input type="text" disabled="disabled"/></td>
					<td><input name="resultat" type="text" class="withSuffix"/></td>
					<td><input type="text" disabled="disabled"/></td>
					<input name="idManif" type="hidden" value=<?= '"'.$_GET['idManif'].'"' ?> ></input>
					<input name="idEpreuve" type="hidden" value=<?= '"'.$_GET['idEpreuve'].'"' ?> ></input>
					<td><input type="submit" value="Modifier" /></td>
				</form>
			</tr>
			<tr id="add">
				<form action=<?= '"?p=lstEtu&amp;idManif='.$_GET['idManif'].'&amp;idEpreuve='.$_GET['idEpreuve'].'"'?> method="post">
					<td></td>
					<td></td>
					<td>
						<select name="id">
							<?php 
								foreach ($liste_etudiants as $key => $value) {
									echo '<option value="'.$value[0].'">'.$value[1].' - '.$value[2].'</option>';
								}
							?>
							
						</select>
					</td>
					<td><input name="resultat" type="text" placeholder="nombre de points"/></td>
					<td></td>
					<input name="idManif" type="hidden" value=<?= '"'.$_GET['idManif'].'"' ?> ></input>
					<input name="idEpreuve" type="hidden" value=<?= '"'.$_GET['idEpreuve'].'"' ?> ></input>
					<input name="action" type="hidden" value="add"/>
					<td><input type="submit" value="Ajouter"/></td>
				</form>
			</tr>
<?php
			$pos = 0;
			foreach ($table_participe as $key => $value) {
?>
				<tr id=<?= '"x'.$value[0].'"' ?>>
					<td><?= $value[0] ?></td>
					<td><?= $pos >= 1 ? ++$pos." <sup>ème</sup> " : ++$pos." <sup>er</sup>" ?></td>
					<td><?= $value[1] ?></td>
					<td><?= $value[2] < 2 ? $value[2]." point" : $value[2]." points"?></td>
					<td><?= $value[3] ?></td>
					<td>
						<a class="edit" id=<?= '"x'.$value[0].'"' ?>><img src="public/images/edit.png" class="icon"/></a>
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