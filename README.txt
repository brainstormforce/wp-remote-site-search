=== WP Multisite Search ===
Contributors: Brainstorm Force
Author URI: https://www.brainstormforce.com/
Plugin URI: https://www.brainstormforce.com/
Tags: search, multisite search 


A multisite search using WP REST API (v2).

== Description ==

Multisite Search is a search plugin for WordPress that returns results as the user types for what they are looking from the given REST Api url. It currently supports posts.

Add the shortcode `[multisite_search rest_api="https://example.com"]` to a page or something. There's a few shortcode attributes that you can use, and are as follows:  



title=""  
Title for the search box

rest_api="https://example.com"
URL from where you want to get the informaion

category_slug=""  
You can also pass `category_slug1,category_slug2` to search multiple posts  from multiple categories. For example category_slug="recipes,books"

placeholder=""  
The text displayed in the input. Defaults to `Search...`.

max_results=""  
Total Number of results you want to display.
(default max_results is 30)

---

Here are a couple examples:

Default Usage:  
`[multisite_search rest_api="https://example.com"]`

Multiple Categories:  
'[multisite_search rest_api="https://example.com" category_slug="recipes,books"]'


Title & Placeholder for Search Box
'[multisite_search rest_api="https://example.com" category_slug="recipes,books" title="How can we help?" placeholder="Have a question? Enter a search term." max_results="30"]'

== Installation ==

1. Navigate to 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `multisite-search.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

== Frequently Asked Questions ==

= How do I work it? =
It's a shortcode. Add [multisite_search rest_api="https://example.com"] to a page. See above for some options.

= What is required for this to work? =
The WP REST API (V2) plugin (the official one) from the WordPress REST API Team.




