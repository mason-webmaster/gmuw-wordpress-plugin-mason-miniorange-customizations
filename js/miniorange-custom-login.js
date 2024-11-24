/* miniorange custom scripts */

jQuery(document).ready(function(){

	// Debug
	//alert('custom js file loaded');

	/* Fix text of miniorange SSO button */

	//get current html content of button
	button_html=jQuery('#mo_saml_login_sso_button').html();
	//fix html content
	button_html_updated = button_html.replace('Login with GMU','Login via Mason SSO');
	//replace text of button
	jQuery('#mo_saml_login_sso_button').html(button_html_updated);
	
});
