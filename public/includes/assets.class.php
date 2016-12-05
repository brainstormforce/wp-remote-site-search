<?php

/**
* Multisite Search Assets
*
*	@since 0.1
*/
class wpMultisiteSearchAssets
{

	/**
     * Instance of thic class
     *
     */
  
    public static function Instance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new wpMultisiteSearchAssets();
        }
        return $inst;
    }

    /**
     * Constructor enqueue styles & scripts 
     *
     */
    private function __construct()
    {
    	add_action('wp_enqueue_scripts', 	array($this,'multisite_search_scripts'));
		add_action('wp_enqueue_scripts',	array($this,'multisite_search_styles'), 99);

    }

    /**
	*	Enqueue scripts
	*
	*	@since 0.1
	*/
	public function multisite_search_scripts(){

		// wp multisite_search script
		wp_enqueue_script('wpms-script', WP_MULTISITE_SEARCH_URL.'/public/assets/js/multisite-search.js', array('jquery', 'underscore', 'backbone'), WP_MULTISITE_SEARCH_VERSION, true);
		wp_localize_script('wpms-script','wpms_search_msg', array('helperText' => __('Search must be at least 3 characters.','wp-multisite-search')));

		wp_enqueue_script('wpms-trigger-script', WP_MULTISITE_SEARCH_URL.'/public/assets/js/ms-trigger.js', array('jquery'), WP_MULTISITE_SEARCH_VERSION, true);
		
	}

	/**
	*	Enqueue the style sheet (low priority) to avoid theme conflicts with basic layout styles
	*
	*	@since 0.1
	*/
	public function multisite_search_styles() {

		if ( !defined( 'WPMS_DISABLE_STYLE' ) ) {

			// wp multisite_search style
			wp_enqueue_style('wpms-style', WP_MULTISITE_SEARCH_URL.'/public/assets/css/style.css', WP_MULTISITE_SEARCH_VERSION );

		}
	}
}

$multisearch_assets = wpMultisiteSearchAssets::Instance();