function checkPassword(){
	var password = document.getElementById("password");
	var confirm = document.getElementById("confirmpassword");
	
	//Confirm that the values in password and confirm password are equal if there is text in confirm
	if (confirm.value != "" && password.value != confirm.value){
		alert ('Passwords don\'t match!');
		confirm.focus();
	}
}