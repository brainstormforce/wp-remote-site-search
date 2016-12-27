=== WP Remote Site Search ===
Contributors: brainstormforce, rushijagani
Donate link: https://www.brainstormforce.com/payment/
Requires at least: 4.4
Tags: remote site search, live search, multisite search
Stable tag: 1.0.0
Tested up to: 4.7
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


This plugin will display search results from any domain using REST API.

== Description ==

WP Remote Site Search is a search plugin for WordPress that returns results as the user types for what they are looking using REST API.

Here’s a list of shortcodes currently available in the wp-remote-site-search plugin.

1.`[wp_remote_site_search remote_url="https://example.com"]`

	URL from where you want to fetch the informaion
	The remote site should have WordPress 4.7 or higher or Rest API (v2) plugin installed to get the search results.

2.`[wp_remote_site_search title="How can we help?"]`

	Title for the search box

3.`[wp_remote_site_search category_id="1,2"]`

	You can also pass "category_id1,category_id2" to search multiple posts from multiple categories.

4.`[wp_remote_site_search category_id="1,2" sub_categories="true"]`

	You can also get all reslts from categories (category_id1, category_id2) and their respective subcategories by setting sub_categories="true".

5.`[wp_remote_site_search placeholder="Enter a search term."]`

	The text displayed in the search box placeholder. Default is "Search...".

6.`[wp_remote_site_search type = "books"]`

	Default type is posts,
	You can add custom post type also.

7.`[wp_remote_site_search max_results="50"]`

	Total Number of results you want to display.
	(default max_results is 30)

8.`[wp_remote_site_search html_input = "<button> Get In Touch!</button>"]`

	Append html after all results get displyed.
--
Example:

`[wp_remote_site_search remote_url="https://example.com" category_id="1,2" sub_categories="true" type="books" title="How can we help?" placeholder="Have a question? Enter a search term." max_results="30" html_input="<button>Get In Touch!</button>"]`

== Installation ==
1. Navigate to 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `wp-remote-site-search.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard


== Changelog==

1.0.0
Initial release


== Frequently Asked Questions ==
1. How it works? =
It's a shortcode. Add [wp_remote_site_search remote_url="https://example.com"] to a page/post. See above for some options.

2. What is required for this to work? =
The remote site should have WordPress 4.7 or higher or Rest API (v2) plugin installed to get the search results.


== Credits ==

WP Live Search
Licenses: GNU GPL, Version 2 (or later)
Credits https://wordpress.org/plugins/wp-search-live/