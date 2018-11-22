<?php

/**
 * @package pixelicotheme
 * ======================
 *     Admin Page
 * ======================
 */

function pixelico_add_admin_page() {
    // Generate pixelico admin page
    add_menu_page('Pixelico Theme Options', 'Pixelico', 'manage_options', 'pixelico-manage-options', 'pixelico_create_admin_page', get_template_directory_uri() . '/images/logo-icon.png', 110);
    
    // Generate pixelico admin sub pages
    add_submenu_page('pixelico-manage-options', 'Pixelico Theme Options', 'General', 'manage_options', 'pixelico-manage-options', 'pixelico_create_admin_page');
    add_submenu_page('pixelico-manage-options', 'Pixelico Css Options', 'Custom Css', 'manage_options', 'pixelico-manage-options-css', 'pixelico_create_css_page');

    // Activate custom settings
    add_action('admin_init', 'pixelico_custom_settions');
}

add_action('admin_menu', 'pixelico_add_admin_page');

function pixelico_custom_settions() {
    register_setting('pixelico_settings_group', 'pixelico_settings_group');

    //add_settings_section( $id, $title, $callback, $page );
    add_settings_section('pixelico-general-options', 'General options', 'pixelico_general_options', 'pixelico-manage-options');

    //add_settings_field( $id, $title, $callback, $page, $section, $args );
    add_settings_field( 'pixelico-logo-option', 'Logo Image', 'pixelico_logo_option', 'pixelico-manage-options', 'pixelico-general-options');
}

function pixelico_general_options() {
    echo 'Customize the general setting of the pixelico theme.';
}

function pixelico_logo_option() {
    $wptuts_options = get_option( 'pixelico_settings_group' );
    ?>
        <input id="upload_logo" type="button" class="button" value="<?php _e( 'Upload Logo', 'pixelico-text' ); ?>" />
        <span class="description"><?php _e('Upload an image for the banner.', 'pixelico-text' ); ?></span>
    <?php
}

function pixelico_create_admin_page() {
    require_once(get_template_directory() . '/inc/templates/pixelico-admin.php');
}

function pixelico_create_css_page() {
    echo '<h1>Pixelico Custom Css.</h1>';
}
