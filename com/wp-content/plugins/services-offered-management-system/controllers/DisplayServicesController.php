<?php

class DisplayServicesController extends ServicesController
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
        $Services = get_posts($args);

        include(SOMS_PLUGIN_VIEW . "content/services.page.view.php");

        wp_reset_query();

    }

}
 ?>