    <?php
  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/
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
      $req = pg_query("SELECT validationu FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[7] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT profilimgu FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[8] = pg_fetch_result($req, 'profilimgu');
      $req = pg_query("SELECT validationtutu FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[9] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT promotionu FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[10] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT nationality FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[11] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT dateofbirth FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[12] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT placeofbirth FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[13] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT enddate FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[14] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT begindate FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[15] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT job FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[16] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT typejob FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[17] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $array[17]['typejob'] = str_replace("[/quote]", "'", $array[17]['typejob']);
      $req = pg_query("SELECT technologies FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[18] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $array[18]['technologies'] = str_replace("[/quote]", "'", $array[18]['technologies']);

      $req = pg_query(" SELECT namei FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[19] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT adri FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[20] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT postalcode FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[21] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT city FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[22] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT phonei FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[23] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT siret FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[24] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT naf FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[25] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT collectiveagreement FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[26] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT intcollectiveagreement FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[27] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT tva FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[28] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT retirement FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[29] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT affiliation FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[30] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT website FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[31] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT phonei FROM institutions INNER JOIN users ON users.idi = institutions.idi WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[32] = pg_fetch_array($req, null, PGSQL_ASSOC);

      $req = pg_query("SELECT idcl FROM users WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[33] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT branchcl FROM classrooms WHERE idcl='".$array[33]['idcl']."'") or die('Échec de la requête : ' . pg_last_error());
      $array[34] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT groupcl FROM classrooms WHERE idcl='".$array[33]['idcl']."'") or die('Échec de la requête : ' . pg_last_error());
      $array[35] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT nametut FROM tutors INNER JOIN users ON users.idtut=tutors.idtut WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[36] = pg_fetch_array($req, null, PGSQL_ASSOC);
      $req = pg_query("SELECT surnametut FROM tutors INNER JOIN users ON users.idtut=tutors.idtut WHERE idu='".$idu."'") or die('Échec de la requête : ' . pg_last_error());
      $array[37] = pg_fetch_array($req, null, PGSQL_ASSOC);

      pg_close($dbconn);
      return $array;
    }

    ?>

