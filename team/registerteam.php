<!DOCTYPE html>


<?php
	//Validate that the user is logged in
	include('../validate_session_sub.php');
	
	//Include the HTML header and navbar
	include('../header_sub.php');
	include('../navbar_sub.php');
?>

  <body>
  


  


<?php
echo '<form role="form" action="addteam.php" method="post">
		
		<div class="form-group">
			<label for="name">Team Name:</label>
			<input type="text" class="form-control" id="name" name="name" required>
		</div>
		
		<div class="form-group">
			<label for="sport">Sport:</label>
			<input type="text" class="form-control" id="sport" name="sport" required>
		</div>		
		
		<button type="submit" class="btn btn-default">Register</button>
	   </form>'
	   	
?>

  </body>
  
</html>