<?php
/**
 *
 * @package   WP_Remote_site_search
 * @author    Brainstorm Force
 * @link      https://www.brainstormforce.com/
 * @copyright 2016 Brainstorm Force
 *
 * Plugin Name:       WP Remote Site Search
 * Author: 			  Brainstorm Force
 * Plugin URI:        https://www.brainstormforce.com/
 * Description:       A Multisite live search plugin that utilizes the WP REST API
 * Version:           0.1
 * Text Domain: 	  wp-remote-site-search
 */

// plugin constants
define('WP_REMOTE_SITE_SEARCH_VERSION', '0.1');
define('WP_REMOTE_SITE_SEARCH_DIR', plugin_dir_path( __FILE__ ));
define('WP_REMOTE_SITE_SEARCH_URL', plugins_url( '', __FILE__ ));
// plugin functionality files
require WP_REMOTE_SITE_SEARCH_DIR.'/public/includes/result-template.php';
require WP_REMOTE_SITE_SEARCH_DIR.'/public/includes/shortcode.class.php';
require WP_REMOTE_SITE_SEARCH_DIR.'/public/includes/assets.class.php';