<?php

/**
 * Summary: php file which implements customizations to the login page
 */


// add body class to login page if we should hide the standard WordPress login form
if (get_option('gmuw_miniorange_options')['gmuw_miniorange_settings_disable_login_form']==1) {

	add_filter('login_body_class', 'gmuw_miniorange_add_login_page_class');
	function gmuw_miniorange_add_login_page_class($classes) {

		$classes[] = 'gmuw_hideloginform';

		return $classes;

	}

}
