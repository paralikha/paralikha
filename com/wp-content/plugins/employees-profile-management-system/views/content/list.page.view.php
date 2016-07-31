<div class="gridder-container clearfix">
    <div class="gridder padded">
        <div class="slick-n-slide">
        <?php foreach ($Employees as $key => $post): setup_postdata($post);
            $epms_profile = get_post_meta($post->ID, "epms_profile", true); ?>
            <div role="button" class="gridder-list <?php echo @($epms_profile['display']['columns'])?'gridder-'.$epms_profile['display']['columns'].' ':''; ?><?php echo ($per_slider_count%3==0)? 'gridder-even' : 'gridder-odd'; ?>" data-griddercontent="<?php echo EPMS_PLUGIN_URL_VIEW . "partials/single-profile.view.php"; ?>"><?php
                $epms_title = wp_get_post_terms($post->ID, 'epms_titles', array("fields" => "names", 'orderby'=>'ID'));
                $epms_job_title = wp_get_post_terms($post->ID, 'epms_job_titles', array("fields" => "names", "orderby"=>"ID"));
                $epms_splash = ('' !== wp_get_attachment_url( get_post_thumbnail_id($post->ID) )) ? wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) : '#';
                $editor_id = 'epmsprofiledescriptioneditor';
                $epms_description = get_post_meta($post->ID, $editor_id, true); ?>
                <div class="gridder-image <?php echo (( count($epms_profile['avatar']) <= 1 ) ? 'single' : ''); ?>"><?php
                    foreach ($epms_profile['avatar'] as $k => $avatar) { ?>
                        <img src="<?php echo $avatar ?>"><?php
                    } ?>
                </div>
                <form class="hidden">
                    <input type="hidden" name="epms_splash" value="<?php echo $epms_splash; ?>">
                    <input type="hidden" name="epms_name" value="<?php echo get_the_title(); ?>">
                    <input type="hidden" name="epms_title" value="<?php echo implode(", ", $epms_title); ?>">
                    <input type="hidden" name="epms_job" value="<?php echo implode("/", $epms_job_title); ?>">
                    <input type="hidden" name="epms_description" value="<?php echo wpautop($epms_description); ?>">
                </form>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
