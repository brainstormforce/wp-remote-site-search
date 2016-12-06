(function( $, Backbone ) {

	jQuery('document').ready( function( $ ){

		var finalTemplate = $('#rs-tmpl'),
			outputTemplate   = _.template( finalTemplate.html() ),
			wrapper          = '#search-wrapper',
			resultList		 = '#result-list',
			results          = '#search-results',
			searchLoader     = '#search-loading',
			searchInput  	 = '#search-input',
			notice           = '#rs-helper',
			noticeText       = rs_search_msg.least_char,
			noResult 		 = rs_search_msg.no_result,
			weFound 		 = rs_search_msg.we_found,
			foundMsg 		 = rs_search_msg.found_msg,
			noticeSpan       = '<span id="rs-helper">'+noticeText+'</span>',
			close     		 = '<i id="rs-clear-search" class="dashicons dashicons-dismiss"></i>',
			clearList        = '#rs-clear-search',
			time

		$( resultList ).addClass('rs-empty');

		$( searchInput ).on('keyup keypress', function ( e ) {

			// previous time -clear
			clearTimeout(time)

			var key         = e.which,
				that        = this,
				val 		= $.trim( $(this).val() ),
				valIs       = val == $(that).val(),
				notEmpty    = '' !== val,
				type        = $(this).data('object-type'),
				max       = $( wrapper ).data('number'),
				rest_api 	= $(this).data('rest-api'),
				cat 		= $(this).data('cat'),
				url 		= rest_api+'/wp-json/wp/v2/'+type+'search='+val+'&filter[category_name]='+cat+'&per_page='+max

			// 600ms delay so we dont exectute excessively
			time = setTimeout(function() {

				// don't proceed if the value is <> or != to itself
				if ( !valIs && !notEmpty )
					return false;

				// when type only two characters?
				if ( val.length == 2 && !$(notice).length ) {

					$( searchInput ).after( noticeSpan );

				}

				// when type >= 3 characters
				if ( val.length >= 3 || val.length >= 3 && 13 == key ) {
					
					// escape or arrow keys blocked
					if( blockKeys( key ) )
						return false;

					// loading effect
					$( searchLoader ).removeClass('rs-hide').addClass('rs-show');

					// helpers removed
					$( notice ).fadeOut().remove();

					// remove close
					removeClose()

					// request
					var jqxhr = $.getJSON( url, function( response ) {
						// remove current lists
						$(resultList).children().remove();
						$(resultList).removeClass('rs-full').addClass('rs-empty')

						// results 
						$(results).parent().removeClass('rs-hide').addClass('rs-show');

						// loading effect hide
						$(searchLoader).removeClass('rs-show').addClass('rs-hide');

						// count results & show
						if ( response.length == 0 ) {

							// no result found
							$(results).text(noResult).closest( wrapper ).addClass('rs-no-results');

							// remove close
							removeClose();

						} else {

							// escape or arrow keys blocked
							if( blockKeys( key ) )
								return false;

							// append close
							if ( !$( clearList ).length ) {

								$(searchInput).after( close );
							}

							// max no. of results found
							$(results).text( weFound+" "+ response.length +" "+foundMsg).closest( wrapper ).removeClass('rs-no-results');
							// each object in loop
			                $.each( response, function ( i ) {

			                    $(resultList).append( outputTemplate( { post: response[i]} ) )
			                    .removeClass('rs-empty')
			                    .addClass('rs-full');

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
		$( wrapper ).on('click', clearList, function(e){
			e.preventDefault();
			destroySearch();
		});

	   /**
		*  destroy search on close button click
		*/
		function removeClose(){
			$( clearList ).remove();
		}

	   /**
		*	 destroy search
		*/
		function destroySearch(){
			$( resultList ).children().remove();
			$( searchInput ).val('');
			$( results ).parent().removeClass('rs-show').addClass('rs-hide');
			$( resultList ).removeClass('rs-full').addClass('rs-empty')
			$( notice ).remove();
			$('.after-wrapper').fadeOut(); //remove html tag "before" trigger
			removeClose()
		}

	   /**
		* 	Search not perform any operation on escape or arrow keys
		*	@since 0.1
		*/
		function blockKeys( key ){
			return 27 == key || 37 == key || 38 == key || 39 == key || 40 == key;
		}

	});

})( jQuery, Backbone);