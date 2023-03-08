<?php
	if ( ! is_active_sidebar( 'default-sidebar' ) ) {
		return;
	}


	if ( class_exists('ReduxFrameworkPlugin') && (avo_option( 'single_sidebar_def_width' ) =='9')) {
				$side_bar_width='col-md-3';
			}else{$side_bar_width='col-md-4';}

	if ( class_exists('ReduxFrameworkPlugin') && (avo_option( 'single_sidebar_sticky' ) ==true)) {
					$sidebar_sticky='fixed-sidebar';}else{$sidebar_sticky='';}
?>

<div class="<?php echo esc_attr($side_bar_width); ?> sidebar <?php echo $sidebar_sticky; ?> ">
	<div class=" theiaStickySidebar" <?php echo Avo_Theme_Helper::render_sidebars(); ?>> 
		<?php  if ( function_exists( 'dynamic_sidebar' ) ){ 
			if ( is_active_sidebar( 'default-sidebar' ) ) { dynamic_sidebar( 'default-sidebar' );}
		} ?>
	</div><!--  End StickySidebar  -->
</div><!--  End Sidebar  -->
