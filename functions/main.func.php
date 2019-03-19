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
            </ul>
          </li>
          <li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAACSSURBVEiJ7ZYxDoJAEEXfChXHsLMj8QrWFFZejRtQWVhzDzqPQSUZm4lRWEg2JGvzX/KbmWzebPdBZCIAmFkJ3IBqtr8DJ08Kg+c6m49AF0J44eLa4pzNrF3ZbdH62xg1wMEvKRJ/tIfiW5wdiSWWWGKJJZZY4v+Jp4zOCX7rbcOy9PXA0ZPC03OJSB+feity8AYIRX+72lLnMAAAAABJRU5ErkJggg==" alt=""></i>
            APPRENTIS

            <ul class="hidden">

      <li onclick="location.href=\'index.php?psd=Alternants\';">Alternants</li>';
            $query = 'SELECT DISTINCT branchcl FROM classrooms';
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
              <li onclick="location.href=\'reportTutor.php?name=Lemaire&surname=Marc\';">Compte-Rendu</li>
            </ul>
          </li>
          <li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAKRSURBVEiJ1ZbPS1VBFMe/VyuMFCvRgoJsIYTUqk3WK6RaBEKL8GW0ahX4BxSRkiAEEWLtQghatGvTIhfuCqwI+wHVIrCHkfGkSBSfJRH1Pi3uXJg3zb1Xr8+gL8zmnDnnc+bcmbkj/U8CuoF3ZnT/C2AOeMHfeg7k1gLYCjzwAG2VgXtAazWADcA1YCkFamvJxDRkAdYA54HiCoCuiiZHzXKhcd8xq7zfP7CA2yVdlXROkl3lvKQnksYlvZRUlPTFybNN0k5J+yUdlnRI0mbLX5Z0R1J/EASfI2AdcAkoOZU+BU4D65fVqsqubQDOAM+cnCXDqhPw2NOe61aSWqADuAjcB94Cs8CcGbPAG+O7ABwAaq34IU/+cQGPPI6tJqgf+OT/dImaBvpMjiaP/2G0oki/AKxqVyUnTxkYA04SdcSauxsYWgPwMNBm74MgAkhSEASB7bSDjSYlFSTNKNypUrh7GyXtkNQu60S4+Xy70K2wC5iyiu8BWhKThHGNwBGgDdiSNt8Hnna6ti41yQrlbXVc69NkutIrqUvSLmP+KGlU0q0gCL66Ae6K54wptb1WzFngW8JeWwR60sBjxnQT6zJIgOYJj0uaysCpJHAH8NOYp1KgzcCCB9IJHPXY54EmL9jYTphJAPsSwIO+pbmLcjQQCzb2YeMaSQC/zgB+JeC4ZTjmJG0HfgM/gL0xYPuv1plQoN32BQEFy/DeEzBifB+APR7/ohUf++AjvFgilVxwwROwkfDfDOF76gZwEHOpsIpW91mGyzHVbgLuOsG9xpdtcwH1wAzh46w+rlUmSQ64DUwCo8YWd5xyVLY3UsVxygP5JGhKQdkukGqILFdmFeEtwAAwAXw3YwK4AjTbc/8ApZapJl66GGkAAAAASUVORK5CYII="></i>
             ENREGISTREMENTS
             <ul class="hidden">
              <li onclick="location.href=\'registration_manager.php\';">Approbation</li>
              <li onclick="location.href=\'registration_tutor_student.php\';">Valider tuteurs</li>
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

//We have two tables in db (tutor and users), this fonction look if connected visitor is an user ok tutor
function isTutor($email){
  $dbconn = connectionDB();
  $reqIdu=pg_query("SELECT idu FROM users WHERE emailu='".$email."';") or die('ERREUR SQL : '. $requestUserId .   pg_last_error()); 
  $idu = pg_fetch_array($reqIdu,null,PGSQL_ASSOC); 
  if ($idu != NULL) {
    //He is a simple user
    return FALSE;
  } else {
    $reqIdtut=pg_query("SELECT idtut FROM tutors WHERE emailtut='".$email."';") or die('ERREUR SQL : '. $requestUserId .   pg_last_error()); 
    $idtut = pg_fetch_array($reqIdtut,null,PGSQL_ASSOC);
    if ($idtut != NULL) {
      //He is a tutor
      return TRUE; 
    } else {
      echo "Error : L'email n'apparait pas dant la base (isTutor())";
      return FALSE;
    }
  }
  closeDB($dbconn);

}

