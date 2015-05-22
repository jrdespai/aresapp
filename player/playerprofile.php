<!DOCTYPE html>


<?php
	include('../validate_session_sub.php');
	include('../functions/functions.php');

	$playerId = $_SESSION["playerId"];

	include('../connect.php');	
	
	$query = "SELECT * FROM player WHERE playerId = '" . $playerId . "'";
	
	$result = mysqli_query($conn, $query);	
	
	$playerData = mysqli_fetch_array($result);
	
	//Include the HTML header and navbar
	include('../header_sub.php');
	include('../navbar_sub.php');
?>
  <body>
	
		<div class="container-fluid bg-warning">
	
		<table class="table table-hover">
			<tr>
				<th>Pending Messages:</th>
			</tr>
			<?php
							//Get and display all messages
							displayChallengeMessages(getPlayerMessages($playerId, $conn));
						?>
		</table>
	
		<div class="row">
				<div class="col-sm-5">
					<p>Player Name: 
						<?php
							echo $playerData['playerName'];
						?>
						</p>
				</div>
			</div>

		

			<div class="row">
				<div class="col-sm-5">
						<p>City: 
							<?php
								echo $playerData['playerCity'];
							?>
						</p>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-5">
						<p>State: 
							<?php
								echo $playerData['playerState'];
							?>
						</p>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-5">
						<p>Email: 
							<?php
								echo $playerData['playerEmail'];
							?>
						</p>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-5">
						<p>Phone: 
							<?php
								echo $playerData['playerPhone'];
							?>
						</p>
				</div>
			</div>
		</div>
		
		<button class="btn"><a href="../team/myteams.php">My Teams</a></button>
		<button class="btn"><a href="../team/findteam.php">Join a Team</a></button>
		
  </body>
  
</html>