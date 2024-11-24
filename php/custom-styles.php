<?php

/**
 * Summary: php file which implements the custom stylesheets
 */


/**
 * Enqueue custom CSS
 */
add_action('login_enqueue_scripts', 'gmuw_miniorange_enqueue_styles_login');
function gmuw_miniorange_enqueue_styles_login() {

  // Enqueue the custom stylesheets
  wp_enqueue_style(
    'gmuw_miniorange_css_login', //stylesheet name
    plugin_dir_url( __DIR__ ).'css/miniorange-custom-login.css', //path to stylesheet
    '',  //dependencies
    time(), //version
  );

}
