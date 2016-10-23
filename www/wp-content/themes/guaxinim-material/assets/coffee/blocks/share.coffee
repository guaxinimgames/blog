(($) ->
	# VARIABLES
	service = null
	info =
		link: $('meta[property="og:url"]').attr 'content'
		name: $('meta[property="og:title"]').attr 'content'
		description: $('meta[property="og:description"]').attr 'content'
		caption: $('meta[property="og:title"]').attr 'content'
		picture: $('meta[property="og:image"]').attr 'content'

	# LISTENERS
	# Button click
	$('.share').on 'click', 'button', ()->
		service = $(this).attr 'data-service'
		switch service
			when "facebook"
				facebook()
			when "twitter"
				share twitter()
			when "linkedin"
				share linkedin()
			when "instagram"
				console.warn("Is that possible?")
			when "pinterest"
				share pinterest()

	# FUNCTIONS
	# open a window
	share = (url)->
		window.open(url, service, "width=800,height=600");

	# Facebook share dialog
	facebook = ->
		FB.ui
			'method' : 'feed',
			'app_id': FB_APP_ID
			'link': info.link
			'name': info.name
			'description': info.description
			'caption': info.caption
			'picture': info.picture
		, (response) ->
			console.log(response)

	# twitter share link
	twitter = (url = info.link, text = info.caption , hashtags = "")->
		hashtags.join() if hashtags != ""
		return "http://twitter.com/share?text=#{text}&url=#{url}&hashtags=#{hashtags}"

	# linkedin share link
	linkedin = (url =  info.link, summary = info.title)->
		return "https://www.linkedin.com/shareArticle?mini=true&url=#{url}summary=#{summary}source="

	# pinterest share link
	pinterest = (url =  info.link, image = info.picture, description = info.caption)->
		return "https://pinterest.com/pin/create/button/?url=#{url}&media=#{image}&description=#{description}"
) jQuery if jQuery('.share').length > 0
