<?php

/**
 * Summary: php file which implements customizations to the login page
 */


// unless the setting specifies to leave it enabled, add a body class to login page to hide the native WordPress login form by default
if (!(
	get_option('gmuw_miniorange_options') &&
	isset(get_option('gmuw_miniorange_options')['gmuw_miniorange_settings_enable_login_form']) &&
	get_option('gmuw_miniorange_options')['gmuw_miniorange_settings_enable_login_form']==1
)) {
	add_filter('login_body_class', function($classes) {
		$classes[] = 'gmuw_hideloginform';
		return $classes;
	});
}

// add body class to login page if we should hide the standard WordPress login form back link
if (
	get_option('gmuw_miniorange_options') &&
	isset(get_option('gmuw_miniorange_options')['gmuw_miniorange_settings_disable_login_back_link']) &&
	get_option('gmuw_miniorange_options')['gmuw_miniorange_settings_disable_login_back_link']==1
) {
	add_filter('login_body_class', function($classes) {
		$classes[] = 'gmuw_hideloginbacklink';
		return $classes;
	});
}
