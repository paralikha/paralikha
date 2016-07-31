<?php

/**
*
*/
class ProfileController
{
    public static $cpt_name_singular = 'employee';
    public static $cpt_name_plural = 'employees';

    public function register()
    {
        $cpt_name_singular = self::$cpt_name_singular;
        $cpt_name_plural = self::$cpt_name_plural;

        $labels = array(
            'name'              => ucwords($cpt_name_plural),
            'singular_name'     => ucwords($cpt_name_singular),
            'all_items'         => "All " . ucwords($cpt_name_plural),
            'add_new'           => "Add New " . ucwords($cpt_name_singular),
            'add_new_item'      => "Add New " . ucwords($cpt_name_singular),
            'edit_item'         => "Edit " . ucwords($cpt_name_singular),
            'new_item'          => "New " . ucwords($cpt_name_singular),
            'view_item'         => "View " . ucwords($cpt_name_singular),
            'search_items'      => "Search " . ucwords($cpt_name_singular),
            'not_found'         => "No " . ucwords($cpt_name_plural) . " found",
            'not_found_in_trash'=> "No " . ucwords($cpt_name_plural) . " found in trash",
            'parent_item_colon' => "Parent " . ucwords($cpt_name_singular) . ":",
            'menu_name'         => _x(ucwords($cpt_name_plural), 'wordpress')
        );

        $args = array(
            'labels'            => $labels,
            'query_var'         => $cpt_name_singular,
            'rewrite'           => true,
            'menu_icon'         => 'dashicons-businessman',
            'public'            => true,
            'hierarchical'      => true,
            'supports'          => array('title', 'thumbnail', 'page-attributes'),
            'show_ui'           => true,
            'show_in_menu'      => true,
            // 'menu_position'     => 7,
            'show_in_nav_menus' => false,
            'publicly_queryable'=> false,
            'exclude_from_search' => false,
            'has_archive'       => true,
            'can_export'        => true,
            'capability_type'   => 'post',
            'capabilities' => array(
                'create_posts' => true, // Toggles support for the "Add New" function
            ),
            'map_meta_cap' => true, // Set to false, if users are not allowed to edit/delete existing posts
        );
        register_post_type( $cpt_name_singular, $args );

        add_filter( 'enter_title_here', function ( $title ) {
            $screen = get_current_screen();
            if ( self::$cpt_name_singular == $screen->post_type ){
                $title = 'Enter ' . self::$cpt_name_singular . ' name here';
            }
            return $title;
        });

    }

    public function taxonomies() {
        $taxonomies = array();

        $taxonomies['epms_departments'] = array(
            'hierarchical' => true,
            'query_var'    => false,
            'rewrite'      => false,
            'show_in_nav_menus' => false,
            'labels'       => array(
                'name'              => 'Departments',
                'singular_name'     => 'Department',
                'menu_name'         => 'Departments',
                'all_items'         => 'All Departments',
                'edit_item'         => 'Edit Department',
                'view_item'         => 'View Department',
                'update_item'       => 'Update Department',
                'add_new_item'      => 'Add New Department',
                'new_item_name'     => 'New Department Name',
                'search_items'      => 'Search Departments'
            )
        );

        $taxonomies['epms_job_titles'] = array(
            'hierarchical' => true,
            'query_var'    => false,
            'rewrite'      => false,
            'show_in_nav_menus' => false,
            'labels'       => array(
                'name'              => 'Job Titles',
                'singular_name'     => 'Job Title',
                'menu_name'         => 'Job Titles',
                'all_items'         => 'All Job Titles',
                'edit_item'         => 'Edit Job Title',
                'view_item'         => 'View Job Title',
                'update_item'       => 'Update Job Title',
                'add_new_item'      => 'Add New Job Title',
                'new_item_name'     => 'New Job Title Name',
                'search_items'      => 'Search Job Titles'
            )
        );

        $taxonomies['epms_titles'] = array(
            'hierarchical' => true,
            'query_var'    => false,
            'rewrite'      => false,
            'show_in_nav_menus' => false,
            'labels'       => array(
                'name'              => 'Titles',
                'singular_name'     => 'Title',
                'menu_name'         => 'Titles',
                'all_items'         => 'All Titles',
                'edit_item'         => 'Edit Title',
                'view_item'         => 'View Title',
                'update_item'       => 'Update Title',
                'add_new_item'      => 'Add New Title',
                'new_item_name'     => 'New Title Name',
                'search_items'      => 'Search Titles'
            )
        );

        foreach($taxonomies as $name => $args) {
            register_taxonomy($name, array(self::$cpt_name_singular), $args);
        }

        # Remove the Taxonomies' divs
        # replace with radio buttons
        add_action( 'admin_menu', function (){
            remove_meta_box('epms_departmentsdiv', self::$cpt_name_singular, 'normal');
        });

    }

