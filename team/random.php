<?php

	//Connect to DB and session
	include('../validate_session_sub.php');
	include('../connect.php');
	include_once('../functions/functions.php');

	checkTeam($_SESSION['teamId'], $conn);
	
	//Randomly select 1 record from the gameQueue table
	$query = "SELECT * FROM (SELECT * FROM gameQueue ORDER BY RAND()) AS Results LIMIT 1";
	$sqlResult = mysqli_query($conn, $query);
	
	//Make sure that there is a record in the result
	$numTeams = mysqli_num_rows($sqlResult);
	if ($numTeams == 0){
		//Add the current user to the waiting queue and direct them to the waiting confirmation page
		$query = "INSERT INTO gameQueue (teamID) VALUES ('" . $_SESSION['teamId'] . "');";
		$sqlResult = mysqli_query($conn, $query);
		header('Location: waiting.php');
		exit;
	}
	
	$result = mysqli_fetch_array($sqlResult);
	
	
	/*//Loop until we get a random team
	do{
		$randomResult = getRandomTeam($conn);
		$team = $randomResult['teamID'];
	} while ($team == $_SESSION['teamId'])
	*/
	//Display the randomly selected team
	header('Location: confirmgame.php?tid=' . $result['teamID']);
	
	//Close the DB connection
	mysqli_close($conn);
	
?>