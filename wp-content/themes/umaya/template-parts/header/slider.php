<?php $umaya_options = get_option('umaya'); ?>
<!-- home slider start -->
			<section id="up" class="pos-rel section-bg-dark-1 js-home-slider fullscreen-slider">
				<!-- swiper-wrapper start -->
				<div class="swiper-wrapper">
				<?php
				$umaya_slider_opt = rwmb_meta( 'rnr_umaya_page_slider_opts' );
				if ( ! empty( $umaya_slider_opt ) ) {
				foreach ( $umaya_slider_opt as $umaya_slider_opts ) { ;?>
				<?php $umaya_slide_style = isset( $umaya_slider_opts['rnr_umaya_slide_st_opt'] ) ? $umaya_slider_opts['rnr_umaya_slide_st_opt'] : ''; ?>
				<?php $umaya_slide_inside_opt = isset( $umaya_slider_opts['rnr_umaya_page_slider_title_df_opt'] ) ? $umaya_slider_opts['rnr_umaya_page_slider_title_df_opt'] : ''; ?>
				<?php $umaya_slide_inside_button_txt_opt = isset( $umaya_slider_opts['rnr_umaya_page_slide_button_txt_opt'] ) ? $umaya_slider_opts['rnr_umaya_page_slide_button_txt_opt'] : ''; ?>
				<?php $umaya_slide_inside_button_url_opt = isset( $umaya_slider_opts['rnr_umaya_page_slide_button_url_opt'] ) ? $umaya_slider_opts['rnr_umaya_page_slide_button_url_opt'] : ''; ?>
				<?php $umaya_image_ids = isset( $umaya_slider_opts['rnr_umaya_page_slider_img_opt'] ) ? $umaya_slider_opts['rnr_umaya_page_slider_img_opt'] : array();
				foreach ( $umaya_image_ids as $umaya_image_id ) {
				$umaya_image = RWMB_Image_Field::file_info( $umaya_image_id, array( 'size' => '' ) ); ?>
					<!-- swiper-slide start -->
					<div class="swiper-slide">
						<!-- slide-bg -->
						<div class="js-parallax-slide-bg bg-img-cover" style="background-image:url(<?php echo esc_url(($umaya_image['url']));?>)"></div>
						<!-- bg-overlay -->
						<div class="bg-overlay-black"></div>

						<!-- content start -->
						<div class="flex-min-height-100vh pos-rel" data-swiper-parallax-x="30%">
							<div class="container small <?php echo esc_attr($umaya_slide_style);?> padding-top-bottom-120">
								<h2 class="headline-xl">
								<?php
								if ( ! empty( $umaya_slide_inside_opt ) ) {
								foreach ( $umaya_slide_inside_opt as $umaya_slide_inside_opts ) { ;?>
								<?php $umaya_slider_title_delay_opt = isset( $umaya_slide_inside_opts['rnr_umaya_page_slider_title_delay_opt'] ) ? $umaya_slide_inside_opts['rnr_umaya_page_slider_title_delay_opt'] : ''; ?>
									<span class="hidden-box d-block">
										<span class="anim-slide <?php if ( ! empty( $umaya_slider_title_delay_opt ) ) { ?>tr-delay-<?php echo esc_attr($umaya_slider_title_delay_opt);?><?php } else { ?>tr-delay-02<?php } ;?>"><?php echo do_shortcode($umaya_slide_inside_opts['rnr_umaya_page_slider_title_list_opt']);?></span>
									</span>
									<?php } } ;?>
								</h2>
								<?php if ( !empty( $umaya_slide_inside_button_txt_opt ) ) { ?>
								<?php if ( !empty( $umaya_slide_inside_button_url_opt ) ) { ?>
								<div class="margin-top-30 anim-fade tr-delay-08">
									<a href="<?php echo esc_url($umaya_slide_inside_button_url_opt);?>" class="border-btn js-pointer-large">
										<span class="border-btn__inner"><?php echo esc_html($umaya_slide_inside_button_txt_opt);?></span>
										<span class="border-btn__lines-1"></span>
										<span class="border-btn__lines-2"></span>
									</a>
								</div>
								<?php }; ?>
								<?php }; ?>
							</div>
						</div><!-- content end -->
					</div><!-- swiper-slide end -->
					<?php } ?>
					<?php } } ;?>
				</div><!-- swiper-wrapper end -->

				<!-- swiper-button-prev start -->
				<div class="swiper-button-prev-box fullscreen-slider-arrow after-preloader-anim">
					<div class="anim-fade">
						<div class="swiper-button-prev"></div>
					</div>
				</div><!-- swiper-button-prev end -->
				<!-- swiper-button-next start -->
				<div class="swiper-button-next-box fullscreen-slider-arrow after-preloader-anim">
					<div class="anim-fade tr-delay-06">
						<div class="swiper-button-next"></div>
					</div>
				</div><!-- swiper-button-next end -->

				<!-- swiper-pagination start -->
				<div class="pagination-box fullscreen-slider-pagination after-preloader-anim">
					<div class="anim-fade tr-delay-03">
						<div class="swiper-pagination counter-pagination"></div>
					</div>
				</div><!-- swiper-pagination end -->
			</section><!-- home slider end -->