<?php
  require("functions/displayFunc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profil</title>
  <link rel="stylesheet" type="text/css" href="menu.css" media="screen">
</head>
<body>
  </html>
    <div class="container">

      <?php
                //Profil infos collect $array_profil = profilDisplay($_SESSION['login']);
                $array_profil = profilDisplay("juju@gmail.com");
                echo "
                <p style='margin-left:315px;'><img src=".$array_profil[7]['profilimgu']." alt='' style='box-shadow: 0 0 20px 0 rgba(0,0,0,0.5), 0 5px 5px rgba(0,0,0,0.5); border: black groove 4px; width: 150px; height: 150px; margin-left:auto; margin-right:auto; margin-top:10px;'></p>
                  <div style='margin-left:310px;'>
                    <h3 class='marge'>Details du profil</h3>
                    <p class='descriptionAnnounceBis' style='top: 30%;'><b class='motImportant' >Email :</b> ".$array_profil[0]['emailu']."
                    <br />
                    <b class='motImportant' >Nom :</b> ".$array_profil[1]['nameu']." 
                    <br />
                    <b class='motImportant' >Prénom :</b> ".$array_profil[2]['surnameu']." 
                    <br /> 
                    <b class='motImportant' >Numero étudiant :</b> ".$array_profil[3]['student_idu']." 
                    <br />
                    <b class='motImportant' >Genre :</b> ".$array_profil[4]['genderu']." 
                    <br />
                    <b class='motImportant' >Téléphone :</b> ".$array_profil[5]['phoneu']." <br /><b class='motImportant' >Adresse :</b> ".$array_profil[6]['adru']."
                    </p>
                    </div>";

      ?>
                <input type="button" value="Editer le profil" onclick="window.location.href='envoi.php'" class="getProfil">

    </div>
  </html>
</body>
