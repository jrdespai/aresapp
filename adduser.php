<!DOCTYPE html>


<?php
	include('header.php');
?>

  <body>
  
<?php
	include('connect.php');
	
	
	$dname = $_POST['name'];
	$name = mysqli_real_escape_string($dbc,$dname)
	
	$demail = $_POST['email'];
	$email = mysqli_real_escape_string($dbc,$demail)
	
	$dusername = $_POST['username'];
	$username = mysqli_real_escape_string($dbc,$dusername)
	
	$dpassword = create_hash($_POST['password']);
	$password = mysqli_real_escape_string($dbc,$dpassword)
	
	$dcity = $_POST['city'];
	$city = mysqli_real_escape_string($dbc,$dcity)
	
	$dstate = $_POST['state'];
	$state = mysqli_real_escape_string($dbc,$dstate)
	
	$dphone = $_POST['phone'];
	$phone = mysqli_real_escape_string($dbc,$dphone)
	
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