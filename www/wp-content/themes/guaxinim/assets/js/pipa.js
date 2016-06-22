jQuery(document).ready(function($) {

	//GENERAL LISTENERS
	//On resize - control the footer position
	$.observer('resize', function() {
		$('body').css('margin-bottom', $('footer#footer').outerHeight(true));
	});

	//CAROUSELS
	$('.carousel').carousel().on('swiperight', function() {
		$(this).carousel('prev');
	}).on('swipeleft', function() {
		$(this).carousel('next');
	});

	//MASKEDINPUT
	$('input[data-mask]').each(function() {
		$(this).mask($(this).attr('data-mask'));
	});
});
