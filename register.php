<!DOCTYPE html>


<?php
	include('header.php');
?>

  <body>
  


  


<?php
echo '<form role="form" action="adduser.php" method="post">
		
		<div class="form-group">
			<label for="name">Full Name:</label>
			<input type="text" class="form-control" id="name" name="name">
		</div>
		
		<div class="form-group">
			<label for="email">Email Address:</label>
			<input type="email" class="form-control" id="email" name="email">
		</div>
		
		<div class="form-group">
			<label for="username">Username:</label>
			<input type="text" class="form-control" id="username" name="username">
		</div>
		
		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" class="form-control" id="password" name="password">
		</div>
		
		<div class="form-group">
			<label for="confirmpassword">Confirm Password:</label>
			<input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
		</div>
		
		<div class="form-group">
			<label for="city">City:</label>
			<input type="text" class="form-control" id="city" name="city">
		</div>
		
		<div class="form-group">
			<label for="state">State:</label>
			<input type="text" class="form-control" id="state" name="state">
		</div>
		
		<div class="form-group">
			<label for="phone">Phone Number:</label>
			<input type="text" class="form-control" id="phone" name="phone">
		</div>
		
		
		<button type="submit" class="btn btn-default">Login</button>
	   </form>'
?>

  </body>
  
</html>