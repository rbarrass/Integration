<?php /* ALL of this file has been created for the connection part */
	/*Allows to set the "remember me" with cookie*/
	require ('functions/connectDatabase.php');
	if(isset($_POST['remember'])){
		setcookie('log[login]',$_POST['email-address']);
		setcookie('log[password]',$_POST['password']);
	}else{
		setcookie('log[login]', NULL, -1);//delete the cookie
		setcookie('log[password]', NULL, -1);//delete the seccond cookie
	}
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
	  	if($arr[0]==$cryppassword){
	   		session_start();
	    	//initialize superglobal $_SESSION
		   	$_SESSION['email-address'] = $_POST['email-address']; // SESSION est une SUPERGLOBAL
		   	$_SESSION['password'] = $_POST['password'];
		    		
		     header ('location: profil.php');
	     	} 
	    else {
	    	if($_POST['email-address']=="admin" && $_POST['password']=="admin"){
	    			session_start();

					$_SESSION['email-address'] = $_POST['email-address'];
					$_SESSION['password']=$_POST['password'];
					header('location: profil.php');
	    		}
	    	else{
			    	header('location: connect.php?id=login');
	    		}
	    	}
	}
    else {
    	echo 'Les variables du formulaire ne sont pas déclarées.';
	}

?>
