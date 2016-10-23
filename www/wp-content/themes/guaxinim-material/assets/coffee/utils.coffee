class Utils
	instance = null

	constructor: () ->
		if (!instance) then instance = this
		return instance

	window : {
			'width' : ()->
				return if(window.innerWidth > 0) then window.innerWidth else screen.width;
			'height' : ()->
				return if(window.innerHeight > 0) then window.innerHeight else screen.height;
			'getBreakpoint': ()->
				return Utils.prototype.sizes.XS if (this.width() < 768)
				return Utils.prototype.sizes.SM if (this.width() >= 768 and this.width() < 992)
				return Utils.prototype.sizes.MD if (this.width() >= 992 and this.width() < 1200)
				return Utils.prototype.sizes.LG if (this.width() >= 1200)
			'isBreakpoint': (size)->
				return this.getBreakpoint() == size
		}
	sizes : {
		XS : "xs"
		SM : "sm"
		MD : "md"
		LG : "lg"
	}
	scrollTo: (to, offset = 0, speed = 1000, ease = 'easeInOutCubic')->
		if typeof to == 'object' then target = to.offset().top
		else target = to

		jQuery('body').animate {
			'scrollTop' :(target - offset)
			'easing': ease
		}, speed

window.exports = Utils
