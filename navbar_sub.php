<?php
	echo '

			<nav id="bcnavigation" class="navbar navbar-fixed-top">
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
								<li><a id="white" href="../welcome.php">Home</a></li>
								<li class="dropdown">
									<a class="dropdown-toggle" id="white" data-toggle="dropdown" href="#">
									My Profile
									<span class="glyphicon glyphicon-plus"></span></a>
									<ul class="dropdown-menu">
										<li><a href="../player/playerprofile.php">My Profile</a></li>
									</ul>									
								</li>
								<li class="dropdown">
									<a class="dropdown-toggle" id="white" data-toggle="dropdown" href="#">
									My Teams
									<span class="glyphicon glyphicon-plus"></span></a>
									<ul class="dropdown-menu">
										<li><a href="../team/myteams.php">My Teams</a></li>
										<li><a href="../team/findteam.php">Join a Team</a></li>
									</ul>	
								</li>
								<li><a id="white" href="../logout.php">Logout</a></li>
							</ul>
						</div>
				</div>
			</nav>	'
?>