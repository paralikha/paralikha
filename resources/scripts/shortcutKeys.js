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
	            e.preventDefault();
	            $(document).find('#quote').click();
	            console.log("[clicked] R key");
	            return false;
	    }
	    return true;
	}
})(jQuery, document);