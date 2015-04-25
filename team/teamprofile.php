<!DOCTYPE html>


<?php
	
	//Verify session, get DB info, add HTML page header, and add navbar
	include('../validate_session_sub.php');
	include('../connect.php');
	include('../header_sub.php');
	include('../navbar_sub.php');

	$playerId = $_SESSION["playerId"];
	
	$_SESSION['teamId'] = $_POST['team'];

	$query = "SELECT * FROM team WHERE teamId = '" . $_POST['team'] . "';";
	
	$result = mysqli_query($conn, $query);	
	
	$teamData = mysqli_fetch_array($result);
	
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
			<p><h1>
				<?php
					echo '<p>' . $teamData['teamName'] . '</p>';
				?>
			</h1></p>
		</div>
		
		<div class="container-fluid bg-warning">
				<a href="removeuserteam.php">Leave Team</a>
		</div>

		<div class="container">
			<div class="h2">
			<?php
				echo '<p>' . $teamData['teamCity'] . ', ' . $teamData['teamState'] .  '</p>';
			?>
			</div>
		</div>
		

		<div class="container">
			<div class="h3">
					<p>Soccer</p>
			</div>

				<div class="h4">
					<?php
						echo '<p>' . $teamData['teamCaptain'] . '</p>';
					?>
				<div>
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