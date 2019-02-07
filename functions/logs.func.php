<?php
/*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu	L3i 2019
raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/
require('connectDatabase.php');
function displayLogs(){
	$dbconn = connectionDB();
	$display = '';
	$query = "SELECT actionL,typeL,dateL,ipL FROM logs";
	$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
	$i=0;
	while ($line = pg_fetch_array($result,null,PGSQL_ASSOC)) {
		$j=0;
		$display.='<li class="table-row">';
		foreach ($line as $col_value) {
			switch ($j) {
				case 0:
					$display.= '<div class="col col-1" data-label="action">'.$col_value.'</div>';
					break;
				case 1:
					$display.= '<div class="col col-2" data-label="type">'.$col_value.'</div>';
					break;
				case 2:
					$display.= '<div class="col col-3" data-label="date">'.$col_value.'</div>';
					break;
				case 3:
					$display.= '<div class="col col-4" data-label="ip">'.$col_value.'</div>';
					break;
				default:
					break;
			}
			$j++;
		}
		$display.= '<div class="col col-5" data-label="autor">Inconnu</div>';
		
	}
	if ($display == ''){
		$display.= '<h2>Aucuns logs pour le moment</h2>';
	}
	echo $display;
}