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
	//local-connect.php
	
	$hostName 	= 'localhost';
	$userName	= 'root';
	$pass		= '';
	$database	= 'aresapp';
	
	//Connect to the DB
	$conn	= mysqli_connect($hostName, $userName, $pass, $database) or die('Connection error! (LOCAL)');
	
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
	$query = "SELECT * FROM player WHERE playerUserName = '" . $username . "' AND playerPassword = '" . $password . "'";
	
	$result = mysqli_query($conn, $query);
	
	if(mysqli_num_rows($result) == 0){
	
		echo 'Incorrect Username or Password';
		//exit;
		
	}
	else{
		echo 'Found a record';
	}
	
	session_name("user");
	session_start("user");
	
	
	$id = mysqli_fetch_array($result);
	
	$_SESSION["playerId"] = $id['playerId'];
	
	echo $_SESSION["playerId"];
	
	header('Location: welcome.php');
	
	
?>
</body>