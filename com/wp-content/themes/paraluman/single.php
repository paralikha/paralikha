<?php

get_header(); ?>

    <div id="page" data-toggle="smoothState">

        <?php get_template_part('partial', 'nav') ?>

        <main id="main" role="main" class="main animated fadeIn delay-half" data-toggle="sectionScroller">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <!-- section -->
                <section class="section" data-tooltip="<?php the_title(); ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <article id="post-<?php the_ID(); ?>" <?php post_class('blog-card blog-single bg-white'); ?>>
                                    <div class="blog-block">
                                        <figure class="blog-single-thumbnail">
                                            <?php the_post_thumbnail('fluid'); ?>
                                        </figure>
                                        <h3 class="blog-single-title text-uppercase"><?php the_title(); ?></h3>
                                        <div class="blog-single-metadata">
                                            <p class="blog-single-author text-uppercase"><i class="fa fa-edit">&nbsp;</i>Posted by: <?php the_author_posts_link(); ?></p>
                                            <p class="blog-single-date text-uppercase"><i class="fa fa-calendar">&nbsp;</i><?php the_pretty_date(); ?></p>
                                        </div>
                                        <?php the_content(); ?>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /section -->
                <?php endwhile; ?>
            <?php endif; ?>

            <?php get_template_part("partial", "logos"); ?>

        </main>

        <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>