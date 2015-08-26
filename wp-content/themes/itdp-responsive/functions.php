<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'ITDP Responsive' );
define( 'CHILD_THEME_URL', 'http://joewestcott.info/' );
define( 'CHILD_THEME_VERSION', '2.1.0' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:regular,regularitalic,800|Lato:300,400,700', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Commented out because ITDP doesn't use these default Genesis footer widgets
//* Add support for 3-column footer widgets
/* add_theme_support( 'genesis-footer-widgets', 3 ); */

//* Remove Genesis primary and secondary sidebars
//* from http://my.studiopress.com/snippets/sidebars/
//* Unregister primary sidebar
unregister_sidebar( 'sidebar' );
//* Unregister secondary sidebar
unregister_sidebar( 'sidebar-alt' );


//* Register Featured News / More News widget area
genesis_register_sidebar( array(
	'id'            => 'featured-news-area',
	'name'          => __( 'Featured News / More News', 'themename' ),
	'description'   => __( 'Within this widget, control the "More News" button. If you want to manage the "Featured News" list, edit your news posts and assign the following post categories: featured-news-1, featured-news-2, etc.', 'themename' ),
) );

//* Hook Featured News widget
add_action( 'genesis_after_header', 'itdp_featnews_widget' );
	function itdp_featnews_widget() {
	if ( is_front_page() )
		genesis_widget_area( 'featured-news-area', array(
			'before' => do_shortcode(
				'<div class="featured-news widget-area">
					<div class="grid-container">
						<div class="featnews1 featnews grid-50">[catlist name=featured-news-1 thumbnail=yes thumbnail_size=full title_class="grid-100 featnews-title" instance=1]</div>
						<div class="grid-50 grid-parent hide-on-mobile">
							<div class="featnews2 featnews featnewssecondary grid-50 mobile-grid-100"><div class="news-title-indicator"></div>[catlist name=featured-news-2 thumbnail=yes thumbnail_size=full title_class="grid-100 featnews-title" instance=2]</div>
							<div class="featnews3 featnews featnewssecondary grid-50 mobile-grid-100"><div class="news-title-indicator"></div>[catlist name=featured-news-3 thumbnail=yes thumbnail_size=full title_class="grid-100 featnews-title" instance=3]</div>
						</div>
						<div class="grid-50 grid-parent hide-on-mobile">
							<div class="featnews4 featnews featnewssecondary grid-50 mobile-grid-100"><div class="news-title-indicator"></div>[catlist name=featured-news-4 thumbnail=yes thumbnail_size=full title_class="grid-100 featnews-title" instance=4]</div>
							<div class="featnews5 featnews featnewssecondary grid-50 mobile-grid-100"><div class="news-title-indicator"></div>[catlist name=featured-news-5 thumbnail=yes thumbnail_size=full title_class="grid-100 featnews-title" instance=5]</div>
						</div>
						<div class="grid-100 hide-on-desktop">'
			),
			'after' => do_shortcode( '</div></div></div>' ),
	) );
}


//* Register Subscribe widget area
genesis_register_sidebar( array(
	'id'            => 'subscribe-area',
	'name'          => __( 'Subscribe', 'themename' ),
	'description'   => __( 'Encourage visitors to subscribe to the ITDP mailing list', 'themename' ),
) );

//* Hook Subscribe widget
add_action( 'genesis_before_footer', 'itdp_subscribe_widget' );
	function itdp_subscribe_widget() {
	if ( is_singular() )
		genesis_widget_area( 'subscribe-area', array(
			'before' => '<div class="subscribe widget-area"><div class="grid-container"><div class="grid-100">',
			'after' => '</div></div></div>',
	) );
}


//* Register Featured Publications Title widget area
genesis_register_sidebar( array(
	'id'            => 'featured-publications-title-area',
	'name'          => __( 'Featured Publications Title', 'themename' ),
	'description'   => __( 'Translate the phrase "Featured Publications" to your desired language.', 'themename' ),
) );

//* Hook Featured Publications Title widget
add_action( 'genesis_before_footer', 'itdp_featpubs_title_widget' );
	function itdp_featpubs_title_widget() {
	if ( is_front_page() )
		genesis_widget_area( 'featured-publications-title-area', array(
			'before' => '<div class="featured-publications-title widget-area"><div class="grid-container"><div class="grid-100">',
			'after' => '</div></div></div>',
	) );
}


//* Register Featured Publications widget area
genesis_register_sidebar( array(
	'id'            => 'featured-publications-area',
	'name'          => __( 'Featured Publications / More Publications', 'themename' ),
	'description'   => __( 'Within this widget, control the "More Publications" button. If you want to manage the "Featured Publications" list, edit your publication posts and assign the following post categories: featured-pub-1, featured-pub-2, etc.', 'themename' ),
) );

//* Hook Featured Publications Title widget
add_action( 'genesis_before_footer', 'itdp_featpubs_widget' );
	function itdp_featpubs_widget() {
	if ( is_front_page() )
		genesis_widget_area( 'featured-publications-area', array(
			'before' => 
			do_shortcode( '<div class="featured-publications widget-area">
				<div class="grid-container">
					<div class="grid-25 mobile-grid-50">[catlist name=featured-pub-1 template=home-featured-pub thumbnail_class=aligncenter thumbnail=yes thumbnail_size=full title_class=post-title title_tag=h3 instance=6]</div>
					<div class="grid-25 mobile-grid-50">[catlist name=featured-pub-2 template=home-featured-pub thumbnail_class=aligncenter thumbnail=yes thumbnail_size=full title_class=post-title title_tag=h3 instance=7]</div>
					<div class="grid-25 mobile-grid-50">[catlist name=featured-pub-3 template=home-featured-pub thumbnail_class=aligncenter thumbnail=yes thumbnail_size=full title_class=post-title title_tag=h3 instance=8]</div>
					<div class="grid-25 mobile-grid-50">[catlist name=featured-pub-4 template=home-featured-pub thumbnail_class=aligncenter thumbnail=yes thumbnail_size=full title_class=post-title title_tag=h3 instance=9]</div>
					<div class="grid-100">' ),
			'after' => '</div></div></div>',
	) );
}


//* Register Where We Work widget area
genesis_register_sidebar( array(
	'id'            => 'where-we-work-area',
	'name'          => __( 'Where We Work', 'themename' ),
	'description'   => __( 'Where We Work: A Map', 'themename' ),
) );

//* Hook Where We Work widget
add_action( 'genesis_before_footer', 'itdp_wherewework_widget' );
	function itdp_wherewework_widget() {
	if ( is_front_page() )
		genesis_widget_area( 'where-we-work-area', array(
			'before' => '<div class="where-we-work widget-area"><div class="grid-container"><div class="grid-100">',
			'after' => '</div></div></div>',
	) );
}


//* Register Field Offices widget area
genesis_register_sidebar( array(
	'id'            => 'field-offices-area',
	'name'          => __( 'Field Offices', 'themename' ),
	'description'   => __( 'Field office images, websites, and social media links', 'themename' ),
) );

//* Hook Field Offices widget
add_action( 'genesis_before_footer', 'itdp_fieldoffices_widget' );
	function itdp_fieldoffices_widget() {
	if ( is_front_page() )
		genesis_widget_area( 'field-offices-area', array(
			'before' => '<div class="field-offices widget-area"><div class="grid-container">',
			'after' => '</div></div>',
	) );
}


//* Reposition the secondary navigation menu just before the footer
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_before_footer', 'genesis_do_subnav' );


//* Enqueue Unsemantic responsive CSS style
function enqueue_unsemantic_css() {
	wp_enqueue_style( 'unsemantic_css', get_stylesheet_directory_uri() . '/unsemantic-grid-responsive.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_unsemantic_css' );


// Register responsive menu script
add_action( 'wp_enqueue_scripts', 'itdp_enqueue_scripts' );
/**
 * Enqueue responsive javascript
 * @author Ozzy Rodriguez
 * @todo Change 'prefix' to your theme's prefix
 */
function itdp_enqueue_scripts() {

	wp_enqueue_script( 'itdp-responsive-menu', get_stylesheet_directory_uri() . '/lib/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true ); // Change 'prefix' to your theme's prefix

}
