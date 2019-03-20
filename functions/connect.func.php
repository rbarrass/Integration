<?php

function displayPage(){
	ini_set("display_errors",0);error_reporting(0); //to hide the index error when the page run without attributs in url
	if($_GET['id']=='login'){
	  echo '<main class="login-form"> <!-- ICI COMMENCE LA PARTIE LOG -->
	    <div> <!-- NE PAS UTILISER CONTAINER -->
	        <div class="row justify-content-center">
	            <div class="col-md-8">
	                <div class="card">
	                    <div class="card-header">Connexion</div>
	                    <div class="card-body">
	                        <form action="./connect.php?id=login" method="post">       
	                            <div class="form-group row">
	                                <label for="myname" class="col-md-4 col-form-label text-md-right">Adresse email</label>
	                                <div class="col-md-6">
	                                    <input type="email" id="myname" class="form-control" name="email-address" placeholder="Votre email" required autofocus '; 
	                                            if(!empty($_COOKIE['log']['login'])){
	                                            echo 'value="'.$_COOKIE['log']['login'].'">';
	                                            }else{ echo '>';} 
	                               echo ' </div>
	                            </div>

	                            <div class="form-group row">
	                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
	                                <div class="col-md-6">
	                                    <input type="password" id="password" class="form-control" name="password" placeholder="Votre mot de passe" required ';
	                                            if(!empty($_COOKIE['log']['password'])){
	                                            echo 'value="'.$_COOKIE['log']['password'].'">';
	                                            }else{ echo '>';} 
	                               echo ' </div>
	                            </div>

	                            <div class="form-group row">
	                                <div class="col-md-6 offset-md-4">
	                                    <div class="checkbox">
	                                        <label>
	                                            <input type="checkbox" name="remember" id="remember"> Se souvenir de moi
	                                        </label>
	                                    </div>
	                                </div>
	                            </div>

	                            <div class="col-md-6 offset-md-4">
	                                <button type="submit" class="btn btn-primary">
	                                    Connexion
	                                </button>
	                                <a onclick="document.getElementById(\'id01\').style.display=\'block\'" class="btn btn-link">
	                                    Mot de passe oublié ?
	                                </a>
	                            </div>
	                    </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	            <!-- The Modal (contains the "forgot your password ?" from) -->
	          <div class="modal" id="id01">
	            <div class="modal-sandbox" id="around"></div>
	            <div class="modal-box">
	              <div class="modal-header">
	                <h1>Récupération du compte :</h1>
	                <div class="close-modal" id="cl2">&#10006;</div> 
	              </div>
	              <div class="modal-body">
	                <div class="row justify-content-center">
	                      <div class="col-md-8">
	                          <div class="card-body">
	                              <div class="alert alert-primary" role="alert">
	                                  Un mail de récupération vous sera envoyé. Veuillez suivre l\'adresse donné par celui-ci.
	                              </div>
	                          </div>
	                      </div>
	                </div>
	                <form action="" method=""> <!-- ACTION to define -->
	                  <label for="mailToRetrieve">Votre mail utilisé sur votre compte :</label>
	                  <input type="text" name="mailToRetrieve" class="mailToRetrieve" placeholder="Mail du compte à récupérer..." required>
	                  
	                  <input type="submit" class="sendMail">
	                </form>
	                <br />
	              </div>
	            </div>
	          </div>
	          <script>
	            // Get the modal
	            var modal = document.getElementById(\'id01\');
	            var close2 = document.getElementById(\'cl2\');
	            var closeAround= document.getElementById(\'around\');
	            // When the user clicks anywhere outside of the modal, close it
	            window.onclick = function(event) {
	                if (event.target == close2 || event.target == closeAround) {
	                    modal.style.display = "none";
	                }
	            }
	          </script> ';    
	}else{
	  $containError = register(); 
	  //registerForm();
	  // Redirect to profil.php page if no error detected, else show it
	  if ($containError == "null") {
	  }else{
	    echo "$containError";
	  }
	  if ($containError == "null") {
	    registerOk();
	  }else{
	    registerFORM();
	    //registerOk();
	  }
	}
}

function displayBoxInfo($info){
	echo '
	                <div class="row justify-content-center">
	                      <div class="col-md-8">
	                          <div class="card-body">
	                              <div class="alert alert-primary" role="alert">
	                                  '.$info.'
	                              </div>
	                          </div>
	                      </div>
	                </div>';

}

?>