<?php
  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/
    require('functions/main.func.php');
    require('functions/bordtable.func.php');
    verifyIfConnected('stat.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Statistiques</title>
  <link rel="stylesheet" type="text/css" href="style.less" media="screen">
  <script src="script.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script src="https://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
  <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
  <script src="barchart.studentJob.js"></script>
  <script src="piechart.nbrUser.js"></script>
</head>
<body>

    <?php
      echo displayIconLogout();
      echo displayMenu();
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

  <div id="container" style="width: 75%; margin-left: 20%;">
    <canvas id="canvas"></canvas>
  </div>
  <div id="canvas-holder" style="width:75%; margin-left: 20%; margin-top: 5%;">
    <canvas id="chart-area"></canvas>
  </div>

</body>
</html>