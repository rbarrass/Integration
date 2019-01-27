<?php



function autorizedChar($strchain, $index){
		//name/surname
		if($index==0)	return preg_match('/^[a-zA-Z-ëéèàù]{1,}$/', $strchain);
		//Phone number/age
		elseif ($index==1)	return preg_match('/^[0-9]{1,}$/', $strchain);
}

function displayMenu(){

	$dbconn = pg_connect("dbname=dbnadreamz host=localhost user=nadreamz password=Guillaume95")
	    or die('Connexion impossible : ' . pg_last_error());

	$result = '<nav class="sidenav">
        <ul class="main-buttons">
          <li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAFWSURBVEiJ7ZaxSgNBFEXvSAISUEFFAmrnDwjBLxFLxUKw0SIi+CsKqa0Ff0BbwUqwSqOFihaaoGFROBbuYlyS3TebWbTwdMPO3jOz894y0i/hirwE1CTV4+G9c+4t3JIGCxeAI6DLN13gEJgvS7oCPDKcB6ARWjobB+dxB0xbMseM7j1Jc4Z5dUlNY2Y+wLVhtwlXlkxTVQM9SePGdfacc7VQYozSr1DncnOtZxycPy9+98iMQopvPcQ3IcWnHuITj7nZAEvAq6GHO8BiMHEsXwOiDGkErAaV9slbGeKWT5ZvO30UfDayOOuPVOhSkQlQATbj4hnGE7ABVEIIJ4FdoG2o6IQ2sANMFN3hAfDiIUzzDOybvwAwA5yPIExzRt6tBKgClwGlCRdAtd+VruptScs+x2KkIWkrS7xegnRg9o/eAzqS/KvRRsc5N5UM0hV3XJL0H30C47KaOwL3mHsAAAAASUVORK5CYII=" alt=""></i>
            PROFIL 
            <ul class="hidden">
              <li>Votre profil</li>
              <li>Éditer votre profil</li>
              <li>Rechercher un profil</li>
            </ul>
          </li>
          <li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAACSSURBVEiJ7ZYxDoJAEEXfChXHsLMj8QrWFFZejRtQWVhzDzqPQSUZm4lRWEg2JGvzX/KbmWzebPdBZCIAmFkJ3IBqtr8DJ08Kg+c6m49AF0J44eLa4pzNrF3ZbdH62xg1wMEvKRJ/tIfiW5wdiSWWWGKJJZZY4v+Jp4zOCX7rbcOy9PXA0ZPC03OJSB+feity8AYIRX+72lLnMAAAAABJRU5ErkJggg==" alt=""></i>
            APPRENTIS

            <ul class="hidden">

 			<li><a href="index.php?psd=Alternants">Alternants</a></li>';
            $query = 'SELECT branchcl FROM classrooms';
			$res = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
			while ($line = pg_fetch_array($res, null, PGSQL_ASSOC)) {
    			$result.='
					  <li> <a href="index.php?psd='.$line["branchcl"].'">'.$line["branchcl"].' </a></li>';
 
			}
          $result.='</ul></li>
          <li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAADFwAAAxcBwpsE1QAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAFKSURBVGiB7ZlBTsNADEW/EULsqYpULsQ9ECekqypwHyrWSKGLz6ZI6TTROIwTWZbfqkoyHv+x/0yUCgwgyZbxIiKtOdy0BvDClRCSTyTfSX6zgnUytfnOOXUkd5pgnSLghRDt84ZxDmXeV71JsgdwB+BRRI7aldQ8N4XWIyS3AD4B9CJyfxFjKqk5BlxLyHCucsztnMEtCSw9j0pIDWtB/yHM9ttUkVZvWBKmIinEGya7lgbNztbiuaxIyd+KT63q0jtcmIqEEdLUWmMGHl4btlOaXYnZK0qa3YgwQszOkVrrpNmVrPaulWZXEkaI+cneQpod+fHBH2GEpNm9kWb3RhghaXZvpNm9kUK8EUaIyuwe/rWtEaYiY0J+AIDkw8q5VCG5Of/sy3tjrfUB4BnAl6NjoqQrL4xV5AXAHsBp8XTmcwLwBuC1vPELePhshbpEcpgAAAAASUVORK5CYII=" alt="" style="width: 33px;"></i>
             STATISTIQUES
             <ul class="hidden">
              <li><a href="stat.php">Utilisateurs</a></li>
              <li>Apprentis</li>
              <li>Visites</li>
            </ul>
          </li>
        </ul>
           <a href="https://www.u-cergy.fr/fr/index.html"><img src="./pictures/ucp_logo.png" alt="ucp_logo" id="ucp_logo"></a>
    </nav>
    <div class="iconsAlert">
      <img src="https://img.icons8.com/ios-glyphs/30/000000/alarm.png" alt="alert" id="iconsAlert">
    </div>
    <div class="search__container">
      <input class="search__input" type="text" placeholder="Search">
    </div>
    <div id="export">
      <a href="#">Export Excel <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAALcSURBVEiJ7ZVPaFRXFMZ/35tM3n2DC60oqCi6K7jIopVuRAIiihjMRMi2oGhLA4VaoVhtEVtBFEQlGETxD7ieidhuulCa7toulLaLUmgXEjehNm1i3n2Z5B4XOjbVyUxmEmfVb/Xueeec3zv3vfdd+F9tkmoFS3G8R9JFYNMC+zyR2ce9WXZ5oeCo5tNIl5qAAhRMGhqO4w8WBQbWNwEFswEAkwZLcTywGHBTKmbZkODAM7YGh537tC1ggF7vrxscBILBqZJzx9oCBujz/loVLviy7NzxtoCrcMwOAwacLMXxh68NXEqSrXPXxSy7gHQYkKQztWo6lgIss+/Kzv03aFa9imvVtDLxBNIRg0PAny3UA61MbHYs8v5GgBxxXEA63xZwJP1sSbLTzB5H0pj9u6XN9Wm2wKQ1AUYj6Tcze7MlakvgELrG0vTH3jR9CHS3DYzUfwhmys5tBLY2Sl86MKz8CpIINjDPsTpHM0ifLBX4fA9M7fV+xGCkbqbZkWKaLomB/Ir356qLEMJ7uSjaZrBKZm9L2mXwwkmss/MWWUbZuXtAKHq/feFgs3GkoQBX93n/+2XI3y4U1s5WKqtWTE//ksIfk5Dvh8nhJFkP3MGsC6BvYqJqMN0vt2201Q8N3hn3/qSZ5QBWO3clhDCqXO7+X3F85nuodDp3tuzcTzkIZna24TCNwAZfRFGULnfudi7LxkpJ0ge8W70v6aMu507c935g3PstPWk6itlbJh0NsLFe77pbLbPCtPf/JFCcLhQ2RyHcrJH2WZdzuzAbGZY2B+nbvjQ9Xa8vzPM7lJ2r+uBjM/tc0grgKFBo1DCKonV7p6YePf+guudJu1tzYoNRwTrgDUmDjWBzlUkBQODquHhS+x2bvQ88agZYVefs7H6AkM/vQXrwSoL0wPL5nkbOsyiVYTnOfQNseR76oeL9jn74+7WCAUrLlq3WzMzXAJWOjt39k5NjAE8B4R0LpUbLgRQAAAAASUVORK5CYII=" alt="export"></a>
    </div>';



    return $result;


}


?>