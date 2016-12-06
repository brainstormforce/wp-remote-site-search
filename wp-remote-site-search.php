<?php
/**
 *
 * @package   WP_Remote_site_search
 * @author    Brainstorm Force
 * @link      https://www.brainstormforce.com/
 * @copyright 2016 Brainstorm Force
 *
 * Plugin Name:       WP Remote Site Search
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


/* Register activation hook. */
register_activation_hook( __FILE__, 'rs_admin_notice_activation_hook' );

/**
 * Runs only when the plugin is activated.
 * @since 0.1
 */
function rs_admin_notice_activation_hook() {
 
    /* Create transient data */
    set_transient( 'rs-admin-notice', true, 5 );
}
 
 
/* Add admin notice */
add_action( 'admin_notices', 'rs_admin_notice' );
 
 
/**
 * Admin Notice on Activation.
 * @since 0.1
 */
function rs_admin_notice(){
 
    /* Check transient, if available display notice */
    if( get_transient( 'rs-admin-notice' ) ){
        ?>
        <div class="updated notice is-dismissible">
            <p><?php _e('Thank you for using ','wp-remote-site-search'); ?><strong><?php _e('Wp Remote Site Search','wp-remote-site-search') ?></strong>.</p>
            <p><?php _e('In order to use this plugin, Please install The','wp-remote-site-search')?><a href="https://wordpress.org/plugins/rest-api/" target="_blank"><?php _e(' WP REST API (V2)','wp-remote-site-search')?> </a><?php _e('on the remote site.','wp-remote-site-search') ?></p>
        </div>
        <?php
        /* Delete transient, only display this notice once. */
        delete_transient( 'rs-admin-notice' );
    }
}