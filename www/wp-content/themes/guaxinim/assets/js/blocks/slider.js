jQuery(document).ready(function($) {
	//CAROUSELS
	$('.carousel').carousel().on('swiperight', function() {
		$(this).carousel('prev');
	}).on('swipeleft', function() {
		$(this).carousel('next');
	});
});