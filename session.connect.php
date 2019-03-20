<?php
  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/

function connectSession(){
 /* ALL of this file has been created for the connection part */
	/*Allows to set the "remember me" with cookie*/
	if(isset($_POST['remember'])){
		setcookie('log[login]',$_POST['email-address']);
		setcookie('log[password]',$_POST['password']);
	}else{
		setcookie('log[login]', NULL, -1);//delete the cookie
		setcookie('log[password]', NULL, -1);//delete the second cookie
	}
	


	/*Allows to open a new session and direct the user to another page*/
	if (isset($_POST['email-address']) && isset($_POST['password'])) {	
		$dbconn = connectionDB();
		//Check if email exist
		if(emailExist($_POST['email-address'])){

			//Check if account is allowed to connect 
			$req=pg_query("SELECT validationu FROM users WHERE emailu='".$_POST['email-address']."';") or die('Erreur de connection.');
			$state[0] = pg_fetch_array($req, null, PGSQL_ASSOC);
			if($state[0]['validationu'] == 'pending'){
				$info = 'Connexion indisponnible, le compte '.$_POST['email-address'].' n\'a pas encore été validé par l\'administration';
				displayPage();
				displayBoxInfo($info);
			} elseif ($state[0]['validationu'] == 'banned') {
				$info = 'Connexion impossible, le compte '.$_POST['email-address'].' a été cloturé. Pour toute réclamation, veuillez contacter l\'administration';
				displayPage();
				displayBoxInfo($info);
			} elseif ($state[0]['validationu'] == 'waiting') {
				$info = 'Connexion impossible, vous n\'avez pas encore validé votre adresse mail '.$_POST['email-address'].', veuillez vous rendre dans votre boite de récepetion pour procéder';
				displayPage();
				displayBoxInfo($info);
			} else{
				//IMPORTANT : we check if visitor is a tutor (table.tutors) or student/supervisor/intershipsupervisor/administrator (table.administrator)
				$isTutor = isTutor($_POST['email-address']);
				//We crypt password to compare with the one in db (tutors table or users table)
				if($isTutor){	//Is tutor
					$req=pg_query("SELECT passwordtut FROM tutors WHERE emailtut='".$_POST['email-address']."';") or die('Erreur de connection.');
				} else {		//isn't tutor
			  		$req=pg_query("SELECT passwordu FROM users WHERE emailu='".$_POST['email-address']."';") or die('Erreur de connection.');
			  	}

			  	$cryppassword=crypt($_POST['password'], 'rl');
			  	$arr=array();
			  	while ($l = pg_fetch_array($req,null,PGSQL_ASSOC)) {
					foreach ($l as $val) {
						$arr[0]=$val;
					}
				}
				
				//Verify the user's state, and redirect him to the correct page
			  	if($arr[0]==$cryppassword){
			   		session_start();
			    	//initialize superglobal $_SESSION
				   	$_SESSION['email-address'] = $_POST['email-address']; 

				   	if($isTutor){	//Is tutor
				   		$reqIdu=pg_query("SELECT idtut FROM tutors WHERE emailtut='".$_POST['email-address']."';") or die('Erreur de connection.'); 
					    $idu = pg_fetch_array($reqIdu,null,PGSQL_ASSOC); 	    
						//echo $typeu['typeu']; => value of typeu => student/supervisor/tutor...
						$_SESSION['idu'] = $idu['idtut'];
						$_SESSION['typeu'] = 'tutor';
				   	} else {		//Isn't tutor
					   	$reqIdu=pg_query("SELECT idu FROM users WHERE emailu='".$_POST['email-address']."';") or die('Erreur de connection.'); 
					    $reqTypeu=pg_query("SELECT typeu FROM users WHERE emailu='".$_POST['email-address']."';") or die('Erreur de connection.');
					
						$idu = pg_fetch_array($reqIdu,null,PGSQL_ASSOC); 	    
				   		$typeu = pg_fetch_array($reqTypeu,null,PGSQL_ASSOC);
						//echo $typeu['typeu']; => value of typeu => student/supervisor/tutor...
						$_SESSION['idu'] = $idu['idu'];
						$_SESSION['typeu'] = $typeu['typeu'];
					}

					//We get name and surname of user for redirect on pages who nead it in url
					$tabSurnameName = getNameSurname($_SESSION['email-address']);
					switch ($_SESSION['typeu']) {
					    case 'student':
					        header('location: profil.php'); 
					        break;
					    case 'tutor':
					        $nameSurname =array();
  							$nameSurname = getNameSurname($_SESSION['email-address']);
					    	header('location: tuteur.php?name='.$nameSurname[0].'&surname='.$nameSurname[1].'');
					        break;
					    case 'intershipsupervisor':
					        header('location: profil.php'); //maître de stage 
					        break;
					    case 'supervisor':
					    	header('location: index.php?psd=Alternants'); //gestionnaire
					    	break;
					   	case 'administrator':
					   		header('location: logs.php');//administrateur
					   		break;
					}
		     	} 
			    else {
			    	$info = "L'identifiant ou le mot de passe est incorrect";
		    		displayPage();
					displayBoxInfo($info);
		    	}
		    }
		 //Else email don't exist
		} else {
			$info = "L'identifiant ou le mot de passe est incorrect";
		    displayPage();
			displayBoxInfo($info);			
		}
	}
    else {
    	displayPage();
	}
}
/* FOR LOGOUT PART
    session_start ();

    session_unset ();

    session_destroy ();

    header ('location: index.php');
*/


?>
 