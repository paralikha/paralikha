<?php

get_header(); ?>

    <div id="page" data-toggle="smoothState">

        <?php get_template_part('partial', 'menu-main') ?>

        <main id="main" role="main" class="main animated fadeIn delay-half" data-toggle="fullpage">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                <!-- section -->
                <section class="section" data-tooltip="<?php the_title(); ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <article id="post-<?php the_ID(); ?>" <?php post_class('blog-single'); ?>>
                                    <figure>
                                        <?php the_post_thumbnail(); ?>
                                    </figure>
                                	<h3 class="h2 blog-single-title"><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                </article>
                            </div>
                            <div class="col-md-3">
                                <div class="c-cat">
                                    <h6>Categories</h6>
                                    <ul>
                                        <li><a href="#"><p>WHAT ARE YOU LOOKING FOR?</p></a></li>
                                        <li><a href="#"><p>post with video</p></a></li>
                                        <li><a href="#"><p>post with quote</p></a></li>
                                    </ul>
                                </div>
                                <div class="c-ig">
                                    <h6>Instagram</h6>
                                    <div class="widgetinstagram" data-col="3" data-vertical="10" data-horizontal="10">
                                        <div class="instagram-content">
                                            <a href="https://www.instagram.com">
                                                <img src="resources/images/sample/content.png" width="150" height="150">
                                            </a>
                                            <a href="https://www.instagram.com">
                                                <img src="resources/images/sample/web.png" width="150" height="150">
                                            </a>
                                            <a href="https://www.instagram.com">
                                                <img src="resources/images/sample/graphic2.png" width="150" height="150">
                                            </a>
                                            <a href="https://www.instagram.com">
                                                <img src="resources/images/sample/video.png" width="150" height="150">
                                            </a>
                                            <a>
                                                <img src="resources/images/sample/motion.png" width="150" height="150">
                                            </a>
                                            <a href="https://www.instagram.com">
                                                <img src="resources/images/sample/content.png" width="150" height="150">
                                            </a>
                                        </div>
                                    </div>
                                </div>
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