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
	
	//Set location variable for navbar use
	$location = __FILE__;
	
	//Include the HTML header and navbar
	include('navbar.php');

?>

 <body id="welcomebody">
		<div class="container">
				<div class="row">
					<div class="span6 offset3">
						<?php
							echo '<p id="welcomebanner" class="jumbotron blue">Welcome back<br><span id="nametext">' . $playerData['playerName'] . '</span></p>';
						?>
					</div>
					<div class="row">
						<div class="col-md-6">
							<a href="player/playerprofile.php"><button class="btn btnwelcome">My Profile</button></a>
						</div>
						<div class="col-md-6">
							<a href="team/myteams.php"><button class="btn btnwelcome">My Teams</button></a>
						</div>
					</div>
				</div>
		</div>


  
  </body>
  
</html>