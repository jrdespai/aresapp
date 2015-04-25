<?php
	//If the user session is active, then re-direct to the welcome.php page
	session_name("user");
	session_start("user");
	
	if(isset($_SESSION['playerId'])){
		header('Location: welcome.php');
		exit;
	}
?>
