<?php
  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/

 /* ALL of this file has been created for the connection part */
	/*Allows to set the "remember me" with cookie*/
	if(isset($_POST['remember'])){
		setcookie('log[login]',$_POST['email-address']);
		setcookie('log[password]',$_POST['password']);
	}else{
		setcookie('log[login]', NULL, -1);//delete the cookie
		setcookie('log[password]', NULL, -1);//delete the seccond cookie
	}
		require ('functions/connectDatabase.php');

	/*Allows to open a new session and direct the user to another page*/
	if (isset($_POST['email-address']) && isset($_POST['password'])) {
			
			$dbconn = connectionDB();
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
				        header('location: test.php'); //maître de sstage 
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
    else {
    	echo 'Les variables du formulaire ne sont pas déclarées.';
	}
/* FOR LOGOUT PART
    session_start ();

    session_unset ();

    session_destroy ();

    header ('location: index.php');
*/
?>
 