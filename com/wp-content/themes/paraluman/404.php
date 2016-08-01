<?php get_header(); ?>

	<main role="main" class="main">
		<!-- section -->
		<section class="section">

			<!-- article -->
			<article id="page-404" class="text-center">

                <div class="logo-404">
                    <img class="img-rotate-45" src="<?php echo get_template_directory_uri() . "/img/logos/main.png" ?>" alt="4">
                    <img src="<?php echo get_template_directory_uri() . "/img/logos/main.png" ?>" alt="0">
                    <img class="img-rotate-45" src="<?php echo get_template_directory_uri() . "/img/logos/main.png" ?>" alt="4">
                </div>

				<h1 class="text-muted"><?php _e( 'Page not found', PARALUMAN_TEXT_DOMAIN ); ?></h1>
				<a href="<?php echo home_url(); ?>"><?php _e( 'Go home.', 'html5blank' ); ?></a>

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
