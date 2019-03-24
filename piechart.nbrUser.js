   /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/

  /* 
   * This file allow to build a graphic which will be shows the distribution of 
   * students registered on the website 
   */
var myObj= new Array();
var keyword=new Array();
  // We retrieve here, with JSon a php object ( an array ), to communicate between server-side and client-side
  //from php to javascript and display it when the user enter a character
  // the onload isn't needed because, it's launched by the first script
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       myObj = JSON.parse(this.responseText);
            //alert(myObj[0]);
            keyword=myObj;
                var config = {
                type: 'pie',
                data: {
                  datasets: [{
                    data: [
                      keyword[0],
                      keyword[1],
                      keyword[2],
                    ],
                    backgroundColor: [
                      window.chartColors.red,
                      window.chartColors.orange,
                      window.chartColors.yellow,
                    ],
                    label: 'Dataset 1'
                  }],
                  labels: [
                    'Étudiants en Master RS',
                    'Étudiants en Master SID',
                    'Étudiants en Master STRC'
                  ]
                },
                options: {
                  responsive: true,
                  legend: {
                    position: 'top',
                  },
                  title: {
                    display: true,
                    text: "Nombre d'étudiant pris en charge sur le site par filière"
                  }
                }
              };
                var ctx2 = document.getElementById('chart-area').getContext('2d');
                window.myPie = new Chart(ctx2, config);
    }     
  };
  xmlhttp.open("GET", "studentNbrUser.php", true);
  xmlhttp.send(); 

