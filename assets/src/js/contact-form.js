
jQuery(document).ready(function($){
	// on focus
	$(".wpcf7-form input, .wpcf7-form textarea").focus(function() {
			$(this).parent().siblings('label').addClass('has-value');
	})
	// blur input fields on unfocus + if has no value
	.blur(function() {
		var text_val = $(this).val();
		if(text_val === "") {
			$(this).parent().siblings('label').removeClass('has-value');
		}
	});
});