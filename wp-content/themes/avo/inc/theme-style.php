<?php
function avo_theme_styles()  
{ 
	// Register the style for the theme
	wp_enqueue_style ('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1', 'all' );
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1', 'all' );
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/fontawesome.min.css', array(), '1', 'all' );
	wp_enqueue_style('icon-font', get_template_directory_uri() . '/css/icon-font.min.css', array(), '1', 'all' );
	wp_enqueue_style('ionicons', get_template_directory_uri() . '/css/ionicons.min.css', array(), '1', 'all' );
	wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array(), '1', 'all' );
	wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array(), '1', 'all' );
	wp_enqueue_style('magic', get_template_directory_uri() . '/css/magic.css', array(), '1', 'all' );
	wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css', array(), '1', 'all' );
	wp_enqueue_style('jquery-fatnav', get_template_directory_uri() . '/css/jquery.fatNav.css', array(), '1', 'all' );
	wp_enqueue_style('animate-headline', get_template_directory_uri() . '/css/animate.headline.css', array(), '1', 'all' );
	wp_enqueue_style('splitting', get_template_directory_uri() . '/css/splitting.css', array(), '1', 'all' );
	wp_enqueue_style('splitting-cells', get_template_directory_uri() . '/css/splitting-cells.css', array(), '1', 'all' );
	wp_enqueue_style('avo-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.0', 'all' );


}

//google font 
/*
Register Fonts
*/
function avo_fonts_url() {
	$font_url = '';
	
	/*
	Translators: If there are characters in your language that are not supported
	by chosen font(s), translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'avo' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Roboto:300,400,400i,500,600,600i,700,700i,800,800i,900|Poppins:300,400,500,600,700,800,900|Barlow Condensed:300,400,500,600,700,800,900' ), "//fonts.googleapis.com/css" );
	}
	return $font_url;
}

/*
Enqueue scripts and styles.
*/
function avo_fonts_style() {
	wp_enqueue_style( 'avo-fonts', avo_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'avo_fonts_style' );

//for google font  in editor
function avo_fonts_editor_style() {
	$font_url = add_query_arg( 'family', urlencode( 'Roboto:300,400,400i,500,600,600i,700,700i,800,800i,900|Poppins:300,400,500,600,700,800,900|Barlow Condensed:300,400,500,600,700,800,900' ), "//fonts.googleapis.com/css" );
	add_editor_style( $font_url );
}
add_action( 'after_setup_theme', 'avo_fonts_editor_style' );

/*
Enqueue admin scripts and styles.
*/
function avo_admin_style() {
	wp_enqueue_style('avo-admin-custom', get_stylesheet_directory_uri() . '/css/admin-custom.css', array(), '5.1.1', 'all' );
}
add_action( 'admin_enqueue_scripts', 'avo_admin_style' );


//Register and load FontAwesome to WP Editor

add_action( 'enqueue_block_editor_assets', 'avo_editor_fontawesome' );
function avo_editor_fontawesome() {
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', null, '1');
}

