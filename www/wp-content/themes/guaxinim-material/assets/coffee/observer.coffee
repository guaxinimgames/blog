class Observer
	constructor: ($target = $(document), trigger= 'ready', callback = null, onReady = true)->
		$target.on trigger, (e)->
			callback(e) if typeof callback == 'function'

		callback() if onReady
