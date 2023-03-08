<?php
get_template_part('templates/custom','header');
if (avo_option( 'avo_enable_custom_404' ) ==true && avo_option( 'avo_custom_404_page' ) !='' ) {

	global $post ;  
	global $avo_theme_settings;  
	$page_404_id =  avo_option( 'avo_custom_404_page' );  

	$avo_404_page = new WP_Query(array(
		'posts_per_page' => -1,
		'post_type' =>  'page',
		'p' => $page_404_id, 
	)); 
	
	if ($avo_404_page->have_posts()) : 
		while  ($avo_404_page->have_posts()) : $avo_404_page->the_post();$page_404_id; ?>
			<?php the_content(); ?>
		<?php endwhile; 
	endif; 
	wp_reset_postdata();

} else {
	get_template_part('templates/404');
} 
get_template_part('templates/custom','footer');