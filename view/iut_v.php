<?php
	ob_start();
	$table_iut = get_iut();

	echo '<pre>';
	print_r($table_iut);
	echo '</pre>';

	$content = ob_get_clean();
