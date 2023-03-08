<?php $umaya_options = get_option('umaya'); ?>
<!-- page head start -->
<?php if (has_post_thumbnail( $post->ID ) ):
$umaya_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
endif;
?>
			<section id="up" class="pos-rel bg-img-cover" style="background-image:url(<?php echo esc_url($umaya_image[0]);?>)">
				<!-- video -->
				<video src="<?php echo esc_url(get_post_meta($post->ID,'rnr_umaya_animated_page_video_mp4_videoid_opt',true)); ?>" class="video-bg" muted loop autoplay playsinline></video>
				<!-- bg-overlay -->
				<div class="bg-overlay-black"></div>
				<!-- pos-rel start -->
				<div class="pos-rel flex-min-height-100vh">
					<div class="padding-top-bottom-120 container small after-preloader-anim">
						<?php if (( get_post_meta($post->ID,'rnr_umaya_animated_page_video_mp4_title_main_opt',true))):?>
						<!-- title start -->
						<h2 class="headline-xxxxl hidden-box">
							<span class="anim-slide"><?php echo do_shortcode(get_post_meta($post->ID,'rnr_umaya_animated_page_video_mp4_title_main_opt',true)); ?></span>
						</h2><!-- title end -->
						<?php endif;?>
						<?php if (( get_post_meta($post->ID,'rnr_umaya_animated_page_video_mp4_sub_title_main_opt',true))):?>
						<p class="subhead-m margin-top-20 anim-fade tr-delay-01"><?php echo esc_html(get_post_meta($post->ID,'rnr_umaya_animated_page_video_mp4_sub_title_main_opt',true)); ?></p>
						<?php endif;?>
						<?php if (( get_post_meta($post->ID,'rnr_umaya_animated_page_video_mp4_scroll_url_opt',true))):?>
						<div class="margin-top-30 anim-fade tr-delay-02">
							<a href="<?php echo esc_url(get_post_meta($post->ID,'rnr_umaya_animated_page_video_mp4_scroll_url_opt',true)); ?>" class="border-btn js-pointer-large">
								<span class="border-btn__inner"><?php echo esc_html(get_post_meta($post->ID,'rnr_umaya_animated_page_video_mp4_scroll_opt',true)); ?></span>
								<span class="border-btn__lines-1"></span>
								<span class="border-btn__lines-2"></span>
							</a>
						</div>
						<?php endif;?>
					</div>
				</div><!-- pos-rel end -->
			</section><!-- page head end -->