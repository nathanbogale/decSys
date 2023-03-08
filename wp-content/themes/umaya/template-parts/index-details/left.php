<?php $umaya_options = get_option('umaya'); ?>
<!-- post start -->
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
						<!-- post column start -->
						<div class="<?php echo esc_attr($umaya_sidebar_class);?> column-100-100 padding-top-90">
							<!-- content-bg-light-2 start -->
							<div class="content-bg-light-2 padding-20">
								<!-- entry-content start -->
								<article>
								<div class="body-text-s text-color-black no-vc-inner">
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
								</article><!-- entry-content end -->
								<?php if (Umaya_AfterSetupTheme::return_thme_option('index_details_share')=='st2'){ ?>
								<div class="clear"></div>
								<!-- post share start -->
								<div class="padding-top-60 text-center">
									<span class="subhead-xxs text-color-888888"><?php if(!empty($umaya_options['share_sec_title'])):?><?php echo esc_html(umaya_AfterSetupTheme::return_thme_option('share_sec_title',''));?>:<?php else: ?><?php esc_html_e('Share this article','umaya');?><?php endif;?>:</span>
									<ul class="list list_row list_center padding-top-10 js-scrollanim share-container" data-share="['facebook','twitter','pinterest', 'linkedin']">
										
										<li class="list__item">
											<div class="anim-fade tr-delay-04">
												<a href="#" class="icon-overlay-btn black js-pointer-large">
													<i class="icon-overlay-btn__inner fab fa-behance"></i>
												</a>
											</div>
										</li>
									</ul>
								</div><!-- post share end -->
								<?php wp_enqueue_script('umaya-share');?>
								<?php } ;?>
							</div><!-- content-bg-light-2 end -->
						<?php if (Umaya_AfterSetupTheme::return_thme_option('index_details_related')=='st2'){ ?>
						<div class="clear"></div>						
						<?php $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3,'post_type' => 'post', 'post__not_in' => array($post->ID) ) ); ?>
						<?php if( $related ) { ?>
							<!-- similar posts start -->
							<div class="padding-top-90">
								<h2 class="headline-xxxs text-color-black"><?php if(!empty($umaya_options['related_sec_title'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('related_sec_title',''));?><?php else: ?><?php esc_html_e('You might also like','umaya');?><?php endif;?></h2>

								<!-- flex-container start -->
								<div class="flex-container">
								<?php
								if( $related ) foreach( $related as $post ) {
								setup_postdata($post); 
								?>
								<?php if (has_post_thumbnail( $post->ID ) ):
								$umaya_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'umaya_portfolio_image' );?>
									<!-- column start -->
									<div class="four-columns padding-top-30">
										<a href="<?php the_permalink();?>" class="column-r-margin-20 d-block hover-box js-pointer-large js-animsition-link">
											<div class="hidden-box">
												<img class="img-hover-scale" src="<?php echo esc_url($umaya_image[0]);?>" alt="<?php the_title_attribute ();?>">
											</div>
											<h3 class="headline-xxxxs text-color-black margin-top-10 hover-move-right"><?php the_title();?></h3>
										</a>
									</div><!-- column end -->
									<?php endif; ?>
									<?php }
									wp_reset_postdata();?>
								</div><!-- flex-container end -->
							</div><!-- similar posts end -->
							<?php } ;?>
							<?php } ;?>
							<?php if ( comments_open() || get_comments_number() ) { ?>
							<div class="clear"></div>
							<!-- comments start -->
							<?php comments_template();?>
							<?php } ;?>
						</div><!-- post column end -->

						
						
					</div><!-- flex-container end -->
				</div><!-- pos-rel end -->
			</div><!-- post end -->
<?php if (Umaya_AfterSetupTheme::return_thme_option('index_details_pagi_opt')=='st2'){ ?>
<?php $umaya_next_post = get_next_post();
$umaya_next_url = is_object( $umaya_next_post ) ? get_permalink( $umaya_next_post->ID ) : '';
$umaya_next_title = is_object( $umaya_next_post ) ? wp_trim_words(get_the_title( $umaya_next_post->ID ), 3) : '';
if ($umaya_next_post) {
$umaya_next_image = wp_get_attachment_image_src( get_post_thumbnail_id( $umaya_next_post->ID ), 'umaya_portfolio_image' );
} ?>
<?php $umaya_previous_post = get_previous_post();
$umaya_previous_url = is_object( $umaya_previous_post ) ? get_permalink( $umaya_previous_post->ID ) : '';
$umaya_previous_title = is_object( $umaya_previous_post ) ? wp_trim_words(get_the_title( $umaya_previous_post->ID ), 3) : '';
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
								
								<!-- title start -->
								<div class="margin-bottom-30">
									<a href="<?php echo esc_url( $umaya_next_url ); ?>" class="d-inline-block hidden-box js-pointer-large js-animsition-link">
										<h2 class="headline-xs anim-slide"><?php echo esc_html( $umaya_next_title ); ?></h2>
									</a>
								</div><!-- title end -->

								<!-- button start -->
								<a href="<?php echo esc_url( $umaya_next_url ); ?>" class="skew-btn skew-btn_reverse js-pointer-large js-animsition-link anim-fade tr-delay-04">
									<span class="skew-btn__box">
										<span class="skew-btn__content"><?php esc_html_e('Prev Article','umaya');?></span>
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
								
								<!-- title start -->
								<div class="margin-bottom-30">
									<a href="<?php echo esc_url( $umaya_next_url ); ?>" class="d-inline-block hidden-box js-pointer-large js-animsition-link">
										<h2 class="headline-xs anim-slide"><?php echo esc_html( $umaya_next_title ); ?></h2>
									</a>
								</div><!-- title end -->

								<!-- button start -->
								<a href="<?php echo esc_url( $umaya_next_url ); ?>" class="skew-btn skew-btn_reverse js-pointer-large js-animsition-link anim-fade tr-delay-04">
									<span class="skew-btn__box">
										<span class="skew-btn__content"><?php esc_html_e('Prev Article','umaya');?></span>
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
								<!-- title start -->
								<div class="margin-bottom-30">
									<a href="<?php echo esc_url( $umaya_previous_url ); ?>" class="d-inline-block hidden-box js-pointer-large js-animsition-link">
										<h2 class="headline-xs anim-slide"><?php echo esc_html( $umaya_previous_title ); ?></h2>
									</a>
								</div><!-- title end -->

								<!-- button start -->
								<a href="<?php echo esc_url( $umaya_previous_url ); ?>" class="skew-btn js-pointer-large js-animsition-link anim-fade tr-delay-04">
									<span class="skew-btn__box">
										<span class="skew-btn__content"><?php esc_html_e('Next Article','umaya');?></span>
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
								<!-- title start -->
								<div class="margin-bottom-30">
									<a href="<?php echo esc_url( $umaya_previous_url ); ?>" class="d-inline-block hidden-box js-pointer-large js-animsition-link">
										<h2 class="headline-xs anim-slide"><?php echo esc_html( $umaya_previous_title ); ?></h2>
									</a>
								</div><!-- title end -->

								<!-- button start -->
								<a href="<?php echo esc_url( $umaya_previous_url ); ?>" class="skew-btn js-pointer-large js-animsition-link anim-fade tr-delay-04">
									<span class="skew-btn__box">
										<span class="skew-btn__content"><?php esc_html_e('Next Article','umaya');?></span>
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
			<?php } ;?>