//This function return name and surname of user/tutor
function getNameSurname($email){
  if(isTutor($email)){
    $req=pg_query("SELECT nametut,surnametut FROM tutors WHERE emailtut='".$email."';") or die('ERREUR SQL : '. $requestUserId .   pg_last_error()); 
    $array = pg_fetch_array($req,null,PGSQL_ASSOC);
    $surnameName = array($array['nametut'],$array['surnametut']);
  } else {
    $req=pg_query("SELECT nameu,surnameu FROM users WHERE emailu='".$email."';") or die('ERREUR SQL : '. $requestUserId .   pg_last_error()); 
    $array = pg_fetch_array($req,null,PGSQL_ASSOC);
    $surnameName = array($array['nameu'],$array['surnameu']);
  }

  //$name
  return $surnameName;
}

//This function check if this type of user is autorized to visit the web page
function verifyIfConnected($page){
    session_start();
    //Check user is connected
    if (isset($_SESSION['typeu'])) {
      //Get surname and name of visitor because we need it for some pages
      $tabSurnameName = getNameSurname($_SESSION['email-address']);

      $typeU = $_SESSION['typeu'];
      echo $typeU;
      //This switch case define pages availables for each type of user
      switch ($typeU) {
        case 'student':
            if ($page == 'profil.php'){
              //So it's available, we do nothing
            }else {
              //Redirect to a default page
              header('location: profil.php');
            }
            break;
        case 'tutor':
            if (($page == 'profil.php') || $page == 'tuteur.php?name='.$tabSurnameName(0).'&surname='.$tabSurnameName(1)){
              //So it's available, we do nothing
            }else {
              //Redirect to a default page page
              echo '<script>document.location.href="profil.php;</script>';
            }
            break;
        case 'intershipsupervisor':
            break;
        case 'supervisor':
            break;
        case 'administrator':
            break;  
        default :
          echo '<script>document.location.href="profil.php;</script>';
      }
    
    //Else he is not, so he can only visit cennect.php
    }else{// if the user know the URL but is not connected, he's redirected to another page
      //header('location:connect.php?id=login');
      //  echo '<meta http-equiv="refresh" content="5; URL=http://www.connect.php">';
      echo '<script>document.location.href="connect.php?id=login";</script>';
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

    if (isset($_POST['newname']) && $_POST['newname']!==''){
      //if the length of the new name is composed more than 30 characters do:
         if (strlen($_POST['newname']) > 30){
        $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du nom est limitée à 30 caractères</p>";
      }else{
        pg_query("UPDATE users SET nameu='".$_POST['newname']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newsur']) && $_POST['newsur']!==''){
      //if the length of the new surname is composed more than 30 characters do:
      if (strlen($_POST['newsur']) > 30){
        $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du prénom est limitée à 30 caractères</p>";
      }else{
        pg_query("UPDATE users SET surnameu='".$_POST['newsur']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');
      }
    }

    if (isset($_POST['new@']) && $_POST['new@']!==''){
      //if the length of the new email's address is composed more than 30 characters do:
      if (strlen($_POST['new@']) > 30){
        $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille de l'adresse email est limitée à 30 caractères</p>";
      }else{
        pg_query("UPDATE users SET emailu='".$_POST['new@']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newadr']) && $_POST['newadr']!=='' ){
        //if the length of the new stdent's address is composed more than 100 characters do:
        if (strlen($_POST['newadr']) > 100){
          $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille de votre adresse est limitée à 100 caractères</p>";
        }else{
          pg_query("UPDATE users SET adru='".$_POST['newadr']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');
        }
      
    }

    if ($_POST['newgender']!==''){
      //update of the student's gender
        pg_query("UPDATE users SET genderu='".$_POST['newgender']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');
    }

    if ( isset($_POST['newtel']) && $_POST['newtel']!==''){
      //if the length of the new phone number is composed more than 10 characters do:
      if (strlen($_POST['newtel']) > 10){
        $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du numero de telephone est limitée à 10 caractères</p>";
      }else{
        pg_query("UPDATE users SET phoneu='".$_POST['newtel']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newpwd']) && $_POST['newpwd']!==''){
      //if the length of the new password and the confirmation of the new password are composed more than 30 characters do:
      if (strlen($_POST['newpwd']) > 30 && strlen($_POST['newpwd']) < 8){
        $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du MDP est limitée à 30 caractères</p>";
      }else{
        //if passwords matches do:
        if($_POST['newpwd'] == $_POST['newpwd1']){
          $_POST['newpwd'] = crypt($_POST['newpwd'], 'rl');
          pg_query("UPDATE users SET passwordu='".$_POST['newpwd']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');
        }else{
          $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: les deux mots de passes ne sont pas identiques</p>";
        }
      }
    }

     if ($_POST['newPromo']!=='' && $_POST['newGroup']!==''){
       $req=pg_query("SELECT idcl FROM classrooms WHERE branchcl='".$_POST['newPromo']."' AND groupcl='".$_POST['newGroup']."' ") or die('Erreur dans la table users');
       $array[0] = pg_fetch_array($req, null, PGSQL_ASSOC);

       pg_query("UPDATE users SET idcl='".$array[0]['idcl']."' WHERE idu='".$idu."' ") or die('Erreur dans la table users');
    }

    if ( isset($_POST['newent']) && $_POST['newent']!==''){
        //if the length of the new entreprise's name is composed more than 30 characters do:
      if ( strlen($_POST['newent']) > 30 ){
        $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du nom de l'entreprise est limitée à 30 caractères</p>";
      }else{
        pg_query("UPDATE institutions SET namei='".$_POST['newent']."' FROM users WHERE users.idi=institutions.idi AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newadre']) && $_POST['newadre']!==''){
        //if the length of the new entreprise's address is composed more than 100 characters do:
      if ( strlen($_POST['newadre']) > 100 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille de l'adresse de l'entreprise est limitée à 100 caractères</p>";
      }else{
        pg_query("UPDATE institutions SET adri='".$_POST['newadre']."'FROM users WHERE users.idi=institutions.idi AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newnat']) && $_POST['newnat']!==''){
      // if the length of the nationality's name is composed more than 30 characters do:
      if ( strlen($_POST['newnat']) > 30 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du nom de votre nationalité est limitée à 30 caractères</p>";
      }else{
        pg_query("UPDATE users SET nationality='".$_POST['newnat']."' WHERE users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

      if (isset($_POST['newdbir']) && $_POST['newdbir']!==''){
        pg_query("UPDATE users SET dateofbirth='".$_POST['newdbir']."' WHERE users.idu='".$idu."'") or die('Erreur dans la table users');
      }

      if ( isset($_POST['newpbir']) && $_POST['newpbir']!==''){
        //if the length of the new place of birth is composed more than 100 characters do:
        if ( strlen($_POST['newpbir']) > 100 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du nom du lieu de naissance est limitée à 100 caractères</p>";
        }else{
        pg_query("UPDATE users SET placeofbirth='".$_POST['newpbir']."' WHERE users.idu='".$idu."'") or die('Erreur dans la table users');
        }
      }

    if ( isset($_POST['newpostent']) && $_POST['newpostent']!==''){
        //if the length of the new postal code is composed more than 5 characters do:
      if ( strlen($_POST['newpostent']) > 5 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du code postal est limitée à 5 caractères</p>";
      }else{
        pg_query("UPDATE institutions SET postalcode='".$_POST['newpostent']."'FROM users WHERE users.idi=institutions.idi AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newcity']) && $_POST['newcity']!==''){
        //if the length of the new city's name is composed more than 50 characters do:
      if ( strlen($_POST['newcity']) > 50 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du nom de la ville est limitée à 50 caractères</p>";
      }else{
        pg_query("UPDATE institutions SET city='".$_POST['newcity']."'FROM users WHERE users.idi=institutions.idi AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

    if (isset($_POST['newnbsal']) && $_POST['newnbsal']!==''){
        //if the worker's number is more than 1 000 000 do:
      if ( strlen($_POST['newnbsal']) > 1000000 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du nombre de salariés ne peut pas être supérieur à 1 000 000</p>";
      }else{
        pg_query("UPDATE institutions SET nbworkers='".$_POST['newnbsal']."'FROM users WHERE users.idi=institutions.idi AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newnumsir']) && $_POST['newnumsir']!==''){
        //if the siret's number is more than 14 do:
      if ( strlen($_POST['newnumsir']) > 14 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du numéro de siret ne peut pas être supérieur à 14</p>";
      }else{
        pg_query("UPDATE institutions SET siret='".$_POST['newnumsir']."'FROM users WHERE users.idi=institutions.idi AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newcdenaf']) && $_POST['newcdenaf']!==''){
        //if the naf's code is more than 10 do:
      if ( strlen($_POST['newcdenaf']) > 10 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du code naf ne peut pas être supérieur à 10</p>";
      }else{
        pg_query("UPDATE institutions SET naf='".$_POST['newcdenaf']."'FROM users WHERE users.idi=institutions.idi AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newnumconvco']) && $_POST['newnumconvco']!==''){
        //if the length of the collective agreement's number is composed more than 50 characters do:
      if ( strlen($_POST['newnumconvco']) > 50 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du numéro de convention collective ne peut pas être supérieur à 10</p>";
      }else{
        pg_query("UPDATE institutions SET collectiveAgreement = '".$_POST['newnumconvco']."' FROM users WHERE users.idi=institutions.idi AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newconvco']) && $_POST['newconvco']!==''){
        //if the length of the collective agreement is composed more than 50 characters do:
      if ( strlen($_POST['newconvco']) > 50 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille de l'intitulé de la convention collective ne peut pas être supérieur à 50</p>";
      }else{
        pg_query("UPDATE institutions SET intcollectiveAgreement='".$_POST['newconvco']."'FROM users WHERE users.idi=institutions.idi AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newnumtva']) && $_POST['newnumtva']!==''){
        //if the length of the tva's number is composed more than 30 characters do:
      if ( strlen($_POST['newnumtva']) > 30 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du numéro de tva ne peut pas être supérieur à 30</p>";
      }else{
        pg_query("UPDATE institutions SET tva='".$_POST['newnumtva']."'FROM users WHERE users.idi=institutions.idi AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newrtrt']) && $_POST['newrtrt']!==''){
        //if the length of the retirement's name is composed more than 30 characters do:
      if ( strlen($_POST['newrtrt']) > 30 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du nom de la Caisse de retraite complémentaire non cadre ne peut pas être supérieur à 30</p>";
      }else{
        pg_query("UPDATE institutions SET retirement='".$_POST['newrtrt']."'FROM users WHERE users.idi=institutions.idi AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

    if ($_POST['newAff']!==''){
        pg_query("UPDATE institutions SET affiliation='".$_POST['newAff']."'FROM users WHERE users.idi=institutions.idi AND users.idu='".$idu."'") or die('Erreur dans la table users');
    }

    if ( isset($_POST['newweb']) && $_POST['newweb']!==''){
        //if the length of the webSite's name is composed more than 30 characters do:
      if ( strlen($_POST['newweb']) > 30 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La taille du nom du site web ne peut pas être supérieur à 30</p>";
      }else{
        pg_query("UPDATE institutions SET webSite='".$_POST['newweb']."'FROM users WHERE users.idi=institutions.idi AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newdfirst']) && $_POST['newdfirst']!==''){
        pg_query("UPDATE users SET enddate='".$_POST['newdfirst']."' WHERE users.idu='".$idu."'") or die('Erreur dans la table users');
    }

    if ( isset($_POST['newdend']) && $_POST['newdend']!==''){
        pg_query("UPDATE users SET begindate='".$_POST['newdend']."' WHERE users.idu='".$idu."'") or die('Erreur dans la table users');
    }

    if ( isset($_POST['newjapp']) && $_POST['newjapp']!==''){
        //if the job's description is composed more than 100 characters do:
      if ( strlen($_POST['newjapp']) > 100 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La description du job ne peut pas être supérieur à 100 caractères</p>";
      }else{
        pg_query("UPDATE users SET job='".$_POST['newjapp']."' WHERE users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newmiss']) && $_POST['newmiss']!==''){
        //if the mission's description is composed more than 500 characters do:
      if ( strlen($_POST['newmiss']) > 500 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La description de la mission ne peut pas être supérieur à 500 caractères</p>";
      }else{
        pg_query("UPDATE users SET typejob='".$_POST['newmiss']."' WHERE users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newtech']) && $_POST['newtech']!==''){
        //if the mission's description is composed more than 500 characters do:
      if ( strlen($_POST['newtech']) > 500 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La description des outils et technologies mises en oeuvre ne peut pas être supérieur à 500 caractères</p>";
      }else{
        pg_query("UPDATE users SET technologies='".$_POST['newtech']."' WHERE users.idu='".$idu."'") or die('Erreur dans la table users');
      }
    }

    if ( isset($_POST['newenttel']) && $_POST['newenttel']!==''){
        //if the mission's description is composed more than 500 characters do:
      if ( strlen($_POST['newenttel']) > 500 ){
         $sizeError.="<p style='text-align: center; font-weight: bold; color: red;'>Erreur: La description des outils et technologies mises en oeuvre ne peut pas être supérieur à 500 caractères</p>";
      }else{
        pg_query("UPDATE institutions SET phonei='".$_POST['newenttel']."'FROM users WHERE users.idi=institutions.idi AND users.idu='".$idu."'") or die('Erreur dans la table users');
      }
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
  pg_query("UPDATE users SET validationu='OK' WHERE idu='".$idu."'") or die('Erreur dans la table users');
  closeDB($dbconn);

  sendToSecretary($idu);
}
/* Allow to redirect the supervisor when this one looking for a student using the searchBar */
if(isset($_POST['search'])){
  searchStudent();
}
/* We search the user by its user ID */
function searchStudent(){
  include_once("connectDatabase.php");
  if(!empty($_POST['search'])){
    $data = $_POST['search'];
    $name = explode(" ", $data);
    $family_name=$name[0];
    $surname = $name[1];
    $dbconn= connectionDB();
    $requestUser = "SELECT idU FROM users WHERE nameu='".$family_name."' AND surnameu='".$surname."'";
    $resultUser = pg_query($requestUser) or die('ERREUR SQL : '. $requestUser .   pg_last_error());
    $userId = pg_fetch_result($resultUser, 'idu');
    header('location: ../profil.php?idu='.$userId.'');
  }
}
?>