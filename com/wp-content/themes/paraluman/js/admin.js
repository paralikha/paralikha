jQuery(document).ready(function($) {

    // UPLOAD
    var custom_uploader;
    $('.button-media-theme').click(function(e) {

        e.preventDefault();
        var _this   = $(this).attr("id");
        // alert(_this);
        var _target = $("#"+_this).attr("data-target");
        var _input  = $("#"+_this).attr("data-input");
        // alert(_target);

        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }

        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = new wp.media({
            title: 'Choose an Image',
            button: {
                text: "Set Image"
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            // $(_target).attr('value', attachment.url);
            $(_input).val(attachment.url);
            console.log(attachment.url, _input);
        });

        //Open the uploader dialog
        custom_uploader.open();

        // return false;

    });
    $('.button-destroy-x').click(function(){
        var _target = $(this).attr("data-target");
        var _input  = $(this).attr("data-input");
        $(_target).attr('src', '');
        $(_target).attr('value', '');
        $(_input).val('');
    });

    // EFFECTS
    // $(".list-group-item[role=button]").click(function(e){
    //     $(this).find(".arrow-icon").toggleClass("rotate");
    //     var target = $(this).attr("href");
    //     $(target).slideToggle(300);
    // });

});