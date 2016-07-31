<?php

# CSS
add_action( 'wp_enqueue_scripts', 'epms_frontend_styles_collection' );
function epms_frontend_styles_collection() {
    wp_enqueue_style( 'gridder', EPMS_PLUGIN_VENDOR . 'gridder/css/style.vendor.css', false, '3.3.7' );
    wp_enqueue_style( 'gridder-fullpage', EPMS_PLUGIN_CSS . 'gridder-fullpage.custom.css', false, '3.3.7' );
}

# JS
add_action('wp_footer', 'epms_frontend_scripts_collection');
function epms_frontend_scripts_collection(){
    // wp_enqueue_script( 'gridder', EPMS_PLUGIN_VENDOR . 'gridder/js/script.vendor.js', array('jquery'), '3.3.2', true );
}

# Style
add_action( 'admin_enqueue_scripts', 'epms_styles_collection' );
function epms_styles_collection() {
    wp_register_style( 'font-awesome', EPMS_PLUGIN_VENDOR . 'font-awesome/css/font-awesome.min.css', false, '1.0.0' );
    wp_enqueue_style( 'font-awesome' );
    wp_register_style( 'epms-admin', EPMS_PLUGIN_CSS . 'epms-admin.css', false, '1.0.0' );
    wp_enqueue_style( 'epms-admin' );
}

# Script
add_action( 'admin_enqueue_scripts', 'epms_scripts_collection' );
function epms_scripts_collection() {
    global $post_type;
    if( ProfileController::$cpt_name_singular === $post_type)
    {
        wp_enqueue_media();
        wp_enqueue_script( 'epms-admin', EPMS_PLUGIN_JS . 'epms-admin.js', array('jquery'), '3.0.0', true );
    }
}

 ?>