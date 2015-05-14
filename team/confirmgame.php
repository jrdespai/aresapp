<!DOCTYPE html>

<?php

	//Verify session, get DB info, add HTML page header, and add navbar
	include('../validate_session_sub.php');
	include('../connect.php');
	include('../header_sub.php');
	include('../navbar_sub.php');
?>
	
	<body>
		<p>Do you want to play Team #: 
			<?php
				echo $_GET['tid'];
			?>
		</p>
		<form role="form" action="schedulegame.php?tid=<?php echo $_GET['tid'] ?>" method="post">
			
			<div class="form-group">
				<label for="time">Propose a game time</label>
				<input type="datetime-local" id="time" name="time" required />
			</div>
			
			<div class="form-group">
				<label for="location">Propose a game location</label>
				<input type="text" id="location" name="location" required />
			</div>
			
			<div>
				<input type="submit" class="btn" value="Yes"/>
				<button class="btn"><a href="myteams.php">No</a></button>
			</div>
		</form>
		<!--<button class="btn"><a href="schedulegame.php?tid=<?php echo $_GET['tid']; ?>">Yes</a></button>
		<button class="btn"><a href="myteams.php">No</a></button>-->
	</body>

</html>