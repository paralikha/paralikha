<?php

class ServicesController
{

    public static $cpt_name_singular = 'service';
    public static $cpt_name_plural = 'services';

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
            'menu_icon'         => 'dashicons-layout',
            'public'            => true,
            'hierarchical'      => true,
            'supports'          => array('title', 'editor'),
            'show_ui'           => true,
            'show_in_menu'      => true,
            // 'menu_position'     => 7,
            'show_in_nav_menus' => true,
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

    public function metaboxes()
    {
        add_meta_box(
            'soms_service_categories-container', // CSS class
            'Service Category', // name
            function()
            {
                global $post;
                //Get taxonomy and terms
                $taxonomy = 'soms_service_categories';

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
                include SOMS_PLUGIN_VIEW . 'metaboxes/categories.metabox.view.php';
            }, // callback function
            self::$cpt_name_singular, // the post_type this meta box is associated with
            'side','core'
        );

        add_meta_box(
            'soms_icon-container', // CSS class
            'Service Image', // name
            function()
            {
                global $post;
                $soms_services = get_post_meta($post->ID, "soms_services", true);

                include SOMS_PLUGIN_VIEW . "partials/nonce.view.php";
                include SOMS_PLUGIN_VIEW . 'metaboxes/icons.metabox.view.php';
            }, // callback function
            self::$cpt_name_singular, // the post_type this meta box is associated with
            'side','core'
        );

        add_meta_box(
            'epms_html-animation-container', // CSS class
            'HTML Animation', // name
            function()
            {
                global $post;
                $display_value = get_post_meta($post->ID, "epms_htmlanimation", true);
                // $display_value = @$display_value['epms_htmlanimation'];
                include SOMS_PLUGIN_VIEW . "partials/nonce.view.php";
                include SOMS_PLUGIN_VIEW . 'metaboxes/html-animation.metabox.view.php';
            }, // callback function
            self::$cpt_name_singular, // the post_type this meta box is associated with
            'side','core'
        );

    }

    public function save($post_id)
    {
        if(!isset( $_POST['soms_metabox_nonce'] )) {
            return;
        }
        # Verify that the nonce is valid.
        if ( !wp_verify_nonce( $_POST['soms_metabox_nonce'], 'save_metaboxes' ) ) {
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
        # Services
        if( isset($_POST["soms_services"]) ) {
            foreach ($_POST["soms_services"] as $key)
            {
                update_post_meta($post_id, "soms_services", $_POST["soms_services"]);
            }
        }
        # Html Animation
        if( isset($_POST["epms_htmlanimation"]) ) {
            foreach ($_POST["epms_htmlanimation"] as $key)
            {
                update_post_meta($post_id, "epms_htmlanimation", $_POST["epms_htmlanimation"]);
            }
            // add_action( 'save_post', 'save_htmlanimation');
            // add_action( 'update_post', 'save_htmlanimation');
            // function save_htmlanimation($post_id)
            // {
            //     global $post;
            // }
            # extract
            require_once(ABSPATH .'/wp-admin/includes/file.php');
            WP_Filesystem();
            $upload = wp_upload_dir();
            $upload_dir = $upload['basedir'];
            $post = get_post($post_id);
            $slug = $post->post_name;
            $upload_dir = ABSPATH . '/animatron/' . $slug;

            if (! is_dir($upload_dir)) {
               mkdir( $upload_dir, 0777 );
            } else {
                $files = glob($upload_dir.'/*'); // get all file names
                foreach( $files as $file ) { // iterate files
                    if(is_file($file)) unlink($file); // delete file
                }
            }
            $display_value = get_post_meta($post_id, "epms_htmlanimation", true);
            $file = $_SERVER['DOCUMENT_ROOT'] . parse_url( $display_value['filename'], PHP_URL_PATH);
            $unzipfile = unzip_file( $file, $upload_dir );
        }
    }

    public function taxonomies() {
        $taxonomies = array();

        $taxonomies['soms_service_categories'] = array(
            'hierarchical' => true,
            'query_var'    => false,
            'rewrite'      => false,
            'show_in_nav_menus' => false,
            'labels'       => array(
                'name'              => 'Service Categories',
                'singular_name'     => 'Service Category',
                'menu_name'         => 'Service Categories',
                'all_items'         => 'All Service Categories',
                'edit_item'         => 'Edit Service Category',
                'view_item'         => 'View Service Category',
                'update_item'       => 'Update Service Category',
                'add_new_item'      => 'Add New Service Category',
                'new_item_name'     => 'New Service Category Name',
                'search_items'      => 'Search Service Categories'
            )
        );

        foreach($taxonomies as $name => $args) {
            register_taxonomy($name, array(self::$cpt_name_singular), $args);
        }

        # Remove the Taxonomies' divs
        # replace with radio buttons
        add_action( 'admin_menu', function (){
            remove_meta_box('soms_service_categoriesdiv', self::$cpt_name_singular, 'normal');
        });

    }

    public function columns($columns)
    {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'soms_post_thumbs' => __('Service Image'),
            'title' => __( 'Service' ),
            'category' => __( 'Category' ),
        );
        return $columns;
    }

    public function custom_column($column, $post_id)
    {
        global $post;

        switch( $column ) {

            case 'soms_post_thumbs':
                $soms_services = get_post_meta($post_id, "soms_services", true);
                echo "<img class='post_thumbs' src='".$soms_services['icon']."' width='80' height='80'>";
                break;

            case 'category':
                $value = wp_get_post_terms($post_id, 'soms_service_categories', array("fields" => "names"));
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