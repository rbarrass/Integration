
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>UCP Alter Master</title>
  <link rel="stylesheet" type="text/css" href="style.less" media="screen">
  <script type="text/javascript" src="script.js"></script>
</head>
<body>
  <html>
    <div class="icons">
            <div class="logout">
              <a style="padding-bottom:10px;" href="functions/logout.php"><img src="https://img.icons8.com/ios-glyphs/30/000000/exit.png" alt="" id="logoutImg"></a>
            </div></div><nav class="sidenav">
          <ul class="main-buttons"><li>
            <i class="fa fa-circle fa-2x"><img src="data:image/pngpng;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAACKgAAAioBtyI5mwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAADzSURBVEiJ7dZBSsNAFIfxttiFIB5M3HmBbkQvIsVdD9Cdd+gtFMGViCK13XgFKb9uUgwxY59jkoXmW4Xh8f/Cy5uZDAY9AXCKFzzjpEvx0ievORmjTPco8dwuRavXWHXa6r9D09MazotMK44wx1vxjc9wkJu3K1yVCpeJmpmvXOfm7Qr3Tisea8RPuXlh8FAjvv9pTs7m/6hZ23QhvgmuNQvGuCu1+Rbj1sWFfFIST7qSHmJREi9w/NvQ5EmDIS6L7VHlHRcYRvOq4uRJg2mNsMpVNK861d/ds+fJN07XxO5tDd+zTef9Q8LT2oK4/8vs2csWu6cNcVnHhkkAAAAASUVORK5CYII=" alt="" style="width: 33px;"></i>
             Tutorat
             <ul class="hidden">
              <li onclick="location.href='tuteur.php?name=Lemaire&surname=Marc';">Assignation</li>
              <li onclick="location.href='reportTutor.php?name=Lemaire&surname=Marc';">Compte-Rendu</li>
              <li onclick="location.href='reportViewTutor.php?name=Lemaire&surname=Marc';">View</li></ul></li><li>
            <i class="fa fa-circle fa-2x"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAB2wAAAdsBV+WHHwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAGxSURBVEiJ7dbLShxBFMbxr42PIKMzoODG+/UN3IgrLwjmJRSjbxMQbw8ggrhxIS58gEA22UTdKN4jJC40Uf9ZVI+0TVdVd80oCH7rOvXrc/pSLb3nAEfAFjALNL8lnMw9sAS01WvzJmAe2AQOHXA1N8BkLWAFWI47eU4O+AzoCUU/A7dZu3rgmtBF4MnSjQs+BbpD0Wng0YY64BcoMAhM5UXLwG8XaoHT6ABwiXnI/E84sOZDM+A02g9cJJav+NAW4F8AnET7UiiYN6LighfyoGk4Ud8LnFtK5pJrG1K1I86ROIJ5fXYllSxLxlzFByEdY+7ppafkZ2hTtotNP0i2/EnWpUcdkkZJn2raociogROgM64bBq6KjDrd8fcC11mRtAd0RlH0TdKopGvH+h8ueL8ALEnlGO/Kge9YdwFKwN8C467mFOiK9xjKGPsdrg9IXLgaAFfxbgv+1Ts7TNe/6ohfAWUvHBd5j0VHnn8CYnwiF5rAvwTCL/CgADPkOJszUtuPXoy3A+vAQw7wHnOeew/+qMgFSBqXOWU6JLXKfAcuZD4O25I2oig6DurwI6+V/ywVGcP9fKRMAAAAAElFTkSuQmCC" alt="" style="width: 33px;"></i>
             STATISTIQUES
             <ul class="hidden">
              <li onclick="location.href='stat.php';">Utilisateurs</li>
            </ul>
          </li></ul></nav>    <!-- Barre de recherch dynamique gérée par script.js et style avec style.less -->
    <div class="search__container">
      <form id="auto-suggest"  action="functions/main.func.php" method="POST">        <input type="text" class="search__input" name="search" value="Rechercher..." onfocus="if(this.value=='Rechercher...')this.value=''" autocomplete="off"/>
        <ul class="suggestions">
      <!-- remplit par le script -->
        </ul>
      </form>
    </div>

    <div class="container2"><ul class="responsive-table">
            <li class="table-header">
                  <div class="end">Elève étant sous votre tutorat</div>
                </li>
              </ul>
            </div><div class="container">
          <ul class="responsive-table">
            <li class="table-header">
              <div class="col col-1">ID</div>
              <div class="col col-2">Nom</div>
              <div class="col col-3">Prénom</div>
              <div class="col col-4">Mail</div>
              <div class="col col-6">Employeur</div>
              <div class="col col-7">Mission</div>

            </li><li onclick="location.href='';" class="table-row">
                            <div class="col col-1" data-label="ID">43567654</div>
                            <div class="col col-2" data-label="Name">Cailloux</div>
                            <div class="col col-3" data-label="Surname">Pierre</div>
                            <div class="col col-4" data-label="Mail">cailloux@gmail.com</div>
                            <div class="col col-6" data-label="Employeur">Pas entreprise</div>
                            <div class="col col-7" data-label="Mission"></div>
                            
                        </li><li onclick="location.href='';" class="table-row">
                            <div class="col col-1" data-label="ID">21703929</div>
                            <div class="col col-2" data-label="Name">Ducroux</div>
                            <div class="col col-3" data-label="Surname">Jeanmichel</div>
                            <div class="col col-4" data-label="Mail">g.ducroux@outlook.fr</div>
                            <div class="col col-6" data-label="Employeur">Pas entreprise</div>
                            <div class="col col-7" data-label="Mission">Création interface pour base de données avec incorporation des process et monter en puissance des logiciels metiers</div>
                            
                        </li> </ul>
            </div><div class="container2"><ul class="responsive-table">
            <li class="table-header">
                  <div class="end">Elève sans tuteur</div>
                </li>
              </ul>
            </div><div class="container">
          <ul class="responsive-table">
            <li class="table-header">
              <div class="col col-1">ID</div>
              <div class="col col-2">Nom</div>
              <div class="col col-3">Prénom</div>
              <div class="col col-4">Mail</div>
              <div class="col col-6">Employeur</div>
              <div class="col col-7">Mission</div>
              <div class="col col-8">Etre son tuteur ?</div>

            </li><li class="table-row">
                            <div class="col col-1" data-label="ID">43567654</div>
                            <div class="col col-2" data-label="Name">Delacour</div>
                            <div class="col col-3" data-label="Surname">Aurelie</div>
                            <div class="col col-4" data-label="Mail">aurel@gmail.com</div>
                            <div class="col col-6" data-label="Employeur">Pas entreprise</div>
                            <div class="col col-7" data-label="Mission"></div><div class="col col-8" data-label="Etre son tuteur ?"><div class="dropdown">
              <button onclick="myFunction0()" class="dropbtn">Choisir cet étudiant(e)</button>
              <div id="myDropdown0" class="dropdown-content">
              <form enctype="multipart/form-data" action="tuteur.php?name=Lemaire&surname=Marc" method="POST">
                    <input type="hidden" name="myid" value="6">
                    <input type="submit" name="allowed" value="Oui">
                    <input type="submit" name="denied" value="Non">
                    
               </form>
             
              </div>
            </div><script>
            function myFunction0() {
              document.getElementById("myDropdown0").classList.toggle("show");
            }
            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
              if (!event.target.matches(".dropbtn")) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains("show")) {
                    openDropdown.classList.remove("show");
                  }
                }
              }
            }
            </script></div></li><li class="table-row">
                            <div class="col col-1" data-label="ID">56787654</div>
                            <div class="col col-2" data-label="Name">Lavoiture</div>
                            <div class="col col-3" data-label="Surname">Ishak</div>
                            <div class="col col-4" data-label="Mail">ishak@gmail.com</div>
                            <div class="col col-6" data-label="Employeur">Pas entreprise</div>
                            <div class="col col-7" data-label="Mission"></div><div class="col col-8" data-label="Etre son tuteur ?"><div class="dropdown">
              <button onclick="myFunction1()" class="dropbtn">Choisir cet étudiant(e)</button>
              <div id="myDropdown1" class="dropdown-content">
              <form enctype="multipart/form-data" action="tuteur.php?name=Lemaire&surname=Marc" method="POST">
                    <input type="hidden" name="myid" value="5">
                    <input type="submit" name="allowed" value="Oui">
                    <input type="submit" name="denied" value="Non">
                    
               </form>
             
              </div>
            </div><script>
            function myFunction1() {
              document.getElementById("myDropdown1").classList.toggle("show");
            }
            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
              if (!event.target.matches(".dropbtn")) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains("show")) {
                    openDropdown.classList.remove("show");
                  }
                }
              }
            }
            </script></div></li><li class="table-row">
                            <div class="col col-1" data-label="ID">43567654</div>
                            <div class="col col-2" data-label="Name">Pierre</div>
                            <div class="col col-3" data-label="Surname">Jean</div>
                            <div class="col col-4" data-label="Mail">jp@gmail.com</div>
                            <div class="col col-6" data-label="Employeur">Pas entreprise</div>
                            <div class="col col-7" data-label="Mission"></div><div class="col col-8" data-label="Etre son tuteur ?"><div class="dropdown">
              <button onclick="myFunction2()" class="dropbtn">Choisir cet étudiant(e)</button>
              <div id="myDropdown2" class="dropdown-content">
              <form enctype="multipart/form-data" action="tuteur.php?name=Lemaire&surname=Marc" method="POST">
                    <input type="hidden" name="myid" value="7">
                    <input type="submit" name="allowed" value="Oui">
                    <input type="submit" name="denied" value="Non">
                    
               </form>
             
              </div>
            </div><script>
            function myFunction2() {
              document.getElementById("myDropdown2").classList.toggle("show");
            }
            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
              if (!event.target.matches(".dropbtn")) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains("show")) {
                    openDropdown.classList.remove("show");
                  }
                }
              }
            }
            </script></div></li><li class="table-row">
                            <div class="col col-1" data-label="ID">43567654</div>
                            <div class="col col-2" data-label="Name">Saintam</div>
                            <div class="col col-3" data-label="Surname">Matcieux</div>
                            <div class="col col-4" data-label="Mail">lenem@gmail.com</div>
                            <div class="col col-6" data-label="Employeur">Pas entreprise</div>
                            <div class="col col-7" data-label="Mission"></div><div class="col col-8" data-label="Etre son tuteur ?"><div class="dropdown">
              <button onclick="myFunction3()" class="dropbtn">Choisir cet étudiant(e)</button>
              <div id="myDropdown3" class="dropdown-content">
              <form enctype="multipart/form-data" action="tuteur.php?name=Lemaire&surname=Marc" method="POST">
                    <input type="hidden" name="myid" value="2">
                    <input type="submit" name="allowed" value="Oui">
                    <input type="submit" name="denied" value="Non">
                    
               </form>
             
              </div>
            </div><script>
            function myFunction3() {
              document.getElementById("myDropdown3").classList.toggle("show");
            }
            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
              if (!event.target.matches(".dropbtn")) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains("show")) {
                    openDropdown.classList.remove("show");
                  }
                }
              }
            }
            </script></div></li>
              </ul>
            </div>    
  </html>
</body>