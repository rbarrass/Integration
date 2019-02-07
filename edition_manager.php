<?php 
  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/
  require('functions/main.func.php');
  require('functions/registration_manager.func.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="style.less" media="screen">
  <script type="text/javascript" src="script.js"></script>
  <style>
    h2{
      color: green;
      margin-top: 50px;
    }
  </style>
</head>
<body>
    <?php
      $menu = displayMenu();
      echo $menu;
    ?>
    
    
    
    <div class="container">
      <form action="edition_manager.php" method="post">
        <label for="myname" class="col-md-4 col-form-label text-md-right">Nom :</label>


        
      </form>
    </div>
</body>
</html>