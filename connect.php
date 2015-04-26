<?php
	$hostName 	= 'bluechip.cquy7bbypghg.us-west-2.rds.amazonaws.com:3306';
	$userName	= 'bluechipmaster';
	$pass		= 'bluechip';
	$database	= 'bluechip';
	
		//Connect to the DB
	$conn	= mysqli_connect($hostName, $userName, $pass, $database) or die('Connection error! (LOCAL)');
?>