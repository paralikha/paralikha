<nav class="nav nav-main nav-fixed-left animated bounceInLeft">
    <a class="nav-brand" href="<?php echo get_bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri() . "/img/logos/main.png" ?>" alt="Paralikha" width="100" height="100"></a>
    <button class="menu-xs-toggle navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <?php pl_main_nav('main-menu') ?>
</nav>

<?php get_template_part("partial", "logos"); ?>