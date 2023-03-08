<?php

/**

 * Portfolio archive

 */



// Vars

$posts_per_page 	= adeline_get_option_value( 'portfolio_posts_per_page', '', '12' );

$columns 			= adeline_get_option_value( 'portfolio_columns', '', '3' );

$tablet_columns 	= adeline_get_option_value( 'portfolio_tablet_columns', '', '2' );

$mobile_columns 	= adeline_get_option_value( 'portfolio_mobile_columns', '', '1' );

$masonry 			= adeline_get_option_value( 'portfolio_masonry' );

$title 				= adeline_get_option_value( 'portfolio_entry_title' );

$pagination 		= adeline_get_option_value( 'portfolio_pagination_style', '', 'default' );

$pagination_pos 	= adeline_get_option_value( 'portfolio_pagination_position', '', 'center' );

$filter 			= adeline_get_option_value( 'portfolio_filter' );

$all_filter 		= adeline_get_option_value( 'portfolio_filter_all_button' );

$all_filter_text 	= adeline_get_option_value( 'portfolio_filter_all_button_text' ,'' ,__( 'All', 'adeline' ));

$filter_pos 		= adeline_get_option_value( 'portfolio_filter_position', '', 'center' );

$filter_tax 		= adeline_get_option_value( 'portfolio_filter_taxonomy', '', 'categories' );

$overlay_icons 		= get_theme_mod( 'op_portfolio_img_overlay_icons' );

$overlay_icons 		= $overlay_icons ? $overlay_icons : 'on';

$custom_source 		= adeline_get_option_value( 'portfolio_use_query' );

$category_ids 		= adeline_get_option_value( 'portfolio_query_categories' );

$exclude_cat 		= adeline_get_option_value( 'portfolio_query_categories_excluded' );

$order 				= adeline_get_option_value( 'portfolio_query_order' );

$orderby 			= adeline_get_option_value( 'portfolio_query_orderby' );

$appear_animation = adeline_get_option_value( 'portfolio_entry_appear_animation_effect', '', 'none' );

$wrap_add_classes = '';

$aos_data = '';

if ($appear_animation != 'none')  {

	$aos_data .= ' data-aos-once =true data-aos='.$appear_animation.'';

	if( !empty( adeline_get_option_value( 'portfolio_entry_appear_animation_easing')) ) {

		$aos_data .= ' data-aos-easing='.adeline_get_option_value( 'portfolio_entry_appear_animation_easing').'';

	}

	if( !empty( adeline_get_option_value( 'portfolio_entry_appear_animation_duration')) ) {

		$aos_data .= ' data-aos-duration='.adeline_get_option_value( 'portfolio_entry_appear_animation_duration').'';

	}

	if( !empty( adeline_get_option_value( 'portfolio_entry_appear_animation_delay')) ) {

		$aos_data .= ' data-aos-delay='.adeline_get_option_value( 'portfolio_entry_appear_animation_delay').'';

	}

}



// Enqueue AOS JS if appear animation selected



if( 'none' != $appear_animation ) {

	wp_enqueue_script( 'aos' );

}



// Wrap classes

$wrap_classes 	   	= array( 'portfolio-items', 'clr', 'tablet-col', 'mobile-col' );

$wrap_classes[] 	= 'tablet-' . $tablet_columns . '-col';

$wrap_classes[] 	= 'mobile-' . $mobile_columns . '-col';



// Is masonry

if ( $masonry && !$filter ) {

	$wrap_classes[] = 'masonry-grid';

}



// Enable isotope if filter

if ( $filter ) {

	$wrap_classes[] = 'isotope-grid';

}





// Add class if no overlay icon

if ( 'on' != $overlay_icons ) {

	$wrap_classes[] = 'no-lightbox';

}



//Add classes for infinite scroll paginations

if ( 'infinite_scroll' == $pagination || 'load_more' == $pagination ) {

	$wrap_add_classes .= ' infinite-scroll-wrapper';

}





$wrap_classes 		= implode( ' ', $wrap_classes );



// Query args

$args = array(

	'post_type'      	=> 'dpr_portfolio',

	'posts_per_page' 	=> $posts_per_page,

	'order'				=> $order,

	'orderby'			=> $orderby,

	'post_status' 		=> 'publish',

	'tax_query' 		=> array(

		'relation' 		=> 'AND',

	),

);



	

// Categories IDs

if ( ! empty( $category_ids ) ) {



	// Convert to array

	$category_ids = implode( ',', $category_ids );

	$category_ids = explode( ',', $category_ids );



	// Add to query arg

	$args['tax_query'][] = array(

		'taxonomy' => 'dpr_portfolio_category',

		'field'    => 'term_id',

		'terms'    => $category_ids,

		'operator' => 'IN',

	);



}



// Order

if ( $order != '' ) {

	$args['order'] = $order;

}

// Orderby

