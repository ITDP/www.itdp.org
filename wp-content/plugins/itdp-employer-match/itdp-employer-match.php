<?php

/*
Plugin Name: ITDP Employer Match
Description: Add an Employer Match / Matching Gifts form to an ITDP webpage.
Version: 1.00
Author: Joe Westcott
Author URI: http://www.joewestcott.info/

Release Notes:
1.00 release
*/

/* Start Adding Functions Below this Line */

// Add itdp-employer-match Shortcode

function itdp_employer_match_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'firstname' => '',
		), $atts )
	);

	// Code

return '<form class="matchinggifts" action="https://www.matchinggifts.com/search/itdp_iframe" method="post"><input name="INPUT_ORGNAME" size="50" type="text" value="Type employer or company name here." onfocus="this.value=\'\'"/><input class="search search_button" type="submit" value="Search" /><input name="INPUT_ORGNAME_required" type="hidden" value="You must input a company name" /><input name="eligible" type="hidden" value="ALL" /></form>';

}

add_shortcode( 'itdp-employer-match', 'itdp_employer_match_shortcode' );

/* Stop Adding Functions Below this Line */

?>