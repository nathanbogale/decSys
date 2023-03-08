<?php
global $umaya_options;
$umaya_options = get_option('umaya');
function umaya_style() {
//home
wp_enqueue_style('umaya-main', (UMAYA_THEME_URL . '/style.css'));
wp_enqueue_style('umaya-normalize', (UMAYA_THEME_URL . '/includes/css/plugins.css'));
wp_enqueue_style('fontawesome-pro', (UMAYA_THEME_URL . '/includes/css/fontawesome-pro.css'));
wp_enqueue_style('umaya-theme', (UMAYA_THEME_URL . '/includes/css/style.css'));
wp_enqueue_style('umaya-main-style', (UMAYA_THEME_URL . '/includes/css/umaya-main-style.css'));
wp_register_style('umaya-custom-cursor-css', (UMAYA_THEME_URL . '/includes/css/umaya-custom-cursor.css'));


}
add_action('wp_enqueue_scripts', 'umaya_style');

function umaya_fonts_url() {
    $umaya_font_url = '';
    
    if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'umaya' ) ) {
        $umaya_font_url = add_query_arg( 'family','Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' , "//fonts.googleapis.com/css" );
    }
    return $umaya_font_url;
}

function umaya_scripts() {
    wp_enqueue_style( 'umaya_fonts', umaya_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'umaya_scripts' );

function umaya_enqueue_custom_admin_style() {
wp_enqueue_style( 'umaya_wp_admin_css', (UMAYA_THEME_URL . '/includes/css/admin-style.css'), false, '1.0.0' );

}
add_action( 'admin_enqueue_scripts', 'umaya_enqueue_custom_admin_style' );