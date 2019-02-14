<?php 
    require('functions/main.func.php');
?>
<!DOCTYPE html>
<html lang="fr">
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
</head>
<body>
                <div class="compartments">
                    <?php
                        //When $_SESSION is allowed, do :
                        //$sizeError = moreInformations($_SESSION[$idu]); 
                        $sizeError = moreInformations(1);
                        if($sizeError == "ok"){
                          send(1);
                          header('Location: profil.php');
                          exit();
                        }
                        // Redirect to profil.php page if no error detected, else show it
                    ?>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#" id="nameU">Université de Cergy-Pontoise</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="functions/logout.php" style="color: #00BFFF; font-size:15px;">Se déconnecter</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <div class="container">
          <div class="row">
            <div class="col-md-offset-1 col-md-10">
              <div class="col-md-offset-1 col-md-3">
                <img src="pictures/profil_pic/default.png"
                      alt="" class="img-rounded img-responsive" id="profil_pic" />
              </div>
              <div class="col-md-offset-1 col-md-5">
                <blockquote id="info">
                           <p>'.$array_profil[1]['nameu'].' '.$array_profil[2]['surnameu'].'</p> <small><cite title="Source Title">ADRESSE  <i class="glyphicon glyphicon-map-marker"></i></cite></small>
                </blockquote>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-offset-1 col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">Éditer votre profil :</h4>
                    </div>
                    <div class="panel-body">
                      <div class="col-md-10 col-md-offset-1">
                        <div class="row justify-content-center">
                              <div class="col-md-8">
                                  <div class="card-body">
                                      <div class="alert alert-primary" role="alert">
                                          Votre compte a bien été enregistré. Veuillez vérifier votre adresse mail, un lien vous sera envoyé.
                                      </div>
                                  </div>
                              </div>
                        </div>
                      </div>  
                    <form action="editProfil.php" method="POST">
                        <label id="newname">Nom :</label>
                        <input type="text" name="newname" required="" >
                        <br />
                        <label id="newage">Prénom :</label>
                        <input type="text" name="newsur" required="" >
                        <br />
                        <label id="newidu">Numéro étudiant :</label>
                        <input type="text" name="newid" required="" >
                        <br />
                        <label id="newage">Adresse email :</label>
                        <input type="text" name="new@" required="" >
                        <br />
                        <label id="newage">Adresse :</label>
                        <input type="text" name="newadr" required="" >
                        <br />
                        <label id="newgender">Sexe :</label>
                            <select name="newgender" required="" >
                              <option value="Homme">Homme</option>
                              <option value="Femme">Femme</option>
                            </select> 
                        <br />
                        <label id="newtel">Numéro de téléphone :</label>
                        <input type="text" name="newtel"required="" >
                        <br />
                        <label id="newpwd">MDP :</label>
                        <input type="password" name="newpwd" required=""  placeholder="Votre mot de passe (8 caractères minimum)">
                        <label id="newpwd1">Confirmer MDP :</label>
                        <input type="password" name="newpwd1" required="" placeholder="Votre mot de passe (8 caractères minimum)">
                        <br />
                        <label id="newPromo">Filière :</label>
                            <select name="newPromo" required="" >
                              <option value="SID">SID</option>
                              <option value="RS">RS</option>
                              <option value="STRC">STRC</option>
                            </select> 
                        <br />
                        <label id="newGroup">Groupe :</label>
                         <select name="newGroup" required="" >
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                            </select> 
                        <br />
                        <label id="newent">Nom de l'entreprise accueillant l'étudiant :</label>
                        <input type="text" name="newent" required="" >
                        <br />
                        <label id="newadre">Adresse de l'entreprise accueillant l'étudiant :</label>
                        <input type="text" name="newadre" required="" >
                        <br />
                        <label id="newtut">Nom du tuteur à votre charge :</label>
                        <input type="text" name="newtut" required="" >
                        <br />
                        <p ><input type="submit" name="editvalid" value="Mettre à jour"/></p>
                    </form>

                    <form action="profil.php" method="POST">
                      <p ><input type="submit" name="goBack" value="Retour au profil"/></p>
                    </form>

                    <form action="editProfil.php" method="POST">
                      <p ><input type="submit" name="send" value="Envoi"/></p>
                    </form>
                    </div>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-offset-5 col-md-2">
                <a href="editProfil.php" class="access">Éditer</a>
            </div>
          </div>
        </div>';
</body>
</html>