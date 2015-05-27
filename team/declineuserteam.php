<?php
	//Connect to DB and session
	include('../connect.php');
	include('../validate_session_sub.php');
	include('../functions/functions.php');
	
	//Assign GET variables
	$team = $_GET['t'];
	$player = $_GET['p'];
	$mid = $_GET['msid'];
	
	//Insert a new row into teamPlayer with the current user's player id and the team id from the team selected
	insertMessage('Sorry, your request to join team ' . getTeamName($team, $conn) . ' was declined', getFilePrefix(__FILE__) . 'messages/deletemessage.php?msid=%msid%', 'Delete', $player, '', $conn);
	deleteMessage($mid, $conn);
	mysqli_query($conn, $query);
	
	//Close DB connection
	mysqli_close($conn);
	
	//Redirect to myteams.php
	header('Location: myteams.php');
?>