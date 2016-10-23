(($) ->
	$(document).ready ->
		# Variables
		$header = $('header#header');
		hHeight = $header.height();
		
		# Resize / scroll observers
		new Observer $(window), 'scroll resize', ()->
			headerBottom = $header.offset().top + $header.height(); # get bottom position

			# verify for scroll and not mobile
			if $(window).scrollTop() > headerBottom && !utils.window.isBreakpoint(utils.sizes.XS)
				$header.addClass 'fixed';

				$('.fixed-menu', $header).addClass 'navbar-fixed-top';

				$('.main-content').addClass 'fixed-header'
				.css 'padding-top', hHeight
			else 
				$header.removeClass 'fixed'

				$('.fixed-menu', $header).removeClass 'navbar-fixed-top';

				$('.main-content').removeClass 'fixed-header'
				
				if utils.window.isBreakpoint(utils.sizes.XS)
					$('.main-content').css 'padding-top', $header.height()
				else 
					$('.main-content').css 'padding-top', ''
) jQuery