<?php 
//preloader custom setting
function avo_preloader_set() {
	if  ( class_exists('ReduxFrameworkPlugin')){
		$color =  avo_option( 'avo_loader_color' );
		$loader_bg = "
		.load-circle{border-top-color: $color;}
		";   
		if ( class_exists('ReduxFrameworkPlugin') && avo_option( 'avo_loader_color' )) {           
			wp_add_inline_style( 'avo-style', $loader_bg );
		}
	}
} 

function avo_preloader() {
	if  ( class_exists('ReduxFrameworkPlugin')){
		$preload = avo_option( 'avo_preloader_set' );
		if ( class_exists('ReduxFrameworkPlugin') ) : if ($preload == 'show_home') :
			wp_enqueue_script( 'preloader', get_template_directory_uri() . '/js/loader.js',array(),'', 'in_footer');
		endif ;  endif;
		
		if ( class_exists('ReduxFrameworkPlugin') ) : if ($preload == 'show_all') :
			wp_enqueue_script( 'preloader', get_template_directory_uri() . '/js/loader.js',array(),'', 'in_footer');
		endif ;  endif;
	}
}    