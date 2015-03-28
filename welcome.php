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
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNav">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#" />FireBright</a>
					</div>
					<div>
						<ul class="nav navbar-nav" id="mainNav">
							<li class="active"><a href="#">Home</a></li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								Services
								<span class="glyphicon glyphicon-plus"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">App Development</a></li>
									<li><a href="#">Business Automation</a></li>
								</ul>
							</li>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Contact Us</a></li>
						</ul>
					</div>
			</div>
		</nav>	-->
 <body>
		<div class="container-fluid">
				<?php
					echo '<p>Welcome back ' . $playerData['playerName'] . '</p>';
				?>
				<a href="player/playerprofile.php">My Profile</a>
				<a href="team/myteam.php">My Team</a>
		</div>


  
  </body>
  
</html>