    /**
     * Custom metaboxed for the plugin
     *
     * @return
     */
    public function metaboxes()
    {
        add_action(
            'edit_form_after_editor',
            function($post)
            {
                $value = get_post_meta($post->ID, "epms_profile", true);
                include EPMS_PLUGIN_VIEW . "metaboxes/profile.metabox.view.php";
            }
        );

        add_meta_box(
            'epms_departments-container', // CSS class
            'Department', // name
            function()
            {
                global $post;
                //Get taxonomy and terms
                $taxonomy = 'epms_departments';

                //Set up the taxonomy object and get terms
                $tax = get_taxonomy($taxonomy);
                $terms = get_terms($taxonomy,array('hide_empty' => 0));

                //Name of the form
                $name = 'tax_input[' . $taxonomy . ']';

                //Get current and popular terms
                $popular = get_terms( $taxonomy, array( 'orderby' => 'count', 'order' => 'DESC', 'number' => 10, 'hierarchical' => false ) );
                $postterms = get_the_terms( $post->ID,$taxonomy );
                $current = ($postterms ? array_pop($postterms) : false);
                $current = ($current ? $current->term_id : 0);
                include EPMS_PLUGIN_VIEW . 'metaboxes/departments.metabox.view.php';
            }, // callback function
            self::$cpt_name_singular, // the post_type this meta box is associated with
            'side','core'
        );

        add_meta_box(
            'epms_display-options-container', // CSS class
            'Display', // name
            function()
            {
                global $post;

                $display_value = get_post_meta($post->ID, "epms_profile", true);
                $display_value = @$display_value['display'];
                include EPMS_PLUGIN_VIEW . 'metaboxes/display.metabox.view.php';
            }, // callback function
            self::$cpt_name_singular, // the post_type this meta box is associated with
            'side','core'
        );
    }

    public function save($post_id)
    {

        if(!isset( $_POST['epms_metabox_nonce'] )) {
            return;
        }
        # Verify that the nonce is valid.
        if ( !wp_verify_nonce( $_POST['epms_metabox_nonce'], 'save_metaboxes' ) ) {
            return;
        }
        # If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        # Check the user's permissions.
        if ( isset( $_POST['post_type'] ) && self::$cpt_name_singular == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return;
            }
        }

        # SAVE
        # Profile
        if( isset($_POST["epms_profile"]) ) {
            foreach ($_POST["epms_profile"] as $key)
            {
                update_post_meta($post_id, "epms_profile", $_POST["epms_profile"]);
            }
        }
        # Profile Editor
        if( isset($_POST['epmsprofiledescriptioneditor']) ) {
            update_post_meta($post_id, 'epmsprofiledescriptioneditor', $_POST['epmsprofiledescriptioneditor']);
        }
    }


    public function columns($columns)
    {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'order' => __('Order'),
            'post_thumbs' => __('Avatar'),
            'title' => __( 'Employee' ),
            'job-title' => __( 'Job Title' ),
            'department' => __( 'Department' ),
        );
        return $columns;
    }

    public function custom_column($column, $post_id)
    {
        global $post;

        switch( $column ) {
            case 'order':
                $menu_order = $post->menu_order;
                echo $menu_order;
                break;

            case 'post_thumbs':
                $avatar = get_post_meta($post_id, "epms_profile", true);
                echo "<img class='post_thumbs' src='".(($avatar['avatar'][0]) ? $avatar['avatar'][0] : 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7')."' width='80' height='80'>";
                break;

            case 'job-title':
                $value = wp_get_post_terms($post_id, 'epms_job_titles', array("fields" => "names"));
                if ( $value ) {
                    echo implode(", ", $value);
                } else {
                    echo '<em>Not specified</em>';
                }
                break;

            case 'department':
                $value = wp_get_post_terms($post_id, 'epms_departments', array("fields" => "names"));
                if ( $value ) {
                    echo implode(", ", $value);
                } else {
                    echo '<em>Not specified</em>';
                }
                break;

            /* Just break out of the switch statement for everything else. */
            default :
                break;
        }
    }
}
 ?>