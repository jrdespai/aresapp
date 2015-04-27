<?php

	include('connect.php');
	include('encrypt.php');
	
	
	$dusername = $_POST['username'];
	$username = mysqli_real_escape_string($conn, $dusername);
	
	$dpassword = $_POST['password'];
	$password = mysqli_real_escape_string($conn, $dpassword);
	
	$query = "SELECT * FROM player WHERE playerUserName = '" . $username . "'";
	
	$result = mysqli_query($conn, $query);
	$info = mysqli_fetch_array($result);
	
	
	$blnPassword = validate_password($password, $info['playerPassword']);
	
	if(mysqli_num_rows($result) == 0 || $blnPassword == false){
	
		header('Location: login.php?rc=1');
		exit;
		
	}
	else{
		echo 'Found a record';
	}	

	
	//Close DB connection
	mysqli_close($conn);
	
	session_name("user");
	session_start("user");
	
	
	
	
	$_SESSION["playerId"] = $info['playerId'];
	
	echo $_SESSION["playerId"];
	
	header('Location: welcome.php');
	
	
?>