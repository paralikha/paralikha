<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
        global $page, $paged;

        # the title
        wp_title( '|', true, 'right' );

        # Add the blog name.
        bloginfo( 'name' );

        # Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";

        # Add a page number if necessary:
        if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) echo ' | ' . sprintf( __( 'Page %s', 'paralikha' ), max( $paged, $page ) );
    ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>

	<script>
        var base_url = function ($string) {
            if(null == $string && undefined == $string) $string = "";
            return "<?php echo get_bloginfo('url'); ?>/" + $string;
        }
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
    </script>

</head>
<body <?php body_class(); ?>>
