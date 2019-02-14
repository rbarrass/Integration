<?php

function autorizedChar($strchain, $index){
    //name/surname
    if($index==0) return preg_match('/^[a-zA-Z-ëéèàù]{1,}$/', $strchain);
    //Phone number/age
    elseif ($index==1)  return preg_match('/^[0-9]{1,}$/', $strchain);
}


function displayMenu(){

  $dbconn = connectionDB();



  $result = '<nav class="sidenav">
        <ul class="main-buttons">
          <li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAFWSURBVEiJ7ZaxSgNBFEXvSAISUEFFAmrnDwjBLxFLxUKw0SIi+CsKqa0Ff0BbwUqwSqOFihaaoGFROBbuYlyS3TebWbTwdMPO3jOz894y0i/hirwE1CTV4+G9c+4t3JIGCxeAI6DLN13gEJgvS7oCPDKcB6ARWjobB+dxB0xbMseM7j1Jc4Z5dUlNY2Y+wLVhtwlXlkxTVQM9SePGdfacc7VQYozSr1DncnOtZxycPy9+98iMQopvPcQ3IcWnHuITj7nZAEvAq6GHO8BiMHEsXwOiDGkErAaV9slbGeKWT5ZvO30UfDayOOuPVOhSkQlQATbj4hnGE7ABVEIIJ4FdoG2o6IQ2sANMFN3hAfDiIUzzDOybvwAwA5yPIExzRt6tBKgClwGlCRdAtd+VruptScs+x2KkIWkrS7xegnRg9o/eAzqS/KvRRsc5N5UM0hV3XJL0H30C47KaOwL3mHsAAAAASUVORK5CYII=" alt=""></i>
            PROFIL 
            <ul class="hidden">
              <li onclick="location.href=\'profil.php\';">Profil</li>
              <li>Éditer</li>
              <li>Rechercher</li>
            </ul>
          </li>
          <li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAACSSURBVEiJ7ZYxDoJAEEXfChXHsLMj8QrWFFZejRtQWVhzDzqPQSUZm4lRWEg2JGvzX/KbmWzebPdBZCIAmFkJ3IBqtr8DJ08Kg+c6m49AF0J44eLa4pzNrF3ZbdH62xg1wMEvKRJ/tIfiW5wdiSWWWGKJJZZY4v+Jp4zOCX7rbcOy9PXA0ZPC03OJSB+feity8AYIRX+72lLnMAAAAABJRU5ErkJggg==" alt=""></i>
            APPRENTIS

            <ul class="hidden">

      <li onclick="location.href=\'index.php?psd=Alternants\';">Alternants</li>';
            $query = 'SELECT branchcl FROM classrooms';
      $res = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
      while ($line = pg_fetch_array($res, null, PGSQL_ASSOC)) {
          $result.='
            <li onclick="location.href=\'index.php?psd='.$line["branchcl"].'\';">'.$line["branchcl"].'</li>';
 
      }
          $result.='</ul></li>
          <li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAADFwAAAxcBwpsE1QAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAFKSURBVGiB7ZlBTsNADEW/EULsqYpULsQ9ECekqypwHyrWSKGLz6ZI6TTROIwTWZbfqkoyHv+x/0yUCgwgyZbxIiKtOdy0BvDClRCSTyTfSX6zgnUytfnOOXUkd5pgnSLghRDt84ZxDmXeV71JsgdwB+BRRI7aldQ8N4XWIyS3AD4B9CJyfxFjKqk5BlxLyHCucsztnMEtCSw9j0pIDWtB/yHM9ttUkVZvWBKmIinEGya7lgbNztbiuaxIyd+KT63q0jtcmIqEEdLUWmMGHl4btlOaXYnZK0qa3YgwQszOkVrrpNmVrPaulWZXEkaI+cneQpod+fHBH2GEpNm9kWb3RhghaXZvpNm9kUK8EUaIyuwe/rWtEaYiY0J+AIDkw8q5VCG5Of/sy3tjrfUB4BnAl6NjoqQrL4xV5AXAHsBp8XTmcwLwBuC1vPELePhshbpEcpgAAAAASUVORK5CYII=" alt="" style="width: 33px;"></i>
             STATISTIQUES
             <ul class="hidden">
              <li onclick="location.href=\'stat.php\';">Utilisateurs</li>
              <li onclick="location.href=\'tuteur.php?name=Lemaire&surname=Marc\';">Tuteur</li>
              <li>Visites</li>
            </ul>
          </li>
          <li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAKRSURBVEiJ1ZbPS1VBFMe/VyuMFCvRgoJsIYTUqk3WK6RaBEKL8GW0ahX4BxSRkiAEEWLtQghatGvTIhfuCqwI+wHVIrCHkfGkSBSfJRH1Pi3uXJg3zb1Xr8+gL8zmnDnnc+bcmbkj/U8CuoF3ZnT/C2AOeMHfeg7k1gLYCjzwAG2VgXtAazWADcA1YCkFamvJxDRkAdYA54HiCoCuiiZHzXKhcd8xq7zfP7CA2yVdlXROkl3lvKQnksYlvZRUlPTFybNN0k5J+yUdlnRI0mbLX5Z0R1J/EASfI2AdcAkoOZU+BU4D65fVqsqubQDOAM+cnCXDqhPw2NOe61aSWqADuAjcB94Cs8CcGbPAG+O7ABwAaq34IU/+cQGPPI6tJqgf+OT/dImaBvpMjiaP/2G0oki/AKxqVyUnTxkYA04SdcSauxsYWgPwMNBm74MgAkhSEASB7bSDjSYlFSTNKNypUrh7GyXtkNQu60S4+Xy70K2wC5iyiu8BWhKThHGNwBGgDdiSNt8Hnna6ti41yQrlbXVc69NkutIrqUvSLmP+KGlU0q0gCL66Ae6K54wptb1WzFngW8JeWwR60sBjxnQT6zJIgOYJj0uaysCpJHAH8NOYp1KgzcCCB9IJHPXY54EmL9jYTphJAPsSwIO+pbmLcjQQCzb2YeMaSQC/zgB+JeC4ZTjmJG0HfgM/gL0xYPuv1plQoN32BQEFy/DeEzBifB+APR7/ohUf++AjvFgilVxwwROwkfDfDOF76gZwEHOpsIpW91mGyzHVbgLuOsG9xpdtcwH1wAzh46w+rlUmSQ64DUwCo8YWd5xyVLY3UsVxygP5JGhKQdkukGqILFdmFeEtwAAwAXw3YwK4AjTbc/8ApZapJl66GGkAAAAASUVORK5CYII="></i>
             ENREGISTREMENTS
             <ul class="hidden">
              <li onclick="location.href=\'registration_manager.php\';">Approbation</li>
              <li onclick="location.href=\'edition_manager.php\';">Edition</li>
            </ul>
          </li>
          <li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAARASURBVEiJ7ZZPaJN3GMc/pu82u6ZbWJNGZ2s7YRNmLrLC0hYVQ4bdrZtml7U9DemGWGQHRVZIJ6gX6Q6iIkJhO9mygzsomNGTpRdbSFsbqnjYjDH9hzT1T9e8y3eH5H0xaUkT7XFf+F1++X2fz+/P8zxvoHx5gJPATG6cBNyvEadkNQO/AStNTU0aGBjQwMCAmpqaBKwAvwL+zYJVAd8B406nUz09PYrFYipULBZTT0+PqqqqBIznPO++DnA38AvwtKGhQefOndPc3FweLB6PKx6P583Nzc3p7Nmz2rlzp4CnQH8uVlEZwNdAxDCMTCgUUiQSUSaTsQObpqnBwUEFg0E5HI6Mw+FQMBjU4OCgTNO012UyGUUiEYVCIRmGkQEiwFc5hi0P0As88ng8CofDa04yPz+vcDisHTt2CFgCLgKf5sZFYGnXrl06f/685ufn19xMOByW2+0W8CjH8gDc9/l8unz5spaXl/NMExMT6u7ultPpFDAJfA9Ur3Nb1bnfJp1Op7q7uzUxMZEXa3l5WZcuXZLP5xPZamC0vr5efX19a076+PFjuVwuAUdLzg446nK5lEgk8mJZTzE5OSlAAO8AHcCoYRhqb2/X8PCwbaitrRUQKAMcqK2ttf3Dw8Nqb29Xb2/vGvCr+gy45ff7C8EzwN0Sx8yrYL/fL0CnT5/OAxsF4DHgd6DNmjh16hTbtm37xDAKl64v0zRJJpMbrtsw2okTJ0oClqsNwclkktHRUUzTLC2gYdDS0oLX630zcFtbG9FoNEG2H5eit/fu3Vs3Pj6eN/nkyRPGxsZ4+PAhrJNcAFcCgcCmZXUgEBDwDPgnBxTwR6Fpd0VFxb9TU1ObBo5Go6qoqDCBj4uZfjx48KBt6ujosHZbXwa4HnjW2dlpx9m/f7+AvCx1FJiqa2pqgGxZ3LhxA7IlVlcGuA64OzQ0lEmn0wB4PB6A94qZvmlsbLTb2507d9TZ2SlgGthSAnQLEOvq6tLIyIgkKZ1Oq6GhQUComHErED9z5ox9TalUyvqyFDVaG3e73VpaWrL9fX19Av4i25qLqgVIHTlyRKurq5KkCxcuCLgPOIv4qoEH/f39kqTV1VUdPnxYQAr4vIRNA/AR8Pe1a9ckSS9fvlRzc7OAm6xf+wZwq7W1VSsrK5Kkq1evWidtLBVqqcvj8SiZTEqSFhYWtGfPHgEjQBB4Kze+AEZ9Pp8WFxclSYlEwnqeb8uFQjZRbra2turFixf2ex87dkyVlZVWI1BlZaWOHz+uVColSXr+/Ll1O2uaRDlyAVMHDhywT2O937179zQ9PW3ngXUr+/btExAF3n8TMEAN8GddXZ2GhoaUTqdVqHQ6revXr1v/ySLABxsFLaU2IdtofgB+8nq93kOHDrF9+3YAEokEt2/fZnZ2dhb4GbgCZDYLbGkr8CXZkvswN5cgm3C3yH4I/te6+g/cpEGvGnqJ9QAAAABJRU5ErkJggg==" alt="" style="width: 33px;"></i>
            PROMOTION
            <ul class="hidden">';
              $query = 'SELECT DISTINCT promotionu FROM users';
      $res = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
      while ($line = pg_fetch_array($res, null, PGSQL_ASSOC)) {
          $result.='
            <li onclick="location.href=\'index.php?promo='.$line["promotionu"].'\';">'.$line["promotionu"].'</li>';
 
      }
        $result.= '</ul>
          </li>
            <li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAGgSURBVEiJ7Za7SgNBFIb/8QYiFoIiFhJEBAsL0UqiFiKms7C1CIiInYWlhb6AL2DnKwgKgpVXEC2N4A0VC628IUhAP4tMYFw3m91kFYv8zbBz/jPf2ZmdmZUqqiiCgAZgBFgEtoAX4BqY9HpNmaBmSUlJQ5IGJfVLqvGxZiUljDH3+Q4/UyGIkdRnAUnbtoVMr5OUkrQaliegClgCbilPK6GhFjxfJjCvjDtuVQj2UKRKC6sbaPkBBsaBOaAXqHYSzmICG+W+i+8Cnp1peQJmnILi0rIfeN9jurD9TcBHTOCjH1Mtad9TSyfQaox5lJRRPOryA+/6GAcDYqXo2A+8J4kC4J0ygVlJ65LSvlHg1LMmh7a/vYT1XAcWgGGgPrAsYMWTvOHETgIgD8Cr83wTaT6AtJO8BjQ6sQHgzsYugVVgGui28TFy2xB8bqNi4CZgk9zZHOZU8+avWfBEMe+328lunVRUoKMr23YUM0Z+qyLKr23ir8Hntu2Jedxgkfv1eQM+gVmg9i/hUwHbLq4TsCB8FNgG3j3gg18FV/Sv9AVyf9LHA10BdQAAAABJRU5ErkJggg=="></i>
             SURVEILLANCE
             <ul class="hidden">
              <li onclick="location.href=\'logs.php\';">Logs</li>
            </ul>
          </li>
          </ul>
          </nav>';
          

    closeDB($dbconn);

    return $result;


}

