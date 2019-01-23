<?php
	require('connectDatabase.php');

	function displayBordTable(){
		$dbconnexion = connectionDB();
		$result ='<div class="container">
		      <ul class="responsive-table">
		        <li class="table-header">
		          <div class="col col-1">ID</div>
		          <div class="col col-2">Nom</div>
		          <div class="col col-3">Prénom</div>
		          <div class="col col-4">Entreprise</div>
		          <div class="col col-5">Statut</div>
		          <div class="col col-6">Expiration</div>
		        </li>';
		$branch = $_GET['psd'];
		$query1 = "SELECT idcl from classrooms WHERE branchcl='$branch'" ;
		$res1 = pg_query($query1) or die('Échec de la requête : ' . pg_last_error());
		$line1 = pg_fetch_array($res1, null, PGSQL_ASSOC);
		$id = $line1["idcl"];
		$query = "SELECT student_idu, nameu, surnameu, emailu, validationu FROM users WHERE idcl='$id'";
		$res = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
		while ($line = pg_fetch_array($res, null, PGSQL_ASSOC)) {
			$result.='<a href=""><li class="table-row">';
    		$result.='
					          <div class="col col-1" data-label="ID">'.$line["student_idu"].'</div>
					          <div class="col col-2" data-label="Name">'.$line["nameu"].'</div>
					          <div class="col col-3" data-label="Surname">'.$line["surnameu"].'</div>
					          <div class="col col-4" data-label="Entreprise">'.$line["emailu"].'</div>
					          <div class="col col-5" data-label="Statut">'.$line["validationu"].'</div>
					          <div class="col col-6" data-label="Expiration">Deadline soon</div>
					      </li></a>';
 
		}

		$result.='<li class="table-header">
				          <div class="end">2018-2019</div>
				        </li>
				      </ul>
				    </div>';

		$dbclose = closeDB($dbconnexion);
		return $result;
	}







?>