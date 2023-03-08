<?php
/**
 * Header Tab For Theme Option.
 *
 * @package avo
 */

// Font options for family. size and fully typography.

if ( ! function_exists( 'avo_enqueue_fonts_url' ) ) :

function avo_enqueue_fonts_url() {
    $avo_fonts_url = '';
    $avo_fonts     = array();
    $avo_main_font_weight = array();
    $avo_alt_font_weight = array();
    $avo_font_subsets = array();
    global $avo_theme_settings;
    
    /* For Main Font Weight */
    $avo_main_font_weight_array = ( isset( $avo_theme_settings['main_font_weight'] ) ) ? $avo_theme_settings['main_font_weight'] : '';
    if( !empty( $avo_main_font_weight_array ) ) {
        foreach ($avo_main_font_weight_array as $key => $value) {
            if( $value == 1 ){
                $avo_main_font_weight[] = $key;
            }
        }
    }

    if( !empty( $avo_main_font_weight ) ) {
        $avo_main_font_weight = implode( ',', $avo_main_font_weight );
    } else {
        $avo_main_font_weight = '100,300,400,500,700,900';
    }

    if( avo_option('main_font')){ 
        $avo_fonts[] = $avo_theme_settings['main_font']['font-family'].':'.$avo_main_font_weight;
    }

    /* For Alt Font Weight */
    $avo_alt_font_weight_array = ( isset( $avo_theme_settings['alt_font_weight'] ) ) ? $avo_theme_settings['alt_font_weight'] : '';
    if( !empty( $avo_alt_font_weight_array ) ) {
        foreach ($avo_alt_font_weight_array as $key => $value) {
            if( $value == 1 ){
                $avo_alt_font_weight[] = $key;
            }
        }
    }

    if( !empty( $avo_alt_font_weight ) ) {
        $avo_alt_font_weight = implode( ',', $avo_alt_font_weight );
    } else {
        $avo_alt_font_weight = '100,200,300,400,500,600,700,800,900';
    }
    if( avo_option('alt_font')){
        $avo_fonts[] = $avo_theme_settings['alt_font']['font-family'].':'.$avo_alt_font_weight;
    }else{
        $avo_fonts[] = 'Montserrat:100,200,300,400,500,600,700,800,900';
    }

    /* For Font Subsets */
    $avo_main_font_subsets = ( isset( $avo_theme_settings['main_font_languages'] ) ) ? $avo_theme_settings['main_font_languages'] : '' ;
    if( !empty( $avo_main_font_subsets ) ) {
        foreach ($avo_main_font_subsets as $key => $value) {
            if( $value == 1 ){
                $avo_font_subsets[] = $key;
            }
        }
    }
    if( !empty( $avo_font_subsets ) ) {
        $avo_main_font_subsets = implode( ',',  $avo_font_subsets );
    } else {
        $avo_main_font_subsets = '';
    }

    if ( $avo_fonts ) {
        $avo_fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $avo_fonts ) ),
            'subset' => urlencode( $avo_main_font_subsets ),
        ), '//fonts.googleapis.com/css' );
    }
    return $avo_fonts_url;
}
endif;

if ( ! function_exists( 'avo_font_scripts' ) ) :
    function avo_font_scripts() {
        $disable_google_fonts = avo_option( 'disable_google_fonts' );
        if( $disable_google_fonts != 1 ) {
            wp_enqueue_style( 'avo-fonts', avo_enqueue_fonts_url(), array(), null );
        }
    }
endif;
add_action( 'wp_enqueue_scripts', 'avo_font_scripts' );

?>