<div class="profile-container container"><?php
    include EPMS_PLUGIN_VIEW . "partials/nonce.view.php"; ?>
    <div class="epms flex-container">
        <div class="half-container vbottom">
            <div class="profile-pic profile-pic-container">
                <div class="image-group">
                    <img id="epms_profile_avatar_0" class="thumb thumbnail button-media" src="<?php echo @$value['avatar'][0]; ?>" data-target="#epms_profile_avatar_0" data-input="#input_epms_profile_0">
                    <input id="input_epms_profile_0" type="hidden" name="epms_profile[avatar][0]" value="<?php echo @$value['avatar'][0]; ?>">
                </div>
                <a id="overlays-button" href="#overlays-container" role="button" class="list-group-item">
                    <i class="fa fa-magic">&nbsp;</i>
                    Hover Images
                    <i class="arrow-icon pull-right fa fa-angle-up"></i>
                </a>
                <div id="overlays-container" class="hidden list-group-item"><?php
                if( is_object($value) || is_array($value)):
                    foreach($value['avatar'] as $key => $v) {
                        if($key != 0) { ?>
                            <div class="image-group image-overlays"><?php
                                echo '<img id="epms_profile_avatar_'.$key.'" class="small-thumbnail button-media" src="'.$v.'" data-target="#epms_profile_avatar_'.$key.'" data-input="#input_epms_profile_'.$key.'">';
                                echo '<input id="input_epms_profile_'.$key.'" type="hidden" name="epms_profile[avatar]['.$key.']" value="'.$v.'">';
                                echo '<button type="button" class="button-destroy button button-default button-large" data-target="#epms_profile_avatar_'.$key.'" data-input="#input_epms_profile_'.$key.'"><i class="fa fa-times"></i></button>'; ?>
                            </div><?php
                        }
                    }
                endif; ?>
                </div>
            </div>
            <div class="list-group">
                <div class="list-group-item">
                    <!-- <input id="epms_avatar_browse_thumbnail" data-input="#epms_avatar_upload_image" data-target="#epms_avatar_image_preview" type="button" class="button-media button button-primary button-large" value="Select Image..."> -->
                    <button id="epms_avatar_browse_thumbnail" type="button" class="button-add button button-primary button-large"><i class="fa fa-plus"></i></button>
                    <input id="epms_avatar_destroy_thumbnail" data-input="#input_epms_profile_0" data-target="#epms_profile_avatar_0" type="button" class="button-destroy button button-default button-large" value="Remove Main Avatar">
                </div>
            </div>
        </div>
        <div class="half-container flex-child-stretch">
            <div class="editor"><?php
                $editor_id = 'epmsprofiledescriptioneditor';
                $content = get_post_meta($post->ID, $editor_id, true);
                wp_editor( $content, $editor_id, array(
                    'tinymce' => array(
                        'height' => 298
                    ),
                    'media_buttons' => false,
                    'quicktags'     => array("buttons"=>"link,img,close")
                )); ?>
            </div>
        </div>
    </div>
</div>