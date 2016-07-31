<?php
get_header(); ?>

    <div id="page">

        <?php # get_template_part('partial', 'menu') ?>

        <main id="main" role="main" class="main animated bounceInDown padding-top-60 content-ajax">
            <button onclick="history.go(-1);" class="c-close" data-target="#main"><span aria-hidden="true">&times;</span></button>
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <!-- section -->
                <section class="section" data-tooltip="<?php the_title(); ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <h1 class="post-title h2"><?php the_title(); ?></h1>
                                    <?php the_content(); ?>
                                </article>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /section -->
                <?php endwhile; ?>
            <?php endif; ?>
        </main>
    </div>
<?php get_footer(); ?>