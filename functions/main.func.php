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
              <li>Apprentis</li>
              <li>Visites</li>
            </ul>
          </li>
          <li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAKRSURBVEiJ1ZbPS1VBFMe/VyuMFCvRgoJsIYTUqk3WK6RaBEKL8GW0ahX4BxSRkiAEEWLtQghatGvTIhfuCqwI+wHVIrCHkfGkSBSfJRH1Pi3uXJg3zb1Xr8+gL8zmnDnnc+bcmbkj/U8CuoF3ZnT/C2AOeMHfeg7k1gLYCjzwAG2VgXtAazWADcA1YCkFamvJxDRkAdYA54HiCoCuiiZHzXKhcd8xq7zfP7CA2yVdlXROkl3lvKQnksYlvZRUlPTFybNN0k5J+yUdlnRI0mbLX5Z0R1J/EASfI2AdcAkoOZU+BU4D65fVqsqubQDOAM+cnCXDqhPw2NOe61aSWqADuAjcB94Cs8CcGbPAG+O7ABwAaq34IU/+cQGPPI6tJqgf+OT/dImaBvpMjiaP/2G0oki/AKxqVyUnTxkYA04SdcSauxsYWgPwMNBm74MgAkhSEASB7bSDjSYlFSTNKNypUrh7GyXtkNQu60S4+Xy70K2wC5iyiu8BWhKThHGNwBGgDdiSNt8Hnna6ti41yQrlbXVc69NkutIrqUvSLmP+KGlU0q0gCL66Ae6K54wptb1WzFngW8JeWwR60sBjxnQT6zJIgOYJj0uaysCpJHAH8NOYp1KgzcCCB9IJHPXY54EmL9jYTphJAPsSwIO+pbmLcjQQCzb2YeMaSQC/zgB+JeC4ZTjmJG0HfgM/gL0xYPuv1plQoN32BQEFy/DeEzBifB+APR7/ohUf++AjvFgilVxwwROwkfDfDOF76gZwEHOpsIpW91mGyzHVbgLuOsG9xpdtcwH1wAzh46w+rlUmSQ64DUwCo8YWd5xyVLY3UsVxygP5JGhKQdkukGqILFdmFeEtwAAwAXw3YwK4AjTbc/8ApZapJl66GGkAAAAASUVORK5CYII="></i>
             ENREGISTREMENTS
             <ul class="hidden">
              <li onclick="location.href=\'registration_manager.php\';">Approbation</li>
              <li>Edition</li>
            </ul>
          </li>
        </ul>
    </nav>
    <div class="iconsAlert">
      <img src="https://img.icons8.com/ios-glyphs/30/000000/alarm.png" alt="alert" id="iconsAlert">
    </div>

    <div id="export">
      <a style="padding-bottom:10px;" href="functions/exportExcell.php">Export Excel <img src="https://img.icons8.com/color/48/000000/download.png" alt="export"></a>
    </div>';



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