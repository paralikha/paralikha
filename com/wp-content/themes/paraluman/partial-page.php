<?php
$q = new WP_Query();
$pages = $q->query(array('post_type' => 'page'));

# Find all children
$child_pages = get_page_children( get_the_ID(), $pages );
foreach ($child_pages as $post): setup_postdata($post); ?>

	<section class="section section-table" data-bg="#00FF00" data-tooltip="<?php the_title(); ?>">
		<div class="section-cell section-cell-centered">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h1 class="sr-only"><?php the_title(); ?></h1>
							<?php the_content(); ?>
							<?php edit_post_link(); ?>
						</article>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endforeach; wp_reset_query(); ?>