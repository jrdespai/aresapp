<?php
	$location = __FILE__;
	//include('bluechip/validate_session_sub.php');
	include('connect.php');
	//include('bluechip/header_sub.php');
	include('navbar.php');
	
	include_once('functions/functions.php');
	//echo __FILE__;
	//echo "<a href=\"" . getFilePrefix(__FILE__) . "team/teamprofile.php\">click</a>";
	

?>

	<a href="#contact" data-toggle="modal">Click</a>

<?php
	createModal('contact', 'Tech Site contact', 'This is the body');
?>
	
	<!--Referenced:	https://www.youtube.com/watch?v=7YJUFaZMS8Q
	<div class="modal fade" id="contact" role="dialog">
		<div class = "modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Contact Tech Site</h4>
				</div>
				<div class="modal-body">
					<p>This is the body for the message.  If I make it long, then I think it will actually wrap</p>
				</div>
				<div class="modal-footer">
					<a class="btn btn-default" data-dismiss="modal">close</a>
				</div>
			</div>
		</div>
	</div>-->
	
</body>
</html>