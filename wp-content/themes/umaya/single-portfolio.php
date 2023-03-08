<?php $umaya_options = get_option('umaya'); ?>
<?php get_header();?>
<?php if (is_page()||is_single()) { ?>
<!-- 1st condition -->
<?php if(get_post_meta($post->ID,'rnr_umaya_page_header_logo_style_selector_opt',true)=='st2'){ ?> 
	<!-- 2nd condition -->
	<?php if(get_post_meta($post->ID,'rnr_umaya_page_header_logo_style_selector_opt',true)=='st2'){ ?> 
	<?php get_template_part('template-parts/main-header-v');?>
	<?php } else { ?>
	<?php get_template_part('template-parts/main-header-h');?>
	<?php  } ;?>
<?php } else { ?>
<?php if (Umaya_AfterSetupTheme::return_thme_option('textlogo_st')=='st2'){ ?>
<?php get_template_part('template-parts/main-header-v');?>
<?php } else { ?>
<?php get_template_part('template-parts/main-header-h');?>
<?php  } ;?>
<?php } ;?>
<?php } else { ?>
<!-- logo for theme options -->
<?php if (Umaya_AfterSetupTheme::return_thme_option('textlogo_st')=='st2'){ ?>
<?php get_template_part('template-parts/main-header-v');?>
<?php } else { ?>
<?php get_template_part('template-parts/main-header-h');?>
<?php  } ;?>
<?php  } ;?>
<!-- main start -->
<main class="js-animsition-overlay" data-animsition-overlay="true">
<?php if(get_post_meta($post->ID,'rnr_umaya_page_header_selector_opt',true)=='st2'){ ?> 
<?php get_template_part('template-parts/header/slider');?>
<?php }
else if(get_post_meta($post->ID,'rnr_umaya_page_header_selector_opt',true)=='st3'){ ?> 
<?php get_template_part('template-parts/header/mp4_video');?>
<?php }

else if(get_post_meta($post->ID,'rnr_umaya_page_header_selector_opt',true)=='st5'){ ?> 
<?php get_template_part('template-parts/header/fullscreen_image');?>
<?php }

else if(get_post_meta($post->ID,'rnr_umaya_page_header_selector_opt',true)=='st4'){ ?> 
<?php get_template_part('template-parts/header/rev_slider');?>
<?php }
else if(get_post_meta($post->ID,'rnr_umaya_page_header_selector_opt',true)=='st6'){ ?> 

<?php }
else  { ?>
<?php get_template_part('template-parts/header/default');?>
<?php }?>

 <?php while ( have_posts() ) : the_post(); ?>
