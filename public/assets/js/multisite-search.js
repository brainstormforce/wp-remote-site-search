(function( $, Backbone, _, undefined ) {

	jQuery('document').ready( function( $ ){

		var resultTemplate = $('#wpms--tmpl')
		,	itemTemplate     = _.template( resultTemplate.html() )
		,	main             = '#wpms'
		,	postList		 = '#wpms--post-list'
		,	postList         = $( main ).data('target') ? $( main ).data('target') : postList
		,	showExcerpt      = $( main ).data('excerpt') ? 'enabled' : 'disabled'
		,	results          = '#wpms--results'
		,	loader           = '#wpms--loading'
		,	input  			 = '#wpms--input'
		,	helper           = '#wpms--helper'
		,	helperText       = wpms_search_msg.helperText
		,	helperSpan       = '<span id="wpms--helper">'+helperText+'</span>'
		,	clear     		 = '<i id="wpms--clear-search" class="dashicons dashicons-dismiss"></i>'
		,	clearItem        = '#wpms--clear-search'
		,	hideClass        = 'wpms--hide'
		,	showClass        = 'wpms--show'
		,	timer

		$( postList ).addClass('wpms--empty');

		$( input ).on('keyup keypress', function ( e ) {

			// previous timer -clear
			clearTimeout(timer)

			var key         = e.which
			,	that        = this
			,	val 		= $.trim( $(this).val() )
			,	valEqual    = val == $(that).val()
			,	notEmpty    = '' !== val
			,	type        = $(this).data('object-type')
			,	total       = $( main ).data('number')
			,	rest_api 	= $(this).data('rest-api')
			,	cat 		= $(this).data('cat')
			,	url 		= rest_api+'/wp-json/wp/v2/'+type+'search='+val+'&filter[category_name]='+cat+'&per_page='+total

			// 600ms delay so we dont exectute excessively
			
			timer = setTimeout(function() {


				// don't proceed if the value is <> or != to itself
				if ( !valEqual && !notEmpty )
					return false;

				// when type only two characters?
				if ( val.length == 2 && !$(helper).length ) {

					$( input ).after( helperSpan );

				}

				// when type >= 3 characters
				if ( val.length >= 3 || val.length >= 3 && 13 == key ) {
					
					// before request trigger					
					$(document).trigger("before");


					// escape or arrow keys blocked
					if( blacklistedKeys( key ) )
						return false;

					// loading effect
					$( loader ).removeClass('wpms--hide').addClass('wpms--show');

					// helpers removed
					$( helper ).fadeOut().remove();

					// remove close
					destroyClose()

					// request
					var jqxhr = $.getJSON( url, function( response ) {
						// remove current lists
						$(postList).children().remove();
						$(postList).removeClass('wpms--full').addClass('wpms--empty')

						// results 
						$(results).parent().removeClass('wpms--hide').addClass('wpms--show');

						// loading effect hide
						$(loader).removeClass('wpms--show').addClass('wpms--hide');

						// count results & show
						if ( response.length == 0 ) {

							// no result found
							$(results).text('No results found…').closest( main ).addClass('wpms--no-results');

							// remove close
							destroyClose();

						} else {

							// escape or arrow keys blocked
							if( blacklistedKeys( key ) )
								return false;

							// append close
							if ( !$( clearItem ).length ) {

								$(input).after( clear );
							}

							// total no. of results found
							$(results).text( "We found "+response.length+" articles that may help:" ).closest( main ).removeClass('wpms--no-results');
							// each object in loop
			                $.each( response, function ( i ) {


			                    $(postList).append( itemTemplate( { post: response[i], excerpt: showExcerpt } ) )
			                    .removeClass('wpms--empty')
			                    .addClass('wpms--full');

			                });
			            }
					})
					
					// complete request trigger
					.done(function() {
					    $(document).trigger("after");
					  })
					
					//request error
					.fail(function() {
					    console.log( "error" );
					  });
					

				}

			}, 600);

			// destroy the search if value is empty
			if ( val == '' ) {

				destroySearch();

			}

		});

		/**
		*	search empty
		*/
		$( main ).on('click', clearItem, function(e){

			e.preventDefault();
			destroySearch();
		});

		/**
		*  destroy search on close button click
		*/
		function destroyClose(){

			$( clearItem ).remove();

		}

		/**
		*	 destroy earch
		*/
		function destroySearch(){

			$( postList ).children().remove();
			$( input ).val('');
			$( results ).parent().removeClass('wpms--show').addClass('wpms--hide');
			$( postList ).removeClass('wpms--full').addClass('wpms--empty')
			$( helper ).remove();
			$('.after-wrapper').empty(); //remove html tag "before" trigger
			$('.before-wrapper').empty(); //remove html tag "after" trigger
			destroyClose()
		}

		/**
		* 	Search not perform any operation on escape or arrow keys
		*	@since 0.1
		*/
		function blacklistedKeys( key ){

			return 27 == key || 37 == key || 38 == key || 39 == key || 40 == key;

		}

	});




})( jQuery, Backbone, _ );