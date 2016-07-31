<?php foreach ($Employees as $key => $post): setup_postdata($post);

    $epms_profile = get_post_meta($post->ID, "epms_profile", true);
    $epms_title = wp_get_post_terms($post->ID, 'epms_titles', array("fields" => "names", 'orderby'=>'ID'));
    $epms_job_title = wp_get_post_terms($post->ID, 'epms_job_titles', array("fields" => "names", "orderby"=>"ID"));
    $epms_splash = ('' !== wp_get_attachment_url( get_post_thumbnail_id($post->ID) )) ? wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) : '#';
    $editor_id = 'epmsprofiledescriptioneditor';
    $epms_description = get_post_meta($post->ID, $editor_id, true); ?>

    <div class="slide" id="<?php echo $post->post_name; ?>" data-tooltip="<?php echo strip_tags(get_the_title()); ?>">
        <div class="container">
            <div class="content-body row">
                <div class="col-md-6">
                    <h1 class="h2 emp-name"><?php the_title() ?></h1>
                    <p class="emp-title"><?php echo implode(", ", $epms_job_title); ?></p>
                    <div class="text-secondary">
                        <?php echo wpautop($epms_description); ?>
                    </div>
                    <?php edit_post_link(); ?>
                </div>
                <div class="col-md-6">
                    <div class="gridder-img gridder-img-auto-swap <?php echo (( count($epms_profile['avatar']) <= 1 ) ? 'single' : 'multiple'); ?>">
                        <?php
                        # Display the avatar
                        foreach ($epms_profile['avatar'] as $avatar): ?>
                            <img class="mx-w-500" src="<?php echo $avatar ?>" alt="<?php the_title(); ?>">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; wp_reset_query(); ?>
