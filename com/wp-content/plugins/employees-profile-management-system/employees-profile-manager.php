<?php
/**
* Plugin Name: Employee Profile Management System
* Plugin URI:
* Description: A simple manager for the company's employees.
* Author: John Lioneil Dionisio
* Author URI: https://plus.google.com/john-lioneil
* Version: 1.0
*
*
*/

if( !function_exists( 'add_action' ) ) { echo "Hi there!  I'm just a plugin, not much I can do when called directly."; exit; }
require_once('globals.php');
epms_controller("Profile");
epms_controller("DisplayProfile");
include "includes/enqueues.php";

$epms_profile = new ProfileController();
$epms_profile_display = new DisplayProfileController();
# Initialize
add_action('init', function() {
    global $epms_profile;
    $epms_profile->register();
    $epms_profile->taxonomies();
});

add_action('add_meta_boxes_'.ProfileController::$cpt_name_singular, function() {
    global $epms_profile;
    $epms_profile->metaboxes();
});

add_action('save_post', function ($post_id) {
    global $epms_profile;
    $epms_profile->save($post_id);
});

# Manage Columns
add_filter( 'manage_edit-'.ProfileController::$cpt_name_singular.'_columns', function($columns){
    global $epms_profile;
    return $epms_profile->columns($columns);
});

# Manage Every Column's values
add_action( 'manage_'.ProfileController::$cpt_name_singular.'_posts_custom_column', function($column, $post_id){
    global $epms_profile;
    return $epms_profile->custom_column($column, $post_id);
}, 10, 2 );


# Shortcodes
# Display Employee
add_shortcode( 'employee', 'epms_span_shortcodes' );
function epms_span_shortcodes( $atts ) {
    global $epms_profile_display;
    return $epms_profile_display->show();
}

