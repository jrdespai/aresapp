<?php

	//Get prefix for current page
	include_once('functions/functions.php');
	$prefix = getFilePrefix($location);
	
	//Build links
	$faviconLink = $prefix . "images/favicon-bluechip.png";
	$ajaxLink = $prefix . "jscript/ajax.js";
	$javascriptLink = $prefix . "jscript/script.js";
	$styleLink = $prefix . "style/style.css";
	
	$mainLink = $prefix . "index.php";
	$logoLink = $prefix . "images/BlueChipLogo.png";
	$welcomeLink = $prefix . "welcome.php";
	$playerProfileLink = $prefix . "player/playerprofile.php";
	$myTeamsLink = $prefix . "team/myteams.php";
	$findTeamLink = $prefix . "team/findteam.php";
	$logoutLink = $prefix . "logout.php";
	
	echo '
		<html lang="en">
		 <head>
			
			<title>Blue Chip</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			
			<!-- Favicon Link -->
			<link rel="icon" href="' . $faviconLink . '">
			
			<!-- jQuery library -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
				
			<!-- Include the Ajax File -->
			<script src="' . $ajaxLink . '"></script>
			
			<!-- Javascript file -->
			<script src="' . $javascriptLink . '"></script>

			<!-- Latest compiled JavaScript -->
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		
			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
			<link rel="stylesheet" href="' . $styleLink . '">

			<style>
			
			</style>
			
		 </head>';
	
	echo '
			
			<nav id="bcnavigation" class="navbar navbar-fixed-top">
				<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNav">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="' . $mainLink . '" /><img id="bclogo" src="' . $logoLink . '" height="40" width = "100" /></a>
						</div>
						<div>
							<ul class="nav navbar-nav" id="mainNav">
								<li><a id="white" href="' . $welcomeLink . '">Home</a></li>
								<li class="dropdown">
									<a class="dropdown-toggle" id="white" data-toggle="dropdown" href="#">
									My Profile
									<span class="glyphicon glyphicon-plus"></span></a>
									<ul class="dropdown-menu">
										<li><a href="' . $playerProfileLink . '">My Profile</a></li>
									</ul>									
								</li>
								<li class="dropdown">
									<a class="dropdown-toggle" id="white" data-toggle="dropdown" href="#">
									My Teams
									<span class="glyphicon glyphicon-plus"></span></a>
									<ul class="dropdown-menu">
										<li><a href="' . $myTeamsLink . '">My Teams</a></li>
										<li><a href="' . $findTeamLink . '">Join a Team</a></li>
									</ul>	
								</li>
								<li><a id="white" href="' . $logoutLink . '">Logout</a></li>
							</ul>
						</div>
				</div>
			</nav>	';
?>