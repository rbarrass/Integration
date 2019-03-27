<?php  /*Barrasset Raphaël, Castelain Julien, Ducroux Guillaume, Saint-Amand Matthieu  L3i 2019
  raphael.barrasset@gmail.com, julom78@gmail.com, g.ducroux@outlook.fr, throwaraccoon@gmail.com*/    
//call to finish a session
	session_start ();

    session_unset ();

    session_destroy ();

    header ('location: ../connect.php?id=login');
?>