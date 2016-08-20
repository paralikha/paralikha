<?php get_header(); ?>

	<div id="page" data-toggle="smoothState">

		<?php get_template_part('partial', 'nav'); ?>

		<main id="main" role="main" class="main main-fluid animated fadeIn delay-half" data-toggle="sectionScroller">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<!-- section -->
				<section class="section section-table" data-tooltip="<?php the_title(); ?>">
					<div class="section-cell section-cell-centered">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<!--Article -->
									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<h1 class="sr-only"><?php the_title(); ?></h1>
										<?php the_content(); ?>
										<?php edit_post_link(); ?>
									</article>
									<!-- /Article -->
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- /section -->
				<section class="section section-table" data-tooltip="<?php the_title(); ?>">
					<div class="section-cell section-cell-centered">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<!--Article -->
									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<div class="slides">
										    <div>
										    	<div class="slide" style="width: 100%">0</div>
										    	<div class="slide" style="width: 100%">1</div>
										    	<div class="slide" style="width: 100%">2</div>
										    	<div class="slide" style="width: 100%">3</div>
										    </div>
										</div>
									</article>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php endwhile; endif; ?>

			<?php get_template_part('partial', 'page'); ?>
			<?php get_template_part("partial", "logos"); ?>
		</main>


	</div>
<?php get_footer(); ?>