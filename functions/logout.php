<?php    //call to finish a session
	session_start ();

    session_unset ();

    session_destroy ();

    header ('location: ../connect.php?id=login');
?>