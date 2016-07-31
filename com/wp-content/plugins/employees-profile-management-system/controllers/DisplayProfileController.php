<?php

class DisplayProfileController extends ProfileController
{

    public function show()
    {
        global $post;

        $args = array(
            'post_type'   => parent::$cpt_name_singular,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );
        $q = new WP_query( $args );
        $Employees = $q->get_posts();
        $Employee_count =  count($Employees);
        $per_slider_count = $Employee_count%3==0?3:2;

        // if( is_gridder() ) include(EPMS_PLUGIN_VIEW . "content/list.page.view.php");
        include(EPMS_PLUGIN_VIEW . "content/fullpage-slider.view.php");

        wp_reset_query();  // Restore global post data stomped by the_post().
    }

}
 ?>