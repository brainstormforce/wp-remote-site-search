<?php
/**
* Multisite Search ShortCode Class
*
*	@since 0.1
*
*/
class wpMultisiteSearchShortcode{


	public static function Instance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new wpMultisiteSearchShortcode();
        }
        return $inst;
    }

	private function __construct(){

		add_shortcode('multisite_search', array($this,'shortcode'));
	}

	public function shortcode( $atts, $content = null ) {

		$defaults = array(
			'title'			=> __( 'How can we help?', 'wp-multisite-search' ), // title for searcbox
			'placeholder'	=> __( 'Search...', 'wp-multisite-search' ), // placeholder
			'rest_api'		=> '', //restapi url
			'category_slug'	=> '', //category slug
			'max_results'	=> 30, // return a certain number of search results
			'html_code'		=>''
			);
		$atts = shortcode_atts( $defaults, $atts );
		
		$type = 'posts?'; //will change in future



		  $html_code = html_entity_decode( $atts['html_code'] );
		ob_start();
		?>


		<!-- search box wrapper -->
		<div id="wpms" class="wpms wrapper" data-number=<?php echo esc_attr($atts['max_results']); ?> >
			<div class="before-wrapper"></div>

			<!-- search input box -->
			<div id="wpms--input-wrap">

				<label><?php echo esc_attr( $atts['title'] );?></label>
				<input type="hidden" data-html-input="<?php echo  $html_code ;?>" id ="html-input">
				<input itemprop="query-input" type="text" data-object-type="<?php echo esc_attr( $type );?>" id="wpms--input" placeholder="<?php echo esc_attr( $atts['placeholder'] );?>" data-rest-api=<?php echo esc_attr($atts['rest_api']);?> data-cat="<?php echo esc_attr($atts['category_slug']);?>">
				<div id="wpms--loading" class="wpms--loading"><div class="wpms--loader"></div></div>
			</div>

			<!-- results count -->
			<div class="wpms--results-wrap">

				<span id="wpms--results"></span>

			</div>

			<!-- append searched results -->
			<ul itemprop="target" id="wpms--post-list"></ul>
			<div class="after-wrapper"></div>

		</div>

		<?php

		return ob_get_clean();
	}

}

$multisearch_shortcode = wpMultisiteSearchShortcode::Instance();


