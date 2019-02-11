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
	  }
	};
	xmlhttp.open("GET", "json.php", true);
	xmlhttp.send(); 

	// We retrieve the form 
	var form = document.getElementById("auto-suggest");
	// We retrieve the text input with its name
	var input = form.search;
	var list = document.createElement("ul");
	// add class
	list.className = "suggestions";
	list.style.display = "none";

	// add into the form
	form.appendChild(list);
	input.onkeyup = function(){
	    // retrieve the text from the input	
	    var txt = this.value;

	    // if this one is empty
	    if(!txt){
	        list.style.display = "none";
		return;
	    }
	   	var suggestions = 0;
	    // create a variable which contains all the suggestions
	    var frag = document.createDocumentFragment();
			
	    for(var i = 0, c = keyword.length; i < c; i++){
	        if(new RegExp("^"+txt,"i").test(keyword[i])){
			    var word = document.createElement("li");
			    // add to the fargment
			    frag.appendChild(word);
			    // use RegEx
			    word.innerHTML = keyword[i].replace(new RegExp("^("+txt+")","i"),"<strong>$1</strong>");
			    // add the keyword
			    word.mot = keyword[i];
			    word.onmousedown = function(){
				input.focus();
				input.value = this.mot;
				list.style.display = "none";

			        return false;
			    };
			    suggestions++;
			}
	    }

	    if(suggestions){
	        list.innerHTML = "";
		list.appendChild(frag);
		list.style.display = "block";
		list.style.border="1px solid #d5d4d4";
	    } 
	    else {
		list.style.display = "none";			
	    }	
	};
	//hide the list
	input.onblur = function(){
	    list.style.display = "none";	
	    if(this.value=="")
	        this.value = "Rechercher...";
	};
};
//A DEPLACER
/**************function createUserCheck() {
  if (confirm("Vous êtes sut le point de créer un nouvel utilisateur")) {
    return "ok";
  } else {
    return "cancelled";
  }
}

function dropDownButton() {
	/* When the user clicks on the button, 
	toggle between hiding and showing the dropdown content */
/***************	function myFunction'.$i.'() {
	  document.getElementById("myDropdown'.$i.'").classList.toggle("show");
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
						
}







