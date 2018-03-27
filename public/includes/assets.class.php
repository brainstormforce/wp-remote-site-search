<?php

  /**
	* Remote Site Search Assets
	*
	*	@since 0.1
	*/

class wpRemoteSiteSearchAssets
{
    /**
     * Instance of wpRemoteSiteSearchAssets class
     *
     */ 
    public static function instance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new wpRemoteSiteSearchAssets();
        }
        return $instance;
    }

    /**
     * Constructor enqueue styles & scripts 
     *
     */
    private function __construct()
    {
    	add_action('wp_enqueue_scripts', 	array($this,'remote_site_search_scripts'));
		add_action('wp_enqueue_scripts',	array($this,'remote_site_search_styles'), 99);

		add_action( 'plugins_loaded',       array( $this, 'load_textdomain' ) );

		// include plugin links class
		require_once( WP_REMOTE_SITE_SEARCH_DIR. '/public/includes/plugin-links-class.php' );

		// setup plugin links
		$plugin_links = new WRSS_Links();
		$plugin_links->setup();

    }

   /**
	*	Enqueue scripts
	*
	*	@since 0.1
	*/
	public function remote_site_search_scripts(){

		// wp remote_site_search script
		wp_register_script('rs-script', WP_REMOTE_SITE_SEARCH_URL.'/public/assets/js/multisite-search.js', array('jquery', 'underscore', 'backbone'), WP_REMOTE_SITE_SEARCH_VERSION, true);

		// Localize the script with new data
			$messages_array = array(
				'least_char' => __('Search must be at least 3 characters.','wp-remote-site-search'),
				'no_result' => __('No results found. Try again with different words?','wp-remote-site-search'),
				'we_found' => __('We found','wp-remote-site-search'),
				'found_msg' => __('articles that may help:','wp-remote-site-search'),
				'end_point_error' => __('The remote site should have WordPress 4.7 or higher or Rest API (v2) plugin installed to get the search results.', 'wp-remote-site-search')
			);
			wp_localize_script( 'rs-script', 'rs_search_msg', $messages_array );

		wp_register_script('rs-trigger-script', WP_REMOTE_SITE_SEARCH_URL.'/public/assets/js/ms-trigger.js', array('jquery'), WP_REMOTE_SITE_SEARCH_VERSION, true);
		
	}

   /**
	*	Enqueue the style sheet (low priority) to avoid theme conflicts with basic layout styles
	*
	*	@since 0.1
	*/
	public function remote_site_search_styles() {

			// wp remote_site_search style
			wp_register_style('rs-style', WP_REMOTE_SITE_SEARCH_URL.'/public/assets/css/style.css', WP_REMOTE_SITE_SEARCH_VERSION );

	}

	/**
	 * Loads textdomain for the plugin.
	 *
	 * @since 1.0.1
	 */
	function load_textdomain() {
		load_plugin_textdomain( 'wp-remote-site-search' );
	}
}
$remote_site_search_assets = wpRemoteSiteSearchAssets::instance();