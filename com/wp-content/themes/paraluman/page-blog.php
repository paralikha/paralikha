<?php
get_header(); ?>

    <div id="page">

        <?php get_template_part('partial', 'inner-menu') ?>

        <main id="main" role="main" class="main animated fadeIn delay-half padding-top-60" data-toggle="fullpage">
            <section class="section" data-tooltip="<?php the_title(); ?>">
                <div class="container">
                    <div class="content-body">

                    <?php
                    $q = new WP_Query();
                    $posts = $q->query(array('post_type' => 'post', 'posts_per_page'=>4));
                    foreach($posts as $key => $post): setup_postdata($post); ?>

                        <?php if ($key==0) : ?>
                            <!-- <div class="row"> -->
                                <div class="col-md-12">
                                    <div class="blog-showcase">
                                        <div class="blog-item blog-pbottom f-header">
                                            <figure class="blog-item-content">
                                                <?php the_post_thumbnail(); ?>
                                                <span class="post-date">
                                                    <span class="month"><?php echo date("M", strtotime(get_the_date())) ?></span>
                                                    <span class="year"><?php echo date("Y", strtotime(get_the_date())) ?></span>
                                                </span>
                                                <figcaption class="blog-card">
                                                    <a href="<?php the_permalink(); ?>"><h3 class="blog-title"><?php the_title(); ?></h3></a>
                                                    <p class="blog-author"><?php the_author() ?></p>

                                                    <div class="blog-social">
                                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                        <?php else: ?>
                            <div class="col-md-4">
                                <div>
                                    <div class="blog-item blog-mini-item">
                                        <figure class="blog-item-content">
                                            <?php the_post_thumbnail(); ?>
                                            <span class="post-date">
                                                <span class="month"><?php echo date("M", strtotime(get_the_date())) ?></span>
                                                <span class="year"><?php echo date("Y", strtotime(get_the_date())) ?></span>
                                            </span>
                                            <figcaption class="blog-card">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="blog-social">
                                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h3 class="blog-title"><?php echo strlen(get_the_title()) > 25 ? substr(get_the_title(), 0, 25) . "..." : get_the_title(); ?></h3></a>
                                                        <p class="blog-author"><?php the_author() ?></p>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; wp_reset_query(); ?>
                    </div>
                </div>
            </section>
        </main>
    </div>

<?php get_footer(); ?>
