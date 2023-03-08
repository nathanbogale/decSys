<?php
/*
* Related Post
*/ 
?>

<?php 
if (is_active_sidebar( 'default-sidebar' ) ){ 
	if ( class_exists('ReduxFrameworkPlugin') && (avo_option( 'avo_sidebar_format' ) =='no_sidebar')) {
		$related_no=3;
		$related = avo_related_post( get_the_ID(), $related_no );
	}else{
		$related_no=2;
		$related = avo_related_post( get_the_ID(), $related_no );}
}else{
		$related_no=3;
		$related = avo_related_post( get_the_ID(), $related_no );
}

if( $related->have_posts() ):
?>

<div id="related_posts" class="clearfix">
	<h4 class="title-related-post">
		<?php  esc_html_e('Related Posts', 'avo'); ?>
	</h4>
	<div class="row"> 
		<?php 
		while( $related->have_posts() ):
			$related->the_post();?>
			<div class="<?php if ($related_no==2 ){ echo 'col-sm-6 col-xs-12';}else{echo 'col-sm-4 col-xs-6';}?>"> 
				
				<?php if ( class_exists('ReduxFrameworkPlugin') && (avo_option( 'avo_related_image' ) =='show')) {  ?>
				<a href="<?php  the_permalink()  ?>" rel="bookmark" title="<?php  echo esc_attr( the_title_attribute()); ?>">
					<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'avo-related-post' );
					} ?>
				</a>
 
				<?php } ?>
				 
				<div class="related-inner clerfix">
					<div>
						<ul class="post-detail">
							<li>
								<i class="lnr lnr-user fw-600"></i> <?php the_author_posts_link(); ?> 
							</li>
							<li>
								<i class="lnr lnr-history"></i> <?php echo get_the_date(); ?> 
							</li>
						</ul>
						<a href="<?php the_permalink(); ?>"><h3 class="related-title"><?php the_title(); ?></h3></a>
						<?php if( '' !== get_post()->post_content ){?>
                        <p class="excerpt">
                            <?php $excerpt = get_the_excerpt();
                            $excerpt = substr( $excerpt , 0,'95'); 
                            echo esc_html($excerpt.' ..');?> 
                        </p>
                   		 <?php } ?>
					</div> 
				</div>
			</div><!--/.col-sm-4-->  
		<?php  endwhile; ?>
	</div><!--/.row--> 
</div><!--related-post-->
<?php endif;
wp_reset_postdata(); ?>