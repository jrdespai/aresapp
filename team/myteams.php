<!DOCTYPE html>

<?php

	//Set location variable for navbar use
	$location = __FILE__;

	//Verify session, get DB info, add HTML page header, and add navbar
	include('../validate_session_sub.php');
	include('../connect.php');
	include('../navbar.php');
?>
	<form role="form" method="post" action="teamprofile.php">
		<div class="form-group">
			<label for="teams">My Teams:</label>
			<select class="form-control" id="teams" name="team" size="5">
<?php
		
		//Populate Teams Select Box
		
		$playerId = $_SESSION["playerId"];
		
		$query = "SELECT teamId, teamName FROM team WHERE teamId IN (SELECT teamId FROM teamplayer WHERE playerId = '" . $playerId . "');";
		
		$result = mysqli_query($conn, $query);
		
		$selected = true;
		
		while($row = $result->fetch_array())
		{
			if ($selected){
				echo "<option " . "selected=\"selected\"" . " value={$row['teamId']}>{$row['teamName']}</option>"; 
				$selected = false;
			}
			else{
				echo "<option value={$row['teamId']}>{$row['teamName']}</option>";
			}
		}
		
		//Close DB connection
		mysqli_close($conn);
?>
			</select>
			<button type="submit" class="btn">View Team Page</button>
			<a href="findteam.php"><button type="button" class="btn">Join a Team</button></a>
		</div>
	</form>

</html>