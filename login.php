<!DOCTYPE html>


<?php
	include('header.php');
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