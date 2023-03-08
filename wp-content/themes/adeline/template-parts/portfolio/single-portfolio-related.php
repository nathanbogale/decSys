<?php

/**

 * Single related portfolio

 */



// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

// Vars from portfolio entries settings. Deafault style dor portfolio entries grid will be used



$portfolio_entry_content_style = adeline_get_option_value( 'portfolio_entry_content_style', '', 'outside' );

$title 				= adeline_get_option_value( 'portfolio_entry_title' );

$related_count 		= adeline_get_option_value( 'portfolio_entry_title' );

$category 			= adeline_get_option_value( 'portfolio_entry_category' );

$img_size 			= adeline_get_option_value( 'portfolio_entry_img_size', '', 'medium' );

$overlay_type		= adeline_get_option_value( 'portfolio_entry_overlay_type', '', 'solid-color' );

$overlay_icons 		= adeline_get_option_value( 'portfolio_entry_overlay_icons_style', '', 'icons' );

$plus_sign_link     = adeline_get_option_value( 'portfolio_entry_overlay_plus_link', '', 'lightbox' );

$overlay_icon_link  = adeline_get_option_value( 'portfolio_entry_overlay_icon_link', '', 'theme-default' );

$overlay_icon_link_custom  = adeline_get_option_value( 'portfolio_entry_custom_link_icon', '', '' );

$overlay_icon_zoom  = adeline_get_option_value( 'portfolio_entry_overlay_icon_zoom', '', 'theme-default' );

$overlay_icon_zoom_custom  = adeline_get_option_value( 'portfolio_entry_custom_zoom_icon', '', '' );

$item_shadow = adeline_get_option_value( 'portfolio_entry_shadow', '', '0' );

$item_hover_shadow = adeline_get_option_value( 'portfolio_entry_shadow_hover', '', '0' );

$item_hover_animation = adeline_get_option_value( 'portfolio_entry_hover_animation', '', 'none' );



$link_icon_class = 'dpr-icon-size-fullscreen';

if ($overlay_icon_link == 'custom' && $overlay_icon_link_custom != '' && $overlay_icon_link_custom != 'none' ) $link_icon_class = $overlay_icon_link_custom;

$zoom_icon_class = 'dpr-icon-magnifier';

if ($overlay_icon_zoom == 'custom' && $overlay_icon_zoom_custom != '' && $overlay_icon_zoom_custom != 'none' ) $zoom_icon_class = $overlay_icon_zoom_custom;



$item_classes 	= array('portfolio-item-inner','clr');

if ( 'custom' != $item_shadow && '' != $item_shadow ) $item_classes[] = 'dpr-shadow-'.$item_shadow;

if ( 'custom' != $item_hover_shadow && '' != $item_hover_shadow ) $item_classes[] = 'dpr-shadow-onhover-'.$item_hover_shadow;

if ( 'none' != $item_hover_animation ) $item_classes[] = $item_hover_animation;



$item_classes 		= implode( ' ', $item_classes );



$overlay_classes 	= array('overlay');

$overlay_classes[] = $overlay_type;

$overlay_classes 		= implode( ' ', $overlay_classes );



// Vars set in single portfolio settings 



// Text

$text = adeline_get_option_value ('porfolio_single_related_title', '', esc_html__( 'Related Projects', 'adeline' ) );

$text = apply_filters( 'dpr_related_portfolios_title', $text );



// Number of columns and count of entries

$related_columns = apply_filters( 'dpr_portfolio_related_columns', absint( adeline_get_option_value( 'porfolio_single_related_columns', '', '3' ) ) );

$related_counts = apply_filters( 'dpr_portfolio_related_counts', absint( adeline_get_option_value( 'portfolio_single_related_count', '', '3' ) ) );



$img_width 			= adeline_get_option_value( 'portfolio_related_img_width', 'width', '' );

$img_height 		= adeline_get_option_value( 'portfolio_related_img_height', 'height', '' );







// Create an array of current category ID's

$cats     = wp_get_post_terms( get_the_ID(), 'dpr_portfolio_category' );

