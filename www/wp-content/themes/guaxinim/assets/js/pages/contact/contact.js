jQuery(document).ready(function($) {
	$('form', '.contact-form').validate(function(){
		alert('valid');
	},function(){
		alert('invalid');
	});
});
