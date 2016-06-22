// $.observer('resize|scroll', callback , delay)
(function($) {
	$.observer = function(type, callback, delay) {
		delay = delay || 100;
		var timer;
		switch (type) {
			case 'resize':
				$(window).on('resize', setObeserver);
				setObeserver();
				break;
			case 'scroll':
				$(window).on('scroll', setObeserver);
				setObeserver();
				break;
		}

		//private functions
		function setObeserver(){
			timer = setTimeout(function(){
				clearTimeout(timer);
				callback();
			}, delay);
		}
	}
}(jQuery));
