<!DOCTYPE html>


<?php
	include('header.php');
?>

  <body>
  
<?php
	//local-connect.php
	
	$hostName 	= 'localhost';
	$userName	= 'root';
	$pass		= '';
	$database	= 'aresapp';
	
	//Connect to the DB
	$conn	= mysqli_connect($hostName, $userName, $pass, $database) or die('Connection error! (LOCAL)');
	
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$phone = $_POST['phone'];
	
	$query = "INSERT INTO player(playerName,playerEmail,playerUserName, playerPassword, playerCity, playerState, playerPhone) VALUES ('" . $name . "', '" . $email . "', '" . $username . "','" . $password . "', '" . $city . "','" . $state . "','" .$phone . "')";
	
	$result = mysqli_query($conn, $query);
	
	echo $result;
	
	
	
?>
</body>

</html>