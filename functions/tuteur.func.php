<?php
	
	require('connectDatabase.php');

	function dispBordtuteur(){
		$dbconnexion = connectionDB();
		$name=$_GET['name'];
		$surname=$_GET['surname'];
		$result ='<div class="container">
		      <ul class="responsive-table">
		        <li class="table-header">
		          <div class="col col-1">ID</div>
		          <div class="col col-2">Nom</div>
		          <div class="col col-3">Prénom</div>
		          <div class="col col-4">Mail</div>
		          <div class="col col-6">Employeur</div>
		          <div class="col col-7">Maître Apprentissage</div>

		        </li>';
		
		$query1 = "SELECT student_idu, nameu, surnameu, emailu FROM users WHERE idtut=(SELECT idtut FROM tuteur WHERE nametut='$name' AND surnametut='$surname' LIMIT 1) ORDER BY nameu";
		$res1 = pg_query($query1) or die('Echec de la requête : ' .pg_last_error());
		while ($line1 = pg_fetch_array($res1, null, PGSQL_ASSOC)) {
			$result.='<li onclick="location.href=\'\';" class="table-row">';
			$result.='
									          <div class="col col-1" data-label="ID">'.$line1["student_idu"].'</div>
									          <div class="col col-2" data-label="Name">'.$line1["nameu"].'</div>
									          <div class="col col-3" data-label="Surname">'.$line1["surnameu"].'</div>
									          <div class="col col-4" data-label="Mail">'.$line1["emailu"].'</div>
									          <div class="col col-6" data-label="Employeur">Deadline soon</div>
									          <div class="col col-7" data-label="Maître Apprentissage">Deadline soon</div>
									          
									      </li>';
		
				
		}
		$result.='<li class="table-header">
				          <div class="end">Elève étant sous votre tutorat</div>
				        </li>
				      </ul>
				    </div>';
		
		$result.='<div class="container">
		      <ul class="responsive-table">
		        <li class="table-header">
		          <div class="col col-1">ID</div>
		          <div class="col col-2">Nom</div>
		          <div class="col col-3">Prénom</div>
		          <div class="col col-4">Mail</div>
		          <div class="col col-6">Employeur</div>
		          <div class="col col-7">Maître Apprentissage</div>

		        </li>';
		$query2 = "SELECT student_idu, nameu, surnameu, emailu FROM users WHERE idtut='1' ORDER BY nameu";
		$res2 = pg_query($query2) or die('Echec de la requête : ' .pg_last_error());
		while ($line2 = pg_fetch_array($res2, null, PGSQL_ASSOC)) {
			$result.='<li onclick="location.href=\'\';" class="table-row">';
			$result.='
									          <div class="col col-1" data-label="ID">'.$line2["student_idu"].'</div>
									          <div class="col col-2" data-label="Name">'.$line2["nameu"].'</div>
									          <div class="col col-3" data-label="Surname">'.$line2["surnameu"].'</div>
									          <div class="col col-4" data-label="Mail">'.$line2["emailu"].'</div>
									          <div class="col col-6" data-label="Employeur">Deadline soon</div>
									          <div class="col col-7" data-label="Maître Apprentissage">Deadline soon</div>
									          
									      </li>';
		
				
		}
		$result.='<li class="table-header">
				          <div class="end">Elève sans tuteur</div>
				        </li>
				      </ul>
				    </div>';

		$dbclose = closeDB($dbconnexion);
		return $result;


	}



?>