<!DOCTYPE html>


<?php
	//Check to make sure that the user isn't already logged in
	include('validate_logged_in.php');
	
	//Include the HTML header and navbar
	include('header.php');
	include('navbar.php');
?>

  <body>
<?php
	echo'	<form role="form" action="verify.php" method="post">
				<div class="form-group">
					<label for="username">Username:</label>
					<input type="text" class="form-control" id="username" name="username">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" class="form-control" id="password" name="password">
				</div>
				<button type="submit" class="btn btn-default">Login</button>
			</form>'
?>
</body>
</html>