<?php 
  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/
  require('functions/main.func.php');
  require('functions/logs.func.php');
  verifyIfConnected('logs.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Logs</title>
  <link rel="stylesheet" type="text/css" href="style.less" media="screen">
  <script type="text/javascript" src="script.js"></script>
  <style type="text/css">
    .col-1, .col-2 {
      text-transform: capitalize;
    }
    .table-row:hover{
      background-color: #fffff1;
      cursor: default;
    }
  </style>
</head>
<body>
    <?php
      echo displayIconLogout();
      echo displayMenu();

      //echo logsFilter();
    ?>
    
    <!-- Barre de recherch dynamique gérée par script.js et style avec style.less -->
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
          <div class="col col-1" style="text-transform: uppercase;">Action</div>
          <div class="col col-2" style="text-transform: uppercase;">Requête</div>
          <div class="col col-3">Date</div>
          <div class="col col-4">IP</div>
          <div class="col col-5">Auteur</div>
        </li>
        
        <?php
          displayLogs();
        ?>
        
      </ul>
    </div>
</body>
</html>