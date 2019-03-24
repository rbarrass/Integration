   /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/

  /* 
   * This file allows to build a graphic which will show the distribution of students following 
   * the kind of contract.
   */
var myObj= new Array();
var keyword=new Array();
window.onload = function(){
  // We retrieve here, with JSon a php object ( an array ), to communicate between server-side and client-side
  //from php to javascript and display it when the user enter a character
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       myObj = JSON.parse(this.responseText);
            //alert(myObj[0]);
            keyword=myObj;
            var color = Chart.helpers.color;
            var barChartData = {
              labels: ['Master RS', 'Master SID', 'Master STRC', 'Master 1'],
              datasets: [{
                label: "Étudiant en recherche d'entreprise",
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                  keyword[0], //Master RS
                  keyword[3], // Master SID
                  keyword[6], // Master STRC
                  keyword[9],
                  0 // for the origin
                ]
              }, {
                label: "Étudiant en apprentissage",
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                  keyword[1],
                  keyword[4],
                  keyword[7],
                  keyword[10],
                  0
                ]
              },{
                label: "Étudiant en contrat de professionnalisation",
                backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
                borderColor: window.chartColors.green,
                borderWidth: 1,
                data: [
                  keyword[2],
                  keyword[5],
                  keyword[8],
                  keyword[11],
                  0
                ]
              }
              ]

            };

              var ctx = document.getElementById('canvas').getContext('2d');
              window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                  responsive: true,
                  legend: {
                    position: 'top',
                  },
                  title: {
                    display: true,
                    text: 'Représentation des étudiants par section et apprentissage'
                  }
                }
              });

    }
  };
  xmlhttp.open("GET", "studentJob.php", true);
  xmlhttp.send(); 
};

