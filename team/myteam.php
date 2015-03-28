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
	
	$query = "SELECT * FROM team WHERE teamId = (SELECT teamId FROM teamplayer WHERE playerId = '" . $playerId . "')";
	
	$result = mysqli_query($conn, $query);	
	
	$teamData = mysqli_fetch_array($result);
	
	
	include('header.php');
?>


		<!--<html lang="en">
		 <head>
			
			<title>Ares App</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			
		
			
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
			<link rel="stylesheet" href="style/style.css">

	
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

		
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		

		 </head>-->

  <body>
	
		<div class="container-fluid bg-warning">
			<p>Team Name
				<?php
					echo '<p>' . $teamData['teamName'] . '</p>';
				?>
			</p>
		</div>

		<div class="container">
			<div class="col-10-sm">
					<p>Soccer</p>
			</div>

			<div class="row">
				<div class="col-sm-5">
						<p>Team Captain:</p>
				</div>

				<div class="col-sm-5">
					<?php
						echo '<p>' . $teamData['teamCaptain'] . '</p>';
					?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-5">
						<p>Location:</p>
				</div>

				<div class="col-sm-5">
					<?php
						echo '<p>' . $teamData['teamCity'] . ', ' . $teamData['teamState'] .  '</p>';
					?>
				</div>
			</div>
		
		<div class="container">
			<table class="table">
				<thead>
					<tr>
						<th>Recent Games</th>
						<th>Team Played</th>
						<th>Win/Loss</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>3/15/15</td>
						<td>Losers</td>
						<td>win</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="container">

			<div class="row">
				
				<div class="col-sm-5">
						<p>Progress:</p>
				</div>

				<div class="col-sm-5">
						<p>50%</p>
				</div>
				
				<div class="col-sm-5">
						<p>Level:</p>
				</div>

				<div class="col-sm-5">
						<p>150</p>
				</div>
				
			</div>
		</div>
		
  </body>
  
</html>