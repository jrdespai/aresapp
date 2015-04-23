<html lang="en">
  <head>
    <!-- Meta tag -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

	<!-- Bootstrap Reference -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	
    <!-- Web Page Title -->
    <title>Ares App</title>
	
	<!--Image retreived from: http://www.seeyalater.org/wp-content/uploads/22526.jpg-->
	<link rel="icon" href="images/football.png" />
	
  </head>
  <body>
<?php

	include('connect.php');
	include('encrypt.php');
	
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
	$query = "SELECT * FROM player WHERE playerUserName = '" . $username . "' AND playerPassword = '" . $password . "'";
	
	$result = mysqli_query($conn, $query);
	$info = mysqli_fetch_array($result);
	
	if(mysqli_num_rows($result) == 0){
	
		echo 'Incorrect Username or Password';
		//exit;
		
	}
	else{
		echo 'Found a record';
	}	
	
	$blnPassword = validate_password($password, $info['playerPassword']);
	

	
	session_name("user");
	session_start("user");
	
	
	
	
	$_SESSION["playerId"] = $info['playerId'];
	
	echo $_SESSION["playerId"];
	
	header('Location: welcome.php');
	
	
?>
</body>