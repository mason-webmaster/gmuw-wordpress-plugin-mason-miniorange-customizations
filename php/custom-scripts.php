<?php

/**
 * Summary: php file which implements the custom javascripts
 */


/**
 * Enqueue custom javascript
 */
add_action('login_enqueue_scripts','gmuw_miniorange_enqueue_scripts_login');
function gmuw_miniorange_enqueue_scripts_login() {

  // Enqueue the custom javascript
  wp_enqueue_script(
    'gmuw_miniorange_js_login', //script name
    plugin_dir_url( __DIR__ ).'js/miniorange-custom-login.js', //path to script
    array('jquery'), //dependencies
    time(), //version
  );

}
