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

	  		$req=pg_query("SELECT passwordu FROM users WHERE emailu='".$_POST['email-address']."';") or die('Erreur de connection.');
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
			   	$reqIdu=pg_query("SELECT idu FROM users WHERE emailu='".$_POST['email-address']."';") or die('Erreur de connection.'); 
			    $reqTypeu=pg_query("SELECT typeu FROM users WHERE emailu='".$_POST['email-address']."';") or die('Erreur de connection.');
				$idu = pg_fetch_array($reqIdu,null,PGSQL_ASSOC); 	    
			    $typeu = pg_fetch_array($reqTypeu,null,PGSQL_ASSOC);
				//echo $typeu['typeu']; => value of typeu => student/professor...
				$_SESSION['idu'] = $idu['idu'];
				$_SESSION['typeu'] = $typeu['typeu'];
				switch ($_SESSION['typeu']) {
				    case 'student':
				        header('location: profil.php'); 
				        break;
				    case 'tutor':
				        header('location: test.php');//tuteur
				        break;
				    case 'intershipsupervisor':
				        header('location: test.php'); //maître de stage 
				        break;
				    case 'supervisor':
				    	header('location: index.php'); //gestionnaire
				    	break;
				   	case 'administrator':
				   		header('location: test.php');//administrateur
				   		break;
				}
	     	} 
		    else {
	    		header('location: connect.php?id=login');
	    	}
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
 