function checkUser(text){
	
	//If the input value is empty, don't execute this code
	if(text.length == 0){
		return;
	}
	
	//Create Http Request object
	var request;
	if (window.XMLHttpRequest){
		request = new XMLHttpRequest();
	}
	else{
		request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	//Create and assign function to be called when the response to the request object is received
	request.onreadystatechange = function(){
		
		if(request.readyState == 4 && request.status == 200){
			//document.getElementById("checkUser").innerHTML = request.responseText;
			var responseCode = request.responseText;
			
			if (responseCode != 0){
				document.getElementById("checkUser").innerHTML = "Username Taken!";
				alert('Username already taken!  Please select a different username');
				document.getElementById("usernamebox").focus();
			}
			else{
				document.getElementById("checkUser").innerHTML = "Username available";
			}
			
			
		}
	}
	
	request.open("GET","jscript/checkuser.php?usr=" + text, true);
	request.send();
}