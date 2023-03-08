<?php $umaya_options = get_option('umaya'); ?>
<?php get_header(); ?>
<?php if (Umaya_AfterSetupTheme::return_thme_option('textlogo_st')=='st2'){ ?>
	<?php get_template_part('template-parts/main-header-v');?>
<?php } else { ?>
	<?php get_template_part('template-parts/main-header-h');?>
<?php  } ;?>
<main class="js-animsition-overlay" data-animsition-overlay="true">	
<!-- page head start -->
			<section class="pos-rel section-bg-dark-2">
				<!-- pos-rel start -->
				<div class="pos-rel flex-min-height-100vh after-preloader-anim">
					<div class="padding-top-bottom-120 container text-center">
						<!-- title start -->
						<h2 class="headline-xxxxl">
							<span class="anim-text-fill text-color-red" data-text="<?php if(!empty($umaya_options['404_page_title_1'])):?><?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('404_page_title_1',''));?><?php else : ?><?php esc_attr_e('404!','umaya');?><?php endif;?>!"><?php if(!empty($umaya_options['404_page_title_1'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('404_page_title_1',''));?><?php else : ?><?php esc_html_e('404!','umaya');?><?php endif;?></span>
						</h2><!-- title end -->
						<p class="subhead-m anim-fade tr-delay-02"><?php if(!empty($umaya_options['404_page_title_2'])):?><?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('404_page_title_2',''));?><?php else : ?><?php esc_html_e('Page not found','umaya');?><?php endif;?></p>
						<div class="clear"></div>
						<div class="anim-fade tr-delay-04 ">
							<a href="<?php echo esc_url( home_url( '/'  ) ); ?>" class="border-btn js-pointer-large js-animsition-link margin-top-30">
								<span class="border-btn__inner"><?php if(!empty($umaya_options['404_page_title_3'])):?><?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('404_page_title_3',''));?><?php else : ?><?php esc_html_e('Back to home','umaya');?><?php endif;?></span>
								<span class="border-btn__lines-1"></span>
								<span class="border-btn__lines-2"></span>
							</a>
						</div>
					</div>
					
				</div><!-- pos-rel end -->
			</section><!-- page head end -->
<?php get_footer(); ?>	