function displayIcons(){
  $result = '<div class="icons">
            <div class="iconsAlert">
              <img onclick="document.getElementById(\'id01\').style.display=\'block\'" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAEjSURBVEhL7daxSsNQFIDhVDsILl20S3ESnFyKIBQtOPQFCj5HoZMudRURFB18hSLoVOhLdOni4BOIdJDSdlT/AxVCOOTe5CSBgD98FDqc2/S2uQn+S1Bl/Vpol1jhHYfyRhHt4hs/a6/IvWO84G9R8YUBasi8TdwgfKVRHzhFpt1DWyxqiSYyqYW4K42aYgPmonvqowNT8snn0IbHuYOpHWiDXeRbMrUHbbDLCKZKt/AYpo6gDXaZwFQX2mCXGUyn1xO0wT5S38G2IPdfbaiPa6SqD22grwXqSNQ+5LjTBiYhNxLvvT7AG7RBadxiG7HJuStHmzbA4gHOrvCcoSFOUM5kr84VbeRaFdpv4BG510P4UegTDRTSGeRvcgF5zi5LQfAL6uodDLILLAkAAAAASUVORK5CYII=" alt="" id="iconsAlertImg">
            </div>

            <div class="export">
              <a style="padding-bottom:10px;" href="functions/exportExcell.php"><img src="https://img.icons8.com/color/48/000000/download.png" alt="" id="exportImg"></a>
            </div>
            <div class="logout">
              <a style="padding-bottom:10px;" href="functions/logout.php"><img src="https://img.icons8.com/ios-glyphs/30/000000/exit.png" alt="" id="logoutImg"></a>
            </div>
          </div>        

          <!-- The Modal (contains the "send to all mail" form) -->
          <div class="modal" id="id01">
            <div class="modal-sandbox" id="around"></div>
            <div class="modal-box">
              <div class="modal-header">
                <div class="close-modal" id="cl2">&#10006;</div> 
                <h1>Mail général</h1>
              </div>
              <div class="modal-body">
                <form action="" method=""> <!-- Action to define -->
                  <label for="mailTitle">Titre du mail :</label>
                  <input type="text" name="mailTitle" class="mailTitle" placeholder="Insérer un titre..." required>
                  <textarea class="mailContent" name="story">
                  </textarea>
                  <input type="submit" class="sendMail">
                </form>
                <br />
              </div>
            </div>
          </div> 

          <script>
            // Get the modal
            var modal = document.getElementById(\'id01\');
            var close2 = document.getElementById(\'cl2\');
            var closeAround= document.getElementById(\'around\');
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == close2 || event.target == closeAround) {
                    modal.style.display = "none";
                }
            }
          </script> ';

  return $result;


}
//Get real IP of client even if he use a proxy
function getIp() {
  // IP if shared internet connection
  if (isset($_SERVER['HTTP_CLIENT_IP'])) {
    return $_SERVER['HTTP_CLIENT_IP'];
  }
  // IP through a proxy
  elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    return $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  // Else : simple IP
  else {
    return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
  }
}

function getTheDate(){
  date_default_timezone_set('UTC');
  return date("Y-m-d H:i:s");
}
function logout(){
    session_unset ();
    session_destroy ();
    header ('location: index.php?id=login');
}
function verifyIfConnected($who){
    session_start();
    if($_SESSION['typeu']==$who){
      //do nothing just verify, you cannot verify if != because typeu doesn't exists when a session isn't started
    }else{// if the user know the URL but is not connected, he's redirected to another page
      header('location:connect.php?id=login');
    }
}

/* EDIT PROFIL PART */

//this function serves to modify/complete the profile's informations

function moreInformations($idu){

  //connexion to the database
  include_once("connectDatabase.php");

  $dbconn =connectionDB();

  //this variable serves to return a potential error

  $sizeError="";

  //if there is any form empty do :

  if(isset($_POST['editvalid'])){

      //if the longer of the new name is composed more than 30 caracters do:

     if (strlen($_POST['newname']) > 30){
        $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du nom est limitée à 30 caractères</p>";
      }else{
        $_POST['newname'] = ucfirst(strtolower($_POST['newname']));
        pg_query("UPDATE users SET nameu='".$_POST['newname']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');
      }

      //if the longer of the new surname is composed more than 30 caracters do:

      if (strlen($_POST['newsur']) > 30){
        $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du prénom est limitée à 30 caractères</p>";
      }else{
        $_POST['newsur'] = ucfirst(strtolower($_POST['newsur']));
        pg_query("UPDATE users SET surnameu='".$_POST['newsur']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');
      }

      //if the longer of the new student's id is composed more than 30 caracters do:

      if (strlen($_POST['newid']) > 30){
        $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille de l'id est limitée à 30 caractères</p>";
      }else{
        $_POST['newid'] = ucfirst(strtolower($_POST['newid']));
        pg_query("UPDATE users SET student_idu='".$_POST['newid']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');
      }

      //if the longer of the new email's address is composed more than 30 caracters do:

      if (strlen($_POST['new@']) > 30){
        $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille de l'adresse email est limitée à 30 caractères</p>";
      }else{
        $_POST['new@'] = ucfirst(strtolower($_POST['new@']));
        pg_query("UPDATE users SET emailu='".$_POST['new@']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');
      }

      //if the longer of the new stdent's address is composed more than 100 caracters do:

      if (strlen($_POST['newadr']) > 100){
        $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille de votre adresse est limitée à 100 caractères</p>";
      }else{
        $_POST['newadr'] = ucfirst(strtolower($_POST['newadr']));
        pg_query("UPDATE users SET adru='".$_POST['newadr']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');
      }

      //update of the student's gender

        $_POST['newgender'] = ucfirst(strtolower($_POST['newgender']));
        pg_query("UPDATE users SET genderu='".$_POST['newgender']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');

      //if the longer of the new phone number is composed more than 10 caracters do:

      if (strlen($_POST['newtel']) > 10){
        $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du numero de telephone est limitée à 10 caractères</p>";
      }else{
        $_POST['newtel'] = ucfirst(strtolower($_POST['newtel']));
        pg_query("UPDATE users SET phoneu='".$_POST['newtel']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');
      }

      //if the longer of the new password and the confirmation of the new password are composed more than 30 caracters do:

      if (strlen($_POST['newpwd']) > 30 && strlen($_POST['newpwd']) < 8){
        $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du MDP est limitée à 30 caractères</p>";
      }else{
        if($_POST['newpwd'] == $_POST['newpwd1']){
          $_POST['newpwd'] = ucfirst(strtolower($_POST['newpwd']));
          pg_query("UPDATE users SET passwordu='".$_POST['newpwd']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');
        }else{
          $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: les deux mots de passes ne sont pas identiques</p>";
        }
      }

        $_POST['newPromo'] = ucfirst(strtolower($_POST['newPromo']));
        pg_query("UPDATE users SET promotionu='".$_POST['newPromo']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');

        $_POST['newGroup'] = ucfirst(strtolower($_POST['newGroup']));
        pg_query("UPDATE users SET groupu='".$_POST['newGroup']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');

        //if the longer of the new entreprise's name is composed more than 30 caracters do:

      if ( strlen($_POST['newent']) > 30 ){
        $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du nom de l'entreprise est limitée à 30 caractères</p>";
      }else{
        $_POST['newent'] = ucfirst(strtolower($_POST['newent']));
        pg_query("UPDATE institutions SET namei='".$_POST['newent']."' FROM users WHERE institutions.idu=users.idu AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }

        //if the longer of the new entreprise's address is composed more than 100 caracters do:

      if ( strlen($_POST['newadre']) > 100 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille de l'adresse de l'entreprise est limitée à 100 caractères</p>";
      }else{
        $_POST['newadre'] = ucfirst(strtolower($_POST['newadre']));
        pg_query("UPDATE institutions SET adri='".$_POST['newadre']."'FROM users WHERE institutions.idu=users.idu AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }

      if ( strlen($_POST['newtut']) > 30 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du nom de votre tuteur est limitée à 30 caractères</p>";
      }else{
        $_POST['newtut'] = ucfirst(strtolower($_POST['newtut']));
        pg_query("UPDATE tuteur SET nametut='".$_POST['newtut']."'FROM users WHERE tuteur.idtut=users.idu AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }

      closeDB($dbconn);
      $sizeError="ok";
  }else{

  }
  return $sizeError;
}

function send($idu){

$boundary = "-----=" . md5( uniqid ( rand() ) );
$headers = "Reply-to: \"noReplyUCP\" <noReplyUCP@u-cergy.net>\n"; 
$headers .= "From: \"noReplyUCP\"<noReplyUCP@u-cergy.net>\n";
//NOTE: l'adresse email indiquée dans le header From doit etre l'adresse absolue du serveur qui envoie les messages, et peut etre differente de votre adresse de contact si vous etes par exemple sur un serveur dedié partagé. dans mon cas l'adresse specifiee ici est <webusers@mail.nomduserveur.com>
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-Type: text/html; boundary=\"$boundary\"";
//g.ducroux@outlook.fr
//throwaraccoon@gmail.com
//julom78@gmail.com

$link="http://localhost/profil.php?idu=".$idu.""; // à modifier

$destinataire = "throwaraccoon@gmail.com";

$subject = "Validation de votre inscription";

$message_txt  = "Finissez votre inscription en cliquant sur ce lien : ".$link."\n\n";

$message_html  = "<html>\n";
$message_html .= "<body>\n";
$message_html .= "<p>Finissez votre inscription en cliquant sur ce lien : ".$link."\n\n</p><br><br>";


$message = $message_html;
$message .= "\n\n";
$message .= "<p style='display:none;'>".$boundary."</p>\n";
$message .= "</body>\n";
$message .= "</html>\n";
$mail_from="noReplyUCP@u-cergy.net";

mail($destinataire,$subject,$message,$headers);

}

function sendToSecretary($idu){
  include_once("connectDatabase.php");

  $dbconn =connectionDB();

  $req = pg_query("SELECT nameu FROM users WHERE idu='".$idu."'") or die('Erreur dans la table users');
  $array[0] = pg_fetch_array($req, null, PGSQL_ASSOC);

  $req = pg_query("SELECT surnameu FROM users WHERE idu='".$idu."'") or die('Erreur dans la table users');
  $array[1] = pg_fetch_array($req, null, PGSQL_ASSOC);

  closeDB($dbconn);

  $boundary = "-----=" . md5( uniqid ( rand() ) );
  $headers = "Reply-to: \"noReplyUCP\" <noReplyUCP@u-cergy.net>\n"; 
  $headers .= "From: \"noReplyUCP\"<noReplyUCP@u-cergy.net>\n";

  $headers .= "MIME-Version: 1.0\n";
  $headers .= "Content-Type: text/html; boundary=\"$boundary\"";

  $destinataire = "julom78@gmail.com";

  $subject = "Une inscription a été validée";

  $message_txt  = "L'inscrption de ".$array[1]['surnameu']." ".$array[0]['nameu']." a bien été validée.\n\n";

  $message_html  = "<html>\n";
  $message_html .= "<body>\n";
  $message_html .= "<p>L'inscrption de ".$array[1]['surnameu']." ".$array[0]['nameu']." a bien été validée.</p><br><br>";


  $message = $message_html;
  $message .= "\n\n";
  $message .= "<p style='display:none;'>".$boundary."</p>\n";
  $message .= "</body>\n";
  $message .= "</html>\n";


  mail($destinataire,$subject,$message,$headers);

}

function validProfile($idu){
  include_once("connectDatabase.php");
  $dbconn = connectionDB();
  pg_query("UPDATE users SET validationu='OK'") or die('Erreur dans la table users');
  closeDB($dbconn);

  sendToSecretary($idu);
}

?>