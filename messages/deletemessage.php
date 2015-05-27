<?php

	//sendplayerrequest.php

	//Set location variable for navbar use
	$location = __FILE__;

	//Verify session, get DB info, add HTML page header, and add navbar
	include('../validate_session_sub.php');
	include_once('../connect.php');
	include('../navbar.php');
	include_once('../functions/functions.php');

	deleteMessage($_GET['msid'], $conn);
	
	header('Location: ' . getFilePrefix(__FILE__) . 'player/playerprofile.php');
	
?>
