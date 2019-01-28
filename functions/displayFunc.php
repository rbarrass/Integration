    <?php

    require("connectDatabase.php");

    //Display of somebody user page
    function profilDisplay($email){
      $dbconn =connectionDB();
      //Simple collect of user infos
      $req = pg_query("SELECT emailu FROM users WHERE emailu='".$email."'") or die('Échec de la requête : ' . pg_last_error());
      $array[0] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT nameu FROM users WHERE emailu='".$email."'") or die('Échec de la requête : ' . pg_last_error());
      $array[1] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT surnameu FROM users WHERE emailu='".$email."'") or die('Échec de la requête : ' . pg_last_error());
      $array[2] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT student_idu FROM users WHERE emailu='".$email."'") or die('Échec de la requête : ' . pg_last_error());
      $array[3] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT genderu FROM users WHERE emailu='".$email."'") or die('Échec de la requête : ' . pg_last_error());
      $array[4] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT phoneu FROM users WHERE emailu='".$email."'") or die('Échec de la requête : ' . pg_last_error());
      $array[5] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT adru FROM users WHERE emailu='".$email."'") or die('Échec de la requête : ' . pg_last_error());
      $array[6] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT profilimgu FROM users WHERE emailu='".$email."'") or die('Échec de la requête : ' . pg_last_error());
      $array[7] = pg_fetch_array($req, null, PGSQL_ASSOC);
      if ($array[7]['profilimgu'] == "") $array[7]['profilimgu'] = "./pictures/profil_pic/default.png";
      pg_close($dbconn);
      return $array;
    }

    ?>