<?php
/*
Template Name: Avo Page Builder
Template Post Type: page, portfolio 
Description:One Page Builder with container.
*/
get_header(); 
		
	//custom header
	if ( class_exists('ReduxFrameworkPlugin') ) { 
		do_action('avo-custom-header','avo_header_start') ;        
	} else { ?>
		<!--Fall back if no reduxoptions instalavo-->
		<!--HOME START-->
		<div class="default-header clearfix">
			<!--HEADER START-->
			<?php get_template_part( 'inc/menu','normal'); ?>
			<!--HEADER END-->
		</div><!--/home end-->
		<!--HOME END-->
	<?php }

	//custom side panel


	if ( class_exists('ReduxFrameworkPlugin') ) { 
			echo'<div class="side-panel">';
			echo'<div class="close-black-block-offcanvas"><a href="#"><i class="fa fa-times"></i></a></div>';
				do_action('avo-custom-sidepanel','avo_sidepanel_start');
			echo'</div>';
	}
	
	
	//page content
	echo'<div class="blank-builder">';
	echo '<div class="container">';
	while (have_posts()) : the_post();
		the_content();
	endwhile;
	echo'</div> </div>';

	//custom footer
	if ( class_exists('ReduxFrameworkPlugin') ) { 
		do_action('avo-custom-footer','avo_footer_start');
	} else {
		//Fall back if no reduxoptions instalavo
		get_template_part( 'inc/bottom','footer'); 
	}
		
get_footer(); ?>