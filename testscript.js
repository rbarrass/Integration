   /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/
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
              labels: ['Master RS', 'Master SID', 'Master STRC'],
              datasets: [{
                label: "Étudiant en recherche d'entreprise",
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                  4, //Master RS
                  4, // Master SID
                  keyword[0], // Master STRC
                  0 // for the origin
                ]
              }, {
                label: "Étudiant en apprentissage",
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                  2,
                  5,
                  keyword[1]
                ]
              },{
                label: "Étudiant en contrat de professionnalisation",
                backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
                borderColor: window.chartColors.green,
                borderWidth: 1,
                data: [
                  2,
                  7,
                  keyword[2]
                ]
              }]

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
                    text: 'Chart.js Bar Chart'
                  }
                }
              });

    }
  };
  xmlhttp.open("GET", "nbrUser.php", true);
  xmlhttp.send(); 
};

