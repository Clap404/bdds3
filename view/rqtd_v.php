<?php
	ob_start();
?>

	<form action="?p=rqtd" method="post">
		<label>Choisir la requête à afficher : </label>
		<select name="nb">
			<option value="1">Requête 1</option>
			<option value="2">Requête 2</option>
			<option value="3">Requête 3</option>
			<option value="4">Requête 4</option>
			<option value="5">Requête 5</option>
			<option value="6">Requête 6</option>
			<option value="7">Requête 7</option>
			<option value="8">Requête 8</option>
			<option value="9">Requête 9</option>
		</select>
		<input type="submit" value="Afficher" />
	</form>
<?php
	if(isset($_POST['nb'])){
		switch($_POST['nb']) {
			case "1":
				$res = get_rqt1();
				echo '<br/><code>SELECT nom_epreuve FROM Epreuve;</code><br/>';
				foreach ($res as $key => $value) {
					echo $value[0].'<br/>';
				}
			break;

			case "2":
				$res = get_rqt2();
				?>
					<br/>
					<code>SELECT nom_etu, CONVERT((DATEDIFF(date_naissance_etu, CURDATE())/12), UNSIGNED) AS age, sexe_etu FROM Etudiant;</code>
					<br/>
					<table>
						<tr>
							<td>Nom</td>
							<td>Age</td>
							<td>Sexe</td>
						</tr>
						<?php
							foreach ($res as $key => $value) {
								echo '<tr>';
								echo '<td>'.$value[0].'</td>';
								echo '<td>'.$value[1].'</td>';
								echo '<td>'.$value[2].'</td>';
								echo '</tr>';
							}
						?>
					</table>
				<?php
			break;

			case "3":
			break;

			case "4":
			break;

			case "5":
			break;

			case "6":
			break;

			case "7":
			break;

			case "8":
			break;

			case "9":
			break;
		}
	}	

	$content = ob_get_clean();