if ( $orderby != 'none' ) {

	$args['orderby'] = $orderby;

}



// Exclude category

if ( ! empty( $exclude_cat ) ) {



	// Convert to array

	$exclude_cat = implode( ',', $exclude_cat );

	$exclude_cat = explode( ',', $exclude_cat );



	// Add to query arg

	$args['tax_query'][] = array(

		'taxonomy' => 'dpr_portfolio_category',

		'field'    => 'term_id',

		'terms'    => $exclude_cat,

		'operator' => 'NOT IN',

	);



}



// If filter

if ( $filter ) {



	// Get taxonomy

	if ( 'categories' == $filter_tax ) {

		$taxonomy = 'dpr_portfolio_category';

		$tax = 'cat';

	} else if ( 'tags' == $filter_tax ) {

		$taxonomy = 'dpr_portfolio_tag';

		$tax = 'tag';

	}



	// Filter args

	$filter_args = array(

		'taxonomy' 	 => $taxonomy,

		'hide_empty' => 1,

	);





	// Get filter terms

	$filter_terms = get_terms( $filter_args );



}



// If pagination

if ( $pagination != 'none' ) {

	$paged_query 	= is_front_page() ? 'page' : 'paged';

	$args['paged'] 	= get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

}



$dpr_portfolio_query = new WP_Query( $args );



// Output posts

if ( $dpr_portfolio_query->have_posts() ) : ?>

