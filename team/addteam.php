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
	
	$userQuery = "SELECT playerUserName FROM player WHERE playerId = '" . $_SESSION['playerId'] . "'";
	
	$captainResult = mysqli_query($conn, $userQuery);
	
	$captainArray = mysqli_fetch_array($captainResult);
	
	$captain = $captainArray['playerUserName'];
	
	echo $captain;
	
	$query = "INSERT INTO team(teamName, teamCaptain) VALUES ('" . $name . "', '" . $captain . "')";
	
	$result = mysqli_query($conn, $query);
	
	
	$query = "INSERT INTO teamplayer(teamId, playerId) VALUES ('" . mysqli_insert_id($conn) . "', '" . $_SESSION['playerId'] . "')";
	
	$result = mysqli_query($conn, $query);
	
	
	echo $captain;
	
	header('Location: ../welcome.php');
	
	
	
	
	
?>
</body>

</html>