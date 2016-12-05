jQuery('document').ready( function( $ ){

	var after_wrapper    = '.after-wrapper'

	// after search trigger
	$(document).on("after", function(e){
		$(after_wrapper).fadeIn();
	});

 });