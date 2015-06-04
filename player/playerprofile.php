<!DOCTYPE html>


<?php
	include('../validate_session_sub.php');
	include_once('../functions/functions.php');

	$playerId = $_SESSION["playerId"];

	include('../connect.php');	
	
	$query = "SELECT * FROM player WHERE playerId = '" . $playerId . "'";
	
	$result = mysqli_query($conn, $query);	
	
	$playerData = mysqli_fetch_array($result);
	
	//Set location variable for navbar use
	$location = __FILE__;
	
	//Include the HTML header and navbar
	include('../navbar.php');
?>
  <body>
	
		<div class="container-fluid bg-warning">
			<div class="container">
				<div class="row">
					<div  class="col-sm-3 col-xs-6">
						<div id="playerprofilepic" class="panel">
							<div class="panel-heading">
								<p>
									<img src="../images/register.jpg" alt="Player Profile" /> 
								</p>
							</div>
							<div class="panel-body">	
							<button class="btn"><a href="../team/myteams.php">My Teams</a></button>
							<button class="btn"><a href="../team/findteam.php">Join a Team</a></button>
							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xs-6">
						<p id="usernameprofile"> 
							<?php
								echo $playerData['playerName'];
							?>
						</p>
						<p> 
							<?php
								echo $playerData['playerCity'];
								echo $playerData['playerState'];
							?>
						</p>
					
					</div>
				</div>
			</div>
			<p class="h3">Messages:</p>
	
			<div id="messages">
				<table class="table table-hover">
					<?php
						//Get and display all messages
						displayChallengeMessages(getPlayerMessages($playerId, $conn));
					?>
				</table>
			</div>
		
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
		
		
		
  </body>
  
</html>