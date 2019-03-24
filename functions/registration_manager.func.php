<?php
/*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu	L3i 2019
raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/
require('connectDatabase.php');
function pendingList(){
	$dbconn = connectionDB();
	$display = '';
	$query = "SELECT student_idU,nameU,surnameU,emailU,idU FROM users WHERE validationU='pending';";
	$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
	$i=0;
	while ($line = pg_fetch_array($result,null,PGSQL_ASSOC)) {
		
		$j=0;
		$display.='<li class="table-row">';
		foreach ($line as $col_value) {
			switch ($j) {
				case 0:
					$display.= '<div class="col col-1" data-label="Id">'.$col_value.'</div>';
					break;
				case 1:
					$display.= '<div class="col col-2" data-label="Name">'.$col_value.'</div>';
					break;
				case 2:
					$display.= '<div class="col col-3" data-label="Surname">'.$col_value.'</div>';
					break;
				case 3:
					$display.= '<div class="col col-4" data-label="Email">'.$col_value.'</div>';
					break;
				case 4:
					$idUsr = $col_value;
					break;
				default:
					break;
			}
			$j++;
		}
		$display.= '<div class="col col-5" data-label="Status"><div class="dropdown">
						  <button onclick="myFunction'.$i.'()" class="dropbtn" >Action</button>
						  <div id="myDropdown'.$i.'" class="dropdown-content">
						  <form enctype="multipart/form-data" action="registration_manager.php" method="POST">
						        <input type="hidden" name="myid" value="'.$idUsr.'">
						        <input type="submit" name="allowed" value="Autoriser">
						        <input type="submit" name="denied" value="Refuser">
						        <input type="submit" name="banned" value="Bloquer">
						   </form>
						 
						  </div>
						</div><script>
						/* When the user clicks on the button, 
						toggle between hiding and showing the dropdown content */
						function myFunction'.$i.'() {
						  document.getElementById("myDropdown'.$i.'").classList.toggle("show");
						}
						// Close the dropdown if the user clicks outside of it
						window.onclick = function(event) {
						  if (!event.target.matches(".dropbtn")) {
						    var dropdowns = document.getElementsByClassName("dropdown-content");
						    var i;
						    for (i = 0; i < dropdowns.length; i++) {
						      var openDropdown = dropdowns[i];
						      if (openDropdown.classList.contains("show")) {
						        openDropdown.classList.remove("show");
						      }
						    }
						  }
						}
						</script></div>';	
		$i++;
		$display.= '</li>';
	}
	if ($display == ''){
		$display.= ' <li><div class="alert">
					  <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
					  Il n\'y a pas d\'étudiant en attente d\'approbation pour le moment.
					</div></li> ';
	}
	echo $display;
}

function pendingtutorList(){
	$dbconn = connectionDB();
	$display = '';
	$query = "SELECT student_idU,nameU,surnameU,emailU,idU,nametut FROM users INNER JOIN tutors ON users.idtut=tutors.idtut WHERE validationtutU='pending';";
	$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
	$i=0;
	while ($line = pg_fetch_array($result,null,PGSQL_ASSOC)) {
		
		$j=0;
		$display.='<li class="table-row">';
		foreach ($line as $col_value) {
			switch ($j) {
				case 0:
					$display.= '<div class="col col-1" data-label="Id">'.$col_value.'</div>';
					break;
				case 1:
					$display.= '<div class="col col-2" data-label="Name">'.$col_value.'</div>';
					break;
				case 2:
					$display.= '<div class="col col-3" data-label="Surname">'.$col_value.'</div>';
					break;
				case 3:
					$display.= '<div class="col col-4" data-label="Email">'.$col_value.'</div>';
					break;
				case 4:
					$idUsr = $col_value;
					break;
				case 5:
					$display.= '<div class="col col-5" data-label="Nametut">'.$col_value.'</div>';
				default:
					break;
			}
			$j++;
		}
		$display.= '<div class="col col-5" data-label="Status"><div class="dropdown">
						  <button onclick="myFunction'.$i.'()" class="dropbtn" >Action</button>
						  <div id="myDropdown'.$i.'" class="dropdown-content">
						  <form enctype="multipart/form-data" action="registration_tutor_student.php" method="POST">
						        <input type="hidden" name="myid" value="'.$idUsr.'">
						        <input type="submit" name="allow" value="Autoriser">
						        <input type="submit" name="denie" value="Refuser">
						        
						   </form>
						 
						  </div>
						</div><script>
						/* When the user clicks on the button, 
						toggle between hiding and showing the dropdown content */
						function myFunction'.$i.'() {
						  document.getElementById("myDropdown'.$i.'").classList.toggle("show");
						}
						// Close the dropdown if the user clicks outside of it
						window.onclick = function(event) {
						  if (!event.target.matches(".dropbtn")) {
						    var dropdowns = document.getElementsByClassName("dropdown-content");
						    var i;
						    for (i = 0; i < dropdowns.length; i++) {
						      var openDropdown = dropdowns[i];
						      if (openDropdown.classList.contains("show")) {
						        openDropdown.classList.remove("show");
						      }
						    }
						  }
						}
						</script></div>';	
		$i++;
		$display.= '</li>';
	}
	if ($display == ''){
		$display.= '<div class="alert">
					  <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
					  Il n\'y a pas de tuteur en attente d\'approbation pour leurs élèves.
					</div> ';
	}
	echo $display;
}


