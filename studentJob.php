<?php
	/*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com
						Pour le passage front-end -> back-end
  */
	require('functions/connectDatabase.php');
	$dbconn=connectionDB();
	$userPerClass=array(); 

	$nbrU=pg_query("SELECT COUNT(idu) FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE branchcl='Master RS';") or die('Erreur dans la base de données');
	$userPerClass[0]= pg_fetch_result($nbrU, 'count');
	$nbrU=pg_query("SELECT COUNT(idu) FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE branchcl='Master SID';") or die('Erreur dans la base de données');
	$userPerClass[1]= pg_fetch_result($nbrU, 'count');
	$nbrU=pg_query("SELECT COUNT(idu) FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE branchcl='Master STRC'") or die('Erreur dans la base de données');
	$userPerClass[2]= pg_fetch_result($nbrU, 'count');

	//print_r($userPerClass);
	$myJSON = json_encode($userPerClass);

	echo $myJSON;

?>
