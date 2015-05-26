<!DOCTYPE html>

<?php

//Schedule.php

	//Set location variable for navbar use
	$location = __FILE__;

	//Verify session, get DB info, add HTML page header, and add navbar
	include('../validate_session_sub.php');
	include('../connect.php');
	include('../navbar.php');
	include_once('../functions/functions.php');
	
?>
	
	<body>
		<p> 
			<?php
				$game = scheduleGame($_GET['t1'], $_GET['t2'], $conn);
				if($game){
					$result = runQuery("DELETE FROM message WHERE id=" . $_GET['msid'], $conn);
					echo 'Your game was scheduled!';
				}
				else{
					echo 'There was an error scheduling your game';
				}
				
			?>
		</p>
	</body>

</html>