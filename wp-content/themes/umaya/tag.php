<?php $umaya_options = get_option('umaya'); ?>
<?php get_header(); ?>	
<!-- logo for theme options -->
<?php if (Umaya_AfterSetupTheme::return_thme_option('textlogo_st')=='st2'){ ?>
<?php get_template_part('template-parts/main-header-v');?>
<?php } else { ?>
<?php get_template_part('template-parts/main-header-h');?>
<?php  } ;?>
<!-- main start -->
<main class="js-animsition-overlay" data-animsition-overlay="true">
<!-- pos-rel start -->
			<section id="up" class="pos-rel section-bg-dark-1 js-parallax-bg" style="background-image:url(<?php echo esc_url(Umaya_AfterSetupTheme::return_thme_option('blog_sidebar_back_opt','url'));?>)">
				<!-- bg-overlay -->
				<div class="bg-overlay-black"></div>
				<!-- lines-container start -->
				<div class="lines-container pos-rel anim-lines flex-min-height-100vh">
					<div class="padding-top-bottom-120 width-100perc">
						<!-- title start -->
						<h2 class="headline-xxxxl text-center hidden-box after-preloader-anim">
							<span class="anim-slide">
							<?php if ( is_category() ) { ?>
								<?php if(!empty($umaya_options['cat-page-title'])):?>
									<?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('cat-page-title',''));?>
								<?php else :?>
									<?php esc_html_e('Category','umaya');?>
								<?php endif;?>
							<?php } else if ( is_tag() ) { ?>
								<?php if(!empty($umaya_options['tag-page-title'])):?>
									<?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('tag-page-title',''));?>
								<?php else :?>
									<?php esc_html_e('Tag','umaya');?>
								<?php endif;?>
							<?php } else if ( is_archive() ) { ?>
								<?php if(!empty($umaya_options['arch-page-title'])):?>
									<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('arch-page-title',''));?>
								<?php else :?>
									<?php esc_html_e('Archive','umaya');?>
								<?php endif;?>
							<?php } else { ?>
								<?php if(!empty($umaya_options['blogtitle'])):?>
									<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('blogtitle',''));?>
								<?php else :?>
									<?php esc_html_e('My Blog','umaya');?>
								<?php endif;?>
							<?php } ?>
							</span>
						</h2><!-- title end -->
					</div>
				</div><!-- lines-container end -->
			</section><!-- pos-rel end -->

<?php if (Umaya_AfterSetupTheme::return_thme_option('blogtyle')=='st2'){ ?>
<?php get_template_part('template-parts/index/blog-left');?>
<?php } else if (Umaya_AfterSetupTheme::return_thme_option('blogtyle')=='st3'){ ?>
<?php get_template_part('template-parts/index/full');?>
<?php } else { ?>
<?php get_template_part('template-parts/index/blog-right');?>
<?php } ;?>
<?php get_footer(); ?>	
