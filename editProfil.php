<?php 
    require('functions/main.func.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Editer mon profil</title>
  <link rel="stylesheet" type="text/css" href="style.less" media="screen">
    <style>
    th,td{
      font-size: 16px;
    }
    p{
      font-size: 30px;
    }
    body{
        background-color: #F5F5F5;
    }

  </style>
</head>
<body>
                <div class="compartments">
                    <?php
                        //When $_SESSION is allowed do :
                        //$sizeError = moreInformations($_SESSION[$idu]); 
                        $sizeError = moreInformations(1);
                        if($sizeError == "ok"){
                          send(1);
                          header('Location: profil.php');
                          exit();
                        }
                        // Redirect to profil.php page if no error detected, else show it
                    ?>

                    <!-- A form in order to modify the profile -->
                    <h1 class="marge" >Modifier le profil</h3>
                    <p>Tout les champs sont <b>obligatoire</b>, veuillez donc à remplir tout les champs ci-dessous</p>
                    <form action="editProfil.php" method="POST">
                        <label id="newname">Nom :</label>
                        <input type="text" name="newname" required="" style="width: 200px; height: 10px; margin-left: 33px;">
                        <br />
                        <label id="newage">Prénom :</label>
                        <input type="text" name="newsur" required="" style="width: 200px; height: 10px; margin-left: 40px;">
                        <br />
                        <label id="newidu">Numéro étudiant :</label>
                        <input type="text" name="newid" required="" style="width: 200px; height: 10px; margin-left: 10px;">
                        <br />
                        <label id="newage">Adresse email :</label>
                        <input type="text" name="new@" required="" style="width: 200px; height: 10px; margin-left: 40px;">
                        <br />
                        <label id="newage">Adresse :</label>
                        <input type="text" name="newadr" required="" style="width: 200px; height: 10px; margin-left: 40px;">
                        <br />
                        <label id="newgender">Sexe :</label>
                            <select name="newgender" required="" style="width: 200px; height: 39px; margin-left: 25px;">
                              <option value="Homme">Homme</option>
                              <option value="Femme">Femme</option>
                            </select> 
                        <br />
                        <label id="newtel">Numéro de téléphone :</label>
                        <input type="text" name="newtel"required="" style="width: 200px; height: 10px; margin-left: 17px;">
                        <br />
                        <label id="newpwd">MDP :</label>
                        <input type="password" name="newpwd" required="" style="width: 200px; height: 10px; margin-left: 26px; margin-right: 10px;" placeholder="Votre mot de passe (8 caractères minimum)">
                        <label id="newpwd1">Confirmer MDP :</label>
                        <input type="password" name="newpwd1" required="" style="width: 200px; height: 10px; margin-left: 10px;"placeholder="Votre mot de passe (8 caractères minimum)">
                        <br />
                        <label id="newPromo">Filière :</label>
                            <select name="newPromo" required="" style="width: 200px; height: 39px; margin-left: 25px;">
                              <option value="SID">SID</option>
                              <option value="RS">RS</option>
                              <option value="STRC">STRC</option>
                            </select> 
                        <br />
                        <label id="newGroup">Groupe :</label>
                         <select name="newGroup" required="" style="width: 200px; height: 39px; margin-left: 25px;">
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                            </select> 
                        <br />
                        <label id="newent">Nom de l'entreprise accueillant l'étudiant :</label>
                        <input type="text" name="newent" required="" style="width: 200px; height: 10px; margin-left: 17px;">
                        <br />
                        <label id="newadre">Adresse de l'entreprise accueillant l'étudiant :</label>
                        <input type="text" name="newadre" required="" style="width: 200px; height: 10px; margin-left: 17px;">
                        <br />
                        <label id="newtut">Nom du tuteur à votre charge :</label>
                        <input type="text" name="newtut" required="" style="width: 200px; height: 10px; margin-left: 17px;">
                        <br />
                        <p style="text-align: center;"><input type="submit" name="editvalid" value="Mettre à jour"/></p>
                    </form>

                    <form action="profil.php" method="POST">
                      <p style="text-align: center;"><input type="submit" name="goBack" value="Retour au profil"/></p>
                    </form>

                    <form action="editProfil.php" method="POST">
                      <p style="text-align: center;"><input type="submit" name="send" value="Envoi"/></p>
                    </form>

                </div>
</body>
</html>