<?php
  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com
						Pour le passage front-end -> back-end
  */
	require('functions/connectDatabase.php');
	$dbconn=connectionDB();
	$nameArr=array(); 
	$surnameArr=array();
	$idArray=array();
	$k=0;
	$name=pg_query("SELECT nameu FROM users;") or die('Erreur dans la base de données');
	while ($l = pg_fetch_array($name,null,PGSQL_ASSOC)) {
		foreach ($l as $val) {
			$nameArr[$k]=$val;
			$k++;
		}
	}
	$k=0;
	$surname=pg_query("SELECT surnameu FROM users;") or die('Erreur dans la base de données');
	while ($l = pg_fetch_array($surname,null,PGSQL_ASSOC)) {
		foreach ($l as $val) {
			$surnameArr[$k]=$val;
			$k++;
		}
	}
	// concatène
	for($i=0;$i<sizeof($nameArr);$i++){
		$idArray[$i]=$nameArr[$i].' '.$surnameArr[$i];
	}
	//print_r($idArray);
	$myJSON = json_encode($idArray);

	echo $myJSON;
?>
