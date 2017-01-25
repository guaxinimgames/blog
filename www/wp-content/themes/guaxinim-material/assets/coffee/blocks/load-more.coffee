(($) ->
	$('.load-more').on 'click', (e) ->
		e.preventDefault();
		$button = $(@);
		index = $button.attr 'data-posts-length';
		author = $button.attr 'data-posts-author';
		# make ajax call
		$.ajax
			url: ajax.ajaxurl
			type: 'post'
			data:
				'action': 'ajax_posts'
				'index': parseInt index
				'author': parseInt(author) if parseInt(author) >= 0
			beforeSend: ->
				$button.addClass 'loading'
				.attr 'disabled', 'disabled'
			success: (result)->
				$('.load-more-container').before $(result); # update the html
				# Update the info
				$button.attr 'data-posts-length', $('.post-card').length
				.removeClass 'loading'
				.removeAttr 'disabled'
				# remove the button if all posts are loaded
				$button.remove() if $button.attr('data-posts-length') >= $button.attr('data-posts-total')
				componentHandler.upgradeDom(); # Handke the material componentHandler
			always: ->
				$button.removeClass 'loading'
				.removeAttr 'disabled'
) jQuery if jQuery('.load-more').length > 0
