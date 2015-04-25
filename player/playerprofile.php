<!DOCTYPE html>


<?php

	include('../validate_session_sub.php');

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