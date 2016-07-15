jQuery(document).ready(function($) {
	//MASKEDINPUT
	$('input[data-mask]').each(function() {
		$(this).mask($(this).attr('data-mask'));
	});
});