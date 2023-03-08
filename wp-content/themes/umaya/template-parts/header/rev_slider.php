<?php $umaya_options = get_option('umaya'); ?>
<!-- page head start -->
<?php if (has_post_thumbnail( $post->ID ) ):
$umaya_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
endif;
?>
			<section id="up" class="<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_rev_line_opt',true)=='st2'){ ?>lines-section<?php } ;?> pos-rel anim-lines bg-img-cover" >
			<div class="js-parallax-slide-bg bg-img-cover" ><?php echo do_shortcode(get_post_meta($post->ID,'rnr_umaya_animated_page_rev_slider_code_opt',true)) ?></div>
			<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_rev_overlay_opt',true)=='st2'){ ?>
			<?php } else { ?>
				<!-- bg-overlay -->
				<div class="bg-overlay-black"></div>
			<?php } ;?>
			
				<!-- lines-container start -->
				<div class="<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_rev_line_opt',true)=='st2'){ ?>lines-container<?php } ;?> pos-rel anim-lines flex-min-height-100vh border-box-bottom">
				
					<div class="padding-top-bottom-120 container <?php echo esc_attr(get_post_meta($post->ID,'rnr_umaya_animated_page_title_align_rev_opt',true)); ?>">
						<!-- title start -->
						<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_title_ani_rev_opt',true)=='st2'){ ?>
						<h2 class="<?php if (( get_post_meta($post->ID,'rnr_umaya_animated_page_rev_title_font_size_opt',true))):?><?php echo esc_attr(get_post_meta($post->ID,'rnr_umaya_animated_page_rev_title_font_size_opt',true)); ?><?php else : ?>headline-l<?php endif;?> after-preloader-anim">
						<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_rev_title_opt',true)=='st2'){ ?>
						<?php
						$umaya_page_title = rwmb_meta( 'rnr_umaya_page_rev_title_df_opt' );
						if ( ! empty( $umaya_page_title ) ) {
						foreach ( $umaya_page_title as $umaya_page_titles ) { ;?>
						<?php $umaya_title_delay_opt = isset( $umaya_page_titles['rnr_umaya_page_rev_title_delay_opt'] ) ? $umaya_page_titles['rnr_umaya_page_rev_title_delay_opt'] : ''; ?>
						<?php $umaya_title_style_opt = isset( $umaya_page_titles['rnr_umaya_animated_page_rev_title_type_opt'] ) ? $umaya_page_titles['rnr_umaya_animated_page_rev_title_type_opt'] : ''; ?>
						<?php if ($umaya_title_style_opt =='st2'){ ?>
						<span id="js-typewriter" class="text-color-red" data-values="<?php echo esc_attr($umaya_page_titles['rnr_umaya_page_rev_typingtxt_main_opt']);?>"></span><br>
						<?php wp_enqueue_script('umaya-typewriter'); ?>
						<?php } else { ?>
						<span class="anim-text-fill <?php if ( ! empty( $umaya_title_delay_opt ) ) { ?>tr-delay<?php echo esc_attr($umaya_title_delay_opt);?><?php } else { ?>tr-delay01<?php } ;?>" data-text="<?php echo esc_attr($umaya_page_titles['rnr_umaya_page_rev_title_list_opt']);?>"><?php echo esc_html($umaya_page_titles['rnr_umaya_page_rev_title_list_opt']);?></span><br>
						<?php } ?>
						<?php } } ;?>
						<?php } else { ?>
						<span class="anim-text-fill" data-text="<?php the_title();?>"><?php the_title();?></span>
						<?php } ;?>
						</h2>
						<?php } else { ?>
						<h2 class="<?php if (( get_post_meta($post->ID,'rnr_umaya_animated_page_rev_title_font_size_opt',true))):?><?php echo esc_attr(get_post_meta($post->ID,'rnr_umaya_animated_page_rev_title_font_size_opt',true)); ?><?php else : ?>headline-l<?php endif;?> after-preloader-anim">
						<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_rev_title_opt',true)=='st2'){ ?>
							<?php
							$umaya_page_title = rwmb_meta( 'rnr_umaya_page_rev_title_df_opt' );
							if ( ! empty( $umaya_page_title ) ) {
							foreach ( $umaya_page_title as $umaya_page_titles ) { ;?>
							<?php $umaya_title_delay_opt = isset( $umaya_page_titles['rnr_umaya_page_rev_title_delay_opt'] ) ? $umaya_page_titles['rnr_umaya_page_rev_title_delay_opt'] : ''; ?>
							<?php $umaya_title_style_opt = isset( $umaya_page_titles['rnr_umaya_animated_page_rev_title_type_opt'] ) ? $umaya_page_titles['rnr_umaya_animated_page_rev_title_type_opt'] : ''; ?>
							<span class="hidden-box d-block">
								<span class="anim-slide <?php if ( ! empty( $umaya_title_delay_opt ) ) { ?>tr-delay<?php echo esc_attr($umaya_title_delay_opt);?><?php } else { ?>tr-delay01<?php } ;?>">
								<?php if ($umaya_title_style_opt =='st2'){ ?>
								<span id="js-typewriter" class="text-color-red" data-values="<?php echo esc_attr($umaya_page_titles['rnr_umaya_page_rev_typingtxt_main_opt']);?>"></span>
								<?php wp_enqueue_script('umaya-typewriter'); ?>
								<?php } else { ?>
								<?php echo do_shortcode($umaya_page_titles['rnr_umaya_page_rev_title_list_opt']);?>
								<?php } ;?>
								</span>
							</span>
							<?php } } ;?>
						<?php } else { ?>
							<span class="hidden-box d-block">
								<span class="anim-slide"><?php the_title();?></span>
							</span>						
						<?php } ;?>
						</h2><!-- title end -->
						<?php } ;?>
						<?php if(get_post_meta($post->ID,'rnr_umaya_page_rev_info_opt',true)=='st2'){ ?>
						<!-- description start -->
						<div class="flex-container description after-preloader-anim">
							
						<?php
						$umaya_page_info = rwmb_meta( 'rnr_umaya_page_rev_info_df_opt' );
						if ( ! empty( $umaya_page_info ) ) {
						foreach ( $umaya_page_info as $umaya_page_infos ) { ;?>
						<?php $umaya_info_delay_opt = isset( $umaya_page_infos['rnr_umaya_page_rev_info_delay_opt'] ) ? $umaya_page_infos['rnr_umaya_page_rev_info_delay_opt'] : ''; ?>
							<div class="four-columns column-50-100 padding-top-1 text-center">
								<span class="hidden-box d-inline-block">
									<span class="subhead-xxs anim-reveal <?php if ( ! empty( $umaya_info_delay_opt ) ) { ?>tr-delay<?php echo esc_attr($umaya_info_delay_opt);?><?php } else { ?>tr-delay02<?php } ;?>"><?php echo esc_html($umaya_page_infos['rnr_umaya_page_rev_info_list_opt']);?></span>
								</span>
							</div>
						<?php } } ;?>
						</div><!-- description end -->
						<?php } ;?>
					</div>
				</div><!-- lines-container end -->
				<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_rev_particles_opt',true)=='st2'){ ?>
				<!-- particles -->
				<div id="js-particles"></div>
				<?php 
				wp_enqueue_script('umaya-particles');
				wp_enqueue_script('umaya-particles-init');
				?>
				<?php } ;?>
				
			</section><!-- page head end -->
			