<div class="<?php echo esc_attr($wrap_classes); ?>">
  <?php

		// Filter

		if ( $filter ) {



			// Class

			$filter_classes 	   	= array( 'portfolio-filters' );



			// Filter position

			if ( 'center' != $filter_pos ) {

				$filter_classes[] 	= 'filter-pos-' . $filter_pos;

			}



			$filter_classes 		= implode( ' ', $filter_classes ); ?>
  <ul class="<?php echo esc_attr($filter_classes); ?>">
    <?php

				// Filter

				if ( $all_filter ) { ?>
    <li class="portfolio-filter active"><a href="#" data-filter="*"><?php echo esc_html($all_filter_text); ?></a></li>
    <?php }

	foreach ( $filter_terms as $term ) {
 ?>
    <li class="portfolio-filter"><a href="#" data-filter=".<?php echo esc_attr($tax); ?>-<?php echo esc_attr($term -> term_id); ?>"><?php echo esc_attr($term -> name); ?></a></li>
    <?php } ?>
  </ul>
  <?php }

	// If masonry

	if ( $masonry ) {

	$data = 'masonry';

	} else {

	$data = 'fitRows';

	}
 ?>
  <div class="portfolio-wrap <?php echo esc_attr($wrap_add_classes) ?>" data-layout="<?php echo esc_attr($data); ?>">
    <?php

			// Define counter for clearing floats

			$dpr_count = 0;



			// Loop

			while ( $dpr_portfolio_query->have_posts() ) : $dpr_portfolio_query->the_post();



				// Add to counter

				$dpr_count++;



				// Inner classes

				$inner_classes 		= array( 'portfolio-item', 'clr', 'col' );

				$inner_classes[] 	= 'column-'. $columns;

				$inner_classes[] 	= 'col-'. $dpr_count;



				// If title

				if ( $title ) {

					$inner_classes[] = 'has-title';

				}



				// If load more pagination

				if ( $pagination == 'load_more' ) {

					$inner_classes[] = 'item-entry';

				}





				// If filter

				if ( $filter && ! empty( $filter_terms ) ) {



					$terms_list = wp_get_post_terms( get_the_ID(), $taxonomy );



					foreach ( $terms_list as $term ) {

						$inner_classes[] = $tax . '-' . $term->term_id;

					}



				}



				$inner_classes 		= implode( ' ', $inner_classes ); ?>
    <article id="post-<?php the_ID(); ?>" class="<?php echo esc_attr($inner_classes); ?> " <?php echo esc_attr($aos_data); ?>>
      <?php get_template_part('template-parts/portfolio/portfolio-item'); ?>
    </article>
    <?php

			// Reset counter to clear floats

			if ($columns == $dpr_count) {

				$dpr_count = 0;

			}

			// End entry loop

			endwhile;
 ?>
  </div>
  <?php

		// Pagination

		if ( $pagination != 'none') { ?>
  <div class="portfolio-pagination-wrapper">
    <?php
	if ('infinite_scroll' == $pagination) {

		// Load infinite scroll script

		wp_enqueue_script('infinitescroll');

		// Last text

		$last = adeline_get_option_value('portfolio_pagination_infinite_scroll_last_text', '', esc_html__('End of content', 'adeline'));

		$last = $last ? $last : esc_html__('End of content', 'adeline');

		// Error text

		$error = adeline_get_option_value('portfolio_pagination_infinite_scroll_error_text', '', esc_html__('No more pages to load', 'adeline'));

		$error = $error ? $error : esc_html__('No more pages to load', 'adeline');

		// Output pagination HTML

		$output = '';

		$output .= '<div class="scroller-status">';

		$output .= '<div class="loader-ellips infinite-scroll-request">';

		$output .= '<span class="loader-ellips__dot"></span>';

		$output .= '<span class="loader-ellips__dot"></span>';

		$output .= '<span class="loader-ellips__dot"></span>';

		$output .= '<span class="loader-ellips__dot"></span>';

		$output .= '</div>';

		$output .= '<p class="scroller-status__message infinite-scroll-last">' . $last . '</p>';

		$output .= '<p class="scroller-status__message infinite-scroll-error">' . $error . '</p>';

		$output .= '</div>';

		$output .= '<div class="portfolio-infinite-scroll-nav clr">';

		$output .= '<div class="alignleft newer-posts">' . get_previous_posts_link('<i class="dpr-icon-angle-double-left"></i> ' . esc_html__('Newer Items', 'adeline')) . '</div>';

		$output .= '<div class="alignright older-posts">' . get_next_posts_link(esc_html__('Older Items', 'adeline') . ' <i class="dpr-icon-angle-double-right"></i>', $dpr_portfolio_query -> max_num_pages) . '</div>';

		$output .= '</div>';

		echo wp_kses_post($output);

	} else if ($pagination == 'load_more') {

		// Load load more script

		wp_enqueue_script('infinitescroll');

		$button_text = adeline_get_option_value('portfolio_pagination_loadmore_button_text', '', esc_html__('Load More Posts', 'adeline'));

		$nomore_text = adeline_get_option_value('portfolio_pagination_loadmore_nomore_text', '', esc_html__('No more posts to load', 'adeline'));

		$last = adeline_get_option_value('portfolio_pagination_loadmore_nomore_text', '', esc_html__('End of content', 'adeline'));

		$last = $last ? $last : esc_html__('End of content', 'adeline');

		// Error text

		$error = adeline_get_option_value('portfolio_pagination_loadmore_nomore_text', '', esc_html__('No more pages to load', 'adeline'));

		$error = $error ? $error : esc_html__('No more pages to load', 'adeline');

		$output = '';

		$output .= '<div class="scroller-status">';

		$output .= '<div class="loader-ellips infinite-scroll-request">';

		$output .= '<span class="loader-ellips__dot"></span>';

		$output .= '<span class="loader-ellips__dot"></span>';

		$output .= '<span class="loader-ellips__dot"></span>';

		$output .= '<span class="loader-ellips__dot"></span>';

		$output .= '</div>';

		$output .= '<p class="scroller-status__message infinite-scroll-last">' . $last . '</p>';

		$output .= '<p class="scroller-status__message infinite-scroll-error">' . $error . '</p>';

		$output .= '</div>';

		$output .= '<div class="dp-adeline-loadmore-wrapper"><button class="dp-adeline-loadmore-button"><span class="dp-adeline-loadmore-button-text">' . esc_html($button_text) . '</span></button></div>';

		$output .= '<div class="portfolio-load-more-scroll-nav clr">';

		$output .= '<div class="alignleft newer-posts">' . get_previous_posts_link('<i class="dpr-icon-angle-double-left"></i> ' . esc_html__('Newer Items', 'adeline')) . '</div>';

		$output .= '<div class="alignright older-posts">' . get_next_posts_link(esc_html__('Older Items', 'adeline') . ' <i class="dpr-icon-angle-double-right"></i>', $dpr_portfolio_query -> max_num_pages) . '</div>';

		$output .= '</div>';

		echo wp_kses_post($output);

	} else if ($pagination == 'next_prev') {

		$output = '';

		if ($dpr_portfolio_query -> max_num_pages > 1) {

			$output .= '<div class="page-jump clr">';

			$output .= '<div class="alignleft newer-posts">';

			$output .= get_previous_posts_link('<i class="dpr-icon-angle-double-left"></i> ' . esc_html__('Newer Items', 'adeline'));

			$output .= '</div>';

			$output .= '<div class="alignright older-posts">';

			$output .= get_next_posts_link(esc_html__('Older Items', 'adeline') . ' <i class="dpr-icon-angle-double-right"></i>', $dpr_portfolio_query -> max_num_pages);

			$output .= '</div>';

			$output .= '</div>';

			echo wp_kses_post($output);

		}

	} else {

		adeline_portfolio_numbered_pagination($dpr_portfolio_query -> max_num_pages, adeline_get_option_value('pagination_align', '', 'left'));

	}
?>
  </div>
  <?php		}

	// Reset the post data to prevent conflicts with WP globals

	wp_reset_postdata();
 ?>
</div>
<!-- .portfolio-items -->

<?php

// No portfolio found

else :
 ?>
<p class="portfolio-not-found">
  <?php esc_html_e('You have no portfolio items', 'adeline'); ?>
</p>
<?php

endif;

