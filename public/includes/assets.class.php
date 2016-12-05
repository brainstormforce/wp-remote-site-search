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

    }

   /**
	*	Enqueue scripts
	*
	*	@since 0.1
	*/
	public function remote_site_search_scripts(){

		// wp remote_site_search script
		wp_enqueue_script('rs-script', WP_REMOTE_SITE_SEARCH_URL.'/public/assets/js/multisite-search.js', array('jquery', 'underscore', 'backbone'), WP_REMOTE_SITE_SEARCH_VERSION, true);
		wp_localize_script('rs-script','rs_search_msg', array('least_char' => __('Search must be at least 3 characters.','wp-remote-site-search')));

		wp_enqueue_script('rs-trigger-script', WP_REMOTE_SITE_SEARCH_URL.'/public/assets/js/ms-trigger.js', array('jquery'), WP_REMOTE_SITE_SEARCH_VERSION, true);
		
	}

   /**
	*	Enqueue the style sheet (low priority) to avoid theme conflicts with basic layout styles
	*
	*	@since 0.1
	*/
	public function remote_site_search_styles() {

			// wp remote_site_search style
			wp_enqueue_style('rs-style', WP_REMOTE_SITE_SEARCH_URL.'/public/assets/css/style.css', WP_REMOTE_SITE_SEARCH_VERSION );

	}
}
$remote_site_search_assets = wpRemoteSiteSearchAssets::instance();