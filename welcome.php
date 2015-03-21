<!DOCTYPE html>


<?php
	session_name("user");
	session_start("user");

	$playerId = $_SESSION["playerId"];

	//local-connect.php
	
	$hostName 	= 'localhost';
	$userName	= 'root';
	$pass		= '';
	$database	= 'aresapp';
	
	//Connect to the DB
	$conn	= mysqli_connect($hostName, $userName, $pass, $database) or die('Connection error! (LOCAL)');	
	
	$query = "SELECT * FROM player WHERE playerId = '" . $playerId . "'";
	
	$result = mysqli_query($conn, $query);	
	
	$playerData = mysqli_fetch_array($result);
	include('header.php');
?>

  <body>
  

		<div class="container-fluid bg-warning">
				<?php
					echo '<p>Welcome back ' . $playerData['playerName'] . '</p>';
				?>
				<a href="player/playerprofile.php">My Profile</a>
				<a href="team/myteam.php">My Team</a>
		</div>


  
  </body>
  
</html>