<?php if(get_post_meta($post->ID,'rnr_wr_portfoliotype_container',true)=='st2'){ ?>
<div id="down">
<?php the_content();
wp_link_pages( array(
'before'      => '<div class="page-links">',
'after'       => '</div>',
'link_before' => '<span>',
'link_after'  => '</span>',
'pagelink'    => '%',
'separator'   => '',
) );
?>
</div>
<?php } else { ?>
<section id="down" class="padding-top-90 padding-bottom-120 text-color-black section-bg-light-1" data-midnight="black">
<!-- container start -->
<div class="container">
<div class="flex-container">

<?php the_content();
wp_link_pages( array(
'before'      => '<div class="page-links">',
'after'       => '</div>',
'link_before' => '<span>',
'link_after'  => '</span>',
'pagelink'    => '%',
'separator'   => '',
) );
?>

</div>
</div>
</section>
<?php };?>
<?php $umaya_next_post = get_next_post();
$umaya_next_url = is_object( $umaya_next_post ) ? get_permalink( $umaya_next_post->ID ) : '';
$umaya_next_title = is_object( $umaya_next_post ) ? get_the_title( $umaya_next_post->ID ) : ''; 
if ($umaya_next_post) {
$umaya_next_image = wp_get_attachment_image_src( get_post_thumbnail_id( $umaya_next_post->ID ), 'umaya_portfolio_image' );
} ?>
<?php $umaya_previous_post = get_previous_post();
$umaya_previous_url = is_object( $umaya_previous_post ) ? get_permalink( $umaya_previous_post->ID ) : '';
$umaya_previous_title = is_object( $umaya_previous_post ) ? get_the_title( $umaya_previous_post->ID ) : '';
if ($umaya_previous_post) { 
$umaya_previous_image = wp_get_attachment_image_src( get_post_thumbnail_id( $umaya_previous_post->ID ), 'umaya_portfolio_image' );
}?>
<!-- prev/next project start -->
			<section class="flex-container section-bg-dark-1">
				<?php if ($umaya_previous_post) { ?>
				<?php  if ($umaya_next_post) { ?>
				<!-- prev project start -->
				<div class="six-columns column-100-100 pos-rel bg-img-cover" style="background-image:url(<?php echo esc_url($umaya_next_image[0]);?>)">
					<!-- bg-overlay -->
					<div class="bg-overlay-black"></div>
					<!-- pos-rel start -->
					<div class="pos-rel">
						<div class="padding-top-bottom-150 text-center">
							<div class="js-scrollanim margin-left-right-20">
								<span class="subhead-s anim-fade"><?php esc_html_e('Prev Project:','umaya');?></span>

								<!-- title start -->
								<div class="margin-top-10 margin-bottom-30">
									<a href="<?php echo esc_url( $umaya_next_url ); ?>" class="d-inline-block hidden-box js-pointer-large js-animsition-link">
										<h2 class="headline-l anim-slide"><?php echo esc_html( $umaya_next_title ); ?></h2>
									</a>
								</div><!-- title end -->

								<!-- button start -->
								<a href="<?php echo esc_url( $umaya_next_url ); ?>" class="skew-btn skew-btn_reverse js-pointer-large js-animsition-link anim-fade tr-delay-04">
									<span class="skew-btn__box">
										<span class="skew-btn__content"><?php esc_html_e('See the case','umaya');?></span>
										<span class="skew-btn__arrow"></span>
									</span>
								</a><!-- button end -->
							</div>
						</div>
					</div><!-- pos-rel end -->
				</div><!-- prev project end -->
				<?php } ;?>
				<?php } else { ?>
				<?php  if ($umaya_next_post) { ?>
				<!-- prev project start -->
				<div class="twelve-columns column-100-100 pos-rel bg-img-cover" style="background-image:url(<?php echo esc_url($umaya_next_image[0]);?>)">
					<!-- bg-overlay -->
					<div class="bg-overlay-black"></div>
					<!-- pos-rel start -->
					<div class="pos-rel">
						<div class="padding-top-bottom-150 text-center">
							<div class="js-scrollanim margin-left-right-20">
								<span class="subhead-s anim-fade"><?php esc_html_e('Prev Project:','umaya');?></span>

								<!-- title start -->
								<div class="margin-top-10 margin-bottom-30">
									<a href="<?php echo esc_url( $umaya_next_url ); ?>" class="d-inline-block hidden-box js-pointer-large js-animsition-link">
										<h2 class="headline-l anim-slide"><?php echo esc_html( $umaya_next_title ); ?></h2>
									</a>
								</div><!-- title end -->

								<!-- button start -->
								<a href="<?php echo esc_url( $umaya_next_url ); ?>" class="skew-btn skew-btn_reverse js-pointer-large js-animsition-link anim-fade tr-delay-04">
									<span class="skew-btn__box">
										<span class="skew-btn__content"><?php esc_html_e('See the case','umaya');?></span>
										<span class="skew-btn__arrow"></span>
									</span>
								</a><!-- button end -->
							</div>
						</div>
					</div><!-- pos-rel end -->
				</div><!-- prev project end -->
				<?php } ;?>
				<?php } ;?>
				<?php if ($umaya_next_post) { ?>
				<?php  if ($umaya_previous_post) { ?>
				<!-- next project start -->
				<div class="six-columns column-100-100 pos-rel bg-img-cover" style="background-image:url(<?php echo esc_url($umaya_previous_image[0]);?>)">
					<!-- bg-overlay -->
					<div class="bg-overlay-black"></div>
					<!-- pos-rel start -->
					<div class="pos-rel">
						<div class="padding-top-bottom-150 text-center">
							<div class="js-scrollanim margin-left-right-20">
								<span class="subhead-s anim-fade"><?php esc_html_e('Next Project:','umaya');?></span>

								<!-- title start -->
								<div class="margin-top-10 margin-bottom-30">
									<a href="<?php echo esc_url( $umaya_previous_url ); ?>" class="d-inline-block hidden-box js-pointer-large js-animsition-link">
										<h2 class="headline-l anim-slide"><?php echo esc_html( $umaya_previous_title ); ?></h2>
									</a>
								</div><!-- title end -->

								<!-- button start -->
								<a href="<?php echo esc_url( $umaya_previous_url ); ?>" class="skew-btn js-pointer-large js-animsition-link anim-fade tr-delay-04">
									<span class="skew-btn__box">
										<span class="skew-btn__content"><?php esc_html_e('See the case','umaya');?></span>
										<span class="skew-btn__arrow"></span>
									</span>
								</a><!-- button end -->
							</div>
						</div>
					</div><!-- pos-rel end -->
				</div><!-- next project end -->
				<?php } ;?>
				<?php } else { ?>
				<?php  if ($umaya_previous_post) { ?>
				<!-- next project start -->
				<div class="twelve-columns column-100-100 pos-rel bg-img-cover" style="background-image:url(<?php echo esc_url($umaya_previous_image[0]);?>)">
					<!-- bg-overlay -->
					<div class="bg-overlay-black"></div>
					<!-- pos-rel start -->
					<div class="pos-rel">
						<div class="padding-top-bottom-150 text-center">
							<div class="js-scrollanim margin-left-right-20">
								<span class="subhead-s anim-fade"><?php esc_html_e('Next Project:','umaya');?></span>

								<!-- title start -->
								<div class="margin-top-10 margin-bottom-30">
									<a href="<?php echo esc_url( $umaya_previous_url ); ?>" class="d-inline-block hidden-box js-pointer-large js-animsition-link">
										<h2 class="headline-l anim-slide"><?php echo esc_html( $umaya_previous_title ); ?></h2>
									</a>
								</div><!-- title end -->

								<!-- button start -->
								<a href="<?php echo esc_url( $umaya_previous_url ); ?>" class="skew-btn js-pointer-large js-animsition-link anim-fade tr-delay-04">
									<span class="skew-btn__box">
										<span class="skew-btn__content"><?php esc_html_e('See the case','umaya');?></span>
										<span class="skew-btn__arrow"></span>
									</span>
								</a><!-- button end -->
							</div>
						</div>
					</div><!-- pos-rel end -->
				</div><!-- next project end -->
				<?php } ;?>
				<?php } ;?>
			</section><!-- prev/next project end -->
<?php endwhile; ?>
<?php wp_reset_postdata();?>
<?php get_footer(); ?>