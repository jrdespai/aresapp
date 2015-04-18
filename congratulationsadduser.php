<!DOCTYPE html>


<?php
	session_name("user");
	session_start("user");

	$playerId = $_SESSION["playerId"];

	include('connect.php');
	
	$query = "SELECT * FROM player WHERE playerId = '" . $playerId . "'";
	
	$result = mysqli_query($conn, $query);	
	
	$playerData = mysqli_fetch_array($result);
	include('header.php');
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