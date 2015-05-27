<?php

	//sendplayerrequest.php

	//Set location variable for navbar use
	$location = __FILE__;

	//Verify session, get DB info, add HTML page header, and add navbar
	include('../validate_session_sub.php');
	include_once('../connect.php');
	include('../navbar.php');
	include_once('../functions/functions.php');

	$team = $_POST['team'];
	$player = $_SESSION['playerId'];
	
	$sqlResult = runQuery("INSERT INTO message (body, playerId, teamId) VALUES ('<tr><td>" . mysqli_real_escape_string($conn, getPlayerName($player, $conn)) . " Wants to join " . getTeamName($team, $conn) . "!</td><td><button class=\"btn msgbtn\"><a href=\"" . getFilePrefix(__FILE__) . "team/confirmaddplayer.php?t=" . $team . "&p=" . $player . "&msid=%msid%\">Respond</a></button></td></tr>', '" . getTeamCaptainID($team, $conn) . "', '" . $team . "')", $conn);
	
	//check the sqlResult
	echo '<p class="jumbotron">Your request has been sent to team ' . getTeamName($team, $conn) . '<br>Check your profile page inbox for updates!</p>';
	
?>
