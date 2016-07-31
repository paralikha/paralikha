<?php
/**
 * Template Name: Front Page
 */

get_header(); ?>

<div id="page">
    <!-- logo -->
    <div class="main-body animated fadeIn">
        <div class="center-box centered">

            <img id="logo-copy" class="preloader-img logo-copy animated fadeOut delay-1" src="<?php echo get_template_directory_uri() . "/img/logos/logo-copy.png" ?>" />

            <img role="button" class="main-logo menu-toggle paralik-hang" src="<?php echo get_template_directory_uri() . "/img/logos/main.svg" ?>" width="206" height="206" data-toggle="tooltip" title="<?php bloginfo('name'); ?>" />

            <nav role="navigation" class="nav-main main-menu row-paralikha animated expandOutward delay-1">
                <?php landing_nav(); ?>
            </nav>

        </div>
    </div>
    <!-- /logo -->
</div>

<?php get_footer(); ?>