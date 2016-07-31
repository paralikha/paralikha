<?php get_header(); ?>

    <div id="page">

        <?php get_template_part('partial', 'menu');

        $args = array(
            'post_type'   => 'portfolio',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'portfolio',
                    'field'    => 'slug',
                ),
            ),
        );
        $portfolios = get_posts( $args ); ?>

        <!-- data-toggle="fullpage" -->
        <main id="main" role="main" class="main animated fadeIn delay-half padding-top-60">
            <!-- section -->
            <section class="section" data-tooltip="<?php the_title(); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <ul id="grid" class="grid effect-3">
                                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                                    <li>
                                        <?php $showcase = get_post_meta( get_the_ID(), "portfolio_showcase", true );
                                        $showcase_file = ( is_array($showcase) && null != $showcase['filename'] ) ? $showcase['filename'] : get_the_post_thumbnail_url(); ?>
                                        <a class="portfolio-card" href="#" data-lity-target="<?php echo $showcase_file; ?>" data-lity>
                                            <img class="portfolio-thumbnail" src="<?php echo get_the_post_thumbnail_url(); ?>">
                                        </a>
                                    </li>
                                    <?php # the_content(); ?>

                                <?php endwhile; endif; ?>
                                </ul>

                            </article>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /section -->

            <?php
            // Set up the objects needed
            $q = new WP_Query();
            $pages = $q->query(array('post_type' => 'page'));
            // Filter through all pages and find Portfolio's children
            $child_pages = get_page_children( get_the_ID(), $pages ); ?>
            <?php foreach($child_pages as $post): setup_postdata($post); ?>
                <!-- section -->
                <section class="section" data-tooltip="<?php the_title(); ?>">
                    <?php the_content(); ?>
                </section>
            <?php endforeach; wp_reset_query(); ?>

        </main>
    </div>

<?php get_footer(); ?>