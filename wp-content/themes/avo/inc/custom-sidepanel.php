<?php 
//function for custom sidepanel 
function avo_sidepanel_start () {
	if (is_singular()) { 
		
		global $post;
		global $avo_theme_settings;
		if (get_post_meta( $post->ID, 'avo_sidepanel_format', true ) =='custom_sidepanel' && get_post_meta( $post->ID, 'avo_sidepanel_list', true ) ) { 
			$sidepanel_id =  get_post_meta( $post->ID, 'avo_sidepanel_list', true );  
			$avo_sidepanel = new WP_Query( array(
				'posts_per_page'   => 1,
				'post_type' =>  'sidepanel',
				 'p'         => $sidepanel_id,
			) ); 
			
			if ( $avo_sidepanel->have_posts() ) : 
				while  ( $avo_sidepanel->have_posts() ) : $avo_sidepanel->the_post();
					global $post ; ?>
					<div class="avo-custom-sidepanel clearfix <?php echo esc_attr($sidepanel_id); ?>"> 
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?> 
			<?php endif; wp_reset_postdata();
		} 

		//if page setting choose sidepanel global
		else if (get_post_meta( $post->ID, 'avo_sidepanel_format', true ) =='global'){ 
		
			//if custom sidepanel & list are selected in theme options
			if (avo_option( 'avo_sidepanel_set' ) =='custom' && avo_option( 'avo_sidepanel_set_list' ) !='' ) {

				$sidepanel_id =  avo_option( 'avo_sidepanel_set_list' );   
				$avo_sidepanel = new WP_Query(array(
					'posts_per_page'   => 1,
					'post_type' =>  'sidepanel',
					'p'         => $sidepanel_id,
				)); 
			  
				if ( $avo_sidepanel->have_posts() ) : 
					while  ( $avo_sidepanel->have_posts() ) : $avo_sidepanel->the_post();
						global $post ; ?>
						<div class="avo-custom-sidepanel clearfix">
						<?php the_content(); ?>
						</div>
					<?php endwhile; 
				endif; 
				wp_reset_postdata();

			}
		
		//if no sidepanel
		} else if (get_post_meta($post->ID, 'avo_sidepanel_format', true) =='no_sidepanel'){ 

		//do nothing
		}
	}
}