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
		          <div class="col col-4">Mail</div>
		          <div class="col col-5">Statut</div>
		          <div class="col col-6">Employeur</div>
		          <div class="col col-7">Maître Apprentissage</div>
		          <div class="col col-8">Tuteur UCP</div>

		        </li>';
		if(!empty($_GET['psd'])){
			$branch = $_GET['psd'];

			/*
			$currentdate = date('Y');
			$requete = "SELECT DISTINCT promotionu FROM users";
			$quer = pg_query($requete) or die('Echec de la requete : ' .pg_last_error());
			$row = pg_fetch_array($quer, null, PGSQL_ASSOC);
			$date = explode("-", $row);
			if (((int)$date[0]<=$currentdate) && ($currentdate<=(int)$date[1])) {*/
				if ($branch=="Alternants") {
					$query2 = "SELECT student_idu, nameu, surnameu, emailu, validationu FROM users ORDER BY nameu";
					$res2 = pg_query($query2) or die('Echec de la requête : ' .pg_last_error());
					while ($line2 = pg_fetch_array($res2, null, PGSQL_ASSOC)) {
							$result.='<li onclick="document.getElementById(\'choiceTutor\').style.display=\'block\'"  class="table-row">';
				    		$result.='
									          <div class="col col-1" data-label="ID">'.$line2["student_idu"].'</div>
									          <div class="col col-2" data-label="Name">'.$line2["nameu"].'</div>
									          <div class="col col-3" data-label="Surname">'.$line2["surnameu"].'</div>
									          <div class="col col-4" data-label="Mail">'.$line2["emailu"].'</div>
									          <div class="col col-5" data-label="Statut">'.$line2["validationu"].'</div>
									          <div class="col col-6" data-label="Employeur">Deadline soon</div>
									          <div class="col col-7" data-label="Maître Apprentissage">Deadline soon</div>
									          <div class="col col-8" data-label="Tuteur UCP">Deadline soon</div>
									      </li>';
		
				
					}
				}
			else{
					$query1 = "SELECT idcl from classrooms WHERE branchcl='$branch'" ;
					$res1 = pg_query($query1) or die('Échec de la requête : ' . pg_last_error());
					$line1 = pg_fetch_array($res1, null, PGSQL_ASSOC);
					$id = $line1["idcl"];
					$query = "SELECT student_idu, nameu, surnameu, emailu, validationu FROM users WHERE idcl='$id' ORDER BY nameu";
					$res = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
					while ($line = pg_fetch_array($res, null, PGSQL_ASSOC)) {
						$result.='<li onclick="document.getElementById(\'choiceTutor\').style.display=\'block\'" class="table-row">';
			    		$result.='
								          <div class="col col-1" data-label="ID">'.$line["student_idu"].'</div>
								          <div class="col col-2" data-label="Name">'.$line["nameu"].'</div>
								          <div class="col col-3" data-label="Surname">'.$line["surnameu"].'</div>
								          <div class="col col-4" data-label="Mail">'.$line["emailu"].'</div>
								          <div class="col col-5" data-label="Statut">'.$line["validationu"].'</div>
								          <div class="col col-6" data-label="Employeur">Deadline soon</div>
								          <div class="col col-7" data-label="Maître Apprentissage">Deadline soon</div>
								          <div class="col col-8" data-label="Tuteur UCP">Deadline soon</div>
								      </li>';
			 
					}
				}
				$result.='<li class="table-header">
				          <div class="end">2018-2019</div>
				        </li>
				      </ul>
				    </div>
				     <!-- The Modal (contains the Sign Up form) -->
			          <div class="modal2" id="choiceTutor">
			            <div class="modal2-sandbox" id="around2"></div>
			            <div class="modal2-box">
			              <div class="modal2-body">
			                
			              </div>
			            </div>
			          </div> ';
			//}
			}
			if (!empty($_GET['promo'])) {
					$promo = $_GET['promo'];
					$query3 = "SELECT student_idu, nameu, surnameu, emailu, validationu FROM users WHERE promotionu='$promo' ORDER BY nameu";
					$res3 = pg_query($query3) or die('Echec de la requête : ' .pg_last_error());
					while ($line3 = pg_fetch_array($res3, null, PGSQL_ASSOC)) {
							$result.='<li onclick="location.href=\'stat.php\';" class="table-row">';
				    		$result.='
									          <div class="col col-1" data-label="ID">'.$line3["student_idu"].'</div>
									          <div class="col col-2" data-label="Name">'.$line3["nameu"].'</div>
									          <div class="col col-3" data-label="Surname">'.$line3["surnameu"].'</div>
									          <div class="col col-4" data-label="Mail">'.$line3["emailu"].'</div>
									          <div class="col col-5" data-label="Statut">'.$line3["validationu"].'</div>
									          <div class="col col-6" data-label="Employeur">Deadline soon</div>
									          <div class="col col-7" data-label="Maître Apprentissage">Deadline soon</div>
									          <div class="col col-8" data-label="Tuteur UCP">Deadline soon</div>
									      </li>';
					}
					$result.='<li class="table-header">
				          <div class="end">'.$promo.'</div>
				        </li>
				      </ul>
				    </div>';
			}

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