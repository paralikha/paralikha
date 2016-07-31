<?php foreach ($Services as $post) : setup_postdata($post);
    $animatron = get_post_meta(get_the_ID(), "epms_htmlanimation", true);
    $services_obj = get_post_meta(get_the_ID(), "soms_services", true); ?>
    <section class="section" data-tooltip="<?php the_title(); ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
                        <div class="col-md-6">
                            <h1><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="animatron-container">
                                <?php #if( is_array($animatron) && null !== $animatron['filename'] ):
                                    #$path = get_bloginfo('url') . '/animatron/' . $post->post_name . '/project.html'; ?>
                                    <!-- <iframe data-src="<?php echo $path; ?>" anm-width="640" anm-height="640" data-autoplay anm-auto-play="true" anm-controls="false" anm-auto-frameborder="0" width="640" height="640" frameBorder="0" seamless="seamless" scrolling="no"></iframe> -->
                                <?php #else: ?>
                                    <img class="img-responsive centered-block" src="<?php echo $services_obj['icon'] ?>">
                                <?php #endif; ?>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>