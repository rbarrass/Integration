<?php
/*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/
require('main.func.php');
require('connectDatabase.php');
function register(){
  if(isset($_POST['validRegister']) ){
    $dbconn = connectionDB();
    $errorR="";
    //Password check
    //Size check
    if (strlen($_POST['mypwd']) > 50){
      $errorR.='    <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card-body">
                  <div class="alert alert-danger" role="alert">
                    <strong>Erreur</strong> : Mot de passe trop long, 50 caractères max.
                  </div>
              </div>
          </div>
    </div>';
      return $errorR;
    }elseif (strlen($_POST['mypwd']) < 8){
      $errorR.='    <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card-body">
                  <div class="alert alert-danger" role="alert">
                    <strong>Erreur</strong> : Mot de passe trop court, 8 caractères minimum.
                  </div>
              </div>
          </div>
    </div>';
      return $errorR;
    }else{
      //Check if two fields matches
      if ($_POST['mypwd1'] == $_POST['mypwd']){
        //Crypting password
        $password_hash = crypt($_POST['mypwd'], 'rl');
      }else{
        $errorR.= '   <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card-body">
                  <div class="alert alert-danger" role="alert">
                    <strong>Erreur</strong> : les deux champs de mot de passe doivent correspondrent.
                  </div>
              </div>
          </div>
    </div>';
        return $errorR;
      }
    }
    //name check
    //Size check
    if (strlen($_POST['myname']) > 30){
      $errorR.='    <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card-body">
                  <div class="alert alert-danger" role="alert">
                    <strong>Erreur</strong> : la taille du nom est limitée à 30 caractères.
                  </div>
              </div>
          </div>
    </div>';
      return $errorR;
    }else{
      //Insure typing is accepted
      if (autorizedChar($_POST['myname'], 0) == 1){
        //Format text
        $name = ucfirst(strtolower($_POST['myname']));
      }else{
        $errorR.='    <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card-body">
                  <div class="alert alert-danger" role="alert">
                    <strong>Erreur</strong> : format nom incorrect : a-z àéèù- acceptés.
                  </div>
              </div>
          </div>
    </div>';
        return $errorR;
      }
    }
    //surname check
    //Size check
    if (strlen($_POST['mysurname']) > 30){
      $errorR.='    <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card-body">
                  <div class="alert alert-danger" role="alert">
                    <strong>Erreur</strong> : la taille du prénom est limitée à 30 caractères.
                  </div>
              </div>
          </div>
    </div>';
      return $errorR;
    }else{
      //Insure typing is accepted
      if (autorizedChar($_POST['mysurname'], 0) == 1){
        //Format text
        $surname = ucfirst(strtolower($_POST['mysurname']));
      }else{
        $errorR.='    <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card-body">
                  <div class="alert alert-danger" role="alert">
                    <strong>Erreur</strong> : format prénom incorrect : a-z àéèù- acceptés..
                  </div>
              </div>
          </div>
    </div>';
        return $errorR;
      } 
    }
    //Email check
    //Size check
    if (strlen($_POST['myemail']) > 60){
      $errorR.='    <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card-body">
                  <div class="alert alert-danger" role="alert">
                    <strong>Erreur</strong> : la taille du mail est limitée à 30 caractères.
                  </div>
              </div>
          </div>
    </div>';
      return $errorR;
    }//Pas fini, verif typing + unicité dans la bd!
    // we take all the emails that are in the database and we ckeck if the email that the client put in the form already exist in the database
    $query = 'SELECT emailU FROM users';
    $result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
    $tab = array();
    $i=0;
    $j=0;
    $k=0;
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        foreach ($line as $col_value) {
          $tab[$i]=$col_value;
          $i++;
        }
 
    }
    //if the email existing in the database a popup alert the client the email exist
    while(($k==0) && ($j<$i)){
      if (strcmp($_POST['myemail'], $tab[$j])==0) {
        $k=2;
        $errorR.='    <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card-body">
                  <div class="alert alert-danger" role="alert">
                    <strong>Erreur</strong> : Email déjà utilisé.
                  </div>
              </div>
          </div>
    </div>';
        return $errorR;
      }
      else {
        $j++;
      }
    }
    //student no check
    //Size check
    if (strlen($_POST['myno']) != 8){
      $errorR.='    <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card-body">
                  <div class="alert alert-danger" role="alert">
                    <strong>Erreur</strong> : la taille du numéro étudiant est incorrect.
                  </div>
              </div>
          </div>
    </div>';
      return $errorR;
    }else{
      //Insure typing id accepted
      if (autorizedChar($_POST['myno'], 1) != 1){
        $errorR.='    <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card-body">
                  <div class="alert alert-danger" role="alert">
                    <strong>Erreur</strong> : numéro étudiant incorrect : [0-9] acceptés.
                  </div>
              </div>
          </div>
    </div>';
        return $errorR;
      }
    }
    $query = 'SELECT student_idU FROM users';
    $result = pg_query($query) or die('Échec de la requête : ' . pg_last_error());
    $tab = array();
    $i=0;$j=0;$k=0;
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        foreach ($line as $col_value) {
          $tab[$i]=$col_value;
          $i++;
        }
 
    }
    //if the student no existing in the database a popup alert the client student number does already exist
    while(($k==0) && ($j<$i)){
      if (strcmp($_POST['myno'], $tab[$j])==0) {
        $k=2;
        $errorR.='    <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card-body">
                  <div class="alert alert-danger" role="alert">
                    <strong>Erreur</strong> : vous ne pouvez vous inscrire qu\'une seule fois.
                  </div>
              </div>
          </div>
    </div>';
        return $errorR;
      }
      else {
        $j++;
      }
    }

    // Read binary data
    $data = file_get_contents('pictures/profil_pic/default.png');

    // binary data escaped
    $escaped = pg_escape_bytea($data);

    //request to create line in table.users
    $request = "INSERT INTO users VALUES(DEFAULT, '".$_POST['myno']."', '".$_POST['myname']."', '".$_POST['mysurname']."','".$_POST['mygender']."', '".$_POST['myemail']."', ' ', ' ', '$password_hash', 'student', 'waiting', ' ', '2018-2020','1', '',DEFAULT,' ',DEFAULT,DEFAULT,' ',' ',' ','1', '1', '1', '', '$escaped')";
    $resultat = pg_query($request) or die('ERREUR SQL : '. $request .   pg_last_error());

    //We want to increment table.logs to save this action and keep an eye on registering requests
    if (pg_last_error() == NULL) {
      //Request to search id of account just created 
      $requestUserId = "SELECT idU FROM users WHERE emailU='".$_POST['myemail']."'";
      $resultUserId = pg_query($requestUserId) or die('ERREUR SQL : '. $requestUserId .   pg_last_error());
      $userId = pg_fetch_result($resultUserId, 'idu');

      send($userId);
      $dbconn = connectionDB();
      //Add a line in table.Logs with : action made/date/client ip/type of request(insert/delete/update)/and object concerned.
      $request = "INSERT INTO logs VALUES(DEFAULT, 'student registering', '".getTheDate()."', '".getIp()."', 'insert', null, '$userId', null, null, null, null, null, null)";
      $resultat = pg_query($request) or die('ERREUR SQL : '. $request .   pg_last_error());
    }
    $errorR = "null";

    return $errorR;
  }
}
function registerForm(){
  echo '<main class="register-form"> <!-- ICI LA PARTIE REGISTER -->
    <div> <!-- NE PAS UTILISER CONTAINER -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Enregistrement</div>
                    <div class="card-body">
                        <form action="connect.php" method="post">         <!-- ***************A DEFINIR ***************-->
                            <div class="form-group row">
                                <label for="myname" class="col-md-4 col-form-label text-md-right">Nom :</label>
                                <div class="col-md-6">
                                    <input type="text" id="myname" class="form-control" name="myname" placeholder="Votre nom de famille" required autofocus><!-- NOM -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mysurname" class="col-md-4 col-form-label text-md-right">Prénom :</label>
                                <div class="col-md-6">
                                    <input type="text" id="mysurname" class="form-control" name="mysurname" placeholder="Votre prénom" required> <!-- PRÉNOM -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mygender" class="col-md-4 col-form-label text-md-right">Genre :</label>
                                <div class="col-md-6">
                                    <input type="radio" id="mygender1" name="mygender" value="Femme" style="display: inline-block; margin-left: 1.5cm; margin-top: 0.2cm;" required>
                                    <label for="mygender1">Femme</label>
                                    <input type="radio" id="mygender2" name="mygender" value="Homme" style="display: inline-block; margin-left: 1.5cm; margin-top: 0.2cm;" required>
                                    <label for="mygender2">Homme</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="myemail" class="col-md-4 col-form-label text-md-right">E-mail :</label>
                                <div class="col-md-6">
                                    <input type="email" id="myemail" class="form-control" name="myemail" placeholder="Votre mail ( Attention, il vous servira de login )" required> <!-- MAIL -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="myno" class="col-md-4 col-form-label text-md-right">N°- Étudiant :</label>
                                <div class="col-md-6">
                                    <input type="number" id="myno" class="form-control" name="myno" placeholder="Votre numéro étudiant (8 chiffres)" required> <!-- N° ETU -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mypwd" class="col-md-4 col-form-label text-md-right">Mot de passe :</label>
                                <div class="col-md-6">
                                    <input type="password" id="mypwd" class="form-control" name="mypwd" placeholder="Votre mot de passe (8 caractères minimum)" required> <!--PASS -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mypwd1" class="col-md-4 col-form-label text-md-right">Confirmation :</label>
                                <div class="col-md-6">
                                    <input type="password" id="mypwd1" class="form-control" name="mypwd1" placeholder="Confirmer votre mot de passe" required> <!-- CONFIRM PASS -->
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="validRegister">
                                    Enregistrement
                                </button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
 <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card-body">
                  <div class="alert alert-primary" role="alert">
                      Toutes les informations rentrées sur le formulaire ci-dessus seront utilisées par le service de l\'université. Vous pourrez les remodifier après avoir validé votre e-mail. 
                  </div>
              </div>
          </div>
    </div>

</main>';
}
function registerOk(){
  echo '    <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card-body">
                  <div class="alert alert-primary" role="alert">
                      Votre compte a bien été enregistré. Veuillez vérifier votre adresse mail, un lien vous sera envoyé.'.$_POST['email-address'].'
                  </div>
              </div>
          </div>
    </div>';
}
?>