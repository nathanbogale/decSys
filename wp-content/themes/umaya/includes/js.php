<?php

if( !function_exists ('umaya_enqueue_scripts') ) :
	function umaya_enqueue_scripts() {
	$umaya_options = get_option('umaya');
	wp_enqueue_script('umaya-plugins', (UMAYA_THEME_URL . '/includes/js/plugins.js'), array('jquery'), '1.0',true);
	wp_register_script('footer-reveal', (UMAYA_THEME_URL . '/includes/js/footer-reveal.js'), array('jquery'), '1.0',true);
	wp_enqueue_script('umaya-main', (UMAYA_THEME_URL . '/includes/js/main.js'), array('jquery'), '1.0',true);
	wp_register_script('footer-reveal-init', (UMAYA_THEME_URL . '/includes/js/footer-reveal_init.js'), array('jquery'), '1.0',true);
	wp_register_script('umaya-particles', (UMAYA_THEME_URL . '/includes/js/particles.js'), array('jquery'), '1.0',true);
	wp_register_script('umaya-particles-init', (UMAYA_THEME_URL . '/includes/js/particles_init.js'), array('jquery'), '1.0',true);
	wp_register_script('umaya-typewriter', (UMAYA_THEME_URL . '/includes/js/typewriter.js'), array('jquery'), '1.0',true);
	wp_register_script('umaya-share', (UMAYA_THEME_URL . '/includes/js/jquery-share.js'), array('jquery'), '1.0',true);
	wp_register_script('umaya-custom-cursor', (UMAYA_THEME_URL . '/includes/js/umaya-custom-cursor.js'), array('jquery'), '1.0',true);
	wp_register_script('umaya-youtube-vid', (UMAYA_THEME_URL . '/includes/js/youtube-vid.js'), array('jquery'), '1.0',true);
	
	
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
	}
}
	add_action('wp_enqueue_scripts', 'umaya_enqueue_scripts');
endif;