$cats_ids = array();

foreach( $cats as $related_cat ) {

	$cats_ids[] = $related_cat->term_id;

}



// Query args

$args = array(

	'post_type'      => 'dpr_portfolio',

	'posts_per_page' => $related_counts,

	'orderby'        => 'rand',

	'post__not_in'   => array( get_the_ID() ),

	'no_found_rows'  => true,

);



// If relates categories

if ( ! empty( $cats_ids ) ) {

	$args['tax_query'] = array( array(

		'taxonomy' => 'dpr_portfolio_category',

		'field'    => 'id',

		'terms'    => $cats_ids,

		'operator' => 'IN',

	) );

}

$args = apply_filters( 'dpr_portfolio_related_query_args', $args );



// Related query arguments

$portfolio_related_query = new WP_Query( $args );



// If the custom query returns portfolio display related items section

if ( $portfolio_related_query->have_posts() ) :



	// Wrapper classes

	$classes = 'clr';

	if ( 'full-screen' == adeline_content_layout() ) {

		$classes .= ' container';

	} ?>

<div id="related-posts" class="<?php echo esc_attr($classes); ?>">
  <h3 class="theme-heading related-portfolio-title"> <span class="text"><?php echo esc_html($text); ?></span> </h3>
  <div class="dpr-adeline-row portfolio-items clr">
    <?php $related_count = 0; ?>
    <?php foreach( $portfolio_related_query->posts as $post ) : setup_postdata( $post ); ?>
    <?php $related_count++;

	// Add classes

	$classes = array('related-portfolio', 'clr', 'col');

	$classes[] = adeline_grid_class($related_columns);

	$classes[] = 'col-' . $related_count;
 ?>
    <article <?php post_class($classes); ?>>
      <?php

					// Display post thumbnail

					if ( has_post_thumbnail() ) : ?>
      <div class="portfolio-item-thumbnail"> <a href="<?php the_permalink(); ?>" class="thumbnail-link">
        <?php

                                        // Image attr

                                        $img_id 	= get_post_thumbnail_id( get_the_ID(), 'full' );

                                        $img_url 	= dpr_get_attachment_image_src( $img_id, 'full');

                        

                                        if ( class_exists( 'DPR_Theme_Extensions' ) ) {

                        

                                            // Image attrs

                                            $img_atts 	= adeline_image_attributes( $img_url[1], $img_url[2], $img_width, $img_height );

                        

                                            // Display post thumbnail

                                            if ( 'custom' == $img_size

                                                && ! empty( $img_atts ) ) { ?>
        <img src="<?php echo adeline_resize($img_url[0], $img_atts['width'], $img_atts['height'], $img_atts['crop'], true, $img_atts['upscale']); ?>" alt="<?php esc_attr(the_title()); ?>" width="<?php echo esc_attr($img_width); ?>" height="<?php echo esc_attr($img_height); ?>" />
        <?php

											} else {

											the_post_thumbnail( $img_size, array(

											'alt'		=> get_the_title(),

											'itemprop' 	=> 'image',

											) );

											}

											}
 ?>
        <div class="<?php echo esc_attr($overlay_classes); ?>">
          <div class="inner"></div>
        </div>
        </a>
        <?php

                                    // Overlay content

                                    if ( 'none' != $overlay_icons || 'inside' == $portfolio_entry_content_style ) { ?>
        <div class="portfolio-overlay-content">
          <?php

                                            // Overlay icons

                                            if ( 'icons' == $overlay_icons ) { ?>
          <ul class="portfolio-overlay-icons">
            <?php if('icons' != $overlay_icon_link) { ?>
            <li> <a href="<?php the_permalink(); ?>"><i class="<?php echo esc_attr($link_icon_class); ?>" aria-hidden="true"></i></a> </li>
            <?php } ?>
            <?php if('none' != $overlay_icon_zoom) { ?>
            <li> <a href="<?php echo esc_url(wp_get_attachment_url($img_id)); ?>" data-rel="lightcase"><i class="<?php echo esc_attr($zoom_icon_class); ?>" aria-hidden="true"></i></a> </li>
            <?php } ?>
          </ul>
          <?php }

	//Plus sign

	if ( 'plus' == $overlay_icons ) {
 ?>
          <?php if ($plus_sign_link == 'lightbox') { ?>
          <a href="<?php echo esc_url(wp_get_attachment_url($img_id)); ?>" data-rel="lightcase">
          <?php } else { ?>
          <a href=" <?php the_permalink(); ?> ">
          <?php } ?>
          <div class="portfolio-plus-sign"> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 123.31 595.281 595.27">
            <g>
              <g>
                <circle class="to-fill" cx="297.636" cy="420.947" r="14.173"/>
                <path class="to-fill" d="M25.403,435.119H217.35c14.032,0,25.403-6.344,25.403-14.173s-11.371-14.173-25.403-14.173H25.403

                                                        C11.371,406.772,0,413.116,0,420.946S11.371,435.119,25.403,435.119z"/>
                <path class="to-fill" d="M311.809,148.713c0-14.032-6.345-25.402-14.173-25.402c-7.829,0-14.173,11.37-14.173,25.402V340.66

                                                        c0,14.032,6.344,25.403,14.173,25.403c7.829,0,14.173-11.371,14.173-25.403V148.713z"/>
                <path class="to-fill" d="M595.281,420.946c0-7.829-11.371-14.173-25.404-14.173H377.931c-14.033,0-25.404,6.344-25.404,14.173

                                                        s11.371,14.173,25.404,14.173h191.945C583.9,435.119,595.281,428.775,595.281,420.946z"/>
                <path class="to-fill" d="M283.46,693.177c0,14.032,6.344,25.402,14.174,25.402c7.829,0,14.173-11.37,14.173-25.402V501.23

                                                        c0-14.032-6.344-25.403-14.173-25.403c-7.83,0-14.174,11.371-14.174,25.403V693.177z"/>
              </g>
            </g>
            </svg> </div>
          </a>
          <?php }

	// If title or category

	if ( 'inside' == $portfolio_entry_content_style

	&& ( $title || $category ) ) {

	// Class

	$class = '';

	if ( 'on' == $overlay_icons ) {

	$class = ' has-icons';

	}
 ?>
          <div class="portfolio-inside-content clr<?php echo esc_attr($class); ?>">
            <?php

                                                    // If title

                                                    if ($title ) { ?>
            <h3 class="portfolio-item-title entry-title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
              <?php the_title(); ?>
              </a> </h3>
            <?php

													}

													// If category

													if ( $category ) {

													if ( $categories = adeline_portfolio_category_meta() ) {
												?>
            <div class="categories"><?php echo wp_kses_post($categories); ?></div>
            <?php }

	}
 ?>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
        <?php

                                    // If title or category

                                    if ( 'outside' == $portfolio_entry_content_style 

                                        && ( $title || $category ) && adeline_get_option_value( 'portfolio_entry_outside_arrowed' ) ) { ?>
        <div class="arrow"></div>
        <?php } ?>
      </div>
      <?php endif;

	// If title or category

	if ( 'outside' == $portfolio_entry_content_style

	&& ( $title || $category ) ) {
?>
      <div class="portfolio-content clr">
      <?php

// If title

if ( $title ) {
?>
      <h3 class="portfolio-item-title entry-title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
        <?php the_title(); ?>
        </a> </h3>
      <?php

}

// If category

if ( $category ) {

if ( $categories = adeline_portfolio_category_meta() ) {
?>
      <div class="categories"><?php echo wp_kses_post($categories); ?></div>
        <?php }

	}
?>
      </div>
      <?php } ?>
    </article>
    <!-- .related-portfolio -->
    
    <?php
	if ($related_columns == $related_count)
		$related_count = 0;
?>
    <?php endforeach; ?>
  </div>
  <!-- .dpr-adeline-row --> 
  
</div>
<!-- .related-portfolio -->

<?php endif; ?>
<?php wp_reset_postdata(); ?>
