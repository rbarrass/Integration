<?php
/*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu	L3i 2019
raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/

function connectionDB(){
	$dbconn = pg_connect("dbname=dbnadreamz host=localhost user=nadreamz password=Guillaume95") or die('Connexion impossible : ' . pg_last_error());


	return $dbconn;
}
function closeDB($db){
		pg_close($db);
}
?>