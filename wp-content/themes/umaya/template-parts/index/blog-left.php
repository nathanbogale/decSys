<?php $umaya_options = get_option('umaya'); ?>
<!-- blog start -->
			<div id="down" class="pos-rel section-bg-light-1" data-midnight="black">
				<!-- pos-rel start -->
				<div class="pos-rel padding-top-30 padding-bottom-120">
					<!-- flex-container start -->
					<div class="container flex-container">
					<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
					<?php global $umaya_sidebar_class; ?>
					<?php $umaya_sidebar_class = "eight-columns";?>
					<?php else : ?>
					<?php $umaya_sidebar_class = "ten-columns one-offset";?>
					<?php endif;?>
					
					<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
						<!-- sidebar column start -->
						<aside class="four-columns column-100-100 padding-top-90">
							<!-- column-l-margin-40-999 start -->
							<div class="column-r-margin-40-999">
								
									<!-- content-bg-light-2 start -->
									
										

									<?php dynamic_sidebar( 'sidebar-1' ); ?>	

										
									<!-- content-bg-light-2 end -->
								
							</div><!-- column-l-margin-40-999 end -->
						</aside><!-- sidebar column end -->
						<?php endif;?>
						<!-- blog column start -->
						<div class="<?php echo esc_attr($umaya_sidebar_class);?> column-100-100">
						<?php
						global $post, $post_id ;?>
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
								<div class="content-bg-light-2 <?php if (has_post_thumbnail( $post->ID ) ):?>has-image-umaya<?php else : ?>padding-top-5<?php endif;?>">
									<a href="<?php the_permalink();?>" class="d-block hover-box js-pointer-large js-animsition-link">
										<?php if (has_post_thumbnail( $post->ID ) ):?>
										<?php $umaya_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'umaya_portfolio_image' );?>
										<div class="hidden-box anim-overlay js-scrollanim">
											<img class="img-hover-scale" src="<?php echo esc_url($umaya_image[0]);?>" alt="<?php the_title_attribute ();?>">
										</div>
										<?php endif;?>
										<div class="margin-left-right-20 margin-top-20">
											<h3 class="headline-xxxs hover-move-right text-color-black"><?php the_title();?></h3><br>
											<div class="body-text-xs text-color-black margin-top-20 hover-move-right tr-delay-01">
											<?php if( wp_link_pages('echo=0') ): ?>
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
											<?php else : ?>
											<?php the_excerpt();?>
											<?php endif;?>
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

							<?php endwhile; ?>
							<?php wp_reset_postdata();?>

							<!-- pagination start -->
							<?php if (function_exists("umaya_pagination")) {
							umaya_pagination($wp_query->max_num_pages);
							} ?>
							<!-- pagination end -->
						</div><!-- blog column end -->
						
					</div><!-- flex-container end -->
				</div><!-- pos-rel end -->
			</div><!-- blog end -->			