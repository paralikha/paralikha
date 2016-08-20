<div class="row">
    <div class="container">
        <div class="col-md-12">
            <article class="blog blog-showcase">
                <div class="blog-card">
                    <?php the_post_thumbnail(); ?>
                    <div class="blog-body">
                        <div class="blog-calendar">
                            <span class="blog-month"><?php the_month(); ?></span>
                            <span class="blog-year"><?php the_year(); ?></span>
                        </div>
                        <h3 class="blog-title"><?php the_title(); ?></h3>
                        <p class="blog-author"><?php the_author(); ?></p>
                        <?php pl_social_nav(); ?>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>