<?php get_header(); ?>

<div id="page" data-toggle="smoothState">

	<main class="main" role="main">
		<div class="main-body animated fadeIn">
			<div class="main-box main-box-center">
				<img id="logo-copy" class="brand brand-copy animated fadeOut delay-1" src="<?php echo get_template_directory_uri() . "/img/logos/logo-copy.png"; ?>">

	            <img role="button" class="brand brand-main menu-toggle paralik-hang" src="<?php echo get_template_directory_uri() . "/img/logos/main.svg"; ?>" width="206" height="206" data-toggle="toggleClass" data-toggle-value="contractInward" data-target="#main-menu" title="<?php bloginfo('name'); ?>">

	            <nav id="main-menu" role="navigation" class="nav nav-menu nav-landing-nav animated fadeIn delay-1 text-uppercase">
	                <?php pl_landing_nav(); ?>
	            </nav>
			</div>
		</div>
	</main>

</div>

<?php get_footer(); ?>