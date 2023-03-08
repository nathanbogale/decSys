<?php $umaya_options = get_option('umaya'); ?>
<?php get_header(); ?>	
<section id="up" class="page-head flex-min-height-box dark-bg-1">
				<!-- page-head-bg -->
				<div class="page-head-bg overlay-loading2" style="background-image: url(<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>);"></div>
				
				<!-- flex-min-height-inner start -->
	  			<div class="flex-min-height-inner">
		  			<!-- flex-container start -->
		  			<div class="container top-bottom-padding-120 flex-container response-999">
			  			<!-- column start -->
			  			<div class="six-columns six-offset">
				  			<div class="content-left-margin-40">
				  				<h2 class="large-title-bold">
									<?php if(!empty($umaya_options['cat-page-title'])):?>
									<span class="load-title-fill tr-delay03" data-text="<?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('cat-page-title',''));?>"><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('cat-page-title',''));?></span><br>
									<?php else : ?>
									<span class="load-title-fill tr-delay03" data-text="<?php esc_attr_e('Category','umaya');?>"><?php esc_html_e('Category','umaya');?></span><br>
									<?php endif;?>
								</h2>
								
								<p class="p-style-bold-up text-height-20 d-flex-wrap">
									<span class="load-title-fill tr-delay08" data-text="<?php single_cat_title( '', true ); ?>"><?php single_cat_title( '', true ); ?></span>
								</p>
								
								
				  			</div>
			  			</div><!-- column end -->
		  			</div><!-- flex-container end -->
	  			</div><!-- flex-min-height-inner end -->
	  			
	  			<!-- scroll-btn start -->
				<a href="#down" class="scroll-btn pointer-large">
					<div class="scroll-arrow-box">
						<span class="scroll-arrow"></span>
					</div>
					<div class="scroll-btn-flip-box">
						<span class="scroll-btn-flip" data-text="<?php if(!empty($umaya_options['translet_opt_1'])):?><?php echo esc_attr(Umaya_AfterSetupTheme::return_thme_option('translet_opt_1',''));?><?php else : ?><?php esc_attr_e('Scroll','umaya');?><?php endif;?>"><?php if(!empty($umaya_options['translet_opt_1'])):?><?php echo esc_html(Umaya_AfterSetupTheme::return_thme_option('translet_opt_1',''));?><?php else : ?><?php esc_html_e('Scroll','umaya');?><?php endif;?></span>
					</div>
				 </a><!-- scroll-btn end -->
			</section><!-- page-head end -->
<!-- dark-bg-2 start -->
			<section id="down" class="dark-bg-2 top-padding-120 no-padding-bottom full-width-section">
				<!-- container start -->
				<div class="container container-after">					
					
					
					<!-- works start -->				
                    <div class="works isotope-items-wrap no-hide-last loadmore-wrapper" data-load-item="9" data-button-text="<?php esc_attr_e('Load More', 'umaya');?>">
					<?php global $loop; 
					$args = array_merge( $wp_query->query, array( 'post_type' => 'portfolio', 'posts_per_page'=>-1, ) );
					query_posts( $args );?>	
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php $umaya_portfolio_category = wp_get_post_terms($post->ID,'portfolio_category');?>
					<?php 
					$umaya_class = ""; 
					$umaya_categories = ""; 
					foreach ($umaya_portfolio_category as $umaya_item) {
					$umaya_class.=esc_attr($umaya_item->slug . ' ');
					$umaya_categories.='';
					$umaya_categories.=esc_attr($umaya_item->name . '  ');
					$umaya_categories.='';
					}?>
					<?php if (has_post_thumbnail( $post->ID ) ):
					$umaya_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );?>
					
	                    <!-- grid-item start -->
						<a href="<?php the_permalink();?>" class="animsition-link grid-item <?php echo esc_attr($umaya_class);?>">
                            <div class="work_item pointer-large hover-box hidden-box">
                                <img class="hover-img" src="<?php echo esc_url($umaya_image[0]);?>" alt="<?php the_title_attribute();?>">
                                <div class="works-content">
                    	            <span class="small-title-oswald red-color work-title-overlay"><?php echo esc_attr($umaya_categories);?></span>
									<h3 class="title-style text-color-4">
									<?php if(get_post_meta($post->ID,'rnr_umaya_animated_portfolio_page_title_opt',true)=='st2'){ ?>
									<?php
									$umaya_page_title = rwmb_meta( 'rnr_umaya_portfolio_page_title_df_opt' );
									if ( ! empty( $umaya_page_title ) ) {
									foreach ( $umaya_page_title as $umaya_page_titles ) {
									$umaya_title_delay_opt = isset( $umaya_page_titles['rnr_umaya_portfolio_page_title_delay_opt'] ) ? $umaya_page_titles['rnr_umaya_portfolio_page_title_delay_opt'] : '';
									if ( ! empty( $umaya_title_delay_opt ) ) {
									$umaya_title_delay ='work-title-delay'.$umaya_title_delay_opt.'';
									}
									else {
									$umaya_title_delay ='work-title-delay03';
									};
									?>
									<span class="work-title-overlay <?php echo esc_attr($umaya_title_delay);?>"><?php echo esc_html($umaya_page_titles['rnr_umaya_portfolio_page_title_list_opt'])?></span><br>
									<?php } };?>
									<?php } else { ?>
									<span class="work-title-overlay work-title-delay01"><?php the_title();?></span><br>
									<?php } ;?>
									
									</h3>
                                </div>
                            </div>
                        </a><!-- grid-item end -->
                      <?php endif;?>
					  <?php  endwhile; endif; wp_reset_postdata(); ?>  
                    </div><!-- works end -->	
                </div><!-- container end -->       
			</section><!-- dark-bg-2 end -->
			<?php wp_enqueue_script( 'umaya-loadmore-filter' ); ?>
<?php get_footer(); ?>