# utils
utils = new Utils();

(($) ->
	$(document).ready ->
		$('[data-scroll-to]').on 'click', (e)->
			e.preventDefault();
			$target = $($(this).attr('data-scroll-to'));
			offset = parseInt($(this).attr 'data-scroll-offset') || null;
			utils.scrollTo $target, offset
) jQuery
