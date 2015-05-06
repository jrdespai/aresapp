<?php
	include('../connect.php');
	
	$username = $_GET['usr'];
	
	$query = "Select * from player Where playerUserName = '" . $username . "';";
	$sqlResult = mysqli_query($conn, $query);
	$numRows = $sqlResult->num_rows;
	
	if ($numRows > 0){
		echo "1";
	}
	else{
		echo "0";
	}
	
	mysqli_close($conn);
?>