function approval(){
	if(isset($_POST['allowed']) ){
		$dbconn = connectionDB();
		$query = "UPDATE users SET validationU='allowed' WHERE idU='".$_POST['myid']."'";
		$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());

		//Send an email to student
		validStudent($_POST['myid']);
		//We want to increment table.logs to save this action and keep an eye on registering requests
		$dbconn = connectionDB();
		if (pg_last_error() == NULL) {
			//Request to search id of account just created 
				
			//SESSION!
			//Add a line in table.Logs with : action made/date/client ip/type of request(insert/delete/update)/and object concerned.
			$request = "INSERT INTO logs VALUES(DEFAULT, 'student approval allowed', '".getTheDate()."', '".getIp()."', 'update', null, '".$_POST['myid']."', null, null, null, null, null)";
			$resultat = pg_query($request) or die('ERREUR SQL : '. $request . 	pg_last_error());
			//Request for notification popup
			$request = "SELECT surnameU,nameU FROM users WHERE idU='".$_POST['myid']."'";
			$result = pg_query($request) or die('ERREUR SQL : '. $request . 	pg_last_error());
			$identity = pg_fetch_array($result,null,PGSQL_ASSOC);
			$i=0;

			//popup content
			$display = '<p>Vous avez autorisé ';
			foreach ($identity as $col_value) {
				switch ($i) {
					case 0:
						$display.= $col_value. ' ';
						break;
					default:
						$display.= $col_value.' à accéder à la plateforme</p>';
						break;
				}				
			}

			return $display;
		}
	}
	if(isset($_POST['banned']) ){
		$dbconn = connectionDB();
		$query = "UPDATE users SET validationU='banned' WHERE idU='".$_POST['myid']."'";
		$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
		//We want to increment table.logs to save this action and keep an eye on registering requests
		if (pg_last_error() == NULL) {
			//Request to search id of account just created 
				
			//SESSION!
			//Add a line in table.Logs with : action made/date/client ip/type of request(insert/delete/update)/and object concerned.
			$request = "INSERT INTO logs VALUES(DEFAULT, 'student approval banned', '".getTheDate()."', '".getIp()."', 'update', null, '".$_POST['myid']."', null, null, null, null, null)";
			$resultat = pg_query($request) or die('ERREUR SQL : '. $request . 	pg_last_error());
			//Request for notification popup
			$request = "SELECT surnameU,nameU FROM users WHERE idU='".$_POST['myid']."'";
			$result = pg_query($request) or die('ERREUR SQL : '. $request . 	pg_last_error());
			$identity = pg_fetch_array($result,null,PGSQL_ASSOC);
			$i=0;
			//popup content
			$display = '<p>Vous avez reffusé à  ';
			foreach ($identity as $col_value) {
				switch ($i) {
					case 0:
						$display.= $col_value.' ';
						break;
					default:
						$display.= $col_value.' l\'accès à la plateforme</p>';
						break;
				}				
			}
			return $display;
		}
	}
	if(isset($_POST['denied']) ){
		$dbconn = connectionDB();
		//Delete logs linked to this user
		$query = "DELETE FROM logs WHERE idU='".$_POST['myid']."'";
		$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
		//Delete user from db
		$query = "DELETE FROM users WHERE idU='".$_POST['myid']."'";
		$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
		//popup content
		$display = '<p>Vous avez reffusé l\'accès';	
		return $display;

	}
}

	function approvaltut_student(){
	if(isset($_POST['allow']) ){
		$dbconn = connectionDB();
		$query = "UPDATE users SET validationtutU='validate' WHERE idU='".$_POST['myid']."'";
		$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
		//We want to increment table.logs to save this action and keep an eye on registering requests
		if (pg_last_error() == NULL) {
			//Request to search id of account just created 
				
			//SESSION!
			//Add a line in table.Logs with : action made/date/client ip/type of request(insert/delete/update)/and object concerned.
			$request = "INSERT INTO logs VALUES(DEFAULT, 'Pairing tutor student', '".getTheDate()."', '".getIp()."', 'update', null, '".$_POST['myid']."', null, null, null, null, null)";
			$resultat = pg_query($request) or die('ERREUR SQL : '. $request . 	pg_last_error());
			//Request for notification popup
			$request = "SELECT surnameU,nameU FROM users WHERE idU='".$_POST['myid']."'";
			$result = pg_query($request) or die('ERREUR SQL : '. $request . 	pg_last_error());
			$identity = pg_fetch_array($result,null,PGSQL_ASSOC);
			$i=0;
			//popup content
			$display = '<p>Vous avez autorisé ';
			foreach ($identity as $col_value) {
				switch ($i) {
					case 0:
						$display.= $col_value. ' ';
						break;
					default:
						$display.= $col_value.' à accéder à la plateforme</p>';
						break;
				}				
			}

			return $display;
		}
	}
	if(isset($_POST['denie']) ){
		$dbconn = connectionDB();
		//Delete logs linked to this user
		$query = "DELETE FROM logs WHERE idU='".$_POST['myid']."'";
		$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
		//Delete user from db
		$query = "UPDATE users SET validationtutU='', idtut='1' WHERE idU='".$_POST['myid']."'";
		$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
		//popup content
		$display = '<p>Vous avez reffusé l\'accès';	
		return $display;

	}
}
?>