<?php 
  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/

  require('functions/edition_manager.func.php');
  verifyIfConnected('edition_manager.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.less" media="screen">
    <script src="script.js"></script>

    <style>
      .alert{
        margin-left: 20%;
        width: 70%;
        margin-top: 10px;
      }
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
    echo displayIconLogout();
      echo displayMenu();
      editRegisteringForm();
      editDeleteForm();
    ?>

    <?php
      $possibleError = accountCreation();
      manageError($possibleError);
      $possibleError = accountDeletion();
      manageError($possibleError);
    ?>
</body>
</html>