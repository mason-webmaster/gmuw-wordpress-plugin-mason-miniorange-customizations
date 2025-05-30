/* miniorange custom scripts */

jQuery(document).ready(function(){

	// Debug
	//alert('custom js file loaded');

	/* Fix text of miniorange SSO button */

	//get current html content of button
	button_html=jQuery('#mo_saml_login_sso_button').html();
	//fix html content
	button_html_updated = button_html.replace('Login with Mason','Log in via George Mason SSO');
	//replace text of button
	jQuery('#mo_saml_login_sso_button').html(button_html_updated);


	/* Add function to listen for specific key presses and re-enable the native WordPress login form if detected */

	// create variable for string we are listening for
	var code1 = String.fromCharCode(76, 73, 78, 75);
	// create buffer variable to store keypresses
	var codeBuffer = "";
	// function to run on each keyUp event
	jQuery(document).keyup(function (e) {
		//Add current key to variable
		codeBuffer += String.fromCharCode(e.which);
		//alert(e.which);
		//If the buffer is the same as and equal length of the code string variable
		if (code1.substring(0, codeBuffer.length) == codeBuffer) {
			//If the buffer variable is the same length as the complete code variable (then they have entered the complete code)
			if (code1.length == codeBuffer.length) {

				//Respond to the code
				//alert("Secret");
				//fix CSS to display the login form
				//jQuery('#mo_saml_login_sso_button').css('margin-bottom', '1.3rem');
				jQuery('#loginform p, #loginform .user-pass-wrap').css('display', 'block');
				//jQuery('#mo_saml_button div:nth-of-type(2)').css('display', 'block');
				//jQuery('#mo_saml_button').css('height', '9em !important');
				jQuery('#login p#nav:has(a.wp-login-lost-password)').css('display', 'block');
				//re-enable password field
				jQuery('#user_pass').prop('disabled', false);

				//Clear the buffer variable
				codeBuffer = "";
			}
		} else {
			//The buffer does not match and equal length of the code string
			//Clear buffer
			codeBuffer = "";
		}
	});

});
