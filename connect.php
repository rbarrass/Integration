<?php 
  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/
  require('functions/connect.func.php');
  require('./session.connect.php');
  require('functions/register.func.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.less" media="screen">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Connexion</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="https://monucp.u-cergy.fr/uPortal/f/u410l1s6/normal/render.uP" id="nameU">Université de Cergy-Pontoise</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?id=login" style="color: #00BFFF;">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?id=register" style="color: #00BFFF;">Enregistrement</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<?php 
ini_set("display_errors",0);error_reporting(0); //to hide the index error when the page run without attributs in url
if($_GET['id']=='login'){
  echo '<main class="login-form"> <!-- ICI COMMENCE LA PARTIE LOG -->
    <div> <!-- NE PAS UTILISER CONTAINER -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="session.connect.php" method="post">       
                            <div class="form-group row">
                                <label for="myname" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="myname" class="form-control" name="email-address" placeholder="Votre email" required autofocus '; 
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
                                            <input type="checkbox" name="remember" id="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="checkTutor" id="checkTutor"> Se connecter en tant que tuteur.
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Log in
                                </button>
                                <a onclick="document.getElementById(\'id01\').style.display=\'block\'" class="btn btn-link">
                                    Forgot Your Password?
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
  connectSession();
?>
</body>
</html> 