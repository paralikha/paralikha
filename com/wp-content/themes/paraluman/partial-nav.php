<nav class="nav nav-main nav-fixed nav-fixed-left animated bounceInLeft" role="navigation">
    <div class="container-fluid">
        <a class="nav-brand" href="<?php echo get_bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri() . "/img/logos/main.png" ?>" alt="Paralikha" width="60" height="60"></a>
        <button class="hidden-sm-up navbar-toggle btn btn-secondary" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            &#9776;
        </button>
        <?php pl_main_nav(); ?>
    </div>
</nav>
<!-- <aside class="sidebar sidebar-fixed-left" role="sidebar">
</aside> -->