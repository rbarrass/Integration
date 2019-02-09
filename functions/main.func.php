<?php
function autorizedChar($strchain, $index){
		//name/surname
		if($index==0)	return preg_match('/^[a-zA-Z-ëéèàù]{1,}$/', $strchain);
		//Phone number/age
		elseif ($index==1)	return preg_match('/^[0-9]{1,}$/', $strchain);
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
          </nav>
          <div class="icons">
            <div class="iconsAlert">
              <img onclick="document.getElementById(\'id01\').style.display=\'block\'" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAEjSURBVEhL7daxSsNQFIDhVDsILl20S3ESnFyKIBQtOPQFCj5HoZMudRURFB18hSLoVOhLdOni4BOIdJDSdlT/AxVCOOTe5CSBgD98FDqc2/S2uQn+S1Bl/Vpol1jhHYfyRhHt4hs/a6/IvWO84G9R8YUBasi8TdwgfKVRHzhFpt1DWyxqiSYyqYW4K42aYgPmonvqowNT8snn0IbHuYOpHWiDXeRbMrUHbbDLCKZKt/AYpo6gDXaZwFQX2mCXGUyn1xO0wT5S38G2IPdfbaiPa6SqD22grwXqSNQ+5LjTBiYhNxLvvT7AG7RBadxiG7HJuStHmzbA4gHOrvCcoSFOUM5kr84VbeRaFdpv4BG510P4UegTDRTSGeRvcgF5zi5LQfAL6uodDLILLAkAAAAASUVORK5CYII=" alt="" id="iconsAlertImg">
            </div>

            <div class="export">
              <a style="padding-bottom:10px;" href="functions/exportExcell.php"><img src="https://img.icons8.com/color/48/000000/download.png" alt="" id="exportImg"></a>
            </div>
            <div class="logout">
              <a style="padding-bottom:10px;" href="connect.php?id=login"><img src="https://img.icons8.com/ios-glyphs/30/000000/exit.png" alt="" id="logoutImg"></a>
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

?>