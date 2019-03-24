<?php

//This function display the menu according to typer user
function displayMenu(){
	$dbconn = connectionDB();
	

	$typeu = $_SESSION['typeu'];
  $nameSurname =array();
  $nameSurname = getNameSurname($_SESSION['email-address']);

	
	$result = '<nav class="sidenav">
	        <ul class="main-buttons">';
	if(($typeu == 'administrator') || ($typeu == 'supervisor')) {

	        $result.=  '<li>
	            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAFWSURBVEiJ7ZaxSgNBFEXvSAISUEFFAmrnDwjBLxFLxUKw0SIi+CsKqa0Ff0BbwUqwSqOFihaaoGFROBbuYlyS3TebWbTwdMPO3jOz894y0i/hirwE1CTV4+G9c+4t3JIGCxeAI6DLN13gEJgvS7oCPDKcB6ARWjobB+dxB0xbMseM7j1Jc4Z5dUlNY2Y+wLVhtwlXlkxTVQM9SePGdfacc7VQYozSr1DncnOtZxycPy9+98iMQopvPcQ3IcWnHuITj7nZAEvAq6GHO8BiMHEsXwOiDGkErAaV9slbGeKWT5ZvO30UfDayOOuPVOhSkQlQATbj4hnGE7ABVEIIJ4FdoG2o6IQ2sANMFN3hAfDiIUzzDOybvwAwA5yPIExzRt6tBKgClwGlCRdAtd+VruptScs+x2KkIWkrS7xegnRg9o/eAzqS/KvRRsc5N5UM0hV3XJL0H30C47KaOwL3mHsAAAAASUVORK5CYII=" alt=""></i>
	            PROFIL 
	            <ul class="hidden">
	              <li onclick="location.href=\'profil.php?idu='.$_SESSION['idu'].'\';">Profil</li>
	            </ul>
	          </li>';
	}

	if(($typeu == 'administrator') || ($typeu == 'supervisor')) {
          $result.= '<li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAACKgAAAioBtyI5mwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAIeSURBVEiJ7Za/S1VhGMefc/XiDemH/RAJMwhqCSoKrOE65CRNDS6S5dYSQkWTtsSFon9AhxBctBqtJRoaCrGwQWsJySBIozDRzZD8NNznwOvbe5/z1glc/C4PnOf7fD/nnvc997wi29pKAQPAN2AOGAKa/mL2CPAUWAQWgMGsgX3AOLDEn5oCihHQVuB7YP4jcLzW0OPAgKsrEeAHxvwT11vQgb0ictHKFJFSFlhE2ozeudCdljN+7W31FYGbwGtgGfgMXHNySsDzGhlrIXC3AX0H1Cn0WQ3PB+CqZjUDqyFPCNxjgK+rp9/wpOpQ70igN+cyC1rrjLWZ1tpteFJd0joZ6K2HwNarsqS1JQJ8SOtioNcXAjdHhM1HgFOP/4fzIkmStyHwaSOsrPVRBPil1jPe9V7fWK+1T0QmROS8iBwUkQuOZ7/WAxHg9D3etJ5JknzNnNTXxlVRr5eBdWNH/wROqXfc69kbE2gAhr2hEWCH9u8Z4LvqaQJWvN4v4CFw1geWgBvAlxqhY+rbA3wK9OeB3eq5b9wcwBhQL0Ab1c+fpQ2gS4OPBfpHtdeJvRypbgkwEWHcAIacJ7RJzvXRiCyAGQF+ZJheAe1O+MmA54TT7wAmMzJXMne5tw8uUz1Z+FoAeoGG6MAIYCNQiXgyUD29VIDGvNBdwHQE0NcbYGcecOUfoKnu5AG/zwGetbILVlPsM1SWDueY3db/02/1sBxNhjdEdQAAAABJRU5ErkJggg==" alt=""></i>
            APPRENTIS

            <ul class="hidden">

      <li onclick="location.href=\'index.php?psd=Alternants\';">Alternant</li>';
            $query = 'SELECT DISTINCT branchcl FROM classrooms';
      $res = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
      while ($line = pg_fetch_array($res, null, PGSQL_ASSOC)) {
          $result.='
            <li onclick="location.href=\'index.php?psd='.$line["branchcl"].'\';">'.$line["branchcl"].'</li>';
 
      }
          $result.='</ul></li>';
    }

    if(($typeu == 'administrator') || ($typeu == 'supervisor')) {    
        $result.= '<li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAACKgAAAioBtyI5mwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHRSURBVEiJ7ZU9S11BEIZnVVBstBFEkdhoJwh+NFZa+EHS5BfYpQmCndfGf2DhD1ARGwXBTgQVm1QBQYQUSZEipFG8CfjBFfH6WDhX1+Oee2b1BFL4wuEsM7PzzCx75oi86X8U0AksAD+BP8BvYBPo/pfQj0CJsI6BaaA1b2gXcJkC9fXLCq8xsqdEpNEQ1yEin405swV8N3Rb0ZElpzOCSyLSYKzzzDnXlBVkPepzY5xZVvBBRM6veYLLEeCrPMG9EWBTrBW8HgFei4jNFrBj+JS2c4UqeMIAHs0drPD5KtC5mFymAZKAE0zkXFQu6+XKUqmyABqAPsABK8CyrvsB6/R7KmAj5Zg/eTETQBm48PwXahuLgdUCw8B6CvQbUAM0Au+BvSr3YBf4AKT/6YAhYAk4CSRYDMQPALfqvwYKwDt9CmpDOx8MATu1smq6AXoS+xxQVH8hkHdWfaeASzqbgR8Z0IomE3uXPF+b2vaBPV23e/7lukRhUyLSlXr+jyqLyFbC5ndxq+86bx38DCtVHxq7/RLY+6qj/msEzwQS9/P8crXok7xcfandxwqoB0aofjF3NaY+N7BXwLh2VfSARWIHyAvA/shc5X5sOrU9jMw7MJCohJJKrJkAAAAASUVORK5CYII=" alt=""></i>
             Enregistrements
             <ul class="hidden">
              <li onclick="location.href=\'registration_manager.php\';">Approbation</li>
              <li onclick="location.href=\'edition_manager.php\';">Edition</li>
            </ul>
          </li>';
    }

    if(($typeu == 'administrator') || ($typeu == 'supervisor') || ($typeu == 'tutor')) {
          $result.= '<li>
            <i class="fa fa-circle fa-2x"><img src="data:image/pngpng;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAACKgAAAioBtyI5mwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAADzSURBVEiJ7dZBSsNAFIfxttiFIB5M3HmBbkQvIsVdD9Cdd+gtFMGViCK13XgFKb9uUgwxY59jkoXmW4Xh8f/Cy5uZDAY9AXCKFzzjpEvx0ievORmjTPco8dwuRavXWHXa6r9D09MazotMK44wx1vxjc9wkJu3K1yVCpeJmpmvXOfm7Qr3Tisea8RPuXlh8FAjvv9pTs7m/6hZ23QhvgmuNQvGuCu1+Rbj1sWFfFIST7qSHmJREi9w/NvQ5EmDIS6L7VHlHRcYRvOq4uRJg2mNsMpVNK861d/ds+fJN07XxO5tDd+zTef9Q8LT2oK4/8vs2csWu6cNcVnHhkkAAAAASUVORK5CYII=" alt="" style="width: 33px;"></i>
             Tutorat
             <ul class="hidden">
              <li onclick="location.href=\'tuteur.php?name='.$nameSurname[0].'&surname='.$nameSurname[1].'\';">Assignation</li>
              <li onclick="location.href=\'reportTutor.php?name='.$nameSurname[0].'&surname='.$nameSurname[1].'\';">Compte-Rendu</li>
              <li onclick="location.href=\'reportViewTutor.php?name='.$nameSurname[0].'&surname='.$nameSurname[1].'\';">View</li>';

              if(($typeu == 'administrator') || ($typeu == 'supervisor')) $result.= '<li onclick="location.href=\'registration_tutor_student.php\';">Validation <br>tutorat</li>';
            $result.= '</ul></li>';
    }


    if(($typeu == 'administrator') || ($typeu == 'supervisor')) {
         $result.= '<li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAARASURBVEiJ7ZZPaJN3GMc/pu82u6ZbWJNGZ2s7YRNmLrLC0hYVQ4bdrZtml7U9DemGWGQHRVZIJ6gX6Q6iIkJhO9mygzsomNGTpRdbSFsbqnjYjDH9hzT1T9e8y3eH5H0xaUkT7XFf+F1++X2fz+/P8zxvoHx5gJPATG6cBNyvEadkNQO/AStNTU0aGBjQwMCAmpqaBKwAvwL+zYJVAd8B406nUz09PYrFYipULBZTT0+PqqqqBIznPO++DnA38AvwtKGhQefOndPc3FweLB6PKx6P583Nzc3p7Nmz2rlzp4CnQH8uVlEZwNdAxDCMTCgUUiQSUSaTsQObpqnBwUEFg0E5HI6Mw+FQMBjU4OCgTNO012UyGUUiEYVCIRmGkQEiwFc5hi0P0As88ng8CofDa04yPz+vcDisHTt2CFgCLgKf5sZFYGnXrl06f/685ufn19xMOByW2+0W8CjH8gDc9/l8unz5spaXl/NMExMT6u7ultPpFDAJfA9Ur3Nb1bnfJp1Op7q7uzUxMZEXa3l5WZcuXZLP5xPZamC0vr5efX19a076+PFjuVwuAUdLzg446nK5lEgk8mJZTzE5OSlAAO8AHcCoYRhqb2/X8PCwbaitrRUQKAMcqK2ttf3Dw8Nqb29Xb2/vGvCr+gy45ff7C8EzwN0Sx8yrYL/fL0CnT5/OAxsF4DHgd6DNmjh16hTbtm37xDAKl64v0zRJJpMbrtsw2okTJ0oClqsNwclkktHRUUzTLC2gYdDS0oLX630zcFtbG9FoNEG2H5eit/fu3Vs3Pj6eN/nkyRPGxsZ4+PAhrJNcAFcCgcCmZXUgEBDwDPgnBxTwR6Fpd0VFxb9TU1ObBo5Go6qoqDCBj4uZfjx48KBt6ujosHZbXwa4HnjW2dlpx9m/f7+AvCx1FJiqa2pqgGxZ3LhxA7IlVlcGuA64OzQ0lEmn0wB4PB6A94qZvmlsbLTb2507d9TZ2SlgGthSAnQLEOvq6tLIyIgkKZ1Oq6GhQUComHErED9z5ox9TalUyvqyFDVaG3e73VpaWrL9fX19Av4i25qLqgVIHTlyRKurq5KkCxcuCLgPOIv4qoEH/f39kqTV1VUdPnxYQAr4vIRNA/AR8Pe1a9ckSS9fvlRzc7OAm6xf+wZwq7W1VSsrK5Kkq1evWidtLBVqqcvj8SiZTEqSFhYWtGfPHgEjQBB4Kze+AEZ9Pp8WFxclSYlEwnqeb8uFQjZRbra2turFixf2ex87dkyVlZVWI1BlZaWOHz+uVColSXr+/Ll1O2uaRDlyAVMHDhywT2O937179zQ9PW3ngXUr+/btExAF3n8TMEAN8GddXZ2GhoaUTqdVqHQ6revXr1v/ySLABxsFLaU2IdtofgB+8nq93kOHDrF9+3YAEokEt2/fZnZ2dhb4GbgCZDYLbGkr8CXZkvswN5cgm3C3yH4I/te6+g/cpEGvGnqJ9QAAAABJRU5ErkJggg==" alt="" style="width: 33px;"></i>
            PROMOTIONS
            <ul class="hidden">';
              $query = 'SELECT DISTINCT promotionu FROM users';
      $res = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
      while ($line = pg_fetch_array($res, null, PGSQL_ASSOC)) {
          $result.='
            <li onclick="location.href=\'index.php?promo='.$line["promotionu"].'\';">'.$line["promotionu"].'</li>';
 
      }
        $result.= '</ul>
          </li>';
   	}

   	if(($typeu == 'administrator') || ($typeu == 'supervisor') || ($typeu == 'tutor')) {
          $result.= '<li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAGxSURBVEiJ7dbLShxBFMbxr42PIKMzoODG+/UN3IgrLwjmJRSjbxMQbw8ggrhxIS58gEA22UTdKN4jJC40Uf9ZVI+0TVdVd80oCH7rOvXrc/pSLb3nAEfAFjALNL8lnMw9sAS01WvzJmAe2AQOHXA1N8BkLWAFWI47eU4O+AzoCUU/A7dZu3rgmtBF4MnSjQs+BbpD0Wng0YY64BcoMAhM5UXLwG8XaoHT6ABwiXnI/E84sOZDM+A02g9cJJav+NAW4F8AnET7UiiYN6LighfyoGk4Ud8LnFtK5pJrG1K1I86ROIJ5fXYllSxLxlzFByEdY+7ppafkZ2hTtotNP0i2/EnWpUcdkkZJn2raociogROgM64bBq6KjDrd8fcC11mRtAd0RlH0TdKopGvH+h8ueL8ALEnlGO/Kge9YdwFKwN8C467mFOiK9xjKGPsdrg9IXLgaAFfxbgv+1Ts7TNe/6ohfAWUvHBd5j0VHnn8CYnwiF5rAvwTCL/CgADPkOJszUtuPXoy3A+vAQw7wHnOeew/+qMgFSBqXOWU6JLXKfAcuZD4O25I2oig6DurwI6+V/ywVGcP9fKRMAAAAAElFTkSuQmCC" alt="" style="width: 33px;"></i>
             STATISTIQUES
             <ul class="hidden">
              <li onclick="location.href=\'stat.php\';">Utilisateurs</li>
            </ul>
          </li>';
    }

    if($typeu == 'administrator') {
        $result.= '<li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAGgSURBVEiJ7Za7SgNBFIb/8QYiFoIiFhJEBAsL0UqiFiKms7C1CIiInYWlhb6AL2DnKwgKgpVXEC2N4A0VC628IUhAP4tMYFw3m91kFYv8zbBz/jPf2ZmdmZUqqiiCgAZgBFgEtoAX4BqY9HpNmaBmSUlJQ5IGJfVLqvGxZiUljDH3+Q4/UyGIkdRnAUnbtoVMr5OUkrQaliegClgCbilPK6GhFjxfJjCvjDtuVQj2UKRKC6sbaPkBBsaBOaAXqHYSzmICG+W+i+8Cnp1peQJmnILi0rIfeN9jurD9TcBHTOCjH1Mtad9TSyfQaox5lJRRPOryA+/6GAcDYqXo2A+8J4kC4J0ygVlJ65LSvlHg1LMmh7a/vYT1XAcWgGGgPrAsYMWTvOHETgIgD8Cr83wTaT6AtJO8BjQ6sQHgzsYugVVgGui28TFy2xB8bqNi4CZgk9zZHOZU8+avWfBEMe+328lunVRUoKMr23YUM0Z+qyLKr23ir8Hntu2Jedxgkfv1eQM+gVmg9i/hUwHbLq4TsCB8FNgG3j3gg18FV/Sv9AVyf9LHA10BdQAAAABJRU5ErkJggg==" alt=""></i>
             SURVEILLANCE
             <ul class="hidden">
              <li onclick="location.href=\'logs.php\';">Logs</li>
            </ul>
          </li>';
    }
    $result.= '</ul></nav>';
          

    closeDB($dbconn);

    return $result;


}


//This function display icons on top tight of the screen
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
                <form action="#" method="POST"> <!-- Action to define -->
                  <input type="text" name="mailTitle" class="mailTitle" placeholder="Insérer un titre..." required>
                  <label>Titre du mail :</label>
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


//This function display logout icon on top tight of the screen
function displayIconLogout(){
  $result ='<div class="icons">
            <div class="logout">
              <a style="padding-bottom:10px;" href="functions/logout.php"><img src="https://img.icons8.com/ios-glyphs/30/000000/exit.png" alt="" id="logoutImg"></a>
            </div></div>';
  return $result;
}

?>