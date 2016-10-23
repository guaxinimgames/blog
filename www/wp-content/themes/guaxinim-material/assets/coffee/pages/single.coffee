(($) ->
	# LISTENERS
	# Scroll
	$(document).on 'ready' , ()->
		new Observer $(window), 'scroll resize' , ()->
			top = $('.entry-content').offset().top; #get the top of content
			bottom =  top + ($('.entry-content').height() - $('.share').height()); #get the bottom of content
			scrollTop = $(window).scrollTop() + 120; #get  the scrolltop
			diff = scrollTop - top;

			if top <= scrollTop <= bottom
				# if scrolling in the content
				# move the sharebox
				$('.share').css 'top', diff
			else if scrollTop < top
				# if scroll before the content, remove the sharebox height
				$('.share').css 'top', ''
) jQuery if jQuery('.col-single').length > 0
