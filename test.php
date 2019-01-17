<?php 
  require('functions/main.func.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="menu.css" media="screen">
  <link href="https://fonts.googleapis.com/css?family=Cantarell" rel="stylesheet">
  <style>
    h1{text-align: center; margin-left: 38%; font-family: "Open Sans", sans-serif; margin-right: 0%; width: 40%;}
  </style>
</head>
<body>
  <?php
    echo 'Adresse IP du visiteur : '.getIp();
    echo '<p>---</p>';
    getTheDate();
  ?>
    


</body>
</html>
