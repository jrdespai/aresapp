<!DOCTYPE html>

<?php

	//Verify session, get DB info, add HTML page header, and add navbar
	include('../validate_session_sub.php');
	include('../connect.php');
	include('../header_sub.php');
	include('../navbar_sub.php');
	
	//Add teams to confirmQueue
	$query = "INSERT INTO confirmQueue (team1, team2, time, location) VALUES ('" . $_GET['tid'] . "', " . $_SESSION['teamId'] . ", '" . $_POST['time'] . "', '" . $_POST['location'] . "');";
	$sqlResult = mysqli_query($conn, $query);

	//Send an update Email
	
	
	//Delete the team to be played from the gameQueue table
	$query = "DELETE FROM gameQueue WHERE teamID = '" . $_GET['tid'] . "';";
	$sqlResult = mysqli_query($conn, $query);
		
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