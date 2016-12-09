<?php
/**
* Remote Site Search ShortCode Class
*
*	@since 0.1
*
*/
class wpRemoteSiteSearchShortcode{

  /**
	* Instance of wpRemoteSiteSearchShortcode
	*
	*	@since 0.1
	*
	*/
	public static function instance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new wpRemoteSiteSearchShortcode();
        }
        return $instance;
    }

	private function __construct(){

		add_shortcode('wp_remote_site_search', array($this,'shortcode'));
	}

   /**
	* Shortcoe function
	*	
	*   @param  {[array]} $atts   [values given in shortcode]
	*	@since   0.1
	*
	*/
	public function shortcode( $atts ) {

		$defaults = array(
			'title'				=> __( 'How can we help?', 'wp-remote-site-search' ), // title for searcbox
			'placeholder'		=> __( 'Search...', 'wp-remote-site-search' ), // placeholder
			'rest_api'			=> '', //rest-api url
			'category_id'		=> '', //category id
			'max_results'		=> 30, // return a certain number of search results
			'html_input'		=>'', //html input to add after results
			'type'				=> ''
			);
		$atts = shortcode_atts( $defaults, $atts );
		if ($atts['type'] == '') {
			$type = sprintf('posts?'); //default posts
		}
		else{
			$type = sprintf('%s?', trim( $atts['type'] ));//custom post type
		}
		if ($atts['category_id'] == '') {
			$category_id = null;
		}
		else{
			$category_id = sprintf('&categories=%s', trim( $atts['category_id'] ));//custom post type
		}
		$html_input = html_entity_decode( $atts['html_input'] );//append html after all results

		ob_start();
		?>
		<!-- search box wrapper -->
		<div id="search-wrapper" class="search-wrapper wrapper" data-number=<?php echo esc_attr($atts['max_results']); ?> >

			<!-- search input box -->
			<div id="input-wrapper">
				<label><?php echo esc_attr( $atts['title'] );?></label>
				<input itemprop="query-input" type="text" data-object-type="<?php echo esc_attr( $type );?>" id="search-input" placeholder="<?php echo esc_attr( $atts['placeholder'] );?>" data-rest-api=<?php echo esc_attr($atts['rest_api']);?> data-cat="<?php echo esc_attr($category_id);?>">
				<div id="search-loading" class="search-loading"><div class="search-loader"></div></div>
			</div>
			<!-- results count -->
			<div class="error-results-wrap"></div>
			<div class="search-results-wrap">
				<span id="search-results"></span>
			</div>
			<!-- append searched results -->
			<ul itemprop="target" id="result-list"></ul>
			<!-- append html input results -->
			<div class="after-wrapper">
				<?php echo html_entity_decode( $html_input );?>
			</div>
			
		</div>

		<?php
		return ob_get_clean();
	}
}
$remote_site_search_shortcode = wpRemoteSiteSearchShortcode::instance();