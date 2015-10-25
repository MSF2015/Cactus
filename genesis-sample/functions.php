<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.2.2' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );
}

//* Remove page titles site wide (posts & pages) (requires HTML5 theme support)
//remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

//* Remove the post content (requires HTML5 theme support)
//remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

//* Remove the genesis loop (requires HTML5 theme support)
//remove_action( 'genesis_loop', 'genesis_do_loop' );

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add Accessibility support
add_theme_support( 'genesis-accessibility', array( 'headings', 'drop-down-menu',  'search-form', 'skip-links', 'rems' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* child theme setup
add_action('genesis_setup','child_theme_setup', 15);
function child_theme_setup() {

	// Add Nav to Header
	add_action( 'genesis_header', 'be_nav_menus' );

	//* Add support for custom header
	add_theme_support( 'custom-header', array(
		'width'			=> 320,
		'height'		=> 65,
		'header-selector'	=> '.site-header .title-area',
		'header-text'		=> false
	) );
}

/**
 * Add Nav Menus to Header
 *
 */
 
 //* Remove the header right widget area
unregister_sidebar( 'header-right' );

//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

/** Register widget area Opt In HTML5 */
genesis_register_sidebar( array(
'id' => 'opt-in',
'name' => __( 'Opt In', 'genesis' ),
'description' => __( 'This is the opt in widget.', 'genesis-sample' ),
) );

/** Register widget area Content Landing Page HTML5 */
genesis_register_sidebar( array(
'id' => 'content-landing-page',
'name' => __( 'Content Landing Page', 'genesis' ),
'description' => __( 'This is the content landing page widget.', 'genesis-sample' ),
) );

/** Register widget areas Latest Product HTML5 */
genesis_register_sidebar( array(
'id' => 'latest-product',
'name' => __( 'Latest Product', 'genesis' ),
'description' => __( 'This is the latest post widget.', 'genesis-sample' ),
) );

/** Register widget areas Product HTML5 */
genesis_register_sidebar( array(
'id' => 'product',
'name' => __( 'Product', 'genesis' ),
'description' => __( 'This is the product widget.', 'genesis-sample' ),
) );

/** Register widget areas Comment HTML5 */
genesis_register_sidebar( array(
'id' => 'comment',
'name' => __( 'Comment', 'genesis' ),
'description' => __( 'This is the comment widget.', 'genesis-sample' ),
) );

/** Register widget areas Comment-Form HTML5 */
genesis_register_sidebar( array(
'id' => 'comment-form',
'name' => __( 'Comment Form', 'genesis' ),
'description' => __( 'This is the comment form widget.', 'genesis-sample' ),
) );

/** Add the Opt In  section */
add_action( 'genesis_loop', 'custom_widgets' );
function custom_widgets() {
	
	if ( is_page('2') ) {
		//9
		genesis_widget_area( 'content-landing-page', array(
		'before' => '<div class="content-landing-page widget-area">',
		'after' => '</div>',
		) );
		genesis_widget_area( 'latest-product', array(
		'before' => '<div class="latest-product widget-area">',
		'after' => '</div>',
		) );
	}
	
	if ( is_page('41') ) {
		//13
		genesis_widget_area( 'product', array(
		'before' => '<div class="product widget-area">',
		'after' => '</div>',
		) );
		genesis_widget_area( 'opt-in', array(
		'before' => '<div class="opt-in widget-area">',
		'after' => '</div>',
		) );
		genesis_widget_area( 'comment', array(
		'before' => '<div class="comment widget-area">',
		'after' => '</div>',
		) );
		genesis_widget_area( 'comment-form', array(
		'before' => '<div class="comment-form widget-area">',
		'after' => '</div>',
		) );
	}
}
?>