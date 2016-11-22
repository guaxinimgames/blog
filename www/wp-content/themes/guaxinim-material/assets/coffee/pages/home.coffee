# AJAX LOAD POSTS
(($) ->
	if $('.load-more').length > 0
		$('.load-more').on 'click', (e) ->
			e.preventDefault();
			# make ajax call
			$button = $(@);
			index = parseInt ( $button.attr ( 'data-posts-length' ) );
			total = parseInt $button.attr 'data-total-posts';
			$.ajax
				url: ajax.ajaxurl
				type: 'post'
				data:
					'action': 'ajax_posts'
					'index': index
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
					$button.remove() if $button.attr('data-posts-length') >= $button.attr('data-total-posts')
					componentHandler.upgradeDom(); # Handke the material componentHandler
				always: ->
					$button.removeClass 'loading'
					.removeAttr 'disabled'
) jQuery if jQuery('#home').length > 0
