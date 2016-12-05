jQuery('document').ready( function( $ ){

	var after_wrapper    = '.after-wrapper',
		before_wrapper    = '.before-wrapper',
		after     		 = '<span class="after">After</span>',
		before     		 = '<span class="before">Before</span>',
		html_input 		 = $('#html-input').data('html-input')


	// before search trigger
	$(document).on("before", function(e){
		console.log("before trigger");


		// $(before_wrapper).empty(); 
		// $(before_wrapper).append(html_input); //append text after all results

		});

	// after search trigger
	$(document).on("after", function(e){
		console.log("after trigger");	   

		// $(after_wrapper).empty(); 
		// $(after_wrapper).append(html_input); //append text after all results

		console.log(html_input);
	});



 });