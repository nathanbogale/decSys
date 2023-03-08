

<!--Post style 2-->      

<div class="content blog-wrapper post-style-3">  
	<div class="container clearfix">
		<div class="row clearfix">
			<?php 
			if ( class_exists('ReduxFrameworkPlugin') && (avo_option( 'single_sidebar_def_width' ) =='9')) {
				$side_bar_width='col-md-9';
			}else{$side_bar_width='col-md-8';} 
			if ( class_exists('ReduxFrameworkPlugin') && (avo_option( 'avo_sidebar_format' ) =='left_sidebar')) {
						get_sidebar(); }
			if ( class_exists('ReduxFrameworkPlugin') && (avo_option( 'avo_sidebar_format' ) !='no_sidebar')) {
						$side_status='show'; } else{$side_status='';}?>

			<div class="<?php if (is_active_sidebar( 'default-sidebar' ) && $side_status=='show' ){ echo esc_attr($side_bar_width);}
						elseif ( get_post_meta($post->ID, 'avo_sidebar_format', true) == 'no_sidebar' ){ 
				echo 'col-md-12';
				}else{echo 'col-md-12';} ?> blog-content">

				<!--BLOG POST START-->
				<?php while (have_posts()) : the_post(); ?>

					<article id="post-<?php  the_ID(); ?>" <?php  post_class('clearfix blog-post'); ?>>
						<div class="entry-header" >
							<!--if post is standard-->
						<?php 
						$media=get_the_post_thumbnail_url();
						if ( get_post_meta($post->ID, 'post_format', true) == ''){ echo '<div class="blog-post_bg_media" style="background-image:url('.esc_url($media).')"'.'></div>';}
						?>

							<div class="entery-header-data">
								<span class="post-date"> <?php the_time('<\s\p\a\n>d</\s\p\a\n> F'); ?> </span>
								<?php if(has_category()) { ?>
								<span class="post-category"> <?php the_category(' / '); ?></span>
								<?php }?>
		 						<h3 class="entry-title"><?php the_title(); ?></h3> 

								<ul class="post-detail">
									<li><i class="lnr lnr-user fw-600"></i> <?php the_author_posts_link(); ?> </li>
					  				<?php if(get_the_tag_list()) { ?>
		  							<li><i class="lnr lnr-tag"></i><?php the_tags('', ', '); ?></li> 
		  							<?php }?>
					  				<li>
					  					<i class="lnr lnr-bubble"></i> 
					  					<?php 
					  					if(get_comments_number()==1){
					  					echo esc_attr($post->comment_count).esc_attr__(' Comment','avo'); 
					  					}else{
				  						echo esc_attr($post->comment_count).esc_attr__(' Comments','avo'); 
				  						}

					  					?>
					  				</li>   
					  					
				  				</ul>
			  				</div>
						</div>

		  				<div class="spc-20 clearfix"></div>

		  				<?php the_content(); ?>
		  				<div class="spc-20 clearfix"></div>
		  				<div class="post-pager clearfix">
							<?php wp_link_pages(); ?>
						</div>

						<?php if(function_exists('sharebox') || get_the_tag_list()) { ?>

							<div class="post-bottom">
							
								<?php if(get_the_tag_list()) { ?>
								<div class="tags-bottom"><?php the_tags('Tags:  ', '  '); ?></div><!--/.sharebox-->
								<?php }?>
								<div class="sharebox"></div><!--/.sharebox-->
								<div class="border-post clearfix"></div>
							</div>
						<?php }?>

						<!--RELATED POST-->
						<?php get_template_part( 'inc/related', 'posts' ); ?>
						<!--RELATED POST END--> 

							<?php   if ( !post_password_required() ) { //only show comment if post not password protected

							// If comments are open or we have at least one comment, load up the comment template.
							   if (  comments_open() || get_comments_number()) :
								   comments_template();

						   endif; }?>

					</article><!--/.blog-post-->
					<!--BLOG POST END-->    
				<?php endwhile; ?>
					<div class="img-pagination">
						<?php $avo_prevPost = get_previous_post();
						if($avo_prevPost) {?>
							<div class="pagi-nav-box previous">
								<?php $avo_prevthumbnail = get_the_post_thumbnail($avo_prevPost->ID, array(150,150) ); $avo_prev = esc_html__('Previous post', 'avo'); ?>
								<?php previous_post_link('%link',"<div class='img-pagi'><i class='lnr lnr-arrow-left'></i> 
								$avo_prevthumbnail</div>  <div class='imgpagi-box'><p>$avo_prev</p> <h4 class='pagi-title'>%title</h4> </div>"); ?> 
							</div>

						<?php } $avo_nextPost = get_next_post();  
						if($avo_nextPost) { ?>
							<div class="pagi-nav-box next">
								<?php $avo_nextthumbnail = get_the_post_thumbnail($avo_nextPost->ID, array(150,150) ); $avo_next = esc_html__('Next post', 'avo'); ?>
								<?php next_post_link('%link',"<div class='imgpagi-box'><p>$avo_next</p><h4 class='pagi-title'>%title</h4> </div> <div class='img-pagi'><i class='lnr lnr-arrow-right'></i>
								$avo_nextthumbnail</div> "); ?>
							</div>
						<?php } ?>
					</div><!--/.img-pagination-->

			</div><!--/.blog-content-->

			<?php 
			if ( class_exists('ReduxFrameworkPlugin') && (avo_option( 'avo_sidebar_format' ) =='right_sidebar')) {
						get_sidebar(); }
			if ( !class_exists('ReduxFrameworkPlugin')) {
						get_sidebar(); }
						?>

		</div><!--/.row-->   
	</div><!--/.container-->
</div><!--/.blog-wrapper-->
