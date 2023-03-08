<?php


function avo_custom_css() {

    /* CSS to output */
    $custom_css = '';
    if ( class_exists( 'ReduxFrameworkPlugin' ) && avo_option( 'avo_cursor_set' ) == '1') {
    	$custom_css = "body {cursor: none!important;}"; 
    }
    wp_add_inline_style('avo-style', $custom_css);
}
