<?php
/*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu	L3i 2019
raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/

require('connectDatabase.php');
require('main.func.php');

function register(){
	if(isset($_POST['validRegister']) ){
		$dbconn = connectionDB();
		$errorR="";

		//Password check
		//Size check
		if (strlen($_POST['mypwd']) > 50){
			$errorR.="<p class='registerError'>Erreur: Mot de passe trop long, 50 caractères max</p>";
			return $errorR;
		}elseif (strlen($_POST['mypwd']) < 8){
			$errorR.="<p class='registerError'>Erreur: Mot de passe trop court, 8 caractères min</p>";
			return $errorR;
		}else{
			//Check if two fields matches
			if ($_POST['mypwd1'] == $_POST['mypwd']){
				//Crypting password
				$password_hash = crypt($_POST['mypwd'], 'rl');
			}else{
				$errorR.="<p class='registerError'>Erreur: Le deux champs mot de passe doivent correspondre</p>";
				return $errorR;
			}
		}

		//name check
		//Size check
		if (strlen($_POST['myname']) > 30){
			$errorR.="<p class='registerError'>Erreur: La taille du nom est limitée à 30 caractères</p>";
			return $errorR;
		}else{
			//Insure typing is accepted
			if (autorizedChar($_POST['myname'], 0) == 1){
				//Format text
				$name = ucfirst(strtolower($_POST['myname']));
			}else{
				$errorR.="<p class='registerError'>Erreur : Format nom incorrect | a-z àéèù- acceptés</p>";
				return $errorR;
			}
		}

		//surname check
		//Size check
		if (strlen($_POST['mysurname']) > 30){
			$errorR.="<p class='registerError'>Erreur: La taille du prénom est limitée à 30 caractères</p>";
			return $errorR;
		}else{
			//Insure typing is accepted
			if (autorizedChar($_POST['mysurname'], 0) == 1){
				//Format text
				$surname = ucfirst(strtolower($_POST['mysurname']));
			}else{
				$errorR.="<p class='registerError'>Erreur : Format prénom incorrect | a-z àéèù- acceptés</p>";
				return $errorR;
			}	
		}

		//Email check
		//Size check
		if (strlen($_POST['myemail']) > 60){
			$errorR.="<p class='registerError'>Erreur: La taille du mail est limitée à 30 caractères</p>";
			return $errorR;
		}//Pas fini, verif typing + unicité dans la bd!
		// we take all the emails that are in the database and we ckeck if the email that the client put in the form already exist in the database
		$query = 'SELECT emailU FROM users';
		$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
		$tab = array();
		$i=0;
		$j=0;
		$k=0;
		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    		foreach ($line as $col_value) {
    			$tab[$i]=$col_value;
    			$i++;
    		}
 
		}
		//if the email existing in the database a popup alert the client the email exist
		while(($k==0) && ($j<$i)){
			if (strcmp($_POST['myemail'], $tab[$j])==0) {
				$k=2;
				$errorR.="<p class='registerError'>Erreur : Email déjà utilisé</p>";
				return $errorR;
			}
			else {
				$j++;
			}
		}

		//student no check
		//Size check
		if (strlen($_POST['myno']) != 8){
			$errorR.="<p class='registerError'>Erreur: Numéro étudiant incorrect</p>";
			return $errorR;
		}else{
			//Insure typing id accepted
			if (autorizedChar($_POST['myno'], 1) != 1){
				$errorR.="<p class='registerError'>Erreur : Numéro étudiant incorrect | [0-9] acceptés</p>";
				return $errorR;
			}
		}

		$query = 'SELECT student_idU FROM users';
		$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
		$tab = array();
		$i=0;
		$j=0;
		$k=0;
		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    		foreach ($line as $col_value) {
    			$tab[$i]=$col_value;
    			$i++;
    		}
 
		}
		//if the student no existing in the database a popup alert the client student number does already exist
		while(($k==0) && ($j<$i)){
			if (strcmp($_POST['myno'], $tab[$j])==0) {
				$k=2;
				$errorR.="<p class='registerError'>Erreur : Vous ne pouvez vous inscrire qu'une seule fois</p>";
				return $errorR;
			}
			else {
				$j++;
			}
		}

		//request to create line in table.users
		$request = "INSERT INTO users VALUES(DEFAULT, '".$_POST['myno']."', '".$_POST['myname']."', '".$_POST['mysurname']."', ' ', '".$_POST['myemail']."', ' ', ' ', '$password_hash', ' ', 'student', 'pending')";
		$resultat = pg_query($request) or die('ERREUR SQL : '. $request . 	pg_last_error());


		//We want to increment table.logs to save this action and keep an eye on registering requests
		if (pg_last_error() == NULL) {
			//Request to search id of account just created 
			$requestUserId = "SELECT idU FROM users WHERE emailU='".$_POST['myemail']."'";
			$resultUserId = pg_query($requestUserId) or die('ERREUR SQL : '. $requestUserId . 	pg_last_error());
			$userId = pg_fetch_result($resultUserId, 'idu');

			//Add a line in table.Logs with : action made/date/client ip/type of request(insert/delete/update)/and object concerned.
			$request = "INSERT INTO logs VALUES(DEFAULT, 'student registering', '".getTheDate()."', '".getIp()."', 'insert', null, '$userId', null, null, null, null, null)";
			$resultat = pg_query($request) or die('ERREUR SQL : '. $request . 	pg_last_error());
		}

		$errorR = 'null';
		return $errorR;
	}
}


function registerForm(){
	echo '<div class="registerForm"><h2>Enregistrement</h2>
		<form enctype="multipart/form-data" action="register.php" method="POST">
        <p><label for="name" >Nom</label></p>
        <input type="text" name="myname" required="">
        <p><label for="surname" >Prénom</label></p>
        <input type="text" name="mysurname" required="">
        <p><label for="email" >Email</label></p>
        <input type="text" name="myemail" required="">
        <p><label for="no" >N° Etudiant</label></p>
        <input type="text" name="myno" required="">
        <p><label for="pwd" >Mot de passe</label></p>
        <input type="password" name="mypwd" required="">
        <p><label for="pwd1" >Confirmation</label></p>
        <input type="password" name="mypwd1" required="">
        <p><input type="submit" class="button" name="validRegister" value="Envoyer"></p></div>
      </form>';
}

function registerOk(){
	echo '<div class="registerForm" style="margin-left: 36%;  width: 41%;"><h2>Votre enregistrement a bien été effectué</h2>
			<p>Vous receverez un email une fois votre inscription acceptée</p></div>';
}

?>