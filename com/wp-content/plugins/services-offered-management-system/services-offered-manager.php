<?php
/**
* Plugin Name: Services Offered Management System
* Plugin URI:
* Description: A simple manager for the company's services.
* Author: John Lioneil Dionisio
* Author URI: https://plus.google.com/john-lioneil
* Version: 1.0
*
*
*/

if( !function_exists( 'add_action' ) ) { echo "Hi there!  I'm just a plugin, not much I can do when called directly."; exit; }
require_once('globals.php');
include("includes/enqueues.php");
soms_controller("Services");
soms_controller("DisplayServices");

$soms_services = new ServicesController();
$soms_services_display = new DisplayServicesController();
# Initialize
add_action('init', function() {
    global $soms_services;
    $soms_services->register();
    $soms_services->taxonomies();
});

add_action('add_meta_boxes_'.ServicesController::$cpt_name_singular, function() {
    global $soms_services;
    $soms_services->metaboxes();
});

add_action('save_post', function($post_id) {
    global $soms_services;
    $soms_services->save($post_id);
});

# Manage Columns
add_filter( 'manage_edit-'.ServicesController::$cpt_name_singular.'_columns', function($columns){
    global $soms_services;
    return $soms_services->columns($columns);
});

# Manage Every Column's values
add_action( 'manage_'.ServicesController::$cpt_name_singular.'_posts_custom_column', function($column, $post_id){
    global $soms_services;
    return $soms_services->custom_column($column, $post_id);
}, 10, 2 );

add_filter( 'manage_edit-'.ServicesController::$cpt_name_singular.'_sortable_columns', 'soms_sortable_columns' );
function soms_sortable_columns( $columns ) {
    $columns['category'] = 'category';
    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);

    return $columns;
}


# Shortcodes
# Display Services
add_shortcode( 'services', 'soms_span_shortcodes' );
function soms_span_shortcodes( $atts ) {
    ob_start();
    global $soms_services_display;
    echo $soms_services_display->show();
    return ob_get_clean();
}