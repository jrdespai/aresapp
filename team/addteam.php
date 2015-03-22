<!DOCTYPE html>


<?php
	session_name("user");
	session_start("user");
	include('../header.php');
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
	$sport = $_POST['sport'];
	
	$query = "INSERT INTO team(teamName) VALUES ('" . $name . "')";
	
	$result = mysqli_query($conn, $query);
	
	$query = "INSERT INTO teamplayer(teamId, playerId) VALUES ('" . $name . "', '" . $_SESSION['playerId'] . ")";
	
	$result = mysqli_query($conn, $query);
	
	
	//header('Location: congratulationsadduser.php');
	
	
	
	
	
?>
</body>

</html>