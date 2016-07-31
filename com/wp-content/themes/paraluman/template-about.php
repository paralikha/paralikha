<?php
/**
 * Template Name: About Page
 */

get_header(); ?>

    <div id="page">

        <?php get_template_part('partial', 'inner-menu') ?>

        <main id="main" role="main" class="main animated fadeIn delay-half" data-toggle="fullpage">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <!-- section -->
                <section class="section" data-tooltip="<?php the_title(); ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <?php the_content(); ?>
                                </article>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /section -->
                <?php endwhile; ?>
            <?php endif; ?>

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