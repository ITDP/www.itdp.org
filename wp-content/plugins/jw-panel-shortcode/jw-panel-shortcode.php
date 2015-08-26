<?php
/*
Plugin Name: Joe Westcott's Terribly Awesome Panel Plugin
Description: Add a panel anywhere with the [panel]content[/panel] shortcode. You can optionally choose colors with these variables: backgroundcolor and color. For example, [panel color="#f00"]This text will be red.[/panel] You can also set width (e.g. 500px or 50%) and whether the panel floats to the right or left (e.g. float="right").
Version: 2.12
Author: Joe Westcott
Author URI: http://www.joewestcott.info/
Release Notes
2.12 default bordercolor transparent
2.11 border-radius 10px
2.10 added bordercolor
2.01 fixed typo in panel description, added quotation marks in description
2.00 clear and minimal new defaults; replaced problematic background variable with backgroundcolor, removed unused and problematic border variable, and removed redundant paddingtop variable
1.9 padding
1.8 paddingtop
1.7 fixed class bug
1.6 enable nested shortcodes
1.5 customize margins
1.4 float and margin
1.3 width
1.2 class=panel
1.1 inline-block
1.0 release
*/
/* Start Adding Functions Below this Line */

// Add Panel Shortcode
function panel_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'backgroundcolor' => 'transparent',
			'bordercolor' => 'transparent',
			'color' => 'inherit',
			'class' => 'panel',
			'float' => 'none',
			'margin' => '0px',
			'padding' => '0px',
			'width' => 'auto',
		), $atts )
	);

	// Code
return '<aside style="background-color:' . $backgroundcolor . ';
		border: 1px solid ' . $bordercolor . ';
		border-radius: 10px;
		color:' . $color . ';
		float:' . $float . ';
		margin:' . $margin . ';
		padding:' . $padding . ';
		width:' . $width . ';" class="' . $class . '">' . do_shortcode($content) . '</aside>';

}
add_shortcode( 'panel', 'panel_shortcode' );

/* Stop Adding Functions Below this Line */
?>