(function ($) {
$(document).ready(function() {
	$('.summernote').summernote({
		height: "300px"
	});
});

$('form').submit(function(){
	// console.log($('.summernote'))
	if($('.summernote')){

		$('.summernote').each(function( index ) {
			// alert($( this ).code());
			$( this ).html($( this ).code());
		});
	}
})

})(jQuery); 