<?php 

//function custom header by global settings 
function avo_custom_header_global () {

	global $post ;  
	global $avo_theme_settings;  
	$header_id =  avo_option( 'avo_header_set_list' );  

	$avo_header = new WP_Query(array(
		'posts_per_page' => -1,
		'post_type' =>  'header',
		'p' => $header_id, 
	)); 
	
	if ($avo_header->have_posts()) : 
		while  ($avo_header->have_posts()) : $avo_header->the_post();$header_id; ?>
			<nav class="avo-custom-header clearfix 1 <?php if (class_exists('ReduxFrameworkPlugin') && (avo_option( 'avo_header_position' ) =='head_white')){ 
					echo 'white-header';
				} else { 
					echo 'custom-absolute-menu';
				} ?> ">
				<?php the_content(); ?>
			</nav>
	
		<?php endwhile; 
	endif; 
	wp_reset_postdata();
}

//function custom header by page settings  
function avo_custom_header_page () {
	global $post ;
	$header_id =  get_post_meta( $post->ID, 'avo_header_list', true ); 
	$avo_header = new WP_Query( array(
		'posts_per_page' => 1,
		'post_type' =>  'header',
		'p' => $header_id,
	) ); 
	
	if ($avo_header->have_posts()) : 
		while  ($avo_header->have_posts()) : $avo_header->the_post();?>
			<nav class="avo-custom-header clearfix 2  <?php if (class_exists('ReduxFrameworkPlugin') && (avo_option( 'avo_header_position' ) =='head_white')){ 
				echo 'white-header';
			} else { 
				echo 'custom-absolute-menu';
			} ?>">
				<?php the_content(); ?>
			</nav>
		<?php endwhile; 
	endif; 
	wp_reset_postdata();
}

//function for output custom header
function avo_header_start () {
	if ( is_singular()) { //if single page/post
		global $post;
		global $avo_theme_settings; 
		if (get_post_meta($post->ID, 'avo_header_format', true) =='custom_header' && get_post_meta($post->ID, 'avo_header_list', true)) {
			//if page setting choose header custom
			do_action('avo-header-page','avo_custom_header_page') ;  
		} 
			 
		//if page setting choose header global
		else if (get_post_meta($post->ID, 'avo_header_format', true) =='default'){ 
			//if custom header & list are selected in theme options
			if (avo_option( 'avo_header_set' ) =='custom' && avo_option( 'avo_header_set_list' ) !='' ) {
				do_action('avo-header-global','avo_custom_header_global') ; 
			} else {
				get_template_part( 'inc/menu','normal');
			} 
		}
			 
	//if page setting choose no header 
	else if (get_post_meta($post->ID, 'avo_header_format', true) =='no_header'){
		//display nothing       
	}
			 
	//if page setting choose header standard 
	else { ?>
		<?php get_template_part( 'inc/menu');
	}
			
	} else { //if not single page/post

		//if custom header & list are selected in theme options
		if (avo_option( 'avo_header_set' ) =='custom' && avo_option( 'avo_header_set_list' ) !='' ) {
			do_action('avo-header-global','avo_custom_header_global') ;  

		} else { 
			//if not use normal menu
			get_template_part( 'inc/menu','normal');
		}
	}
}

//function custom header by page settings
function avo_custom_menu_page ($menu) {
	global $post ;
	$avo_header_menu =  avo_option( $menu );
	if (!empty($avo_header_menu)):
		wp_nav_menu( array(
			'menu'            => $avo_header_menu,
			'items_wrap' => '<ul id="%1$s" class="home-nav nn navigation %2$s">%3$s</ul>',
			'menu_id'         => '',
			'echo'            => true,
		) );
	else:
		$menu = '';
		wp_nav_menu( array(
			'menu_id'         => '',
			'items_wrap' => '<ul id="%1$s" class="home-nav navigation %2$s">%3$s</ul>',
			'theme_location' => 'primary_menu',
			  
		) );
	endif;
}

//function custom header by page settings
function avo_custom_flat_menu_page ($flatmenu) {
	global $post ;
	$avo_header_flat_menu = avo_option( $flatmenu );
	if ( !empty($avo_header_flat_menu) ):
		$menuParameters_flat = array(
			'menu' => $avo_header_flat_menu,
			'container'       => true,
			'items_wrap'      => '<ul id="%1$s" class="mob-nav  %2$s">%3$s</ul>',
			'depth'           => 0,
		);
	else:
		$menuParameters_flat = array(
			'theme_location' => 'primary_menu',
			'container'       => false,
			'items_wrap'      => '<ul id="%1$s" class="mob-nav  %2$s">%3$s</ul>',
			'depth'           => 0,
		);
	endif;
	echo strip_tags(wp_nav_menu( $menuParameters_flat ), '<a>' );
}



