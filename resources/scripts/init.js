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
		        scrollbars: true,
		        standardScrollElements: "",
		        setHeights: true,
		        overflowScroll: true,
		        before:function() {},
		        after:function() {},
		        afterResize:function() {},
		        afterRender:function() {
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

	var _toggles = function ($) {
		$('[data-toggle=toggleClass]').each(function (e) {
			var $this   = $(this),
				action  = $(this).data('toggle-action') ? $(this).data('toggle-action') : 'click',
				value   = $(this).data('toggle-value'),
				$target = $($(this).data('target'));
			$this.on(action, function (e) {
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
			_Scrollify.reset($);
		}
	}

	// Toggles
	_toggles($);
	_Scrollify.create($);

	// smoothState
	if ($.fn.smoothState) {
		var smoothState = $(document).find('[data-toggle=smoothState]').smoothState(smoothStateOptions).data('smoothState');
		console.log("[OK] smoothState init");
	}

})(jQuery, document);