<?php

function autorizedChar($strchain, $index){
		//name/surname
		if($index==0)	return preg_match('/^[a-zA-Z-ëéèàù]{1,}$/', $strchain);
		//Phone number/age
		elseif ($index==1)	return preg_match('/^[0-9]{1,}$/', $strchain);
}

//Get real IP of client even if he use a proxy
function getIp() {
	// IP if shared internet connection
	if (isset($_SERVER['HTTP_CLIENT_IP'])) {
		return $_SERVER['HTTP_CLIENT_IP'];
	}
	// IP through a proxy
	elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	// Else : simple IP
	else {
		return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
	}
}

function getTheDate(){
	date_default_timezone_set('UTC');
	return date("Y-m-d H:i:s");
}

?>