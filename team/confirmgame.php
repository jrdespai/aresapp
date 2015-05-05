<!DOCTYPE html>

<?php

	//Verify session, get DB info, add HTML page header, and add navbar
	include('../validate_session_sub.php');
	include('../connect.php');
	include('../header_sub.php');
	include('../navbar_sub.php');
?>
	
	<body>
		<p>Do you want to play Team #: 
			<?php
				echo $_GET['tid'];
			?>
		</p>
		<button class="btn"><a href="schedulegame.php?tid=<?php echo $_GET['tid']; ?>">Yes</a></button>
		<button class="btn"><a href="myteams.php">No</a></button>
	</body>

</html>