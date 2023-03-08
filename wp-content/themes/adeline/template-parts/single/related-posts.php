<?php

/**

 * Single related posts

 *

 * @package Adeline WordPress theme

 */



// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// Only display for standard posts

if ( 'post' != get_post_type() ) {

	return;

}



// Text

$title = adeline_get_option_value( 'blog_single_related_title', '', esc_html__( 'Related Posts', 'adeline' ) );

$title = $title ? $title : 'category';





$title = apply_filters( 'dpr_related_posts_title', $title );



// Number of columns for entries

$dpr_adeline_columns = apply_filters( 'adeline_related_blog_posts_columns', absint( adeline_get_option_value( 'blog_single_related_columns', '' , '3' ) ) );



// Term

$term_tax = adeline_get_option_value( 'blog_single_related_taxonomy', '', 'category' );

$term_tax = $term_tax ? $term_tax : 'category';



// Create an array of current term ID's

$terms     = wp_get_post_terms( get_the_ID(), $term_tax );

$terms_ids = array();

foreach( $terms as $term ) {

	$terms_ids[] = $term->term_id;

}



// Query args

$args = array(

	'posts_per_page' => apply_filters( 'dpr_related_blog_posts_count', absint( adeline_get_option_value( 'blog_single_related_count', '' , '3' ) ) ),

	'orderby'        => 'rand',

	'post__not_in'   => array( get_the_ID() ),

	'no_found_rows'  => true,

	'tax_query'      => array (

		'relation'  => 'AND',

		array (

			'taxonomy' => 'post_format',

			'field'    => 'slug',

			'terms'    => array( 'post-format-quote', 'post-format-link' ),

			'operator' => 'NOT IN',

		),

	),

);



// If category

if ( 'category' == $term_tax ) {

	$args['category__in'] = $terms_ids;

}



// If tags

if ( 'post_tag' == $term_tax ) {

	$args['tag__in'] = $terms_ids;

}



// Args

$args = apply_filters( 'dpr_blog_post_related_query_args', $args );



// Related query arguments

$dpr_adeline_related_query = new WP_Query( $args );



// If the custom query returns post display related posts section

if ( $dpr_adeline_related_query->have_posts() ) :



	// Wrapper classes

	$classes = 'clr';

	if ( 'full-screen' == adeline_content_layout() ) {

		$classes .= ' container';

	} ?>
<?php do_action('adeline_before_single_post_related_posts'); ?>

<section id="related-posts" class="<?php echo esc_attr($classes); ?>">
  <h3 class="theme-heading related-posts-title"> <span class="text"><?php echo esc_html($title); ?></span> </h3>
  <div class="dpr-adeline-row clr">
    <?php $dpr_adeline_count = 0; ?>
    <?php foreach( $dpr_adeline_related_query->posts as $post ) : setup_postdata( $post ); ?>
    <?php $dpr_adeline_count++;

	// Disable embeds

	$show_embeds = apply_filters('adeline_related_blog_posts_embeds', false);

	// Get post format

	$format = get_post_format();

	// Add classes

	$classes = array('related-post', 'clr', 'col');

	$classes[] = adeline_grid_class($dpr_adeline_columns);

	$classes[] = 'col-' . $dpr_adeline_count;
 ?>
    <article <?php post_class($classes); ?>>
      <?php

					// Display post video

					if ( $show_embeds && 'video' == $format && $video = adeline_get_post_video_html() ) : ?>
      <div class="related-post-video"> <?php echo wp_kses_post($video); ?> </div>
      <!-- .related-post-video -->
      
      <?php

					// Display post audio

					elseif ( $show_embeds && 'audio' == $format && $audio = adeline_get_post_audio_html() ) :
 ?>
      <div class="related-post-video"> <?php echo wp_kses_post($audio); ?> </div>
      <!-- .related-post-audio -->
      
      <?php

					// Display post thumbnail

					elseif ( has_post_thumbnail() ) :
 ?>
      <figure class="related-post-media clr"> <a href="<?php the_permalink(); ?>" class="related-thumb">
        <?php

								// Image width

								$img_width  = apply_filters( 'dpr_blog_related_image_width', absint( intval((adeline_get_option_value('blog_single_related_image_width', 'width', ''))) ) );

								$img_height = apply_filters( 'dpr_blog_related_image_height', absint( intval((adeline_get_option_value( 'blog_single_related_image_height', 'height', '' ))) ) );



			                	// Images attr

								$img_id 	= get_post_thumbnail_id( get_the_ID(), 'medium_featured' );

								$img_url 	= dpr_get_attachment_image_src( $img_id, 'medium_featured' );

								if ( ADELINE_EXT_ACTIVE

									&& function_exists( 'adeline_image_attributes' ) ) {

									$img_atts 	= adeline_image_attributes( $img_url[1], $img_url[2], $img_width, $img_height );

								}



								// If DPR Adeline Extensions is active and has a custom size

								if ( ADELINE_EXT_ACTIVE

									&& function_exists( 'adeline_resize' )

									&& ! empty( $img_atts ) ) { ?>
        <img src="<?php echo adeline_resize($img_url[0], $img_atts['width'], $img_atts['height'], $img_atts['crop'], true, $img_atts['upscale']); ?>" alt="<?php the_title_attribute(); ?>" width="<?php echo esc_attr($img_width); ?>" height="<?php echo esc_attr($img_height); ?>"<?php adeline_schema_markup('image'); ?> />
        <?php

								} else {

								// Images size

								if ( 'full-width' == adeline_content_layout()

								|| 'full-screen' == adeline_content_layout() ) {

								$size = 'medium_featured';

								} else {

								$size = 'medium_featured';

								}

								// Image args

								$img_args = array(

								'alt' => get_the_title(),

								);

								if ( adeline_get_schema_markup( 'image' ) ) {

								$img_args['itemprop'] = 'image';

								}

								// Display post thumbnail

								the_post_thumbnail( $size, $img_args );

								}
 ?>
        </a> </figure>
      <?php endif; ?>
      <time class="published" datetime="<?php echo esc_html(get_the_date('c')); ?>"><i class="dpr-icon-clock-2"></i><?php echo esc_html(get_the_date()); ?></time>
      <h3 class="related-post-title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
        <?php the_title(); ?>
        </a> </h3>
      <!-- .related-post-title --> 
      
    </article>
    <!-- .related-post -->
    
    <?php
				if ($dpr_adeline_columns == $dpr_adeline_count)
					$dpr_adeline_count = 0;
 ?>
    <?php endforeach; ?>
  </div>
  <!-- .dpr-adeline-row --> 
  
</section>
<!-- .related-posts -->

<?php do_action('adeline_after_single_post_related_posts'); ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
