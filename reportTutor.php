<?php
    require('functions/main.func.php');
    require('functions/tuteur.func.php');
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
  <html>
    <?php
      
      $menu = displayMenu();
      echo $menu;
      

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
  $result='<div class="reportdiv">
        <ul>
          <li>
            <h2>Rédiger un Compte-rendu</h2>
          </li>
        </ul>';
        $nametuteur=$_GET['name'];
        $surnametuteur=$_GET['surname'];
        $query = "SELECT nameu, surnameu FROM users INNER JOIN tuteur ON users.idtut=tuteur.idtut WHERE nametut='$nametuteur' AND surnametut='$surnametuteur'";
        $res = pg_query($query) or die('ERREUR SQL : '. $request .  pg_last_error());
        $result.='<form method="post" action="reportTutor.php?name=Lemaire&surname=Marc"> 
              <li><label for="students">Pour quel élève voulez-vous écrire un Compte-rendu ?</label></li>
              <select name="students" id="students" required><br />';
        while ($line = pg_fetch_array($res, null, PGSQL_ASSOC)) {
          $result.='
                         <option value="'.$line["nameu"].' '.$line["surnameu"].'">'.$line["nameu"].' '.$line["surnameu"].'</option>
                     ';
        }

        $result.='</select><br />';
        $result.= '<li>Choix numéro 1 : Téléchargez le docx ci-dessous, remplissez le puis re-déposez le dans le formulaire ci-contre</li>
              <li><a href="pdf_files/fiche_compterendu.docx">Fiche de Compte-rendu</a></li>';

        $result.='<li><input type="file" name="report_file" /></li>';
        $result.= '<li>Choix numéro 2 : Faites votre compte-rendu en quelques lignes </li>';
        $result.='<textarea name="report" id="report"></textarea>';
        $result.='<li><input type="submit" name="submit2" value="Envoyer" /></li>';
        $result.='</form>
              </div>';
        echo $result;
    ?>    
  </html>
</body>