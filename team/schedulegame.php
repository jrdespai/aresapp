<!DOCTYPE html>

<?php

	//Verify session, get DB info, add HTML page header, and add navbar
	include('../validate_session_sub.php');
	include('../connect.php');
	include('../header_sub.php');
	include('../navbar_sub.php');
	
	//Randomly select 1 record from the gameQueue table
	$query = "DELETE FROM gameQueue WHERE teamID = '" . $_GET['tid'] . "';";
	$sqlResult = mysqli_query($conn, $query);
		
	mysqli_close($conn);
	
?>
	
	<body>
		<p>You have been scheduled to play Team #: 
			<?php
				echo $_GET['tid'];
			?>
		</p>
	</body>

</html>