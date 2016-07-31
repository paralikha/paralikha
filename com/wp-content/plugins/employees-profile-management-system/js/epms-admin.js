jQuery(document).ready(function($) {

    // UPLOAD
    var custom_uploader;
    $(document).on('click', '.button-media', function(e) {

        e.preventDefault();
        // var _this   = $(this).attr("id");
        // alert(_this);
        var _target = $(this).data("target");
        var _input  = $(this).data("input");
        // alert(_target);

        //If the uploader object has already been created, reopen the dialog
        // if (custom_uploader) {
        //     custom_uploader.open();
        //     return;
        // }

        //Extend the wp.media object
        custom_uploader = '';
        custom_uploader = wp.media.frames.file_frame = new wp.media({
            title: 'Choose an Image',
            button: {
                text: "Set as avatar"
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $(_target).attr('src', attachment.url);
            $(_input).val(attachment.url);
        });

        //Open the uploader dialog
        custom_uploader.open();

        return false;

    });
    // Button Add
    $(document).on('click', '.button-add', function(){
        var $key = $('.profile-pic .image-group').length;
        var imageGroup = $('<div class="image-group image-overlays" />');
        imageGroup.append('<img id="epms_profile_avatar_'+$key+'" class="small-thumbnail button-media" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-target="#epms_profile_avatar_'+$key+'" data-input="#input_epms_profile_'+$key+'">')
        imageGroup.append('<input id="input_epms_profile_'+$key+'" type="hidden" name="epms_profile[avatar]['+$key+']">')
        imageGroup.append('<button type="button" class="button-destroy button button-default button-large" data-target="#epms_profile_avatar_'+$key+'" data-input="#input_epms_profile_'+$key+'"><i class="fa fa-times"></i></button>')
        $('.profile-pic #overlays-container').append(imageGroup);
        $('a#overlays-button:not(.toggled)').click();
    });
    $(document).on('click', '.button-destroy', function(){
        var _target = $(this).attr("data-target");
        var _input  = $(this).attr("data-input");
        $(_target).attr('src', 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');
        $(_input).val('');
        $(this).parent('.image-overlays').fadeOut(1000).delay(1500).remove();
    });

    // EFFECTS
    $(".list-group-item[role=button]").click(function(e){
        $(this).find(".arrow-icon").toggleClass("rotate");
        var target = $(this).attr("href");
        $(target).slideToggle(300);
        $(this).toggleClass('toggled');
    });

});