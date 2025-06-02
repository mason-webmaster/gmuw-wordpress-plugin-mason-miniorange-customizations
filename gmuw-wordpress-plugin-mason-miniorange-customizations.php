<?php

/**
 * Main plugin file for the Mason WordPress: miniorange customizations plugin
 */

/**
 * Plugin Name:       Mason WordPress: miniorange customizations
 * Author:            Mason Webmaster
 * Plugin URI:        https://github.com/mason-webmaster/gmuw-wordpress-plugin-mason-miniorange-customizations
 * Description:       
 * Version:           1.0
 */


// Exit if this file is not called directly.
	if (!defined('WPINC')) {
		die;
	}

// Set up auto-updates
	require 'plugin-update-checker/plugin-update-checker.php';
	$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/jmacario-gmu/gmuw-wordpress-plugin-mason-miniorange-customizations/',
	__FILE__,
	'gmuw-wordpress-plugin-mason-miniorange-customizations'
	);


// settings
require('php/settings.php');

// branding
include('php/branding.php');

// admin menu
include('php/admin-menu.php');

// admin page
include('php/admin-page.php');

//only activate some features of this plugin if the regular miniOrange plugin is active
if(in_array('miniorange-saml-20-single-sign-on/login.php', apply_filters('active_plugins', get_option('active_plugins')))) {

	// Custom scripts
	require('php/custom-scripts.php');

	// Custom styles
	require('php/custom-styles.php');

	// login page customizations
	include('php/login-page.php');

}
