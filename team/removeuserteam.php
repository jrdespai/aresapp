<?php
	//Connect to DB and validate session
	include('../connect.php');
	include('../validate_session_sub.php');
	
	//Remove row from teamPlayer with the current user's player id and the team id from the current page
	$query = 'DELETE FROM teamplayer WHERE teamId = ' . $_SESSION['teamId'] . ' AND playerId = ' . $_SESSION['playerId'] . ';' ;
	mysqli_query($conn, $query);
	
	//Close DB connection
	mysqli_close($conn);
	
//Here we need to set the teamId variable in a session variable.  This needs to be done upon login as well
	header('Location: myteams.php');
?>