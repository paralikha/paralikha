<?php
/**
 * Template Name: Works Page
 */
get_header(); ?>

    <div id="page">

        <?php get_template_part('partial', 'inner-menu') ?>

        <main id="main" role="main" class="main animated fadeIn delay-half padding-top-60" data-toggle="fullpage">

            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>

        </main>

        <div id="content-ajax" class="content-ajax animated bounceInDown">
            <button class="c-close" data-target="#content-ajax">&times;</button>

            <div class="w-content-modal">
                <div id="fullscreen-banner" class="full-banner vertical-align">
                    <div class="container-mid">
                        <div class="container">
                            <!--  -->
                        </div>
                    </div>
                </div>

                <div class="m-wrapper">
                    <div class="row w-photos m-content">
                        <!--  -->
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>