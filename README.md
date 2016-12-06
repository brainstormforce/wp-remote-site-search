# wp-remote-site-search
This plugin will display search results from any domain using REST API Version 2.


# Description 
Remote Site Search Search is a search plugin for WordPress that returns results as the user types for what they are looking from the given REST Api url.


Here’s a list of shortcodes currently available in the wp-remote-site-search plugin.

1.`[wp_remote_site_search rest_api="https://example.com"]`

	URL from where you want to fetch the informaion
	(The WP REST API (V2) plugin from the WordPress REST API Team must be installed on the source website. )

2.`[wp_remote_site_search title="How can we help?"]`

	Title for the search box

3.`[wp_remote_site_search category_slug="books,recipes"]`

	You can also pass "category_slug1,category_slug2" to search multiple posts from multiple categories.

4.`[wp_remote_site_search placeholder="Enter a search term."]`

	The text displayed in the search box placeholder. Default is "Search...".

5.`[wp_remote_site_search type = "books"]`

	Default type is posts,
	You can add custom post type also.

6.`[wp_remote_site_search max_results="50"]`

	Total Number of results you want to display.
	(default max_results is 30)

7.`[wp_remote_site_search html_input = "<button> Get In Touch!</button>"]`

	Append html after all results get displyed.
--
Example:

`[wp_remote_site_search rest_api="https://example.com" category_slug="recipes,books" type="books" title="How can we help?" placeholder="Have a question? Enter a search term." max_results="30" html_input="<button>Get In Touch!</button>"]`

# Installation

1. Navigate to 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `wp-remote-site-search.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

# Frequently Asked Questions

1. How it works? =
It's a shortcode. Add [wp_remote_site_search rest_api="https://example.com"] to a page/post. See above for some options.

2. What is required for this to work? =
The WP REST API (V2) plugin (the official one) from the WordPress REST API Team.

