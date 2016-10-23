(($) ->
	# scroll Observer
	new Observer $(window), 'scroll', ()->
		$.each $('section','.internal-page'), (i) ->
			top = $(this).offset().top; # get the top of section
			bottom = top + $(this).outerHeight(true); #get the bottom of section
			scrollTop = $(window).scrollTop() + 100;

			# if the scrolltop is in the range
			if top <= scrollTop <= bottom
				# change corresponding menu option
				$('.archive-header nav ul li a')
				.filter "[href='##{$(this).attr('id')}']"
				.parents 'li'
				.addClass 'current-menu-item'
				.siblings()
				.removeClass 'current-menu-item'
) jQuery if jQuery('.internal-page').length > 0
