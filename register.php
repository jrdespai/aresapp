<!DOCTYPE html>


<?php

	//Set location variable for navbar use
	$location = __FILE__;

	//Validate that user isn't already logged in
	include('validate_logged_in.php');
	
	//Include the HTML header and navbar
	include('navbar.php');
?>
<body>

	<div class="container">

	<form role="form" action="adduser.php" method="post">
			
			<div class="form-group">
				<label for="name">Full Name:</label>
				<input type="text" class="form-control" id="name" name="name" required>
				
			</div>
			
			<div class="form-group">
				<label for="email">Email Address:</label>
				<input type="email" class="form-control" id="email" name="email" required>
			</div>
			
			<div class="form-group">
				<label for="username">Username:</label>
				<input id="usernamebox" type="text" class="form-control" id="username" name="username" onblur="checkUser(this.value)" required autocomplete="off">
				<div id="checkUser"></div>
			</div>
			
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password" onblur="checkPassword()" required>
			</div>
			
			<div class="form-group">
				<label for="confirmpassword">Confirm Password:</label>
				<input type="password" class="form-control" id="confirmpassword" name="confirmpassword" onblur="checkPassword()" required>
			</div>
			
			<div class="form-group">
				<label for="city">City:</label>
				<input type="text" class="form-control" id="city" name="city" required>
			</div>
			
			<div class="form-group">
				<label for="state">State:</label>
				<input type="text" class="form-control" id="state" name="state" required>
			</div>
			
			<div class="form-group">
				<label for="phone">Phone Number:</label>
				<input type="text" class="form-control" id="phone" name="phone" required>
			</div>
			
			
			<button type="submit" class="btn btn-default">Register</button>
		   </form>

		   </div>
		   
  </body>
  
</html>