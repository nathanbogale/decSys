<?php $umaya_options = get_option('umaya'); ?>
<!-- blog start -->
			<div id="down" class="blog container bottom-padding-30 top-padding-120 light-bg-1" data-midnight="black">
				<!-- flex-container start -->
				<div class="flex-container">
				<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<?php global $umaya_sidebar_class; ?>
				<?php $umaya_sidebar_class = "eight-columns";?>
				<?php else : ?>
				<?php $umaya_sidebar_class = "ten-columns one-offset";?>
				<?php endif;?>
					<!-- column start -->
					<div class="<?php echo esc_attr($umaya_sidebar_class);?> latest-news">
					<?php while ( have_posts() ) : the_post(); ?>
						<!-- blog-entry start -->
						<article class="bottom-padding-90">
							<div class="light-bg-1">
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								
								
								<div class="umaya-blog-padding clear"></div>
								
								
									<div class="content-padding-l-r-20" data-animation-container>
									
										
										<div data-animation-child class="fade-anim-box hover-content tr-delay03 p-style-small text-color-1 " data-animation="fade-anim">
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
								
								
							</div>
							</div>
						</article><!-- blog-entry end -->
						<?php endwhile; ?>
						<?php wp_reset_postdata();?>
						
						
					</div><!-- column end -->
					<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
					<!-- column start -->
					<aside class="four-columns bottom-padding-90">
						<!-- sidebar start -->
						<div class="sidebar content-left-margin-40 red-bg">
							<!-- sidebar-box start -->
							<div class="sidebar-box">
							<?php dynamic_sidebar( 'sidebar-2' ); ?>	
							</div><!-- sidebar-box end -->
						</div><!-- sidebar end -->
					</aside><!-- column end -->
					<?php endif;?>
				</div><!-- flex-container end -->
			</div><!-- blog end -->					