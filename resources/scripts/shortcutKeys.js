(function ($, document) {
	window.onkeydown = function(e) {
	    e = e || window.event;
	    var k = e.keyCode || e.which;
	    switch(k) {
	        case 27: // Esc
	        	if ($('.modal').hasClass('in')) {
	        		$(document).find('#quote').click();
	        	}
	        	return false;
	        case 77:
	        	if ($('.nav-landing-nav')) {
	        		e.preventDefault();
	        		$(document).find('.brand-main').click();
	        	}
	        	return false;
	        case 82: // R
	            e.preventDefault();
	            $(document).find('#quote').click();
	            return false;
	    }
	    return true;
	}
})(jQuery, document);