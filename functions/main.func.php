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
              <li onclick="location.href=\'profil.php\';">Profil</li>
              <li>Éditer</li>
              <li>Rechercher</li>
            </ul>
          </li>
          <li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAACSSURBVEiJ7ZYxDoJAEEXfChXHsLMj8QrWFFZejRtQWVhzDzqPQSUZm4lRWEg2JGvzX/KbmWzebPdBZCIAmFkJ3IBqtr8DJ08Kg+c6m49AF0J44eLa4pzNrF3ZbdH62xg1wMEvKRJ/tIfiW5wdiSWWWGKJJZZY4v+Jp4zOCX7rbcOy9PXA0ZPC03OJSB+feity8AYIRX+72lLnMAAAAABJRU5ErkJggg==" alt=""></i>
            APPRENTIS

            <ul class="hidden">
            <li>2018-2019
            <ul class="hidden">

             			<li onclick="location.href=\'index.php?psd=Alternants\';">Alternants</li>';
                        $query = 'SELECT branchcl FROM classrooms';
            			$res = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
            			while ($line = pg_fetch_array($res, null, PGSQL_ASSOC)) {
                			$result.='
            					  <li onclick="location.href=\'index.php?psd='.$line["branchcl"].'\';">'.$line["branchcl"].'</li>';
             
            			}
          $result.='</ul></li></ul></li>
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
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAARASURBVEiJ7ZZPaJN3GMc/pu82u6ZbWJNGZ2s7YRNmLrLC0hYVQ4bdrZtml7U9DemGWGQHRVZIJ6gX6Q6iIkJhO9mygzsomNGTpRdbSFsbqnjYjDH9hzT1T9e8y3eH5H0xaUkT7XFf+F1++X2fz+/P8zxvoHx5gJPATG6cBNyvEadkNQO/AStNTU0aGBjQwMCAmpqaBKwAvwL+zYJVAd8B406nUz09PYrFYipULBZTT0+PqqqqBIznPO++DnA38AvwtKGhQefOndPc3FweLB6PKx6P583Nzc3p7Nmz2rlzp4CnQH8uVlEZwNdAxDCMTCgUUiQSUSaTsQObpqnBwUEFg0E5HI6Mw+FQMBjU4OCgTNO012UyGUUiEYVCIRmGkQEiwFc5hi0P0As88ng8CofDa04yPz+vcDisHTt2CFgCLgKf5sZFYGnXrl06f/685ufn19xMOByW2+0W8CjH8gDc9/l8unz5spaXl/NMExMT6u7ultPpFDAJfA9Ur3Nb1bnfJp1Op7q7uzUxMZEXa3l5WZcuXZLP5xPZamC0vr5efX19a076+PFjuVwuAUdLzg446nK5lEgk8mJZTzE5OSlAAO8AHcCoYRhqb2/X8PCwbaitrRUQKAMcqK2ttf3Dw8Nqb29Xb2/vGvCr+gy45ff7C8EzwN0Sx8yrYL/fL0CnT5/OAxsF4DHgd6DNmjh16hTbtm37xDAKl64v0zRJJpMbrtsw2okTJ0oClqsNwclkktHRUUzTLC2gYdDS0oLX630zcFtbG9FoNEG2H5eit/fu3Vs3Pj6eN/nkyRPGxsZ4+PAhrJNcAFcCgcCmZXUgEBDwDPgnBxTwR6Fpd0VFxb9TU1ObBo5Go6qoqDCBj4uZfjx48KBt6ujosHZbXwa4HnjW2dlpx9m/f7+AvCx1FJiqa2pqgGxZ3LhxA7IlVlcGuA64OzQ0lEmn0wB4PB6A94qZvmlsbLTb2507d9TZ2SlgGthSAnQLEOvq6tLIyIgkKZ1Oq6GhQUComHErED9z5ox9TalUyvqyFDVaG3e73VpaWrL9fX19Av4i25qLqgVIHTlyRKurq5KkCxcuCLgPOIv4qoEH/f39kqTV1VUdPnxYQAr4vIRNA/AR8Pe1a9ckSS9fvlRzc7OAm6xf+wZwq7W1VSsrK5Kkq1evWidtLBVqqcvj8SiZTEqSFhYWtGfPHgEjQBB4Kze+AEZ9Pp8WFxclSYlEwnqeb8uFQjZRbra2turFixf2ex87dkyVlZVWI1BlZaWOHz+uVColSXr+/Ll1O2uaRDlyAVMHDhywT2O937179zQ9PW3ngXUr+/btExAF3n8TMEAN8GddXZ2GhoaUTqdVqHQ6revXr1v/ySLABxsFLaU2IdtofgB+8nq93kOHDrF9+3YAEokEt2/fZnZ2dhb4GbgCZDYLbGkr8CXZkvswN5cgm3C3yH4I/te6+g/cpEGvGnqJ9QAAAABJRU5ErkJggg==" alt="" style="width: 33px;"></i>
            PROMOTION
            <ul class="hidden">
              <li onclick="location.href=\'stat.php\';">2019-2020</li>
              <li>2016-2017</li>
              <li>2017-2018</li>
            </ul>
          </li>
        </ul>
           
    </nav>
    <div class="iconsAlert">
      <img src="https://img.icons8.com/ios-glyphs/30/000000/alarm.png" alt="alert" id="iconsAlert">
    </div>
   
    <div id="export">
      <a href="#">Export Excel <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAALcSURBVEiJ7ZVPaFRXFMZ/35tM3n2DC60oqCi6K7jIopVuRAIiihjMRMi2oGhLA4VaoVhtEVtBFEQlGETxD7ieidhuulCa7toulLaLUmgXEjehNm1i3n2Z5B4XOjbVyUxmEmfVb/Xueeec3zv3vfdd+F9tkmoFS3G8R9JFYNMC+zyR2ce9WXZ5oeCo5tNIl5qAAhRMGhqO4w8WBQbWNwEFswEAkwZLcTywGHBTKmbZkODAM7YGh537tC1ggF7vrxscBILBqZJzx9oCBujz/loVLviy7NzxtoCrcMwOAwacLMXxh68NXEqSrXPXxSy7gHQYkKQztWo6lgIss+/Kzv03aFa9imvVtDLxBNIRg0PAny3UA61MbHYs8v5GgBxxXEA63xZwJP1sSbLTzB5H0pj9u6XN9Wm2wKQ1AUYj6Tcze7MlakvgELrG0vTH3jR9CHS3DYzUfwhmys5tBLY2Sl86MKz8CpIINjDPsTpHM0ifLBX4fA9M7fV+xGCkbqbZkWKaLomB/Ir356qLEMJ7uSjaZrBKZm9L2mXwwkmss/MWWUbZuXtAKHq/feFgs3GkoQBX93n/+2XI3y4U1s5WKqtWTE//ksIfk5Dvh8nhJFkP3MGsC6BvYqJqMN0vt2201Q8N3hn3/qSZ5QBWO3clhDCqXO7+X3F85nuodDp3tuzcTzkIZna24TCNwAZfRFGULnfudi7LxkpJ0ge8W70v6aMu507c935g3PstPWk6itlbJh0NsLFe77pbLbPCtPf/JFCcLhQ2RyHcrJH2WZdzuzAbGZY2B+nbvjQ9Xa8vzPM7lJ2r+uBjM/tc0grgKFBo1DCKonV7p6YePf+guudJu1tzYoNRwTrgDUmDjWBzlUkBQODquHhS+x2bvQ88agZYVefs7H6AkM/vQXrwSoL0wPL5nkbOsyiVYTnOfQNseR76oeL9jn74+7WCAUrLlq3WzMzXAJWOjt39k5NjAE8B4R0LpUbLgRQAAAAASUVORK5CYII=" alt="export"></a>
    </div>';



    return $result;


}


?>