<?php

/**
 * Summary: php file which implements the plugin settings
 */


// Settings

/**
 * Register plugin settings
 */
add_action('admin_init', 'gmuw_miniorange_register_settings');
function gmuw_miniorange_register_settings() {
  
  // Register serialized options setting to store this plugin's options
  register_setting(
    'gmuw_miniorange_options',
    'gmuw_miniorange_options',
    'gmuw_miniorange_callback_validate_options'
  );

  // Add section: general settings
  add_settings_section(
    'gmuw_miniorange_section_settings_general',
    'General Settings',
    'gmuw_miniorange_callback_section_settings_general',
    'gmuw_miniorange'
  );

  // Add field: enable standard wordpress login form
  add_settings_field(
    'gmuw_miniorange_settings_enable_login_form',
    'Enable standard WordPress login form?',
    'gmuw_miniorange_callback_field_yesno',
    'gmuw_miniorange',
    'gmuw_miniorange_section_settings_general',
    ['id' => 'gmuw_miniorange_settings_enable_login_form', 'label' => 'Enable native WordPress login form?']
  );

  // Add field: disable back to site link on login form
  add_settings_field(
    'gmuw_miniorange_settings_disable_login_back_link',
    'Disable the back to site link on the WordPress login form?',
    'gmuw_miniorange_callback_field_yesno',
    'gmuw_miniorange',
    'gmuw_miniorange_section_settings_general',
    ['id' => 'gmuw_miniorange_settings_disable_login_back_link', 'label' => 'Disable back to site link on WP login form?']
  );

} 

/**
 * Sets default plugin options
 */
function gmuw_miniorange_options_default() {

  return array(
    'gmuw_miniorange_settings_enable_login_form' => '0',
    'gmuw_miniorange_settings_disable_login_back_link' => '0',
  );

}

/**
 *  For the general settins section, echos out any content at the top of the section (between heading and fields).
 */
function gmuw_miniorange_callback_section_settings_general() {

}


/**
 * Validate plugin options
 */
function gmuw_miniorange_callback_validate_options($input) {

  // enable standard wordpress login form
  if (
    isset($input['gmuw_miniorange_settings_enable_login_form']) &&
    (
      $input['gmuw_miniorange_settings_enable_login_form']!='1' ||
      $input['gmuw_miniorange_settings_enable_login_form']!='0' )
  ) {
    // Ensure entry is either a 1 or nothing
    $input['gmuw_miniorange_settings_enable_login_form'] = sanitize_text_field($input['gmuw_miniorange_settings_enable_login_form']);
  }

  // disable wordpress login form back link
  if (
    isset($input['gmuw_miniorange_settings_disable_login_back_link']) &&
    (
      $input['gmuw_miniorange_settings_disable_login_back_link']!='1' ||
      $input['gmuw_miniorange_settings_disable_login_back_link']!='0' )
  ) {
    // Ensure entry is either a 1 or nothing
    $input['gmuw_miniorange_settings_disable_login_back_link'] = sanitize_text_field($input['gmuw_miniorange_settings_disable_login_back_link']);
  }

  return $input;

}

/**
 * Generates checkbox field for plugin settings option
 */
function gmuw_miniorange_callback_field_checkbox( $args ) {

  //Get array of options. If the specified option does not exist, get default options from a function
  $options = get_option( 'gmuw_miniorange_options', gmuw_miniorange_options_default() );

  $id    = isset( $args['id'] )    ? $args['id']    : '';
  $label = isset( $args['label'] ) ? $args['label'] : '';

  $checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';

  echo '<input id="gmuw_miniorange_options_'. $id .'" name="gmuw_miniorange_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
  echo '<label for="gmuw_miniorange_options_'. $id .'">'. $label .'</label>';

}

/**
 * Generates yes/no field for plugin settings options
 */
function gmuw_miniorange_callback_field_yesno($args) {

    //Get array of options. If the specified option does not exist, get default options from a function
    $options = get_option('gmuw_miniorange_options', gmuw_miniorange_options_default());

    //Extract field id and label from arguments array
    $id    = isset($args['id'])    ? $args['id']    : '';
    $label = isset($args['label']) ? $args['label'] : '';

    //Get setting value
    $value = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';

    //Output field markup
    echo '<select id="gmuw_miniorange_options_'. $id .'" name="gmuw_miniorange_options['. $id .']">';
    echo '<option ';
    echo $value ? 'selected ' : '';
    echo 'value="1">Yes</option>';
    echo '<option ';
    echo !$value ? 'selected ' : '';
    echo 'value="0">No</option>';
    echo '</select>';
    echo "<br />";
    echo '<label for="gmuw_miniorange_options_'. $id .'">'. $label .'</label>';

}
