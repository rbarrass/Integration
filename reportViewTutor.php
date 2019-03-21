<?php
    require('functions/main.func.php');
    require('functions/tuteur.func.php');
    verifyIfConnected('reportTutor.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>UCP Alter Master</title>
  <link rel="stylesheet" type="text/css" href="style.less" media="screen">
  <script type="text/javascript" src="script.js"></script>
  <style>

td {
  max-width: 230px;
  min-width: 200px;
  white-space: pre-line;
  text-align: center;
}

.td1{
  width: 150px;
}

.td2{
  text-align: left;
}

.tr1{
  text-align: center;
  font-weight: bold;
}

table {
  width: 100%;
  margin-top: 2cm;
  border-spacing: 5px 1.5rem;
}
table td{
  color: #2b686e;
  padding: 10px;
}
table td {
  vertical-align: middle;
}
table td:last-child {
  font-size: 1em;
  line-height: 1.4;
}

table tr:nth-child(2n) {
  background-color: white;
}
table tr:nth-child(2n+1) {
  background-color: #DFF2FF;
}


  </style>
</head>
<body>
  <html>
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
    <?php
    $dbconnexion = connectionDB();

        $nametuteur=$_GET['name'];
        $surnametuteur=$_GET['surname'];
        $result='<div class="container">
                    <div class="row">
                      <div class="col-md-offset-1 col-md-10">
                      <div class="panel panel-default">
                            <div class="panel-heading">
                              </div>
                              <div class="panel-body">
                              <table class="table profile__table">
                              <tr class="tr1"><td>Nom Etudiant</td><td>Prénom Etudiant</td><td>Date de dépôt</td><td>Contenue du compte-rendu</td></tr>';
        $query = "SELECT nameu, surnameu, dater, containr FROM users INNER JOIN tutors ON users.idtut=tutors.idtut INNER JOIN reports ON users.idu=reports.idu WHERE nametut='$nametuteur' AND surnametut='$surnametuteur' ORDER BY nameu, dater";
        $res = pg_query($query) or die('ERREUR SQL : '. $request .  pg_last_error());   
        while ($line = pg_fetch_array($res, null, PGSQL_ASSOC)) {
              $result.='<tr>
                          <td class="td1">'.$line['nameu'].'</td>
                          <td class="td1">'.$line['surnameu'].'</td>
                          <td class="td1">'.$line['dater'].'</td>
                          <td class="td2">'.$line['containr'].'</td>
                        </tr>';
        }

        $result.='</table>
                  </div></div></div></div></div>';



        echo $result;

    ?>




    </html>
</body>
