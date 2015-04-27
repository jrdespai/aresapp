<?php
	//Connect to DB and session
	include('../connect.php');
	include('../validate_session_sub.php');
	
	//Insert a new row into teamPlayer with the current user's player id and the team id from the team selected
	$query = 'INSERT INTO teamplayer (teamId, playerId) VALUES(' . $_POST['team'] . ', ' . $_SESSION['playerId'] . ')';
	mysqli_query($conn, $query);
	
	//Close DB connection
	mysqli_close($conn);
	
//Here we need to set the teamId variable in a session variable.  This needs to be done upon login as well
	header('Location: myteams.php');
?>