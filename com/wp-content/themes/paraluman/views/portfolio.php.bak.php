<?php
foreach ($Taxonomy_terms as $key => $Terms) {
    $args = array(
        'post_type'   => 'portfolio',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $Terms->slug,
            ),
        ),
    ); ?>
    <li role="presentation" class="<?php echo 0 == $key ? 'active' : ''; ?>"><a href="#<?php echo $Terms->slug; ?>" aria-controls="<?php echo $Terms->slug; ?>" role="tab" data-toggle="tab"><?php echo $Terms->name; ?></a></li>
<?php } // endforeach; ?>
</ul>
<!-- Tab panes -->
<div class="tab-content">
    <?php
    foreach ($Taxonomy_terms as $key => $Terms) {
        $args = array(
            'post_type'   => 'portfolio',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field'    => 'slug',
                    'terms'    => $Terms->slug,
                ),
            ),
        );
        $portfolios = get_posts($args); ?>

        <section role="tabpanel" class="tab-pane <?php echo 0 == $key ? 'active' : ''; ?>" id="<?php echo $Terms->slug; ?>">
            <?php
            foreach ($portfolios as $portfolio) :
                $post = $portfolio; ?>
                <div class="mediabox">
                    <a href="#">
                        <?php echo get_the_post_thumbnail($post->ID); ?>
                        <div class="title-container">
                            <h1 class="portfolio-title h3"><?php echo $portfolio->post_title; ?></h1>
                            <div class="excerpt-container">
                                <p class="portfolio-excerpt"><?php echo get_the_excerpt($post->ID); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; wp_reset_postdata(); ?>
        </section>

    <?php } // endforeach; ?>
</div>