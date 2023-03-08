<?php
//load all theme jquery script
function avo_theme_scripts() {
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js',array('jquery'), false, '', false);   
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js',array(),'', 'in_footer');
	wp_enqueue_script( 'jquery-effects-core'); 
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js',array(),'', 'in_footer');
	wp_enqueue_script( 'pace', get_template_directory_uri() . '/js/pace.min.js',array(),'', 'in_footer');
	wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js',array(),'', 'in_footer');
	wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js',array(),'', 'in_footer');
	wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/js/jquery.sticky.js',array(),'', 'in_footer');
	wp_enqueue_script( 'imagesloaded');     
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js',array(),'', 'in_footer');
	wp_enqueue_script( 'slick-animation', get_template_directory_uri() . '/js/slick-animation.js',array(),'', 'in_footer');
	wp_enqueue_script( 'resizesensor', get_template_directory_uri() . '/js/ResizeSensor.min.js',array(),'', 'in_footer');
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.min.js',array(),'', 'in_footer');
	wp_enqueue_script( 'svgembedder', get_template_directory_uri() . '/js/svgembedder.min.js',array(),'', 'in_footer');
	wp_enqueue_script( 'avo-totop', get_template_directory_uri() . '/js/totop.js',array(),'', 'in_footer');
	wp_enqueue_script( 'animated-headline', get_template_directory_uri() . '/js/animated.headline.js',array(),'', 'in_footer');
	wp_enqueue_script( 'splitting', get_template_directory_uri() . '/js/splitting.min.js',array(),'', 'in_footer');
	wp_enqueue_script( 'isotope.pkgd', get_template_directory_uri() . '/js/isotope.pkgd.min.js',array(),'', 'in_footer');
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js',array('jquery'),'', 'in_footer');
	wp_enqueue_script( 'slider-swiper', get_template_directory_uri() . '/js/slider-swiper.js',array('jquery'),'', 'in_footer');
	wp_enqueue_script( 'simpleParallax', get_template_directory_uri() . '/js/simpleParallax.min.js',array('jquery'),'', 'in_footer');

	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.min.js',array(),'', 'in_footer');
	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/js/jquery.counterup.min.js',array(),'', 'in_footer');

	wp_enqueue_script( 'jquery-knob', get_template_directory_uri() . '/js/jquery.knob.js',array(),'', 'in_footer');
	wp_enqueue_script( 'jquery-wow', get_template_directory_uri() . '/js/wow.min.js',array(),'', 'in_footer');
	wp_enqueue_script( 'jquery-appear', get_template_directory_uri() . '/js/jquery.appear.js',array(),'', 'in_footer');
	wp_enqueue_script( 'avo-scripts', get_template_directory_uri() . '/js/scripts.js',array( 'jquery' ),'', true);
}     