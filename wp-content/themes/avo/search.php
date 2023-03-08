<?php

get_header(); 
		
	//custom header
	if ( class_exists('ReduxFrameworkPlugin') ) { 
		do_action('avo-custom-header','avo_header_start') ;        
	} else { ?>
	
		<!--Fall back if no reduxoptions install-->
		<div class="default-header clearfix">
			<?php get_template_part( 'inc/menu','normal'); ?>
		</div><!--/home end-->		
	<?php } ?>
		
	<div class="content blog-wrapper">  
		<div class="container clearfix">
			 <div class="row clearfix">
				<div class="<?php if (is_active_sidebar( 'default-sidebar' )){ echo 'col-md-8';} 
                    else { echo 'col-md-8 mx-auto';}?> blog-content"> 
					<h3 class="search-title">
						<?php 
						$archive_title=sprintf(
							'%1$s %2$s',
							'<span class="color-accent">' . esc_html_e( 'Search result for:', 'avo' ) . '</span>',
							'&ldquo;' . get_search_query() . '&rdquo;'
						);
						echo wp_kses_post( $archive_title ); 
						?>
					</h3>
					<!--BLOG POST START-->
					<?php if ( have_posts() ) : ?>
					
					<?php while (have_posts()) : the_post(); get_template_part( 'inc/loop', 'post' ); endwhile  ?>
					
					<?php  else: ?>
					<p><?php esc_html_e('We could not find any results for your search. You can give it another try through the search form below.','avo'); ?></p> 
					<div class="no-search-results-form">
						<?php $avo_unique_id = avo_unique_id( 'search-form-' ); ?>
						<form role="search" method="get" id="<?php echo esc_attr( $avo_unique_id ); ?>" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<input type="search" class="focus-input" placeholder="<?php echo esc_attr__('Type search keyword...','avo'); ?>" value="<?php get_search_query()?>" name="s">
							<input type="submit" class="searchsubmit" value=""> 
						</form>
					</div>
					<?php endif; ?>
					<!--BLOG POST END-->
					
					<ul class="pagination clearfix">
						<li><?php  previous_posts_link();  ?></li>
						<li><?php next_posts_link(); ?> </li>
					</ul>
					<div class="spc-40 clearfix"></div>
				</div><!--/.col-md-8-->
				
				<?php get_sidebar(); ?>
			 </div><!--/.row-->
		</div><!--/.container-->
	</div><!--/.blog-wrapper-->
	
	<?php //custom footer
		if ( class_exists('ReduxFrameworkPlugin') ) { 
			do_action('avo-custom-footer','avo_footer_start');
		} else {
			//Fall back if no reduxoptions instalavo
			get_template_part( 'inc/bottom','footer'); 
		}
		
get_footer(); ?>