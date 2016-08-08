// All functions before .ready
(function ($, document) {
	// Variables
	var _Scrollify = {
		create: function ($) {
			$.scrollify({
	        	section : ".section",
		        sectionName : "section-name",
		        interstitialSection : "",
		        easing: "easeOutExpo",
		        scrollSpeed: 800,
		        offset : 0,
		        scrollbars: false,
		        standardScrollElements: "",
		        setHeights: true,
		        overflowScroll: true,
		        before:function() {},
		        after:function() {},
		        afterResize:function() {},
		        afterRender:function() {
		        	$('.slides').each(function (e) {
		        		var $slides = $(this);
		        		var originalWidth = $slides.parent().outerWidth();
		        		var $children = $slides.find('.slide');
		        		$slides.css({width: originalWidth * $children.length});
		        		$children.each(function (e) {
		        			$(this).css({width: originalWidth});
		        		});
		        		$slides.parent().css({'overflow-x':'hidden'});
		        	})
		        	$('[data-bg].section').each(function (e) {
				        $(this).css({background:$(this).data('bg')});
				    });
		        },
	        });
		},
		destroy: function ($) {
			$.scrollify.destroy();
		},
		reset: function ($) {
			this.destroy($);
			this.create($);
		}
	}

	var _fullpage = {
		create: function ($) {
			$ = jQuery;
			if ($.fn.fullpage) {
				var f = $(document).find('[data-toggle=fullpage]').fullpage({
					paddingTop: 		'3.88889rem',
					paddingBottom: 		'3.88889rem',

					showActiveTooltip: 	false,

					navigation: 		true,
					navigationPosition: 'right',
					verticalCentered: 	true,

					slidesNavigation: 	true,
					loopHorizontal: 	true,
					slidesNavPosition: 	'bottom',

					controlArrows: 		true,

					scrollOverflow: 	true,
					scrollingSpeed: 	500,
					scrollbar: 			false,
				});
				console.log('[OK] fullpage created');
				return f;
			}
			console.log('[OK] fullpage is not found');
			return false;
		},
		destroy: function ($) {
			// console.log($.fn.fullpage);
			if ($.fn.fullpage) {
				$.fn.fullpage.destroy('all');
				console.log('[OK] fullpage destroyed');
				return true;
			}
			return;
		},
		reset: function ($) {
			if ($.fn.fullpage && this.destroy($)) {
				console.log("[OK] fullpage reset");
				this.create($);
				return true;
			}
			return;
		}
	}

	var _toggles = function ($) {
		$('[data-toggle=toggleClass]').each(function (e) {
			var $this   = $(this),
				action  = $(this).data('toggle-action') ? $(this).data('toggle-action') : 'click',
				value   = $(this).data('toggle-value'),
				$target = $($(this).data('target'));
			$this.on(action, function (e) {
				console.log('asdasd');
				$target.toggleClass(value);
			});
		});
	}

	var smoothStateOptions = {
		prefetch: true,
		cacheLength: 5,
		onStart: {
			duration: 800,
			render: function ($container) {
				$container.addClass('is-exiting');
				$container.addClass('animated');
				$('.nav.nav-fixed-left .nav-brand').addClass('bounceOutLeft');
				$('.nav.nav-fixed-left').addClass('bounceOutLeft');

				// restart
				smoothState.restartCSSAnimations();
			}
		},
		onReady: {
			duration: 0,
			render: function ($container, $newContent) {
				$container.removeClass('is-exiting');
				$container.removeClass('animated');
				$('.nav.nav-fixed-left').removeClass('bounceOutLeft');

				// inject
				$container.html($newContent);
			}
		},
		onBefore: function ($currentTarget, $container) {
			// body...
		},
		onAfter: function ($container, $newContent) {
			// _fullpage.reset($);
			// $.fn.fullpage.destroy('all');
			// _fullpage.create($);
			_Scrollify.reset($);
		}
	}

	// Fullpage init
	// _fullpage.create($);
	// Toggles
	_toggles($);
	_Scrollify.create($);

	// smoothState
	if ($.fn.smoothState) {
		var smoothState = $(document).find('[data-toggle=smoothState]').smoothState(smoothStateOptions).data('smoothState');
		console.log("[OK] smoothState init");
	}

})(jQuery, document);
(function ($, document) {

    var $brand = $('.brand-main');
    /**
     * Brand Hover Effect
     * Specific to .brand-main
     *
     * @type {obj}
     */
    _brandHoverEffect = {
        mouse: function (evt) {
        	var $brand = $('.brand-main');
			var offset = $brand.offset();
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
            $(document).bind('mousemove', _brandHoverEffect.mouse);
        }, function (e) {
            $brand.css('-moz-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $brand.css('-webkit-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $brand.css('-o-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $brand.css('-ms-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $(document).unbind('mousemove', _brandHoverEffect.mouse);
        }).click(function (e) {
            $brand.css('-moz-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $brand.css('-webkit-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $brand.css('-o-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $brand.css('-ms-transform', 'translateX(-50%) translateY(-50%) rotateZ(0deg)');
            $(document).unbind('mousemove', _brandHoverEffect.mouse);
        });
    }

})(jQuery, document);
(function ($, document) {
	window.onkeydown = function(e) {
	    e = e || window.event;
	    var k = e.keyCode || e.which;
	    switch(k) {
	        case 27: // Esc
	        	if ($('.modal').hasClass('in')) {
	        		$(document).find('#quote').click();
	        		console.log("[clicked] Esc key");
	        	}
	        	return false;
	        case 77: // M
	        	if ($('.nav-landing-nav')) {
	        		e.preventDefault();
	        		$(document).find('.brand-main').click();
	        		console.log("[clicked] M key");
	        	}
	        	return false;
	        case 82: // R
	        	if (!$('input, textarea, select').is(':focus')) {
		            e.preventDefault();
		            $(document).find('#quote').click();
		            console.log("[clicked] R key");
		            return false;
	        	}
	    }
	    return true;
	}
})(jQuery, document);