<?php
	  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/
	require('connectDatabase.php');
	/*
	The function dispBordtutor allows to display the two tables of the tutor.php page which makes it possible to show to the tutor the students of which he is the guardian and the other table allows him to see the students who still do not have a tutor, be able to look at the missions they will have in the company and make a request to tutor them. These tables are dynamic according to the name and surname of the tutor connected. At the connection we pass this information in the url using a $ _GET. Then we get the $ _GET to compose the SQL queries with.
	*/
	function dispBordtuteur(){
		$dbconnexion = connectionDB();
		$name=$_GET['name'];
		$surname=$_GET['surname'];
		// On construit ici le 1er tableau des élèves sous le tutorat du professeur connecté
		$result = '<div class="container2"><ul class="responsive-table">
						<li class="table-header">
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
		          <div class="col col-7">Mission</div>

		        </li>';
		/*
		The query down bellow permit to take the student id, name, surname, email and the name of the company where he is. This query take in parameters the name and the surname of the tutor. Then we display those informations in the table.
		*/
		$query1 = "SELECT student_idu, nameu, surnameu, emailu, typejob, namei FROM users INNER JOIN institutions ON users.idi=institutions.idi WHERE idtut=(SELECT idtut FROM tutors WHERE nametut='$name' AND surnametut='$surname' LIMIT 1) AND validationtutU='validate' ORDER BY nameu";
		$res1 = pg_query($query1) or die('Echec de la requête : ' .pg_last_error());
		while ($line1 = pg_fetch_array($res1, null, PGSQL_ASSOC)) {
			$result.='<li onclick="location.href=\'\';" class="table-row">';
			$result.='
									          <div class="col col-1" data-label="ID">'.$line1["student_idu"].'</div>
									          <div class="col col-2" data-label="Name">'.$line1["nameu"].'</div>
									          <div class="col col-3" data-label="Surname">'.$line1["surnameu"].'</div>
									          <div class="col col-4" data-label="Mail">'.$line1["emailu"].'</div>
									          <div class="col col-6" data-label="Employeur">'.$line1["namei"].'</div>
									          <div class="col col-7" data-label="Mission">'.$line1["typejob"].'</div>
									          
									      </li>';
		}
		$result.=' </ul>
				    </div>';
		$result.= '<div class="container2"><ul class="responsive-table">
						<li class="table-header">
				          <div class="end">Elève sans tuteur</div>
				        </li>
				      </ul>
				    </div>';
		/*
			Then we doing the same process to display the second table which contain informations about students who doesn't have a tutor yet
		*/
		$result.='<div class="container">
		      <ul class="responsive-table">
		        <li class="table-header">
		          <div class="col col-1">ID</div>
		          <div class="col col-2">Nom</div>
		          <div class="col col-3">Prénom</div>
		          <div class="col col-4">Mail</div>
		          <div class="col col-6">Employeur</div>
		          <div class="col col-7">Mission</div>
		          <div class="col col-8">Etre son tuteur ?</div>

		        </li>';
		$i=0;
		$query2 = "SELECT student_idu, nameu, surnameu, emailu, idu, typejob, namei FROM users INNER JOIN institutions ON users.idi=institutions.idi WHERE idtut='1' AND validationU='allowed' AND typeu='student' ORDER BY nameu";
		$res2 = pg_query($query2) or die('Echec de la requête : ' .pg_last_error());
		while ($line2 = pg_fetch_array($res2, null, PGSQL_ASSOC)) {
			$result.='<li class="table-row">';
			$result.='
									          <div class="col col-1" data-label="ID">'.$line2["student_idu"].'</div>
									          <div class="col col-2" data-label="Name">'.$line2["nameu"].'</div>
									          <div class="col col-3" data-label="Surname">'.$line2["surnameu"].'</div>
									          <div class="col col-4" data-label="Mail">'.$line2["emailu"].'</div>
									          <div class="col col-6" data-label="Employeur">'.$line2["namei"].'</div>
									          <div class="col col-7" data-label="Mission">'.$line2["typejob"].'</div>';
			$idUser = $line2["idu"];
			/*
				This script is make to give a choice to the tutor if he want to tutor a student or not.

			*/
			$result.= '<div class="col col-8" data-label="Etre son tuteur ?"><div class="dropdown">
						  <button onclick="myFunction'.$i.'()" class="dropbtn">Choisir cet étudiant(e)</button>
						  <div id="myDropdown'.$i.'" class="dropdown-content">
						  <form enctype="multipart/form-data" action="tuteur.php?name='.$name.'&surname='.$surname.'" method="POST">
						        <input type="hidden" name="myid" value="'.$idUser.'">
						        <input type="submit" name="allowed" value="Oui">
						        <input type="submit" name="denied" value="Non">
						        
						   </form>
						 
						  </div>
						</div><script>';
						/* When the user clicks on the button, 
						toggle between hiding and showing the dropdown content */
			$result.='
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
									          
			$result.= '</li>';
		
				
		}
		$result.='
				      </ul>
				    </div>';

		$dbclose = closeDB($dbconnexion);
		return $result;


	}

	function approvalstud(){
	/*
		This function is used to approve the tutor/student association and it is only used by the supervisor.
	*/
	if(isset($_POST['allowed']) ){
		/* if she or he said YES for the association then the pending attributes change to allowed and the student is now present on the tutor tableand the student isn't any more on the looking for a tutor table.
		*/
		$dbconn = connectionDB();
		$nametuteur=$_GET['name'];
		$surnametuteur=$_GET['surname'];
		$requete = "SELECT idtut FROM tutors WHERE nametut='$nametuteur' AND surnametut='$surnametuteur' LIMIT 1";
		$res1 = pg_query($requete) or die('Échec de la requête : ' . pg_last_error());
		$idtuteur = pg_fetch_result($res1, 'idtut');
		$query = "UPDATE users SET idtut='$idtuteur', validationtutU='pending' WHERE idU='".$_POST['myid']."'";
		$res = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
		//We want to increment table.logs to save this action and keep an eye on registering requests
		if (pg_last_error() == NULL) {
			//Request to search id of account just created 
				
			//SESSION!
			//Add a line in table.Logs with : action made/date/client ip/type of request(insert/delete/update)/and object concerned.
			$request = "INSERT INTO logs VALUES(DEFAULT, 'tuteur approval student', '".getTheDate()."', '".getIp()."', 'update', null, '".$_POST['myid']."', null, null, null, null, null)";
			$resultat = pg_query($request) or die('ERREUR SQL : '. $request . 	pg_last_error());
			//Request for notification popup
			$request = "SELECT surnameU,nameU FROM users WHERE idU='".$_POST['myid']."'";
			$result = pg_query($request) or die('ERREUR SQL : '. $request . 	pg_last_error());
			$identity = pg_fetch_array($result,null,PGSQL_ASSOC);
			$i=0;
			//popup content
			$display = '<p>Vous etes désormais le tuteur de  ';
			foreach ($identity as $col_value) {
				switch ($i) {
					case 0:
						$display.= $col_value. ' ';
						break;
					default:
						$display.= $col_value.' </p>';
						break;
				}				
			}

			return $display;
		}
	}
	if(isset($_POST['denied']) ){
		//If she or he said no to the association then nothing happens and the student stay in the looking for a tutor table
	}
}


	function dispBordReport(){
		/*
			This function display the historical bord for the tutor. When a tutor has made a report we keep some informations and display them in this table in order that the tutor always had a record of every report he wrote
		*/
		$dbconnexion = connectionDB();
		$name=$_GET['name'];
		$surname=$_GET['surname'];
		$result = '<div class="container2"><ul class="responsive-table"><li class="table-header">
				          <div class="end">Historique de vos compte-rendus</div>
				        </li>
				      </ul></div>';
		$result.='<div class="container">
		      <ul class="responsive-table">
		        <li class="table-header">
		          <div class="col col-1">Nom elève</div>
		          <div class="col col-2">Prénom elève</div>
		          <div class="col col-3">Filière</div>
		          <div class="col col-4">Date du C-R</div>
		          <div class="col col-5">Employeur</div>

		        </li>';
		
		//All of the informations that we are going to display in the bord are the following ones : name and surname of the student, his classrooms branch, the date when the report has been written and the name of the company where the student is. 
		$query1 = "SELECT nameu, surnameu, branchcl, dater, namei  FROM reports INNER JOIN users ON reports.idu=users.idu INNER JOIN institutions ON users.idi=institutions.idi INNER JOIN classrooms ON users.idcl=classrooms.idcl WHERE reports.idtut=(SELECT idtut FROM tutors WHERE nametut='$name' AND surnametut='$surname' LIMIT 1) ORDER BY dater DESC";
		$res1 = pg_query($query1) or die('Echec de la requête : ' .pg_last_error());
		while ($line1 = pg_fetch_array($res1, null, PGSQL_ASSOC)) {
			$datetime = $line1['dater'];
            $newdate = date("d-m-Y", strtotime($datetime));
			$result.='<li onclick="location.href=\'\';" class="table-row">';
			$result.='
									          <div class="col col-1" data-label="Name">'.$line1["nameu"].'</div>
									          <div class="col col-2" data-label="Surname">'.$line1["surnameu"].'</div>
									          <div class="col col-3" data-label="filière">'.$line1["branchcl"].'</div>
									          <div class="col col-4" data-label="Date">'.$newdate.'</div>
									          <div class="col col-5" data-label="Employeur">'.$line1["namei"].'</div>
									          
									          
									      </li>';
		
				
		}
		$result.='</ul></div>';

		return $result;
	}


	if(isset($_POST['submit2'])){
		// There is all of the process that we do when the tutor wrote some lines for the report.
		$dbconnexion = connectionDB();
		$nametutor=$_GET['name'];
		$surnametutor=$_GET['surname'];
		$requete = "SELECT idtut FROM tutors WHERE nametut='$nametutor' AND surnametut='$surnametutor' LIMIT 1";
		$res1 = pg_query($requete) or die('Échec de la requête : ' . pg_last_error());
		$idtutor = pg_fetch_result($res1, 'idtut');
		$emailstud = $_POST['student'];
		$report_text = $_POST['report'];
		$newreport_text = str_replace("'", "&sbquo", $report_text);
		$query4 = "SELECT idU FROM users WHERE emailu='$emailstud' LIMIT 1";
		$res0 = pg_query($query4) or die('ERREUR SQL : '. $query3 . 	pg_last_error());
		$numeroidu = pg_fetch_result($res0, 'idu');
		$query3="INSERT INTO reports VALUES (DEFAULT, '".getTheDate()."', '$newreport_text', '', '$idtutor', '$numeroidu')";
		$res = pg_query($query3) or die('ERREUR SQL : '. $query3 . 	pg_last_error());

	}


	if (isset($_POST['submit1'])) {
		// This is the second process when the tutor doesn't wrote but download the files for the report
		$dbconnexion = connectionDB();
		$nametutor=$_GET['name'];
		$surnametutor=$_GET['surname'];
		$requete = "SELECT idtut FROM tutors WHERE nametut='$nametutor' AND surnametut='$surnametutor' LIMIT 1";
		$res1 = pg_query($requete) or die('Échec de la requête : ' . pg_last_error());
		$idtutor = pg_fetch_result($res1, 'idtut');
		$path = 'pdf_files/reports/';
		$tmp_file = $_FILES['tutfile']['tmp_name'];
		$name_file = $_FILES['tutfile']['name'];
		$finalpath = $path.$name_file;
		move_uploaded_file($tmp_file, $finalpath);
		$emailstud1 = $_POST['student'];
		$query4 = "SELECT idU FROM users WHERE emailu='$emailstud1' LIMIT 1";
		$res0 = pg_query($query4) or die('ERREUR SQL : '. $query3 . 	pg_last_error());
		$numeroidu = pg_fetch_result($res0, 'idu');
		$query3="INSERT INTO reports VALUES (DEFAULT, '".getTheDate()."', '', '$finalpath', '$idtutor', '$numeroidu')";
		$res = pg_query($query3) or die('ERREUR SQL : '. $query3 . 	pg_last_error());
	}

?>