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
    
    <div class="search__container">
      <form id="auto-suggest" action="profil.php?" method="get">
        <input type="text" class="search__input" name="search" value="Rechercher..." onfocus="if(this.value=='Rechercher...')this.value=''" autocomplete="off"/>
        <ul class="suggestions">
      <!-- remplit par le script -->
        </ul>
      </form>
    </div>
    
    <div class="container">
      <ul class="responsive-table">
        <li class="table-header">
          <div class="col col-1">N° Etudiant</div>
          <div class="col col-2">Nom</div>
          <div class="col col-3">Prénom</div>
          <div class="col col-4">Email</div>
          <div class="col col-5">En attente</div>
        </li>
        
        <?php
          pendingList();
          approval();
        ?>
        
      </ul>
    </div>
</body>
</html>