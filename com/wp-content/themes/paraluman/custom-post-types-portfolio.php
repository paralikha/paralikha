<?php
/*------------------------------------*\
    Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_html5()
{
    register_post_type('portfolio', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Portfolio', 'html5blank'), // Rename these to suit
            'singular_name' => __('Portfolio', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New Portfolio', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Portfolio', 'html5blank'),
            'new_item' => __('New Portfolio', 'html5blank'),
            'view' => __('View Portfolio', 'html5blank'),
            'view_item' => __('View Portfolio', 'html5blank'),
            'search_items' => __('Search Portfolio', 'html5blank'),
            'not_found' => __('No Portfolios found', 'html5blank'),
            'not_found_in_trash' => __('No Portfolios found in Trash', 'html5blank')
        ),
        'menu_icon' => 'dashicons-portfolio',
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'rewrite' => false,//array('slug' => 'works/portfolio','with_front' => true),
        'publicly_queryable' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'portfolio',
        ) // Add Category and Post Tags support
    ));

    $taxonomies = [];
    $taxonomies['portfolio'] = array(
        'hierarchical' => true,
        'query_var'    => true,
        'rewrite'      => array('slug' => 'works','with_front' => false),
        'show_in_nav_menus' => true,
        'labels'       => array(
            'name'              => 'Portfolio Categories',
            'singular_name'     => 'Portfolio Category',
            'menu_name'         => 'Portfolio Categories',
            'all_items'         => 'All Portfolio Categories',
            'edit_item'         => 'Edit Portfolio Category',
            'view_item'         => 'View Portfolio Category',
            'update_item'       => 'Update Portfolio Category',
            'add_new_item'      => 'Add New Portfolio Category',
            'new_item_name'     => 'New Portfolio Categorie Name',
            'search_items'      => 'Search Portfolio Categories'
        )
    );
    foreach($taxonomies as $name => $args) {
        register_taxonomy($name, array('portfolio'), $args);
    }

    add_action( 'add_meta_boxes', function () {
        add_meta_box('portfolio_showcase_id', 'Showcase', function () {
            include get_template_directory() . "/views/portfolio.metabox.php";
        }, 'portfolio');
    } );
    // register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    // register_taxonomy_for_object_type('post_tag', 'html5-blank');
}

add_action('save_post', 'html5blank_save_metabox');
function html5blank_save_metabox()
{
    global $post;
    if( isset($_POST["portfolio_showcase"]) ) {
        foreach ($_POST["portfolio_showcase"] as $key)
        {
            update_post_meta($post->ID, "portfolio_showcase", $_POST["portfolio_showcase"]);
        }
    }
}

add_filter('post_link', 'brand_permalink', 1, 3);
add_filter('post_type_link', 'brand_permalink', 1, 3);
function brand_permalink($permalink, $post_id, $leavename) {
    //con %brand% catturo il rewrite del Custom Post Type
    if (strpos($permalink, '%portfolio%') === FALSE) return $permalink;
        // Get post
        $post = get_post($post_id);
        if (!$post) return $permalink;

        // Get taxonomy terms
        $terms = wp_get_object_terms($post->ID, 'portfolio');
        if (!is_wp_error($terms) && !empty($terms) && is_object($terms[0]))
            $taxonomy_slug = $terms[0]->slug;
        else $taxonomy_slug = 'no-portfolio';

    return str_replace('%portfolio%', $taxonomy_slug, $permalink);
}
 ?>