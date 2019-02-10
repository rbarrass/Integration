<?php
/*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu	L3i 2019
raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/
require('connectDatabase.php');
function displayLogs(){
	$dbconn = connectionDB();
	$display = '';
	$query = "SELECT actionL,typeL,dateL,ipL FROM logs";
	$result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
	$i=0;
	while ($line = pg_fetch_array($result,null,PGSQL_ASSOC)) {
		$j=0;
		$display.='<li class="table-row">';
		foreach ($line as $col_value) {
			switch ($j) {
				case 0:
					$display.= '<div class="col col-1" data-label="action">'.$col_value.'</div>';
					break;
				case 1:
					$display.= '<div class="col col-2" data-label="type">'.$col_value.'</div>';
					break;
				case 2:
					$display.= '<div class="col col-3" data-label="date">'.$col_value.'</div>';
					break;
				case 3:
					$display.= '<div class="col col-4" data-label="ip">'.$col_value.'</div>';
					break;
				default:
					break;
			}
			$j++;
		}
		$display.= '<div class="col col-5" data-label="autor">Inconnu</div>';
		
	}
	if ($display == ''){
		$display.= '<h2>Aucuns logs pour le moment</h2>';
	}
	echo $display;
}

function logsFilter(){
	$result = '<div class="icons">
            <div class="iconsAlert">
              <img onclick="document.getElementById(\'id01\').style.display=\'block\'" src="https://img.icons8.com/ios-glyphs/30/000000/alarm.png" alt="" id="iconsAlertImg">
            </div>

            <div class="export">
              <a style="padding-bottom:10px;" href="functions/exportExcell.php"><img src="https://img.icons8.com/color/48/000000/download.png" alt="" id="exportImg"></a>
            </div>
            <div class="logout">
              <a style="padding-bottom:10px;" href="connect.php?id=login"><img src="https://img.icons8.com/ios-glyphs/30/000000/exit.png" alt="" id="logoutImg"></a>
            </div>
          </div>        

          <!-- The Modal (contains the Sign Up form) -->
          <div class="modal" id="id01">
            <div class="modal-sandbox" id="around"></div>
            <div class="modal-box">
              <div class="modal-header">
                <div class="close-modal" id="cl2">&#10006;</div> 
                <h1>Filtre</h1>
              </div>
              <div class="modal-body">
                <form action="" method="">
                  <label for="mailTitle">Evénement :</label>
                  
                                <div class="col-md-6">
                                	<select id="targettype" class="form-control" name="targettype">
									  <option value="student">Etudiant</option>
									  <option value="tutor">Enseignant tuteur</option>
									  <option value="internshipsupervisor">Maître de stage</option>
									</select>
                                </div>
                  <input type="text" name="mailTitle" class="mailTitle" placeholder="Insérer un titre..." required>
                  <textarea class="mailContent" name="story">
                  </textarea>
                  <input type="submit" class="sendMail">
                </form>
                <br />
                <button class="close-modal" id="cl">Close!</button>
              </div>
            </div>
          </div> 

          <script>
            // Get the modal
            var modal = document.getElementById(\'id01\');
            var close = document.getElementById(\'cl\');
            var close2 = document.getElementById(\'cl2\');
            var closeAround= document.getElementById(\'around\');
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == close || event.target == close2 || event.target == closeAround) {
                    modal.style.display = "none";
                }
            }
          </script> ';

  return $result;

}