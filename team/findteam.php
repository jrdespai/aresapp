<?php

	//Verify session, get DB info, add HTML page header, and add navbar
	include('../validate_session_sub.php');
	include('../connect.php');
	include('../header_sub.php');
	include('../navbar_sub.php');

?>
	<form role="form" method="post" action="adduserteam.php">
		<div class="form-group">
			<label for="teams">Teams:</label>
			<select class="form-control" id="teams" name="team" size="5">
<?php

		//Populate Teams Select Box
		
		$query = "SELECT teamId, teamName FROM team;";
		
		$result = mysqli_query($conn, $query);
		
		while($row = $result->fetch_array())
		{
			echo "<option value={$row['teamId']}>{$row['teamName']}</option>";
		}
?>
			</select>
			<button type="submit" class="btn">Request to Join</button>
		</div>
	</form>

</html>