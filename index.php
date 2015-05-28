<!DOCTYPE html>


<?php

	//Set location variable for navbar use
	$location = __FILE__;

	//Check to make sure that the user isn't already logged in
	include('validate_logged_in.php');
	include('navbar.php');
?>

 
		
 <body id="welcomebody">
		<div class="container">
			
					<div class="row">
						<div class="col-md-6">
							<a href="login.php"><button class="btn btnindex">Sign in</button></a>
						</div>
						<div class="col-md-6">
							<a href="register.php"><button class="btn btnindex">Register</button></a>
						</div>
					</div>
				</div>
		</div>


  
  </body>

  
</html>