<!DOCTYPE html>

<?php

	//Set location variable for navbar use
	$location = __FILE__;

	//Verify session, get DB info, add HTML page header, and add navbar
	include('../validate_session_sub.php');
	include('../connect.php');
	include('../navbar.php');
?>
	
	<body>
		<p>Waiting for a matching team...</p>
	</body>

</html>