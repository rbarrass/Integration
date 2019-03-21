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
    .header {
  background-color: #0198E1;
  color: white;
  font-size: 1.5em;
  padding: 1rem;
  text-transform: uppercase;
  width: 2600px;
}

.ppStudent {
  border-radius: 50%;
  height: 60px;
  width: 60px;
}

.table-users {
  border: 1px solid #DFF2FF;
  border-radius: 10px;
  max-width: calc(100% - 400px);
  margin: 3em auto;
  width: 1400px;
  margin-left:18%;
  overflow-x: auto;
  white-space: nowrap;
  table-layout: fixed;
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);}
th,td{
  max-width: 230px;
  min-width: 200px;
  white-space: pre-line;
}
table {
  width: 100%;
}
table td, table th {
  color: #2b686e;
  padding: 10px;
}
table td {
  text-align: center;
  vertical-align: middle;
}
table td:last-child {
  font-size: 0.95em;
  line-height: 1.4;
  text-align: left;
}
table th {
  background-color: #87CEFA;
  font-weight: 300;
}
table tr:nth-child(2n) {
  background-color: white;
}
table tr:nth-child(2n+1) {
  background-color: #DFF2FF;
}

@media screen and (max-width: 700px) {
  table, tr, td {
    display: block;
  }

  td:first-child {
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
    width: 100px;
  }
  td:not(:first-child) {
    clear: both;
    margin-left: 100px;
    padding: 4px 20px 4px 90px;
    position: relative;
    text-align: left;
  }
  td:not(:first-child):before {
    color: #91ced4;
    content: '';
    display: block;
    left: 0;
    position: absolute;
  }
  td:nth-child(2):before {
    content: 'Name:';
  }
  td:nth-child(3):before {
    content: 'Email:';
  }
  td:nth-child(4):before {
    content: 'Phone:';
  }
  td:nth-child(5):before {
    content: 'Comments:';
  }

  tr {
    padding: 10px 0;
    position: relative;
  }
  tr:first-child {
    display: none;
  }
}
@media screen and (max-width: 500px) {
  .header {
    background-color: transparent;
    color: white;
    font-size: 2em;
    font-weight: 700;
    padding: 0;
    text-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);
  }

  .ppStudent {
    border: 3px solid;
    border-color: #daeff1;
    height: 100px;
    margin: 0.5rem 0;
    width: 100px;
  }

  td:first-child {
    background-color: #c8e7ea;
    border-bottom: 1px solid #91ced4;
    border-radius: 10px 10px 0 0;
    position: relative;
    top: 0;
    -webkit-transform: translateY(0);
            transform: translateY(0);
    width: 100%;
  }
  td:not(:first-child) {
    margin: 0;
    padding: 5px 1em;
    width: 100%;
  }
  td:not(:first-child):before {
    font-size: .8em;
    padding-top: 0.3em;
    position: relative;
  }
  td:last-child {
    padding-bottom: 1rem !important;
  }

  tr {
    background-color: white !important;
    border: 1px solid #6cbec6;
    border-radius: 10px;
    box-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);
    margin: 0.5rem 0;
    padding: 0;
  }

  .table-users {
    border: none;
    box-shadow: none;
    overflow: visible;
  }
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
          <form action="reportTutor.php?name='.$nametuteur.'&surname='.$surnametuteur.'" method="post" enctype="multipart/form-data">
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
                                      <input type="radio" value="'.$line["emailu"].'" name="student" required/>
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