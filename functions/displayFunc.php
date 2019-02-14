    <?php

    require("connectDatabase.php");

    //Display of somebody user page
    function profilDisplay($idu){
      $dbconn =connectionDB();
      //Simple collect of user infos
      $req = pg_query("SELECT emailu FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[0] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT nameu FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[1] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT surnameu FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[2] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT student_idu FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[3] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT genderu FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[4] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT phoneu FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[5] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT adru FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[6] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT profilimgu FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[7] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query(" SELECT namei FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[8] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT adri FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[9] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT nametut FROM tuteur INNER JOIN users ON users.idtut = tuteur.idtut WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[10] = pg_fetch_array($req, null, PGSQL_ASSOC);
      if ($array[7]['profilimgu'] == "") $array[7]['profilimgu'] = "./pictures/profil_pic/default.png";
      pg_close($dbconn);
      return $array;
    }

    ?>

