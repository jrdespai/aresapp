<!DOCTYPE html>

<?php

	//Set location variable for navbar use
	$location = __FILE__;

	//Verify session, get DB info, add HTML page header, and add navbar
	include('../validate_session_sub.php');
	include('../connect.php');
	include('../navbar.php');
	include_once('../functions/functions.php');
	
	//Add teams to confirmQueue
	$sqlResult = runQuery("INSERT INTO confirmQueue (team1, team2, time, location) VALUES ('" . $_GET['tid'] . "', " . $_SESSION['teamId'] . ", '" . $_POST['time'] . "', '" . $_POST['location'] . "');", $conn);

	//Send an update Email
	
	//Delete the team to be played from the gameQueue table
	$sqlResult = runQuery("DELETE FROM gameQueue WHERE teamID = '" . $_GET['tid'] . "';", $conn);
		
	$teamCaptain = getTeamCaptainID($_GET['tid'], $conn);
	
	//Insert a record into the message table
	$sqlResult = runQuery("INSERT INTO message (body, playerId, teamId) VALUES ('<tr><td>" . mysqli_real_escape_string($conn, getTeamName($_SESSION['teamId'], $conn)) . " Has challenged you to play!</td><td><button class=\"btn msgbtn\"><a href=\"" . getFilePrefix(__FILE__) . "team/schedule.php?t1=" . $_GET['tid'] . "&t2=" . $_SESSION['teamId'] . "&msid=%msid%\">Accept Challenge</a></button></td></tr>', '" . $teamCaptain . "', '" . $_GET['tid'] . "')", $conn);
	mysqli_close($conn);
	
?>
	
	<body>
		<p>Your request has been sent to play Team #: 
			<?php
				echo $_GET['tid'];
			?>
		</p>
	</body>

</html>