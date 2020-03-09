(function ($) {
$(document).ready(function() {
	$('.summernote').summernote({
		height: "500px"
	});
});

$('form').submit(function(){
	if($('.summernote').length() > 0){

		$('.summernote').each(function( index ) {
			alert($( this ).code());
			$( this ).html($( this ).code());
		});
	}
})

})(jQuery); 