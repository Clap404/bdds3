<?php ob_start() ?>

<div class="leftBlock">
	<p>Merci d'avoir choisi cette application de gestion de manifestation sportive pour iut.</p>
	<p>Si vous êtes dérouté par l'interface, vous pouvez consulter <a href="README.html">le readme</a></p>
</div>

<div class="midBlock">
	<p>La base de données générée avec le fichier <code>jeu_de_test.sql</code> n'assigne pas nécéssairement d'étudiants à chaque épreuve ou manifestation.</p>
</div>

<div class="rightBlock">
	<p>Malgré toute l'attention porté à ce produit, il se peut que vous trouviez quelques bugs. Si tel est le cas, nous tenterons de les corriger pour la prochaine version.</p>
</div>

<?php $content = ob_get_clean() ?>