<?php
    require('functions/main.func.php');
    require('functions/tuteur.func.php');
    verifyIfConnected('reportTutor.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="style.less" media="screen">
  <script type="text/javascript" src="script.js"></script>
  <style>
    textarea {
      -webkit-transition: all 0.30s ease-in-out;
      -moz-transition: all 0.30s ease-in-out;
      -ms-transition: all 0.30s ease-in-out;
      -o-transition: all 0.30s ease-in-out;
      outline: none;
      padding: 3px 0px 3px 3px;
      margin: 5px 1px 3px 0px;
      border: 1px solid #DDDDDD;
      width: 80%;
      margin-left: 5%;
      height: 50px;
    }
    textarea:focus {
      box-shadow: 0 0 5px rgba(81, 203, 238, 1);
      padding: 3px 0px 3px 3px;
      margin-left: 5%;
      height: 300px;
      border: 1px solid rgba(81, 203, 238, 1);
    }
    input[type=submit], input[type=file]{
      background-color: #0198E1;
      border-color: #0198E1;
      color: white;
      margin: 8px 0;
      border-radius:4px;
      cursor: pointer;
      width: 70%;
      box-shadow: 0 0 20px 0 rgba(0,0,0,0.2), 0 5px 5px rgba(0,0,0,0.24);
      transition: 1s;
      height:33px;
      margin-left: 10%;
    }
    input[type=submit]:hover, input[type=file]:hover{
      background-color: white;
      color: #0198E1;
      border: 1px solid #0198E1;
      border-radius:4px;
    }
    p{
      margin: 5%;
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
        $query = "SELECT nameu, surnameu, emailu FROM users INNER JOIN tutors ON users.idtut=tutors.idtut WHERE nametut='$nametuteur' AND surnametut='$surnametuteur'";
        $res = pg_query($query) or die('ERREUR SQL : '. $request .  pg_last_error());
        $result= '
        <div class="choiceStudent">
          <form action="reportTutor.php?name=Lemaire&surname=Marc" method="post" enctype="multipart/form-data">
              <p><br/>Pour quel(le) élève voulez-vous écrire un compte-rendu ?</p>
              <table cellspacing="0">
              ';
              while ($line = pg_fetch_array($res, null, PGSQL_ASSOC)) {
                $result.='
                               <tr>
                                    <td><img class="ppStudent" src="http://lorempixel.com/100/100/people/1" alt="" /></td>
                                    <td>'.$line["nameu"].'</td>
                                    <td>'.$line["surnameu"].'</td>
                                    <td>
                                      <label class="radio">
                                      <input type="radio" value="'.$line["emailu"].'" name="student" />
                                      <span>Choix</span>
                                      </label>
                                    </td>
                                </tr>
                           ';
              }
              $result.='
            </table>
            </div>
            <div class="choices">
              <div class="choiceOne">
                <p><b>Choix numéro 1 :</b> Téléchargez le docx ci-dessous, remplissez le puis re-déposez le dans le formulaire ci-contre</p>
                <p><a href="pdf_files/fiche_compterendu.docx">Fiche de Compte-rendu</a></p>
                <input type="file" name="tutfile" id="tutfile" onchange="loadFile(event)" />
                <li><input type="submit" name="submit1" value="Envoyer" /></li>
              </div>
              <div class="choiceTwo">
                <p><b>Choix numéro 2 :</b> Faites votre compte-rendu en quelques lignes. </p>
                <textarea name="report" id="report"></textarea>
                <li><input type="submit" name="submit2" value="Envoyer" /></li>
              </div>
          </form>
        </div>';
        echo $result;
    ?>
    <?php
      
      $histbord = dispBordReport();
      echo $histbord;
      

    ?>
  </html>
</body>