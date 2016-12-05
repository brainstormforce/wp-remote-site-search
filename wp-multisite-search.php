<?php
/**
 *
 * @package   WP_Multisite_Search
 * @author    Brainstorm Force
 * @link      https://www.brainstormforce.com/
 * @copyright 2016 Brainstorm Force
 *
 * Plugin Name:       Multisite Search
 * Plugin URI:        https://www.brainstormforce.com/
 * Description:       A Multisite live search plugin that utilizes the WP REST API
 * Version:           0.1
 * Text Domain: 	  wp-multisite-search
 */

// plugin constants
define('WP_MULTISITE_SEARCH_VERSION', '0.1');
define('WP_MULTISITE_SEARCH_DIR', plugin_dir_path( __FILE__ ));
define('WP_MULTISITE_SEARCH_URL', plugins_url( '', __FILE__ ));

// plugin functionality files
require WP_MULTISITE_SEARCH_DIR.'/public/includes/result-template.php';
require WP_MULTISITE_SEARCH_DIR.'/public/includes/shortcode.class.php';
require WP_MULTISITE_SEARCH_DIR.'/public/includes/shortcode-function.php';
require WP_MULTISITE_SEARCH_DIR.'/public/includes/assets.class.php';
