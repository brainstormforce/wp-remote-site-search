=== WP Remote Site Search ===
Contributors: brainstormforce
Donate link: https://www.paypal.me/BrainstormForce
Requires at least: 4.4
Tags: remote site search, live search, multisite search
Stable tag: 1.0.5
Tested up to: 5.7
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html


Search any WordPress site's data using WP REST API.

== Description ==

WP Remote Site Search is a search plugin for WordPress that returns any WordPress site's data using WP REST API.

Basic Usage

Activate the WP Remote Site Search plugin
Add the shortcode [wp_remote_site_search] to a page or something

Options

Here’s a list of shortcodes currently available in the WP Remote Site Search plugin.

1.`remote_url="https://example.com"`

	URL from where you want to fetch the informaion
	The remote site should have WordPress 4.7 or higher or Rest API (v2) plugin installed to get the search results.

2.`title="How can we help?"`

	Title for the search box

3.`category_id="1,2"`

	You can also pass "category_id1,category_id2" to search multiple posts from multiple categories.

4.`sub_categories="true"`

	You can also get all reslts from categories (category_id1, category_id2) and their respective subcategories by setting sub_categories="true".

5.`placeholder="Enter a search term."`

	The text displayed in the search box placeholder. Default is "Search...".

6.`type = "books"`

	Default type is posts,
	You can add custom post type also.

7.`max_results="50"`

	Total Number of results you want to display.
	(default max_results is 30)

8.`html_input = "<button> Get In Touch!</button>"`

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

= 1.0.5 =
- Improvement - Compatibility to WordPress 5.7.

= 1.0.4 =
- Improvement - Compatibility to WordPress 5.6.

= 1.0.3 =
- Improvements: Enqueue scripts only where shortcode is used.

= 1.0.2 =
- Search result design improvements.

= 1.0.0 =
- Initial release

== Frequently Asked Questions ==
1. How it works? =
It's a shortcode. Add [wp_remote_site_search remote_url="https://example.com"] to a page/post. See above for some options.

2. What is required for this to work? =
The remote site should have WordPress 4.7 or higher or Rest API (v2) plugin installed to get the search results.


== Credits ==

WP Live Search
Licenses: GNU GPL, Version 2 (or later)
Credits https://wordpress.org/plugins/wp-search-live/
