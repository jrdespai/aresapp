<?php

	//Purpose:			Insert a modal dialog into the page
	//Referenced:		https://www.youtube.com/watch?v=7YJUFaZMS8Q
	//Parameters:		$id		-	The id of the modal to create (this is referenced in the href of the link to the modal)
	//					$header	-	The header/title text of the modal box/message
	//					$body	-	The body text of the modal box/message
	//Notes:			There must be a link that refernces the id passed, preceded by a '#' character, as well as a data-toggle="modal" attribute in the link, see below:
	//							********** *******************
	//					<a href="#contact" data-toggle="modal">Click</a>
	function createModal($id, $header, $body){
		echo '
	<div class="modal fade" id="' . $id . '" role="dialog">
		<div class = "modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>' . $header . '</h4>
				</div>
				<div class="modal-body">
					<p>' . $body . '</p>
				</div>
				<div class="modal-footer">
					<a class="btn btn-default" data-dismiss="modal">Close</a>
				</div>
			</div>
		</div>
	</div>';
	}

	//Delete a message from the message table
	function deleteMessage($mid, $conn){
		$sqlResult = runQuery("DELETE FROM message WHERE id = '" . $mid . "';", $conn);
		return $sqlResult;
	}

	//Insert a new message into the message table
	function insertMessage($body, $linkString, $buttonText, $player, $team, $conn){
		$sqlResult = runQuery("INSERT INTO message (body, playerId, teamId) VALUES ('<tr><td>" . $body . "</td><td><button class=\"btn msgbtn\"><a href=\"" . $linkString . "&msid=%msid%\">" . $buttonText . "</a></button></td></tr>', '" . $player . "', '" . $team . "')", $conn);
	}
	
	//Build and return the prefix (ex-../../ string) to return to the bluechip folder
	//Referenced:	http://www.tizag.com/phpT/php-string-strpos.php
	function getFilePrefix($location){
		
		//Find bluechip string location
		$startLocation = strpos($location, 'bluechip');
		
		//counter variable for number of subfolders
		$intFolders = 0;
		
		//string variable to hold subfolder prefix
		$strPrefix = "";
		
		while($startLocation = strpos($location, "\\", $startLocation + 1)){

			if(++$intFolders > 1){
				$strPrefix .= "../";
			}			
		}
		
		return $strPrefix;
		
	}
	
	//Return playerName of player
	function getPlayerName($playerId, $conn){
		$result = runQuery("SELECT playerName FROM player WHERE playerId = " . $playerId, $conn);
		$row = mysqli_fetch_array($result);
		$result->close();
		return $row['playerName'];
	}

	//Return playerId of team captain
	function getTeamCaptainID($teamId, $conn){
		$result = runQuery("SELECT teamCaptain FROM team WHERE teamId = " . $teamId, $conn);
		$row = mysqli_fetch_array($result);
		$result->close();
		return $row['teamCaptain'];
	}

	//Run a Sql Query
	function runQuery($strQuery, $conn){
		$query = $strQuery;
		return mysqli_query($conn, $query);
	}

	//Get data for all pending game requests for the teamId
	function getTeamMessages($teamId, $conn){
		
		return returnResultsArray("SELECT id, body FROM message WHERE teamId = " . $teamId . ";", $conn);
		
	}
	
	//Get messages for a player
	function getPlayerMessages($playerId, $conn){
		
		return returnResultsArray("SELECT id, body FROM message WHERE playerId = " . $playerId . ";", $conn);
		
	}
	
	//Returns a comma separated list of teams that the player is a captain of
	function getTeamsForCaptain($playerId, $conn){
		$query = "SELECT teamId FROM team WHERE teamCaptain = " . $playerId;
		$teams = returnResultsArray($query, $conn);
		return implode(',', getSingleArray($teams, "teamId"));
	}
	
	//Pass a multi-dimensional array and receive a single dimensional array
	function getSingleArray($array, $colName){
		
		$retArray = array();
		
		foreach($array as $row){
			$retArray[] = $row[$colName];
		}
		
		return $retArray;
	}
	
	//Get multiple lines of results and return them in an array
	function returnResultsArray($query, $conn){
		$result = runQuery($query, $conn);
		
		$rows = array();
		
		while ($row = $result->fetch_array()){
			$rows[] = $row;
		}
		
		$result->close();
		
		return $rows;
	}
	
	//Add each message passed in the $rows array as a div
	function displayChallengeMessages($rows){//, $conn){
	
		foreach($rows as $row){
			$body = $row['body'];;
			$body = str_replace("%msid%", $row['id'], $body);
			echo $body;
			//$end = substr($body, 5);
			//echo "<div data-msid=" . $row['id'] . " " . $end;
			
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