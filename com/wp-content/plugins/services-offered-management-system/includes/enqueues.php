<?php

# Style
add_action( 'admin_enqueue_scripts', 'soms_styles_collection' );
function soms_styles_collection() {
    wp_register_style( 'soms-admin', SOMS_PLUGIN_CSS . 'soms-admin.css', false, '1.0.0' );
    wp_enqueue_style( 'soms-admin' );
}

# Script
add_action( 'admin_enqueue_scripts', 'soms_scripts_collection' );
function soms_scripts_collection() {
    global $post_type;
    if( ServicesController::$cpt_name_singular === $post_type)
    {
        wp_enqueue_media();
        wp_enqueue_script( 'soms-admin', SOMS_PLUGIN_JS . 'soms-admin.js', array('jquery'), '3.0.0', true );
    }
}
 ?>