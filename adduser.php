<?php

	include('connect.php');
	include('encrypt.php');
	
	$dname = $_POST['name'];
	$name = mysqli_real_escape_string($conn,$dname);
	
	$demail = $_POST['email'];
	$email = mysqli_real_escape_string($conn,$demail);
	
	$dusername = $_POST['username'];
	$username = mysqli_real_escape_string($conn,$dusername);
	
	$dbeforepassword = $_POST['password'];
	$beforepassword = mysqli_real_escape_string($conn,$dbeforepassword);
	
	$dcpassword = $_POST['confirmpassword'];
	$cpassword = mysqli_real_escape_string($conn,$dcpassword);
	
	$dcity = $_POST['city'];
	$city = mysqli_real_escape_string($conn,$dcity);
	
	$dstate = $_POST['state'];
	$state = mysqli_real_escape_string($conn,$dstate);
	
	$dphone = $_POST['phone'];
	$phone = mysqli_real_escape_string($conn,$dphone);
	
	//Verify two passwords
	if ($beforepassword == $cpassword)
	{
		$password = create_hash($beforepassword);
	}
	else
	{
		mysqli_close($conn);
		header('Location: register.php?rc=1');
	}
	
	$query = "INSERT INTO player(playerName,playerEmail,playerUserName, playerPassword, playerCity, playerState, playerPhone) VALUES ('" . $name . "', '" . $email . "', '" . $username . "','" . $password . "', '" . $city . "','" . $state . "','" .$phone . "')";
	
	$result = mysqli_query($conn, $query);
	
	$query = "SELECT * FROM player WHERE playerUserName = '" . $username . "' AND playerPassword = '" . $password . "'";
	
	$result = mysqli_query($conn, $query);
		
	session_name("user");
	session_start("user");
	
	$id = mysqli_fetch_array($result);
	
	$_SESSION['playerId'] = $id['playerId']; 
	
	//Close DB connection
	mysqli_close($conn);
	
	header('Location: congratulationsadduser.php');
	
?>