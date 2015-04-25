<?php

	//Checks whether the user session is set (active).  If it is not, then direct the user to the index.php page

	session_name("user");
	session_start("user");
	
	if (!isset($_SESSION['playerId'])){
		header('Location: index.php');
		exit;
	}
?>