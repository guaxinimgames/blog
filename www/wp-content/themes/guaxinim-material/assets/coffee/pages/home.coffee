# AJAX LOAD POSTS
(($) ->
	$('.load-more').on 'click', (e) ->
		e.preventDefault();
		$.ajax
			url: ajax.ajaxurl
			type: 'post'
			data:
				action: 'ajax_posts'
				index: parseInt ( $('.home-cell').attr ( 'data-posts' ) )
				total: $('.home-cell').attr 'data-total-posts'
			success: (result)->
				console.log result
				$result = $(result);
				$result.appendTo('.main-grid');
) jQuery if jQuery('.load-more').length > 0
