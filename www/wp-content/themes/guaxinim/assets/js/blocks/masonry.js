jQuery(document).ready(function($) {
	//MASONRY
	$('.grid','.masonry').masonry({
		itemSelector: '.grid-item',
		columnWidth: '.grid-sizer',
		percentPosition: true
	});
});