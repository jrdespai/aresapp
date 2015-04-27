<!DOCTYPE html>


<?php
	
	//Ensure that the user is logged
	include('validate_session.php');

	$playerId = $_SESSION["playerId"];

	include('connect.php');
	
	
	$query = "SELECT * FROM player WHERE playerId = '" . $playerId . "'";
	
	$result = mysqli_query($conn, $query);	
	
	$playerData = mysqli_fetch_array($result);

	//Close DB connection
	mysqli_close($conn);
	
	//Include the HTML header and navbar
	include('header.php');
	include('navbar.php');

?>

 <body>
		<div class="container-fluid">
				<?php
					echo '<p class="jumbotron">Welcome back ' . $playerData['playerName'] . '</p>';
				?>
				<button class="btn"><a href="player/playerprofile.php">My Profile</a></button>
				<button class="btn"><a href="team/myteams.php">My Teams</a></button>
		</div>


  
  </body>
  
</html>