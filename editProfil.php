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
    <style>
      input[type=text],input[type=password],select{
        width: 60%;
        height: calc(1.75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
      }
      input[type=text]:focus,input[type=password]:focus, select:focus{
          border-color: rgba(0,100,255, 0.8);
          box-shadow: 0 0 1px rgba(0,130,255, 0.075) inset, 0 0 4px rgba(0,130,255, 1);
          outline: 0 none;
      }
    </style>
</head>
<body>
 <?php
                        //session_start();
                        require('functions/main.func.php');
                        //When $_SESSION is allowed, do :
                        //$sizeError = moreInformations($_SESSION[$idu]); 
                       
                        // Redirect to profil.php page if no error detected, else show it
                    ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
          <a class="navbar-brand" href="https://monucp.u-cergy.fr/uPortal/f/u410l1s6/normal/render.uP" id="nameU">Université de Cergy-Pontoise</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="connect.php?id=login" style="color: #00BFFF;">Login</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="connect.php?id=register" style="color: #00BFFF;">Register</a>
                  </li>
              </ul>

          </div>
      </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-md-offset-1 col-md-10">
      <div class="panel panel-default">
            <div class="panel-heading">
            <h4 class="panel-title">Éditer son profil :</h4>
              </div>
              <div class="panel-body">
                <form action="functions/main.func.php" method="POST">
                  <table class="table profile__table">
                    <tbody>
                      <tr>
                        <th><strong>Adresse</strong></th>
                        <td><input type="text" name="newadr" required="" ></td>
                      </tr>
                      <tr>
                        <th><strong>Sexe</strong></th>
                        <td><select name="newgender" required="" >
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                              </select> </td>
                      </tr>
                      <tr>
                        <th><strong>Numéro de téléphone</strong></th>
                        <td><input type="text" name="newtel"required="" ></td>
                      </tr>
                      <tr>
                        <th><strong>Mot de passe</strong></th>
                        <td> <input type="password" name="newpwd" required=""  placeholder="Votre mot de passe (8 caractères minimum)"></td>
                      </tr>
                      <tr>
                        <th><strong>Confirmer votre mot de passe</strong></th>
                        <td><input type="password" name="newpwd1" required="" placeholder="Votre mot de passe (8 caractères minimum)"></td>  
                      </tr>
                      <tr>
                        <th><strong>Filière </strong></th>
                        <td>   <select name="newPromo" required="" >
                                <option value="SID">SID</option>
                                <option value="RS">RS</option>
                                <option value="STRC">STRC</option>
                              </select> </td>
                      </tr>
                      <tr>
                        <th><strong>Groupe de TD</strong></th>
                        <td> <select name="newGroup" required="" >
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                              </select> </td>
                      </tr>  
                      <tr>
                        <th><strong>Nom de l'entreprise accueillant l'étudiant</strong></th>
                        <td><input type="text" name="newent" required="" > </td>
                      </tr>  
                      <tr>
                        <th><strong>Adresse de l'entreprise accueillant l'étudiant </strong></th>
                        <td><input type="text" name="newadre" required="" ></td>
                      </tr> 
                      <tr>
                        <th><strong></strong></th>
                        <td><input type="submit" name="editvalid" value="Mettre à jour" class="sendMail" /></td>
                      </tr>                             
                    </tbody>
                  </table>
                </form>
              </div>
        </div>
        </div>
    </div>
  </div>


</body>
</html>