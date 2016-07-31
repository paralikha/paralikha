(function ($, document) {

	/**
	 * Brand Hover Effect
	 * Specific to .brand-main
	 * @type {[type]}
	 */
	var $brand = $('.brand-main');
	_brandHoverEffect = {
		mouse: function (evt, $brand) {
			var offset: $brand.offset();
			var rotation = -135;
            var center_x = (offset.left) + ($brand.width()/2);
            var center_y = (offset.top) + ($brand.height()/2);
            var mouse_x = evt.pageX;
            var mouse_y = evt.pageY;
            var radians = Math.atan2(mouse_x - center_x, mouse_y - center_y);
            var degree = (radians * (180 / Math.PI) * -1) + rotation;

            $brand.css('-moz-transform', 'translateX(-50%) translateY(-50%) rotateZ('+degree+'deg)');
            $brand.css('-webkit-transform', 'translateX(-50%) translateY(-50%) rotateZ('+degree+'deg)');
            $brand.css('-o-transform', 'translateX(-50%) translateY(-50%) rotateZ('+degree+'deg)');
            $brand.css('-ms-transform', 'translateX(-50%) translateY(-50%) rotateZ('+degree+'deg)');
        }
	}

    if ($brand.length > 0) {
        $('#main-menu a').hover(function (e) {
            $(document).bind('mousemove', _brandHoverEffect.mouse, e, $brand);
        }, function (e) {
            $brand.css('-moz-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $brand.css('-webkit-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $brand.css('-o-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $brand.css('-ms-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $(document).unbind('mousemove', mouse);
        }).click(function (e) {
            $brand.css('-moz-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $brand.css('-webkit-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $brand.css('-o-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $brand.css('-ms-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $(document).unbind('mousemove', mouse);
        });
    }

})(jQuery, document);