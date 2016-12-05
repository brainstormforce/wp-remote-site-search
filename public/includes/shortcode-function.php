<?php

/**
*	shortcode function for do_shortcode('[multisite_search]')
*
*	@since 0.1
*/

function multisite_search( ){

	echo do_shortcode('[multisite-search text="'.sanitize_text_field( trim( $title ) ).'" placeholder="'.sanitize_text_field( trim( $placeholder ) ).'" rest_api="'.sanitize_text_field( trim( $results ) ).'" category_slug="'.sanitize_text_field( trim( $category ) ).'" max_results="'.sanitize_text_field( trim( $max_results ) ).'" html_code="'.sanitize_text_field($html_code).'"]');

}