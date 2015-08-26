<?php

/*
Plugin Name: ITDP Buttons: Call to Action and Back
Description: Add a Call to Action button or a Back button to any page or post.
Version: 1.004
Author: Joe Westcott
Author URI: http://www.joewestcott.info/
Release Notes:
1.004 add text-align class 
1.003 removed unused buttoncolor and textcolor attributes
1.002 add button class, inherit unspecified styles by default
1.001 add backButton
1.000 release
0.001 testing
*/

/* Start Adding Functions Below this Line */

// Add itdp-cta-button Shortcode

function itdp_cta_button_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'text' => 'Learn More',		// e.g. Learn More
			'textalign' => 'inherit',	// e.g. center
			'url' => '#',			// e.g. https://www.itdp.org/
		), $atts )
	);

	// Code

return '<style>
	<!--
	/* begin button text-align-x styles */
	.text-align-left { text-align: left; }
	.text-align-center { text-align: center; }
	. text-align-right { text-align: right; }
	-->
	</style>
	<div class="button text-align-'. $textalign . '"><a href="' . $url . '">' . $text . '</a></div>';

}

add_shortcode( 'itdp-cta-button', 'itdp_cta_button_shortcode' );


function itdp_back_button_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'text' => '',			// e.g. Let's try again.
		), $atts )
	);

	// Code

return '<input action="action" class="backButton" type="button" value="' . $text . '" onclick="window.history.go(-1); return false;" />';

}

add_shortcode( 'itdp-back-button', 'itdp_back_button_shortcode' );

/* Stop Adding Functions Below this Line */

?>