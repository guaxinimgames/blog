jQuery(document).ready(function($) {
	//GENERAL LISTENERS
	//On resize - control the footer position
	$.observer('resize', function() {
		$('main#content').css('margin-bottom', $('footer#footer').outerHeight(true));
	});	
});
