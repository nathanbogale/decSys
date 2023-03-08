
<?php 
//custom footer
if ( class_exists('ReduxFrameworkPlugin') ) { 
	do_action('avo-custom-footer','avo_footer_start');
} else {
	//Fall back if no reduxoptions instalavo
	get_template_part( 'inc/bottom','footer'); 
}

get_footer(); ?>