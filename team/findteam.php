<!DOCTYPE html>

<?php

	//Verify session, get DB info, add HTML page header, and add navbar
	include('../validate_session_sub.php');
	include('../connect.php');
	include('../header_sub.php');
	include('../navbar_sub.php');
	include('../functions/functions.php');

?>
	<form role="form" method="post" action="adduserteam.php">
		<div class="form-group">
			<label for="teams">Teams:</label>
			<select class="form-control" id="teams" name="team" size="5">
<?php

		//Populate Teams Select Box
		
		$query = "SELECT teamId, teamName FROM team WHERE teamId NOT IN (SELECT teamId FROM teamplayer WHERE playerId = '{$_SESSION['playerId']}');";
		
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
			<button type="submit" class="btn">Request to Join</button>
			<a href="registerteam.php"><button type="button" class="btn">Create New Team</button></a>
		</div>
	</form>
<?php
	echo $test;
?>
</html>