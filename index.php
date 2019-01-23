<?php
    require('functions/main.func.php');
    require('functions/bordtable.func.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="menu.css" media="screen">
</head>
<body>
  </html>
    <?php
    
      $menu = displayMenu();
      echo $menu;
      

    ?>
    <?php
        $tablebord = displayBordTable();
        echo $tablebord;
    ?>    
  </html>
</body>
