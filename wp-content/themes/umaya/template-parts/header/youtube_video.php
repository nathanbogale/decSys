<?php $umaya_options = get_option('umaya'); ?>
<!-- page-head start -->
<?php if (has_post_thumbnail( $post->ID ) ):
$umaya_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
<?php endif;?>
			<section id="up" class="page-head video-bg-box flex-min-height-box video-wrapper" data-video-id="<?php echo esc_attr(get_post_meta($post->ID,'rnr_umaya_animated_page_video_youtube_videoid_opt',true)); ?>" data-video-youtube-link="y" data-video-start="0" data-video-end="100" data-video-width-add="100" data-video-height-add="100" style="background-image:url(<?php echo esc_url($umaya_image[0]);?>)">
				<!-- bg-overlay -->
				<div class="bg-overlay"></div>
				
				<div class="tv">
				    <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
				    <div id="player" class="screen"></div>
				</div>
				
				<!-- flex-min-height-inner start -->
	  			<div class="flex-min-height-inner">
		  			<!-- container start -->
		  			<div class="container top-bottom-padding-90">
		  				<?php if (( get_post_meta($post->ID,'rnr_umaya_animated_page_video_youtube_sub_title_main_opt',true))):?>
					  	<h2 class="overlay-loading2 medium-title red-color"><?php echo esc_html(get_post_meta($post->ID,'rnr_umaya_animated_page_video_youtube_sub_title_main_opt',true)); ?></h2>
					<?php endif;?>
				  		<h3 class="large-title-bold text-color-4">
							<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_video_youtube_title_opt',true)=='st2'){ ?>
							<?php
							$umaya_page_title = rwmb_meta( 'rnr_umaya_animated_page_video_youtube_title_df_opt' );
							if ( ! empty( $umaya_page_title ) ) {
							foreach ( $umaya_page_title as $umaya_page_titles ) { ;?>
							<?php $umaya_title_delay_opt = isset( $umaya_page_titles['rnr_umaya_animated_page_video_youtube_title_delay_opt'] ) ? $umaya_page_titles['rnr_umaya_animated_page_video_youtube_title_delay_opt'] : ''; ?>
							<span class="overlay-loading2 overlay-light-bg-1 <?php if ( ! empty( $umaya_title_delay_opt ) ) { ?>tr-delay<?php echo esc_attr($umaya_title_delay_opt);?><?php } else { ?>tr-delay01<?php } ;?>"><?php echo esc_html($umaya_page_titles['rnr_umaya_animated_page_video_youtube_title_list_opt']);?></span><br>
							<?php } } ;?> 
							<?php } else { ?>
							<span class="overlay-loading2 overlay-light-bg-1 tr-delay01"><?php the_title();?></span>
							<?php } ;?>
							
							<?php if (( get_post_meta($post->ID,'rnr_umaya_animated_page_video_youtube_typingtxt_main_opt',true))):?>
							<span class="overlay-loading2 overlay-light-bg-1 <?php if (( get_post_meta($post->ID,'rnr_umaya_animated_page_video_youtube_typingtxt_delay_main_opt',true))):?><?php echo esc_attr(get_post_meta($post->ID,'rnr_umaya_animated_page_video_youtube_typingtxt_delay_main_opt',true)); ?><?php else : ?>tr-delay04<?php endif;?>" id="typewriter" data-values="<?php echo esc_attr(get_post_meta($post->ID,'rnr_umaya_animated_page_video_youtube_typingtxt_main_opt',true)); ?>"></span>
							<?php endif;?>
							
						</h3>
						<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_video_youtube_info_opt',true)=='st2'){ ?>
						<p class="d-flex-wrap top-margin-20 text-color-4">
						<?php
						$umaya_page_info = rwmb_meta( 'rnr_umaya_animated_page_video_youtube_info_df_opt' );
						if ( ! empty( $umaya_page_info ) ) {
						foreach ( $umaya_page_info as $umaya_page_infos ) { ;?>
						<?php $umaya_info_delay_opt = isset( $umaya_page_infos['rnr_umaya_animated_page_video_youtube_info_delay_opt'] ) ? $umaya_page_infos['rnr_umaya_animated_page_video_youtube_info_delay_opt'] : ''; ?>
							<span class="small-title-oswald text-height-20 fade-loading <?php if ( ! empty( $umaya_info_delay_opt ) ) { ?>tr-delay<?php echo esc_attr($umaya_info_delay_opt);?><?php } else { ?>tr-delay04<?php } ;?> top-margin-10"><?php echo esc_html($umaya_page_infos['rnr_umaya_animated_page_video_youtube_info_list_opt']);?></span>
						<?php } } ;?>	
						</p>
						<?php } ;?>
		  			</div><!-- container end -->
	  			</div><!-- flex-min-height-inner end -->
	  			
	  			
				<?php if (( get_post_meta($post->ID,'rnr_umaya_animated_page_video_youtube_scroll_opt',true))):?>
	  			<!-- scroll-btn start -->
				<a href="#down" class="scroll-btn pointer-large">
					<div class="scroll-arrow-box">
						<span class="scroll-arrow"></span>
					</div>
					<div class="scroll-btn-flip-box">
						<span class="scroll-btn-flip" data-text="<?php echo esc_attr(get_post_meta($post->ID,'rnr_umaya_animated_page_video_youtube_scroll_opt',true)); ?>"><?php echo esc_attr(get_post_meta($post->ID,'rnr_umaya_animated_page_video_youtube_scroll_opt',true)); ?></span>
					</div>
				 </a><!-- scroll-btn end -->
			<?php endif;?>
			</section><!-- page-head end -->
			
			<?php if (( get_post_meta($post->ID,'rnr_umaya_animated_page_video_youtube_typingtxt_main_opt',true))):?>
			<?php wp_enqueue_script('umaya-typewriter');?>
			<?php endif;?>
			<?php wp_enqueue_script('umaya-youtube');?>