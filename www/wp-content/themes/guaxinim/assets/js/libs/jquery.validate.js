(function($) {
	$.fn.validate = function(onValid, onInvalid) {

		var $form = $(this);
		var $inputs = jQuery('input,textarea').filter('[required]');
		var errors = 0;

		$form.on('submit', function(e) {
			e.preventDefault();
			errors = 0;
			$inputs.each(function() {
				check($(this));
			});
			if (errors == 0) {
				if (typeof(onValid) == 'function') {
					onValid($(this));
				}
			} else {
				if (typeof(onInvalid) == 'function') {
					onInvalid($(this));
				}
			}
		});

		$inputs.on('change', function() {
			check($(this));
		});

		function check($input) {
			$input.removeClass('has-success has-error animated shake');
			var type = $input.attr('data-rule');
			var result;

			switch (type){
				case 'notnull':
					result = notNull($input.val());
					break;
				case 'email':
					result = isEmail($input.val());
					break;
				case 'custom':
					result = custom($input.val(), $input.attr('data-regex'));
					break;
			}
			if(result){
				success($input);
			} else {
				errors++;
				error($input);
			}
		}


		//private functions
		function error($input) {
			$input.parents('.form-group').addClass('has-error animated shake').removeClass('has-success');
		}

		function success($input) {
			$input.parents('.form-group').addClass('has-success').removeClass('has-error animated shake');
		}

		//Check functions
		function notNull(value) {
			return new RegExp(/^$|\s+/).test(value);
		}
		function isEmail(value) {
			return new RegExp(/^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i).test(value);
		}
		function custom(value , reg){
			return new RegExp(reg).test(value);
		}
	}
}(jQuery));
