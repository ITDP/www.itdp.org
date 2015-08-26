<?php
/*
Plugin Name: ITDP Search Shortcode Plugin
Description: Add a search box anywhere with the [itdp-search] shortcode. You can optionally choose the category with the "category_name=" option. For example, [itdp-search category_name="cycling-and-walking"]
Version: 1.02
Author: Joe Westcott
Author URI: http://www.joewestcott.info/
Release Notes:
1.02 custom action option
1.01 corrected description, variable is category_name
1.0 release
*/
/* Start Adding Functions Below this Line */

// Add ITDP Search Shortcode
function itdp_search_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'category_name' => '',
			'action' => '/', 
			/* previously action="https://www.itdp.org/" */
		), $atts )
	);

	// Code

return '<form action="' . $action . '" class="search-form" method="get" role="search"><input name="s" placeholder="Search ITDP ..." type="search"><input class="search-field" type="hidden" name="category_name" value="' . $category_name . '"><input class="search-submit" type="submit" value="Search"></form>';

}

add_shortcode( 'itdp-search', 'itdp_search_shortcode' );

/* Stop Adding Functions Below this Line */
?>