<!DOCTYPE html>


<?php
	
	//Validate that user session is active and join
	include('validate_session.php');

	$playerId = $_SESSION["playerId"];

	include('connect.php');
	
	$query = "SELECT * FROM player WHERE playerId = '" . $playerId . "'";
	
	$result = mysqli_query($conn, $query);	
	
	$playerData = mysqli_fetch_array($result);
	include('header.php');
	include('navbar.php');
?>

  <body>
  

		<div class="container-fluid bg-warning">
				<?php
					echo '<p>Congratulations ' . $playerData['playerName'] . '</p>';
				?>
				<a href="welcome.php">Continue to Glory...</a>
		</div>


  
  </body>
  
</html>