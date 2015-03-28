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

<!--
		<html lang="en">
		 <head>
			
			<title>Ares App</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			
		
			
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
			<link rel="stylesheet" href="style/style.css">

	
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

		
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		

		 </head>
-->
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