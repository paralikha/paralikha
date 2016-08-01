<?php

$q = new WP_Query();
$pages = $q->query(array('post_type' => 'page'));

// Filter through all pages and find Portfolio's children
$child_pages = get_page_children( get_the_ID(), $pages ); ?>
<?php foreach($child_pages as $post): setup_postdata($post); ?>

	<section class="section" data-tooltip="<?php the_title(); ?>">
		<?php # the_content(); ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
						<div class="col-md-12">
							<h1 class="sr-only"><?php the_title(); ?></h1>
							<?php the_content(); ?>
							<?php # edit_post_link(); ?>
						</div>
					</article>

				</div>
			</div>
		</div>
	</section>

<?php endforeach; wp_reset_query(); ?>