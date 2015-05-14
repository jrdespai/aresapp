<?php

	//Get data for all pending game requests for the teamId
	function getMessages($teamId, $conn){
		
		//The current team would be team2 in the confirmQueue table, so we only need to query where teamId (opponent ID) is in the team1 field
		$query = "SELECT * FROM confirmQueue WHERE team1 = " . $teamId . ";";
		
		$result = mysqli_query($conn, $query);	
		
		$rows = array();
		
		while ($row = $result->fetch_array()){
			$rows[] = $row;
		}
		
		$result->close();
		
		return $rows;
		
	}
	
	//Add each message passed in the $rows array as a div
	function displayMessages($rows, $conn){
	
		foreach($rows as $row){
			echo '<div id="message">' . getTeamName($row['team2'], $conn) . ' Has challenged you to play!<button class="btn"><a href="schedule.php?t1=' . $row['team1'] . '&t2=' . $row['team2'] . '">Accept Challenge</a></button></div>';
		}
	}
	
	//Return the name corresponding to the teamId passed as an argument
	function getTeamName($teamId, $conn){
		$query = "SELECT * FROM team WHERE teamId = " . $teamId . ";";
		
		$result = mysqli_query($conn, $query);	
		
		$teamData = mysqli_fetch_array($result);
		
		$result->close();
		
		return $teamData['teamName'];
	}
	
	//Schedule a game after confirmation by removing the record from the confirmQueue and adding it to the schedule table
	function scheduleGame($team1, $team2, $conn){
	
		$query = "SELECT * FROM confirmQueue WHERE team1 = " . $team1 . " AND team2 = " . $team2 . ";";
		
		$result = mysqli_query($conn, $query);	
		
		$game = mysqli_fetch_array($result);
		
		$query = "INSERT INTO schedule (home, visitor, time, location) VALUES (" . $game['team1'] . ", " . $game['team2'] . ", '" . $game['time'] . "', '" . $game['location'] . "');";
		
		$result = mysqli_query($conn, $query);
		
		$query = "DELETE FROM confirmQueue WHERE id = " . $game['id'];
		
		$result = mysqli_query($conn, $query);
		
		return $game;
	
	}
	
	function getRandomTeam($conn){
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
	}
	
	function checkTeam($team, $conn){
		$query = "SELECT * FROM gameQueue WHERE teamID = " . $team;
		$checkResult =  mysqli_query($conn, $query);
		
		//Make sure that there is a record in the result
		$numTeams = mysqli_num_rows($checkResult);
		
		if($numTeams > 0){
			header("Location: myteams.php");
			exit;
		}
	}

?>