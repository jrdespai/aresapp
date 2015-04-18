<!DOCTYPE html>


<?php
	include('header.php');
?>

  <body>
  
<?php
	include('connect.php');
	
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$phone = $_POST['phone'];
	
	$query = "INSERT INTO player(playerName,playerEmail,playerUserName, playerPassword, playerCity, playerState, playerPhone) VALUES ('" . $name . "', '" . $email . "', '" . $username . "','" . $password . "', '" . $city . "','" . $state . "','" .$phone . "')";
	
	$result = mysqli_query($conn, $query);
	
	$query = "SELECT * FROM player WHERE playerUserName = '" . $username . "' AND playerPassword = '" . $password . "'";
	
	$result = mysqli_query($conn, $query);
		
	session_name("user");
	session_start("user");
	
	
	$id = mysqli_fetch_array($result);
	
	$_SESSION['playerId'] = $id['playerId']; 
	
	header('Location: congratulationsadduser.php');
	
	
	
	
	
?>
</body>

</html>