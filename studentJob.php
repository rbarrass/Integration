<?php
	/*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com
						Pour le passage front-end -> back-end
  */
	require('functions/connectDatabase.php');
	$dbconn=connectionDB();
	$userKindOfContract=array(); 
	//MASTER RS
	$req=pg_query("SELECT COUNT(idu) FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE branchcl='Master RS' AND searchapprentice=1") or die('Erreur dans la base de données');
		$userKindOfContract[0]= pg_fetch_result($req, 'count');
	$req=pg_query("SELECT COUNT(idu) FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE branchcl='Master RS' AND searchapprentice=2") or die('Erreur dans la base de données');
		$userKindOfContract[1]= pg_fetch_result($req, 'count');
	$req=pg_query("SELECT COUNT(idu) FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE branchcl='Master RS' AND searchapprentice=3") or die('Erreur dans la base de données');
		$userKindOfContract[2]= pg_fetch_result($req, 'count');

	//MASTER SID
	$req=pg_query("SELECT COUNT(idu) FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE branchcl='Master SID' AND searchapprentice=1") or die('Erreur dans la base de données');
		$userKindOfContract[3]= pg_fetch_result($req, 'count');
	$req=pg_query("SELECT COUNT(idu) FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE branchcl='Master SID' AND searchapprentice=2") or die('Erreur dans la base de données');
		$userKindOfContract[4]= pg_fetch_result($req, 'count');
	$req=pg_query("SELECT COUNT(idu) FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE branchcl='Master SID' AND searchapprentice=3") or die('Erreur dans la base de données');
		$userKindOfContract[5]= pg_fetch_result($req, 'count');


	//MASTER STRC
	$req=pg_query("SELECT COUNT(idu) FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE branchcl='Master STRC' AND searchapprentice=1") or die('Erreur dans la base de données');
		$userKindOfContract[6]= pg_fetch_result($req, 'count');
	$req=pg_query("SELECT COUNT(idu) FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE branchcl='Master STRC' AND searchapprentice=2") or die('Erreur dans la base de données');
		$userKindOfContract[7]= pg_fetch_result($req, 'count');
	$req=pg_query("SELECT COUNT(idu) FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE branchcl='Master STRC' AND searchapprentice=3") or die('Erreur dans la base de données');
		$userKindOfContract[8]= pg_fetch_result($req, 'count');

	//MASTER 1
	$req=pg_query("SELECT COUNT(idu) FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE branchcl='Master 1' AND searchapprentice=1") or die('Erreur dans la base de données');
		$userKindOfContract[9]= pg_fetch_result($req, 'count');
	$req=pg_query("SELECT COUNT(idu) FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE branchcl='Master 1' AND searchapprentice=2") or die('Erreur dans la base de données');
		$userKindOfContract[10]= pg_fetch_result($req, 'count');
	$req=pg_query("SELECT COUNT(idu) FROM users INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE branchcl='Master 1' AND searchapprentice=3") or die('Erreur dans la base de données');
		$userKindOfContract[11]= pg_fetch_result($req, 'count');

	$myJSON = json_encode($userKindOfContract);

	echo $myJSON;

?>
