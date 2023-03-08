<?php $umaya_options = get_option('umaya'); ?>
<!-- page head start -->
			<section id="up" class="<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_def_line_opt',true)!='st2'){ ?>lines-section <?php } ;?> pos-rel anim-lines section-bg-dark-1">
				<!-- lines-container start -->
				<div class="<?php if(get_post_meta($post->ID,'rnr_umaya_animated_page_def_line_opt',true)!='st2'){ ?>lines-container <?php } ;?> pos-rel no-lines flex-min-height-100vh">
					<div class="container padding-top-bottom-120 after-preloader-anim">
						<h3 class="<?php if (( get_post_meta($post->ID,'rnr_umaya_animated_page_default_header_title_font_size_opt',true))):?><?php echo esc_attr(get_post_meta($post->ID,'rnr_umaya_animated_page_default_header_title_font_size_opt',true)); ?><?php else : ?>headline-l<?php endif;?> hidden-box">
							<span class="anim-slide"><?php if (( get_post_meta($post->ID,'rnr_umaya_page_title_main_opt',true))):?><?php echo esc_html(get_post_meta($post->ID,'rnr_umaya_page_title_main_opt',true)); ?><?php else : ?><?php the_title();?><?php endif;?></span>
						</h3>
						<?php if (( get_post_meta($post->ID,'rnr_umaya_page_sub_title_main_opt',true))):?>
						<h2 class="<?php if (( get_post_meta($post->ID,'rnr_umaya_animated_page_default_header_sub_title_font_size_opt',true))):?><?php echo esc_attr(get_post_meta($post->ID,'rnr_umaya_animated_page_default_header_sub_title_font_size_opt',true)); ?><?php else : ?>subhead-xxl<?php endif;?> margin-top-20 anim-text-reveal tr-delay-03"><?php echo esc_html(get_post_meta($post->ID,'rnr_umaya_page_sub_title_main_opt',true)); ?></h2>
						<?php endif;?>
					</div>
				</div><!-- lines-container end -->
			</section><!-- page head end -->