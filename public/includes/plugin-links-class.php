<?php

class WRSS_Links {

	/**
	 * Setup class
	 */
	public function setup() {
		add_filter( 'plugin_action_links_wp-remote-site-search/wp-remote-site-search.php', array( $this, 'insert_links' ) );
	}

	/**
	 * Add to links
	 *
	 * @param array $links
	 *
	 * @return array
	 */
	public function insert_links( $links ) {
		array_unshift( $links, '<a href="https://docs.brainstormforce.com/wp-remote-site-search/" target="_blank" style="color:#000;font-weight:bold;">' . __( 'Plugin Documentation', 'wp-remote-site-search' ) . '</a>' );
		return $links;
	}

}
