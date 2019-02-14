<?php 
  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/

  require('functions/edition_manager.func.php');
  verifyIfConnected('supervisor');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.less" media="screen">
    <script type="text/javascript" src="script.js"></script>

    <style>
      label{
        text-align: right;
        clear: both;
        float:left;
        width: 15%;
      }
      .sendMail{
        margin-left: 25%;
      }
    </style>

    <!-- Bootstrap CSS -->

   <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->

    <title>Edition des comptes</title>
</head>
<body>
    <?php
      echo displayMenu();
    ?>

                      <div class="edit_manager">
                        <form action="edition_manager.php" method="post">
                                <label for="targetname">Nom :</label>
                                <div class="col">
                                    <input type="text" class="edit_register" name="targetname" placeholder="Nom de famille de l\'utilisateur" required autofocus><!-- NAME -->
                                </div>
                                <label for="targetsurname">Prénom :</label>
                                <div class="col">
                                    <input type="text" class="edit_register" name="targetsurname" placeholder="Prénom de l\'utilisateur" required> <!-- Surname -->
                                </div>
                                <label for="targetemail">E-mail :</label>
                                <div class="col">
                                    <input type="email" class="edit_register" name="targetemail" placeholder="Adresse email de l\'utilisateur ( Valide )" required> <!-- MAIL -->
                                </div>
                                <label for="targettype">Type d\'utilisateur</label>
                                <div class="col">
                                  <select id="targettype" class="edit_register" name="targettype">
                                  <option value="student">Etudiant</option>
                                  <option value="tutor">Enseignant tuteur</option>
                                  <option value="internshipsupervisor">Maître de stage</option>
                                </select>
                                </div>
                                <button type="submit" class="sendMail" name="validCreation">
                                    Créer
                                </button>
                         </form>
                        </div>
    <?php
      $possibleError = accountCreation();
      manageError($possibleError);
    ?>
</body>
</html>