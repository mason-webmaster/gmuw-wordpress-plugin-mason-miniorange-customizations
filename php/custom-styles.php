<?php

/**
 * Summary: php file which implements the custom stylesheets
 */


/**
 * Enqueue custom CSS
 */
add_action('login_enqueue_scripts', 'gmuj_miniorange_c_enqueue_styles');
function gmuj_miniorange_c_enqueue_styles() {

  // Enqueue the custom stylesheets
  wp_enqueue_style(
    'gmuj_miniorange_c_css', //stylesheet name
    plugin_dir_url( __DIR__ ).'css/miniorange-custom.css', //path to stylesheet
    '',  //dependencies
    time(), //version
  );

}
