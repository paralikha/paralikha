<ul id="grid" class="grid effect-3 grid-static">
    <?php
    foreach ($Taxonomy_terms as $key => $Terms) :
        $args = array(
            'post_type'   => 'portfolio',
            'post_status' => 'publish',
            'posts_per_page' => 5,
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
        $portfolios = get_posts( $args );
        $portfolios_images = array();
        foreach ($portfolios as $portfolio) {
            $portfolios_images[] = get_the_post_thumbnail_url($portfolio->ID);
        }
        $title = preg_replace('/\s+/', '<br>', $Terms->name, 1); ?>

        <li>
            <a aria-pressed="false" href="<?php echo get_category_link($Terms->term_id); ?>">
                <figure tabindex="<?php echo $key+1; ?>" class="img-hover-fade card card-outlined">
                    <?php
                    foreach ($portfolios_images as $img) {
                        echo '<img src="'.$img.'" class="img-responsive">';
                    } ?>
                    <figcaption class="caption">
                        <h4 class="caption-title"><?php echo $title; ?></h4>
                    </figcaption>
                </figure>
            </a>
        </li>

    <?php
    endforeach; ?>

</ul>