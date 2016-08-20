<?php
/**
 * Template Name: Blog
 */

get_header(); ?>

    <div id="page" data-toggle="smoothState">

        <?php get_template_part('partial', 'nav'); ?>

        <main id="main" role="main" class="main main-fluid animated fadeIn delay-half" data-toggle="sectionScroller">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <!-- Section -->
                <section class="section section-table" data-tooltip="<?php the_title(); ?>">
                    <div class="section-cell section-cell-centered">
                        <div class="container">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </section>
                <!-- /Section -->
            <?php endwhile; endif; ?>

            <!-- Posts Section -->
            <section class="section section-table" data-tooltip="<?php the_title(); ?>">
                <div class="section-cell section-cell-centered">
                    <div class="container">
                        <div class="row">
                            <?php
                            $wp_query = new WP_Query();
                            $posts = $wp_query->query(array('post_type' => 'post', 'posts_per_page' => 4));
                            foreach($posts as $key => $post): setup_postdata($post);
                                $is_showcase = (0 == $key) ? true : false; ?>

                                    <div class="col-md-<?php echo $is_showcase ? '12' : '4';  ?>">
                                        <article class="blog blog-card <?php echo $is_showcase ? 'blog-showcase' : 'blog-item' ?>">
                                            <?php the_post_thumbnail('cover'); ?>
                                            <div class="blog-calendar floated-top-left">
                                                <span class="blog-calendar-month"><?php the_month(); ?></span>
                                                <hr class="separator">
                                                <span class="blog-calendar-year"><?php the_year(); ?></span>
                                            </div>
                                            <div class="blog-block <?php echo $is_showcase ? 'text-sm-center' : 'text-xs-left bg-secondary'; ?>">
                                                <a class="h3 blog-title <?php echo !$is_showcase ? 'text-sm-right' : '' ?>" data-toggle="tooltip" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php echo $is_showcase ? get_the_title() : get_truncated(get_the_title()); ?></a>
                                                <p class="blog-author text-uppercase <?php echo !$is_showcase ? 'text-sm-right' : '' ?>"><?php the_author_posts_link(); ?></p>
                                                <?php if (!$is_showcase): ?><div class="floated-bottom-left"><?php endif; ?>
                                                <?php pl_social_nav(); ?>
                                                <?php if (!$is_showcase): ?></div><?php endif; ?>
                                            </div>
                                        </article>
                                    </div>

                            <?php endforeach; wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /Posts Section -->

            <?php get_template_part("partial", "logos"); ?>
        </main>
    </div>

<?php get_footer(); ?>
