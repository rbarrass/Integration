<?php
/*Raphaël Barrasset, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu	L3i 2019
raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/

function connectionDB(){
		$dbconn = pg_connect("dbname=dbraphael host=localhost user=raphael password=raphaoul13")
	    or die('Connexion impossible : ' . pg_last_error());

	    return $dbconn;
	}
function closeDB($db){
		pg_close($db);
	}
?>