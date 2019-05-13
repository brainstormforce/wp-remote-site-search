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

		wp_enqueue_script( 'rs-script');
		wp_enqueue_script( 'rs-trigger-script');
		wp_enqueue_style( 'rs-style');

		$defaults = array(
			'title'				=> __( 'How can we help?', 'wp-remote-site-search' ), // title for searcbox
			'placeholder'		=> __( 'Search...', 'wp-remote-site-search' ), // placeholder
			'remote_url'		=> site_url(), //remote url
			'category_id'		=> '', //category id
			'max_results'		=> 30, // return a certain number of search results
			'html_input'		=> '', //html input to add after results
			'type'				=> '', //post type
			'sub_categories'	=> ''  //results from sub categories
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
			$category_id = sprintf('%s', trim( $atts['category_id'] ));//custom post type
		}
		$html_input = html_entity_decode( $atts['html_input'] );//append html after all results
		$title = $atts['title'];
		$placeholder = $atts['placeholder'];
		$remote_url = $atts['remote_url'];
		$max_results = $atts['max_results'];
		$sub_categories = $atts['sub_categories'];


		/**
		 * Filter #html_input
		 * @var String
		 */
		$html_input = apply_filters( 'wp_remote_site_search_html_input', $html_input );

		/**
		 * Filter $category_id
		 * @var String, Comma separated list of category ids
		 */
		$category_id = apply_filters( 'wp_remote_site_search_category_id', $category_id );

		/**
		 * Filter $type
		 * @var type of post
		 */
		$type = apply_filters( 'wp_remote_site_search_type', $type );

		/**
		 * Filter $title
		 * @var String
		 */
		$title = apply_filters( 'wp_remote_site_search_title', $title );

		/**
		 * Filter $placeholder
		 * @var String
		 */
		$placeholder = apply_filters( 'wp_remote_site_search_placeholder', $placeholder );

		/**
		 * Filter $remote_url
		 * @var String 
		 */
		$remote_url = apply_filters( 'wp_remote_site_search_remote_url', $remote_url );


		/**
		 * Filter $max_results
		 * @var String Number
		 */
		$max_results = apply_filters( 'wp_remote_site_search_max_results', $max_results );

		/**
		 * Filter $sub_categories
		 * @var String true 
		 */
		$sub_categories = apply_filters( 'wp_remote_site_search_sub_categories', $sub_categories );		

		ob_start();
		?>
		<!-- search box wrapper -->
		<div id="search-wrapper" class="search-wrapper wrapper" data-number=<?php echo esc_attr($atts['max_results']); ?> >

			<!-- search input box -->
			<div id="input-wrapper">
				<label><?php echo esc_attr( $atts['title'] );?></label>
				<input itemprop="query-input" type="text" data-object-type="<?php echo esc_attr( $type );?>" id="search-input" placeholder="<?php echo esc_attr( $atts['placeholder'] );?>" data-remote-url="<?php echo esc_attr($atts['remote_url']);?>" data-cat="<?php echo esc_attr($category_id);?>" data-sub-cat="<?php echo esc_attr($atts['sub_categories']);?>">
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