<?php

/**
 * Summary: php file which implements the plugin WP admin page interface
 */


/**
 * Generates the plugin settings page
 */
function gmuw_miniorange_display_settings_page() {
    
    // Only continue if this user has the 'manage options' capability
    if (!current_user_can('manage_options')) return;

    // Begin HTML output
    echo "<div class='wrap'>";

    // Page title
    echo "<h1>" . esc_html(get_admin_page_title()) . "</h1>";

    // Output basic plugin info
    echo "<p>This plugin provides for Mason customizations to the MiniOrange SSO plugin.</p>";

    // output status message if the main miniOrange plugin is not active
    if(!in_array('miniorange-saml-20-single-sign-on/login.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        echo '<div class="notice notice-warning is-dismissible">';
        echo "<p>The main miniOrange SSO plugin is not active, therefore the public-facing features of this miniOrange customizations plugin are not active.</p>";
        echo '</div>';
    }

    // Begin form
    echo "<form action='options.php' method='post'>";

    // output settings fields - outputs required security fields - parameter specifes name of settings group
    settings_fields('gmuw_miniorange_options');

    // output setting sections - parameter specifies name of menu slug
    do_settings_sections('gmuw_miniorange');

    // submit button
    submit_button();

    // Close form
    echo "</form>";

    // Finish HTML output
    echo "</div>";
    
}
