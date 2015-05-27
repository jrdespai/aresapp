<?php

	//sendplayerrequest.php

	//Set location variable for navbar use
	$location = __FILE__;

	//Verify session, get DB info, add HTML page header, and add navbar
	include('../validate_session_sub.php');
	include('../connect.php');
	include('../navbar.php');
	include_once('../functions/functions.php');

	//Assign GET variables
	$team = $_GET['t'];
	$player = $_GET['p'];
	$messageId = $_GET['msid'];
	
	echo '<a href="adduserteam.php?t=' . $team . '&p=' . $player . '&msid=' . $messageId . '"><button type="button" class="btn">Add to Team</button></a>';
	echo '<a href="declineuserteam.php?t=' . $team . '&p=' . $player . '&msid=' . $messageId . '"><button type="button" class="btn">Decline</button></a>';
	
?>
