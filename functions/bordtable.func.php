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
		if ($branch=="Alternants") {
			$query2 = "SELECT student_idu, nameu, surnameu, emailu, validationu FROM users ORDER BY nameu";
			$res2 = pg_query($query2) or die('Echec de la requête : ' .pg_last_error());
			while ($line2 = pg_fetch_array($res2, null, PGSQL_ASSOC)) {
					$result.='<a href=""><li class="table-row">';
		    		$result.='
							          <div class="col col-1" data-label="ID">'.$line2["student_idu"].'</div>
							          <div class="col col-2" data-label="Name">'.$line2["nameu"].'</div>
							          <div class="col col-3" data-label="Surname">'.$line2["surnameu"].'</div>
							          <div class="col col-4" data-label="Entreprise">'.$line2["emailu"].'</div>
							          <div class="col col-5" data-label="Statut">'.$line2["validationu"].'</div>
							          <div class="col col-6" data-label="Expiration">Deadline soon</div>
							      </li></a>';
		 
			}
			
		}
		else{
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
		}

		$result.='<li class="table-header">
				          <div class="end">2018-2019</div>
				        </li>
				      </ul>
				    </div>';

		$dbclose = closeDB($dbconnexion);
		return $result;
	}

	function statistics(){
			$dbconnexion = connectionDB();
			$result1 ='<div class="container">
		      <ul class="responsive-table">
		        <li class="table-header">
		          <div class="col col-1">Nombre étudiants</div>
		          <div class="col col-2">Nombre dalternance</div>
		   
		        </li>';
				$query = "SELECT COUNT(*) AS count FROM users";
				$res = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
				while ($line = pg_fetch_array($res, null, PGSQL_ASSOC)){
					$result1.='<li class="table-row">';
		    		$result1.='<div class="col col-1" data-label="nbretu">'.$line["count"].'</div>';
		    		$result1.='</li>';
		    	}
				$result1.='<li class="table-header">
				          <div class="end">2018-2019</div>
				        </li>
				      </ul>
				    </div>';

		return $result1;
	}





?>