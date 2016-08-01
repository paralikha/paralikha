// All functions before .ready
(function ($, document) {
	// Variables
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
			_fullpage.reset($);
			// $.fn.fullpage.destroy('all');
			// _fullpage.create($);
		}
	}

	// Fullpage init
	_fullpage.create($);
	// Toggles
	_toggles($);

	// smoothState
	if ($.fn.smoothState) {
		var smoothState = $(document).find('[data-toggle=smoothState]').smoothState(smoothStateOptions).data('smoothState');
		console.log("[OK] smoothState init");
	}
})(jQuery, document);