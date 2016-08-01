<?php get_header(); ?>

	<div id="page" data-toggle="smoothState">

		<?php get_template_part('partial', 'inner-menu') ?>

		<div id="main" role="main" class="main animated fadeIn delay-half" data-toggle="fullpage">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<!-- section -->
				<section class="section" data-tooltip="<?php the_title(); ?>">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<!-- article -->
								<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
									<div class="col-md-12">
										<h1 class="sr-only"><?php the_title(); ?></h1>
										<?php the_content(); ?>
										<?php edit_post_link(); ?>
									</div>
								</article>
								<!-- /article -->
							</div>
						</div>
					</div>
				</section>
				<!-- /section -->
				<?php endwhile; ?>
			<?php endif; ?>

			<section class="section" data-tooltip="<?php the_title(); ?>">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="slide">
								<h1>Delete <span>this</span></h1>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. At optio provident maiores sapiente omnis cumque voluptate, tempore atque debitis enim nostrum, fuga facilis, doloremque dolore, ullam dignissimos! Itaque, at, magni.
							</div>
							<div class="slide">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. At optio provident maiores sapiente omnis cumque voluptate, tempore atque debitis enim nostrum, fuga facilis, doloremque dolore, ullam dignissimos! Itaque, at, magni.
							</div>
							<div class="slide">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. At optio provident maiores sapiente omnis cumque voluptate, tempore atque debitis enim nostrum, fuga facilis, doloremque dolore, ullam dignissimos! Itaque, at, magni.
							</div>
							<div class="slide">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. At optio provident maiores sapiente omnis cumque voluptate, tempore atque debitis enim nostrum, fuga facilis, doloremque dolore, ullam dignissimos! Itaque, at, magni.
							</div>
							<div class="slide">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. At optio provident maiores sapiente omnis cumque voluptate, tempore atque debitis enim nostrum, fuga facilis, doloremque dolore, ullam dignissimos! Itaque, at, magni.
							</div>
						</div>
					</div>
				</div>
			</section>

			<?php get_template_part('partial', 'page'); ?>

		</div>
	</div>
<?php get_footer(); ?>