<?php
  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/
    require('functions/main.func.php');
    require('functions/bordtable.func.php');
    verifyIfConnected('supervisor');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="style.less" media="screen">
  <script type="text/javascript" src="script.js"></script>

</head>
<body>
  </html>
    <?php
      echo displayIcons();
      echo displayMenu();
    ?>
    <!-- Barre de recherch dynamique gérée par script.js et style avec style.less -->
    <div class="search__container">
      <?php $i=1; echo '<form id="auto-suggest"  action="javascript:;" onsubmit="getValue();" method="POST">';?>
        <input type="text" class="search__input" id="etu_search" name="search" value="Rechercher..." onfocus="if(this.value=='Rechercher...')this.value=''" autocomplete="off"  />
        <ul class="suggestions">
      <!-- remplit par le script -->
        </ul>
      </form>
    </div>
    <!-- The Modal (contains the "send to all mail" form) -->
          <div class="modal" id="profil">
            <div class="modal-sandbox" onclick="document.getElementById('profil').style.display='none'"></div>
            <div class="modal-box">
              <div class="modal-header">
                <div class="close-modal" onclick="document.getElementById('profil').style.display='none'">&#10006;</div> 
                <h1>Profil</h1>
              </div>
              <div class="modal-body">
                <h4 id="name"></h4>
                  <script>
                   function getValue(){
                      document.getElementById('profil').style.display='block';
                      var y= document.getElementById('name');
                      var x= document.getElementById('etu_search').value;
                      y.innerHTML =x;
                      var profile_viewer_uid = 1;
                      $.ajax({
                        url: "functions/getProfilInfo.func.php",
                        method: "POST",
                        data: { "profile_viewer_uid": profile_viewer_uid }
                      })
                   }
                  </script>
                <br />
              </div>
            </div>
          </div> 

          
    <?php
        echo displayBordTable();
    ?>    
  </html>
</body>
