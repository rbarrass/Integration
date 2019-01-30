<?php
  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/
    require('functions/main.func.php');
    require('functions/bordtable.func.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="style.less" media="screen">
  <script type="text/javascript" src="script.js"></script>
</head>
<body>
  </html>
    <?php
    
      $menu = displayMenu();
      echo $menu;
      

    ?>
    <!-- Barre de recherch dynamique gérée par script.js et style avec style.less -->
    <div class="search__container">
      <form id="auto-suggest" action="#" method="post">
        <input type="text" class="search__input" name="search" value="Rechercher..." onfocus="if(this.value=='Rechercher...')this.value=''" autocomplete="off"/>
        <ul class="suggestions">
      <!-- remplit par le script -->
        </ul>
      </form>
    </div>

    <?php
        $tablebord = displayBordTable();
        echo $tablebord;
    ?>    
  </html>
</body>
