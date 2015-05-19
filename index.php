<!DOCTYPE html>


<?php
	//Check to make sure that the user isn't already logged in
	include('validate_logged_in.php');
	include('header.php');
	include('navbar.php');
?>

  <body>
        <div class="container-fluid">
				<button class="btn"><a href="login.php">Sign in</a></button>
				<button class="btn"><a href="register.php">Register</a></button>
		</div>

  
  </body>
  
</html>