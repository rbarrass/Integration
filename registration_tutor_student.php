<?php 
  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/
  require('functions/main.func.php');
  require('functions/registration_manager.func.php');
  verifyIfConnected('registration_tutor_student.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>UCP Alter Master</title>
  <link rel="stylesheet" type="text/css" href="style.less" media="screen">
  <script type="text/javascript" src="script.js"></script>
  <style>
    h2{
      color: green;
      margin-top: 50px;
    }
    
    .table-row:hover{
      background-color: #fffff1;
      cursor: default;
    }
  </style>
  </style>
</head>
<body>
    <?php
    echo displayIconLogout();
      echo displayMenu();
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
          <div class="col col-2">N° Etudiant</div>
          <div class="col col-2">Nom</div>
          <div class="col col-3">Prénom</div>
          <div class="col col-6">Email</div>
          <div class="col col-7">Nom Tuteur</div>
          <div class="col col-8">En attente</div>
        </li>
        
        <?php
          pendingtutorList();
          if (approvaltut_student() != ''){
            //refresh page
            echo '<meta http-equiv="refresh" content=0 >';
          }
        ?>
        
      </ul>
    </div>
</body>
</html>