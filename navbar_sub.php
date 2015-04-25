<?php
	echo '

			<nav class="navbar navbar-default navbar-fixed-top grey">
				<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNav">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="../index.php" /><img src="../images/BlueChipLogo.png" height="35" width = "100" /></a>
						</div>
						<div>
							<ul class="nav navbar-nav" id="mainNav">
								<li><a href="../welcome.php">Home</a></li>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									My Profile
									<span class="glyphicon glyphicon-plus"></span></a>
									<ul class="dropdown-menu">
										<li><a href="../player/playerprofile.php">My Profile</li>
										<li><a href="../team/findteam.php">Join a Team</a></li>
									</ul>									
									</li>
								<li><a href="../team/myteam.php">My Team</a></li>
								<li><a href="../logout.php">Logout</a></li>
							</ul>
						</div>
				</div>
			</nav>	'
?>