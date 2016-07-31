<?php global $post; ?>
<?php
$args = array(
    'post_type'   => 'portfolio',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
);
$portfolios = get_posts( $args );

foreach ($portfolios as $post) {
    setup_postdata($post); $i=0; ?>
    <section class="section" data-tooltip="<?php the_title(); ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="w-body" data-bg="<?php echo @get_the_post_thumbnail_url(); ?>">
                            <div class="w-content">
                                <h2>
                                    <span><?php echo str_pad(++$i, 2, "0",STR_PAD_LEFT); ?></span><br>
                                    <?php the_title(); ?>
                                </h2>
                                <?php
                                $categories = get_the_terms( get_the_ID(), "portfolio" );
                                $cat_arr = [];
                                if ($categories) {
                                    foreach ($categories as $category) {
                                        $cat_arr[] = $category->name;
                                    }
                                }
                                ?>
                                <p><span><?php echo implode(" | ", $cat_arr); ?></span></p>
                                <div class="w-c-sub">
                                    <div class="w-c-sub-content">
                                        <?php the_content(); ?>
                                    </div>
                                    <div class="w-btn">
                                        <a role="button" class="click-z" href="#content-ajax" data-id="post-<?php the_ID(); ?>">Design Process</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

<?php } ?>

<?php #wp_reset_postdata(); ?>