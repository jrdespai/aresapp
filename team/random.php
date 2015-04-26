<?php

	//Connect to DB and session
	include('../validate_session_sub.php');
	include('../connect.php');

	//Get all records from the gameQueue
	query = 'SELECT * FROM gameQueue ORDER BY RAND()';
	result = mysqli_query($conn, $query);
	numTeams = mysqli_num_rows($result);
	
	mysqli_close($conn);
	
?>