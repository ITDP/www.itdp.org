<?php

/*
Plugin Name: ITDP Homepage Email Sign Up
Description: Add a Mailchimp mailing list sign up form to the ITDP homepage.
Version: 1.03
Author: Joe Westcott
Author URI: http://www.joewestcott.info/

Release Notes:
1.04 plugin name update, SSL fix
1.03 morenewslink
1.02 attributes for translation
1.01 fixed more news link to production site
1.0 release
*/

/* Start Adding Functions Below this Line */

// Add itdp-home-signup Shortcode

function itdp_home_signup_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'firstname' => 'First Name',
			'lastname' => 'Last Name',
			'emailaddress' => 'Email Address',
			'signup' => 'Sign Up',
			'morenews' => 'More News',
			'morenewslink' => '/news/transport-matters-blog/',
		), $atts )
	);

	// Code

return '<div class="home-signup"><form action="//itdp.us7.list-manage.com/subscribe/post?u=0b5e10eda9e3afdb7eceb76f6&amp;id=fca8d7a24c" method="post" target="_blank" class="homepage-subscribe"><input type="text" value="" name="MERGE1" class="required first-name" placeholder="' . $firstname . '"><input type="text" value="" name="MERGE2" class="required last-name" placeholder="' . $lastname . '"><input type="email" value="" name="EMAIL" class="required email" placeholder="' . $emailaddress . '"><button for="email-signup" class="sign-up-button">' . $signup . '</button></form><a href="' . $morenewslink . '" class="more-news">' . $morenews . '</a></div>';

}

add_shortcode( 'itdp-home-signup', 'itdp_home_signup_shortcode' );

/* Stop Adding Functions Below this Line */

?>