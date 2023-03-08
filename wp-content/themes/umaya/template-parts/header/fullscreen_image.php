<?php $umaya_options = get_option('umaya'); ?>
<!-- page head start -->
<?php if (has_post_thumbnail( $post->ID ) ):
$umaya_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
endif;
?>
				<?php $umaya_back_image = rwmb_meta( 'rnr_umaya_page_fullimg_img_opt','type=image&size=' ); ?>
				<?php if ( ! empty( $umaya_back_image ) ) { ?>
				<?php foreach ( $umaya_back_image as $umaya_back_images ){ ?>
				<section id="up" class="<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_full_image_line_opt',true)=='st2'){ ?>lines-section<?php } ;?> pos-rel anim-lines bg-img-cover" style="background-image:url(<?php echo esc_url(($umaya_back_images['url']));?>)">
				
				<?php } ;?>
				<?php } else { ?>
				<section id="up" class="<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_full_image_line_opt',true)=='st2'){ ?>lines-section<?php } ;?> pos-rel anim-lines bg-img-cover" style="background-image:url(<?php echo esc_url($umaya_image[0]);?>)">
				<?php } ;?>
			
			
			<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_full_image_overlay_opt',true)=='st2'){ ?>
			<?php } else { ?>
				<!-- bg-overlay -->
				<div class="bg-overlay-black"></div>
			<?php } ;?>
				<!-- lines-container start -->
				<div class="<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_full_image_line_opt',true)=='st2'){ ?>lines-container border-box-bottom<?php } ;?> pos-rel anim-lines flex-min-height-100vh ">
					<div class="padding-top-bottom-120 container <?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_full_image_line_opt',true)!='st2'){ ?>small<?php } ;?> <?php echo esc_attr(get_post_meta($post->ID,'rnr_umaya_animated_page_title_align_opt',true)); ?>">
						<!-- title start -->
						<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_title_ani_opt',true)=='st2'){ ?>
						<h2 class="<?php if (( get_post_meta($post->ID,'rnr_umaya_animated_page_full_image_title_font_size_opt',true))):?><?php echo esc_attr(get_post_meta($post->ID,'rnr_umaya_animated_page_full_image_title_font_size_opt',true)); ?><?php else : ?>headline-l<?php endif;?> after-preloader-anim">
						<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_full_image_title_opt',true)=='st2'){ ?>
						<?php
						$umaya_page_title = rwmb_meta( 'rnr_umaya_page_full_image_title_df_opt' );
						if ( ! empty( $umaya_page_title ) ) {
						foreach ( $umaya_page_title as $umaya_page_titles ) { ;?>
						<?php $umaya_title_delay_opt = isset( $umaya_page_titles['rnr_umaya_page_full_image_title_delay_opt'] ) ? $umaya_page_titles['rnr_umaya_page_full_image_title_delay_opt'] : ''; ?>
						<?php $umaya_title_style_opt = isset( $umaya_page_titles['rnr_umaya_animated_page_full_image_title_type_opt'] ) ? $umaya_page_titles['rnr_umaya_animated_page_full_image_title_type_opt'] : ''; ?>
						<?php $umaya_title_brek_opt = isset( $umaya_page_titles['rnr_umaya_animated_page_full_image_title_brek_opt'] ) ? $umaya_page_titles['rnr_umaya_animated_page_full_image_title_brek_opt'] : ''; ?>
						<?php if ($umaya_title_style_opt =='st2'){ ?>
						<span id="js-typewriter" class="text-color-red" data-values="<?php echo esc_attr($umaya_page_titles['rnr_umaya_page_full_image_typingtxt_main_opt']);?>"></span><br>
						<?php wp_enqueue_script('umaya-typewriter'); ?>
						<?php } else { ?>
						<span class="anim-text-fill <?php if ( ! empty( $umaya_title_delay_opt ) ) { ?>tr-delay-<?php echo esc_attr($umaya_title_delay_opt);?><?php } else { ?>tr-delay01<?php } ;?>" data-text="<?php echo esc_attr($umaya_page_titles['rnr_umaya_page_full_image_title_list_opt']);?>"><?php echo esc_html($umaya_page_titles['rnr_umaya_page_full_image_title_list_opt']);?></span>
						<?php if ($umaya_title_brek_opt =='st2'){ ?>
						</br>
						<?php } ;?>
						<?php } ?>
						<?php } } ;?>
						<?php } else { ?>
						<span class="anim-text-fill" data-text="<?php the_title();?>"><?php the_title();?></span>
						<?php } ;?>
						</h2>
						<?php } else { ?>
						<h2 class="<?php if (( get_post_meta($post->ID,'rnr_umaya_animated_page_full_image_title_font_size_opt',true))):?><?php echo esc_attr(get_post_meta($post->ID,'rnr_umaya_animated_page_full_image_title_font_size_opt',true)); ?><?php else : ?>headline-l<?php endif;?> after-preloader-anim">
						<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_full_image_title_opt',true)=='st2'){ ?>
							<?php
							$umaya_page_title = rwmb_meta( 'rnr_umaya_page_full_image_title_df_opt' );
							if ( ! empty( $umaya_page_title ) ) {
							foreach ( $umaya_page_title as $umaya_page_titles ) { ;?>
							<?php $umaya_title_delay_opt = isset( $umaya_page_titles['rnr_umaya_page_full_image_title_delay_opt'] ) ? $umaya_page_titles['rnr_umaya_page_full_image_title_delay_opt'] : ''; ?>
							<?php $umaya_title_style_opt = isset( $umaya_page_titles['rnr_umaya_animated_page_full_image_title_type_opt'] ) ? $umaya_page_titles['rnr_umaya_animated_page_full_image_title_type_opt'] : ''; ?>
							<?php $umaya_title_brek_opt = isset( $umaya_page_titles['rnr_umaya_animated_page_full_image_title_brek_opt'] ) ? $umaya_page_titles['rnr_umaya_animated_page_full_image_title_brek_opt'] : ''; ?>
							<span class="hidden-box d-block">
								<span class="anim-slide <?php if ( ! empty( $umaya_title_delay_opt ) ) { ?>tr-delay<?php echo esc_attr($umaya_title_delay_opt);?><?php } else { ?>tr-delay-01<?php } ;?>">
								<?php if ($umaya_title_style_opt =='st2'){ ?>
								<span id="js-typewriter" class="text-color-red" data-values="<?php echo esc_attr($umaya_page_titles['rnr_umaya_page_full_image_typingtxt_main_opt']);?>"></span>
								<?php wp_enqueue_script('umaya-typewriter'); ?>
								<?php } else { ?>
								<?php echo do_shortcode($umaya_page_titles['rnr_umaya_page_full_image_title_list_opt']);?>
								<?php } ;?>
								</span>
								<?php if ($umaya_title_brek_opt =='st2'){ ?>
								</br>
								<?php } ;?>
							</span>
							
							<?php } } ;?>
						<?php } else { ?>
							<span class="hidden-box d-block">
								<span class="anim-slide"><?php the_title();?></span>
							</span>						
						<?php } ;?>
						</h2><!-- title end -->
						<?php } ;?>
						<?php if(get_post_meta($post->ID,'rnr_umaya_page_full_image_info_opt',true)=='st2'){ ?>
						<!-- description start -->
						<div class="flex-container description after-preloader-anim">
							
						<?php
						$umaya_page_info = rwmb_meta( 'rnr_umaya_page_full_image_info_df_opt' );
						if ( ! empty( $umaya_page_info ) ) {
						foreach ( $umaya_page_info as $umaya_page_infos ) { ;?>
						<?php $umaya_info_delay_opt = isset( $umaya_page_infos['rnr_umaya_page_full_image_info_delay_opt'] ) ? $umaya_page_infos['rnr_umaya_page_full_image_info_delay_opt'] : ''; ?>
							<div class="four-columns column-50-100 padding-top-1 text-center">
								<span class="hidden-box d-inline-block">
									<span class="subhead-xxs anim-reveal <?php if ( ! empty( $umaya_info_delay_opt ) ) { ?>tr-delay<?php echo esc_attr($umaya_info_delay_opt);?><?php } else { ?>tr-delay02<?php } ;?>"><?php echo esc_html($umaya_page_infos['rnr_umaya_page_full_image_info_list_opt']);?></span>
								</span>
							</div>
						<?php } } ;?>
						</div><!-- description end -->
						<?php } ;?>
					</div>
				</div><!-- lines-container end -->
				<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_full_image_particles_opt',true)=='st2'){ ?>
				<!-- particles -->
				<div id="js-particles"></div>
				<?php 
				wp_enqueue_script('umaya-particles');
				wp_enqueue_script('umaya-particles-init');
				?>
				<?php } ;?>
				
			</section><!-- page head end -->
			