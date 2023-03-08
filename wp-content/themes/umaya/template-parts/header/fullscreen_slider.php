<?php $umaya_options = get_option('umaya'); ?>

			<!-- home-slider start -->
			<section class="home-slider fullscreen-home-slider" id="up">
				<!-- swiper-wrapper start -->
			  	<div class="swiper-wrapper">
							<?php
							$umaya_slider_opt = rwmb_meta( 'rnr_umaya_page_fullscreen_slider_opts' );
							if ( ! empty( $umaya_slider_opt ) ) {
							foreach ( $umaya_slider_opt as $umaya_slider_opts ) { ;?>
							<?php $umaya_slide_style = isset( $umaya_slider_opts['rnr_umaya_slide_st_opt'] ) ? $umaya_slider_opts['rnr_umaya_slide_st_opt'] : ''; ?>
							<?php $umaya_slide_inside_opt = isset( $umaya_slider_opts['rnr_umaya_page_fullscreen_slider_title_df_opt'] ) ? $umaya_slider_opts['rnr_umaya_page_fullscreen_slider_title_df_opt'] : ''; ?>
							<?php $umaya_slide_inside_info_opt = isset( $umaya_slider_opts['rnr_umaya_page_fullscreen_slide_st_des_opt'] ) ? $umaya_slider_opts['rnr_umaya_page_fullscreen_slide_st_des_opt'] : ''; ?>
							<?php $umaya_slide_inside_button_txt_opt = isset( $umaya_slider_opts['rnr_umaya_page_fullscreen_slide_button_txt_opt'] ) ? $umaya_slider_opts['rnr_umaya_page_fullscreen_slide_button_txt_opt'] : ''; ?>
							<?php $umaya_slide_inside_button_url_opt = isset( $umaya_slider_opts['rnr_umaya_page_fullscreen_slide_button_url_opt'] ) ? $umaya_slider_opts['rnr_umaya_page_fullscreen_slide_button_url_opt'] : ''; ?>
							<?php $umaya_slide_inside_sub_title_opt = isset( $umaya_slider_opts['rnr_umaya_page_fullscreen_slide_sub_title_opt'] ) ? $umaya_slider_opts['rnr_umaya_page_fullscreen_slide_sub_title_opt'] : ''; ?>
							<?php $umaya_slide_overlay_opt = isset( $umaya_slider_opts['rnr_umaya_page_fullscreen_slide_overlay_opt'] ) ? $umaya_slider_opts['rnr_umaya_page_fullscreen_slide_overlay_opt'] : ''; ?>
							<?php $umaya_slide_cap_align_opt = isset( $umaya_slider_opts['rnr_umaya_page_fullscreen_slide_caption_align_opt'] ) ? $umaya_slider_opts['rnr_umaya_page_fullscreen_slide_caption_align_opt'] : ''; ?>
							<?php $umaya_image_ids = isset( $umaya_slider_opts['rnr_umaya_page_fullscreen_slider_img_opt'] ) ? $umaya_slider_opts['rnr_umaya_page_fullscreen_slider_img_opt'] : array();
							foreach ( $umaya_image_ids as $umaya_image_id ) {
							$umaya_image = RWMB_Image_Field::file_info( $umaya_image_id, array( 'size' => '' ) ); ?>
							<?php if ($umaya_slide_cap_align_opt =='st2'){ 
							$umaya_cap_align_opt ="text-center";
							} 
							else if ($umaya_slide_cap_align_opt =='st3'){
							$umaya_cap_align_opt ="text-right";
							} else {
							$umaya_cap_align_opt ="text-left";
							};?>
				  	<!-- swiper-slide start -->
				  	<div class="swiper-slide flex-min-height-box home-slide">
					  	<!-- slide-bg -->
				      	<div class="slide-bg parallax--bg" style="background-image:url(<?php echo esc_url(($umaya_image['url']));?>)"></div>
						<?php if ($umaya_slide_overlay_opt =='st2'){ ?>
						<div class="bg-overlay"></div>
						<?php } ;?>
				      	<!-- home-slider-content start -->
					  	<div class="home-slider-content flex-min-height-inner dark-bg-1">
						  	<!-- container start -->
					      	<div class="container top-bottom-padding-120 <?php echo sanitize_html_class($umaya_cap_align_opt);?>">
								<?php if ( !empty( $umaya_slide_inside_sub_title_opt ) ) { ?>
						  		<h2 class="slider-overlay2 medium-title red-color"><?php echo esc_html($umaya_slide_inside_sub_title_opt);?></h2>
								<?php } ;?>
								<?php if ( !empty( $umaya_slide_inside_sub_title_opt ) ) { ?>
								<h3 class="large-title-bold text-color-4">
								<?php } else { ?>
								<h2 class="large-title-bold text-color-4">
								<?php } ;?>
								<?php
								if ( ! empty( $umaya_slide_inside_opt ) ) {
								foreach ( $umaya_slide_inside_opt as $umaya_slide_inside_opts ) { ;?>
								<?php $umaya_slider_title_delay_opt = isset( $umaya_slide_inside_opts['rnr_umaya_page_fullscreen_slider_title_delay_opt'] ) ? $umaya_slide_inside_opts['rnr_umaya_page_fullscreen_slider_title_delay_opt'] : ''; ?>
								
							  		<span class="slider-overlay2 <?php if ( ! empty( $umaya_slider_title_delay_opt ) ) { ?>slider-tr-delay<?php echo esc_attr($umaya_slider_title_delay_opt);?><?php } else { ?>slider-tr-delay01<?php } ;?>"><?php echo esc_html($umaya_slide_inside_opts['rnr_umaya_page_fullscreen_slider_title_list_opt']);?></span><br>
							  		
						  		
								<?php } } ;?>
								<?php if ( !empty( $umaya_slide_inside_sub_title_opt ) ) { ?>
								</h3>
								<?php } else { ?>
								</h2>
								<?php } ;?>
								<?php if ( !empty( $umaya_slide_inside_info_opt ) ) { ?>
								<p class="p-style-bold-up text-height-20 slider-fade slider-tr-delay03 text-color-4"><?php echo esc_html($umaya_slide_inside_info_opt);?></p><br>
								<?php } ;?>
								<?php if ( !empty( $umaya_slide_inside_button_txt_opt ) ) { ?>
								<?php if ( !empty( $umaya_slide_inside_button_url_opt ) ) { ?>
								<div class="slider-fade slider-tr-delay04 top-margin-30">
									<div class="border-btn-box pointer-large">
										<div class="border-btn-inner">
										    <a href="<?php echo esc_url($umaya_slide_inside_button_url_opt);?>" class="border-btn" data-text="<?php echo esc_html($umaya_slide_inside_button_txt_opt);?>"><?php echo esc_html($umaya_slide_inside_button_txt_opt);?></a>
										</div>
									</div>
								</div>
								<?php }; ?>
								<?php }; ?>
					      	</div><!-- container end -->
				      	</div><!-- home-slider-content end -->
				    </div><!-- swiper-slide end -->
				    <?php } ?>
					<?php } } ;?>
			  	</div><!-- swiper-wrapper end -->
			  	
			  	<!-- swiper-button-next start -->
			  	<div class="swiper-button-next">
				  	<div class="slider-arrow-next-box">
					  	<span class="slider-arrow-next"></span>
				  	</div>
			  	</div><!-- swiper-button-next end -->
			  	<!-- swiper-button-prev start -->
			  	<div class="swiper-button-prev">
				  	<div class="slider-arrow-prev-box">
					  	<span class="slider-arrow-prev"></span>
				  	</div>
			  	</div><!-- swiper-button-prev end -->
			  	
			  	<!-- swiper-pagination -->
			  	<div class="swiper-pagination"></div>
			  	<?php if (( get_post_meta($post->ID,'rnr_umaya_page_fullscreen_slide_scroll_button_txt_opt',true))):?>
			  	<!-- scroll-btn start -->
				<a href="#down" class="scroll-btn pointer-large">
					<div class="scroll-arrow-box">
						<span class="scroll-arrow"></span>
					</div>
					<div class="scroll-btn-flip-box">
						<span class="scroll-btn-flip" data-text="<?php echo esc_attr(get_post_meta($post->ID,'rnr_umaya_page_fullscreen_slide_scroll_button_txt_opt',true)); ?>"><?php echo esc_html(get_post_meta($post->ID,'rnr_umaya_page_fullscreen_slide_scroll_button_txt_opt',true)); ?></span>
					</div>
				 </a><!-- scroll-btn end -->
			<?php endif;?>
			</section><!-- home-slider end -->