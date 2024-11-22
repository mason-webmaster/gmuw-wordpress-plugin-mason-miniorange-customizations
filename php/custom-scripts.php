<?php

/**
 * Summary: php file which implements the custom javascripts
 */


/**
 * Enqueue custom javascript
 */
add_action('login_enqueue_scripts','gmuj_miniorange_c_enqueue_scripts');
function gmuj_miniorange_c_enqueue_scripts() {

  // Enqueue the custom javascript
  wp_enqueue_script(
    'gmuj_miniorange_c_js', //script name
    plugin_dir_url( __DIR__ ).'js/miniorange-custom.js', //path to script
    array('jquery'), //dependencies
    time(), //version
  );

}
