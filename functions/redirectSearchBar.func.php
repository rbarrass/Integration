<?php
  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/

  /*the suggestions in the search bar are managed dynamically, all information is displayed as the user enters a character.  */
require('connectDatabase.php');
if(isset($_POST['search'])){
	searchStudent();
}

function searchStudent(){
	if(!empty($_POST['search'])){
		$data = $_POST['search'];
		$name = explode(" ", $data);
		$family_name=$name[0];
		$surname = $name[1];
		$dbconn= connectionDB();
		$requestUser = "SELECT idU FROM users WHERE nameu='".$family_name."' AND surnameu='".$surname."'";
		$resultUser = pg_query($requestUser) or die('ERREUR SQL : '. $requestUser . 	pg_last_error());
		$userId = pg_fetch_result($resultUser, 'idu');
		header('location: ../profil.php?idu='.$userId.'');
	}
}

?>