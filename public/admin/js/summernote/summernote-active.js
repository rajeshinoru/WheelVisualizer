(function ($) {
$(document).ready(function() {
	$('.summernote').summernote({
		height: "300px"
	});
});

$('form').submit(function(){
	if($(this).find('.summernote').length){

		$('.summernote').each(function( index ) {
			// alert($( this ).code());
			$( this ).html($( this ).code());
		});
	}
})

})(jQuery); 