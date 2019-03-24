<?php
	require('connectDatabase.php');

	function displayBordTable(){
		$dbconnexion = connectionDB();
		$result =' <div class="table-users">
      				 <div class="header">Users</div>
       				<table>
				        <tr >
		            	 <th>Profil</th>
		            	 <th>N°Étudiant</th>
		            	 <th>Nom</th>
		            	 <th>Prénom</th>
		            	 <th>Email</th>
		            	 <th>Statut</th>
		            	 <th>Entreprise</th>
		            	 <th>Téléphone</th>
		            	 <th>Adresse</th>
		            	 <th>Nationalité</th>
		            	 <th>Fonction occupée</th>
		            	 <th>Mission</th>
		         		</tr>';
		if(!empty($_GET['psd'])){
			$branch = $_GET['psd'];
				if ($branch=="Alternants") {
					$i=0;
					$query2 = "SELECT student_idu, nameu, surnameu, emailu, validationu, nametut, namei, phoneu,adru,nationality,job,typejob FROM tutors INNER JOIN users ON tutors.idtut=users.idtut INNER JOIN institutions ON users.idi=institutions.idi WHERE typeu='student' AND validationu='allowed' ORDER BY nameu";
					$res2 = pg_query($query2) or die('Echec de la requête : ' .pg_last_error());
					while ($line2 = pg_fetch_array($res2, null, PGSQL_ASSOC)) {
							$i++;
							if($i==4)
								$result.='<tr style="background-color:rgb(180,40,0,0.2);">';
							else
								$result.='<tr>';
				    		$result.='
									             <td><img class="ppStudent" src="http://lorempixel.com/100/100/people/1" alt="" /></td>
									             <td>'.$line2["student_idu"].'</td>
									             <td>'.$line2["nameu"].'</td>
									             <td>'.$line2["surnameu"].'</td>
									             <td>'.$line2["emailu"].'</td>
									             <td>'.$line2["validationu"].'</td>
									             <td>'.$line2["namei"].'</td>
									             <td>'.$line2["phoneu"].'</td>
									             <td>'.$line2["adru"].'</td>
									             <td>'.$line2["nationality"].'</td>
									             <td>'.$line2["job"].'</td>
									             <td>'.$line2["typejob"].'</td>
								      		</tr>';
		
				
					}
				}
			else{
					$query1 = "SELECT idcl from classrooms WHERE branchcl='$branch'" ;
					$res1 = pg_query($query1) or die('Échec de la requête : ' . pg_last_error());
					$line1 = pg_fetch_array($res1, null, PGSQL_ASSOC);
					$id = $line1["idcl"];
					$query = "SELECT student_idu, nameu, surnameu, emailu, validationu, nametut, namei FROM tutors INNER JOIN users ON tutors.idtut=users.idtut INNER JOIN institutions ON users.idi=institutions.idi WHERE idcl='$id' AND typeu='student' AND validationu='allowed' ORDER BY nameu";
					$res = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
					while ($line = pg_fetch_array($res, null, PGSQL_ASSOC)) {
						$result.='		<tr>
									             <td><img class="ppStudent" src="http://lorempixel.com/100/100/people/1" alt="" /></td>
									             <td>'.$line["student_idu"].'</td>
									             <td>'.$line["nameu"].'</td>
									             <td>'.$line["surnameu"].'</td>
									             <td>'.$line["emailu"].'</td>
									             <td>'.$line["validationu"].'</td>
									             <td>'.$line["namei"].'</td>
								      		</tr>';
			 
					}
				}
				$result.='</table>
   					 </div>
				     <!-- The Modal (contains the Sign Up form) -->
			          <div class="modal2" id="choiceTutor">
			            <div class="modal2-sandbox" id="around2"></div>
			            <div class="modal2-box">
			              <div class="modal2-body">
			                
			              </div>
			            </div>
			          </div> ';
			
			}
			if (!empty($_GET['promo'])) {
					$promo = $_GET['promo'];
					$query3 = "SELECT student_idu, nameu, surnameu, emailu, validationu, nametut, namei FROM tutors INNER JOIN users ON tutors.idtut=users.idtut INNER JOIN institutions ON users.idi=institutions.idi WHERE promotionu='$promo' AND typeu='student' AND validationu='allowed' ORDER BY nameu";
					$res3 = pg_query($query3) or die('Echec de la requête : ' .pg_last_error());
					while ($line3 = pg_fetch_array($res3, null, PGSQL_ASSOC)) {
							$result.='
									      <tr>
									             <td><img class="ppStudent" src="http://lorempixel.com/100/100/people/1" alt="" /></td>
									             <td>'.$line3["student_idu"].'</td>
									             <td>'.$line3["nameu"].'</td>
									             <td>'.$line3["surnameu"].'</td>
									             <td>'.$line3["emailu"].'</td>
									             <td>'.$line3["validationu"].'</td>
									             <td>'.$line3["namei"].'</td>
								      	</tr>';
					}
					$result.='<tr>'.$promo.'</tr></table></div>
				    </div>';
			}

		$dbclose = closeDB($dbconnexion);
		return $result;
	}

?>