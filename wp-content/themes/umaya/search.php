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
					<div class="padding-top-bottom-120 width-100perc text-center after-preloader-anim">
						<!-- title start -->
						<h2 class="headline-xxxxl  hidden-box ">
							<span class="anim-slide">
							<?php if(!empty($umaya_options['search-page-title'])):?>
								<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('search-page-title',''));?>
							<?php else :?>
								<?php esc_html_e('Search','umaya');?>
							<?php endif;?>
							</span>
						</h2><!-- title end -->
						<p class="subhead-xs text-color-dadada margin-top-20 anim-fade tr-delay-04"><?php printf( esc_attr__( 'Results for %s', 'umaya' ), '' . get_search_query() . '' ); ?></p>
					</div>
				</div><!-- lines-container end -->
			</section><!-- pos-rel end -->

<!-- blog start -->
<!-- blog start -->
			<div id="down" class="pos-rel section-bg-light-1" data-midnight="black">
				<!-- pos-rel start -->
				<div class="pos-rel padding-top-30 padding-bottom-120">
					<!-- flex-container start -->
					<div class="container flex-container">
					
						<!-- blog column start -->
						<div class="ten-columns one-offset column-100-100">
						<?php if(have_posts()) : ?>
						<?php global $post, $post_id;
						?>
						<?php while ( have_posts() ) : the_post();?>
						<?php $umaya_category = wp_get_post_terms($post->ID,'category');?>
						<?php 
						$umaya_class = ""; 
						$umaya_categories = ""; 
						foreach ($umaya_category as $umaya_item) {
						$umaya_class.=esc_attr($umaya_item->slug . ' ');
						$umaya_categories.='<a href="'.get_category_link($umaya_item->term_id).'">';
						$umaya_categories.=esc_attr($umaya_item->name . '  ');
						$umaya_categories.='</a>';
						}?>
							<!-- blog-entry start -->
							<article class="padding-top-90">
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="content-bg-light-2 <?php if (has_post_thumbnail( $post->ID ) ):?>has-image-umaya<?php else : ?>padding-top-5<?php endif;?>" >
									<a href="<?php the_permalink();?>" class="d-block hover-box js-pointer-large js-animsition-link">
										<?php if (has_post_thumbnail( $post->ID ) ):?>
										<?php $umaya_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
										<div class="hidden-box anim-overlay js-scrollanim">
											<img class="img-hover-scale" src="<?php echo esc_url($umaya_image[0]);?>" alt="<?php the_title_attribute ();?>">
										</div>
										<?php endif;?>
										<div class="margin-left-right-20 margin-top-20">
											<h3 class="headline-xxxs hover-move-right text-color-black"><?php the_title();?></h3><br>
											<div class="body-text-xs text-color-black margin-top-20 hover-move-right tr-delay-01">
											<?php the_excerpt();?>
											</div>
										</div>
									</a>
									<ul class="list list_row list_margin-30px padding-top-bottom-30 margin-left-right-20">
										<li class="list__item">
											<a href="#" class="subhead-xxs text-color-888888 text-hover-to-red js-pointer-small"><?php if(!empty($umaya_options['translet_opt_1'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('translet_opt_1',''));?><?php else : ?><?php esc_html_e('By','umaya');?><?php endif;?>: <?php the_author();?></a>
										</li>
										<?php if( has_category() ) {?>
										<li class="list__item">
											<div class="subhead-xxs text-color-888888  ">
											<?php if(!empty($umaya_options['translet_opt_2'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('translet_opt_2',''));?><?php else : ?><?php esc_html_e('In','umaya');?><?php endif;?>: <?php foreach ($umaya_category as $umaya_item) { ?><a href="<?php echo esc_url(get_category_link($umaya_item->term_id));?>" class="text-hover-to-red js-pointer-small"><?php echo esc_html($umaya_item->name . '  ');?></a><?php } ;?></div>
										</li>
										<?php } ;?>
										<li class="list__item">
											<a href="#" class="subhead-xxs text-color-888888 text-hover-to-red js-pointer-small"><?php the_time( get_option( 'date_format' ) ); ?></a>
										</li>
									</ul>
								</div>
								</div>
							</article><!-- blog-entry end -->

							<?php 
							endwhile; ?>
							<?php wp_reset_postdata();?> 
							<!-- pagination start -->
							<?php if (function_exists("umaya_pagination")) {
							umaya_pagination($wp_query->max_num_pages);
							} ?>
							<!-- pagination end -->
							<?php else : ?>
							<article class="padding-top-90">
								<div class="content-bg-light-2 padding-top-bottom-90 text-center">
									<div class="margin-left-right-20">
										<h3 class="headline-xxxs hover-move-right text-color-black"><?php esc_html_e('No Results Found','umaya');?></h3><br>
									</div>
								</div>
							</article>
							<?php endif;?>

							
						</div><!-- blog column end -->
						
					</div><!-- flex-container end -->
				</div><!-- pos-rel end -->
			</div><!-- blog end -->	
<!-- blog end -->	
<?php get_footer(); ?>	
