<?php
/*

Template Name: Blog Page Template

 */
// Vars
get_header();
?>
<?php do_action('adeline_before_content_wrap');?>

<div id="dpr-content-wrapper" class="container clr">
  <?php do_action('adeline_before_primary');?>
  <div id="primary" class="content-area clr">
    <?php do_action('adeline_before_content');?>
    <div id="content" class="site-content clr">
      <?php do_action('adeline_before_content_inner');?>
      <?php
// Start loop
while (have_posts()):
    the_post();
    if ('above' == adeline_get_option_value('blog_main_content_position', '', 'above')) {
        ?>
          <article class="single-page-article clr">
            <?php
    // Get page entry
        get_template_part('template-parts/page/article');
        ?>
          </article>
          <?php
    }?>
          <?php
    /**
     * Blog archive
     */
    // Vars
    $posts_per_page = adeline_get_option_value('blog_posts_per_page', '', '12');
    $custom_source  = adeline_get_option_value('blog_use_query');
    $category_ids   = adeline_get_option_value('blog_query_categories');
    $exclude_cat    = adeline_get_option_value('blog_query_categories_excluded');
    $order          = adeline_get_option_value('blog_query_order');
    $orderby        = adeline_get_option_value('blog_query_orderby');
    $pagination     = adeline_get_option_value('blog_pagination_type', '', 'default');
    // Query args
    if (get_query_var('paged')) {
        $paged = get_query_var('paged');
    } elseif (get_query_var('page')) {
    $paged = get_query_var('page');
} else {
    $paged = 1;
}
$args = array('post_type' => 'post', 'posts_per_page' => $posts_per_page, 'order' => $order, 'orderby' => $orderby, 'paged' => $paged, 'post_status' => 'publish', 'tax_query' => array('relation' => 'AND'));
// Categories IDs
if (!empty($category_ids)) {
    // Convert to array
    $category_ids = implode(',', $category_ids);
    $category_ids = explode(',', $category_ids);
    // Add to query arg
    $args['tax_query'][] = array('taxonomy' => 'category', 'field' => 'term_id', 'terms' => $category_ids, 'operator' => 'IN');
}
// Order
if ($order != '') {
    $args['order'] = $order;
}
// Orderby
if ($orderby != 'none') {
    $args['orderby'] = $orderby;
}
// Exclude category
if (!empty($exclude_cat)) {
    // Convert to array
    $exclude_cat = implode(',', $exclude_cat);
    $exclude_cat = explode(',', $exclude_cat);
    // Add to query arg
    $args['tax_query'][] = array('taxonomy' => 'category', 'field' => 'term_id', 'terms' => $exclude_cat, 'operator' => 'NOT IN');
}
// If pagination
//$paged_query     = is_front_page() ? 'page' : 'paged';
//$args['paged']     = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$dpr_blog_query = new WP_Query($args);
// Output posts
if ($dpr_blog_query->have_posts()): ?>
      <div id="blog-items" class="<?php adeline_blog_wrap_classes();?>">
        <?php
// Define counters for clearing floats and check odd/even
$dpr_adeline_count       = 0;
$dpr_adeline_total_count = 0;
// Loop
while ($dpr_blog_query->have_posts()):
    $dpr_blog_query->the_post();
    // Add to counters
    $dpr_adeline_count++;
    $dpr_adeline_total_count++;
    // Get post item content
    get_template_part('template-parts/blog/layout', get_post_type());
    // Reset counter to clear floats
    if (adeline_blog_columns() == $dpr_adeline_count) {
        $dpr_adeline_count = 0;
    }
endwhile;
// Reset the post data to prevent conflicts with WP globals
wp_reset_postdata();
?>
      </div>
      <!-- .blog-items -->

      <?php
// Display post pagination
// Admin Options
$blog_style       = adeline_get_option_value('blog_style', '', 'large-image');
$pagination_style = adeline_get_option_value('blog_pagination_type', '', 'default');
// Category based settings
if (is_category()) {
    // Get taxonomy meta
    $term       = get_query_var('cat');
    $term_data  = get_option('category_' . $term);
    $term_style = $term_pagination = '';
    if (isset($term_data['dpr_adeline_term_style'])) {
        $term_style = '' != $term_data['dpr_adeline_term_style'] ? $term_data['dpr_adeline_term_style'] . '' : $term_style;
    }
    if (isset($term_data['dpr_adeline_term_pagination'])) {
        $term_pagination = '' != $term_data['dpr_adeline_term_pagination'] ? $term_data['dpr_adeline_term_pagination'] . '' : '';
    }
    if ($term_pagination) {
        $pagination_style = $term_pagination;
    }
}
// Execute the pagination function
if ('infinite_scroll' == $pagination_style) {
    // Load infinite scroll script
    wp_enqueue_script('infinitescroll');
    // Last text
    $last = adeline_get_option_value('blog_pagination_infinite_scroll_last_text', '', esc_html__('End of content', 'adeline'));
    $last = $last ? $last : esc_html__('End of content', 'adeline');
    // Error text
    $error = adeline_get_option_value('blog_pagination_infinite_scroll_error_text', '', esc_html__('No more pages to load', 'adeline'));
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
    $output .= '<div class="infinite-scroll-nav clr">';
    $output .= '<div class="alignleft newer-posts">' . get_previous_posts_link('<i class="dpr-icon-angle-double-left"></i> ' . esc_html__('Newer Posts', 'adeline')) . '</div>';
    $output .= '<div class="alignright older-posts">' . get_next_posts_link(esc_html__('Older Posts', 'adeline') . ' <i class="dpr-icon-angle-double-right"></i>', $dpr_blog_query->max_num_pages) . '</div>';
    $output .= '</div>';
    echo wp_kses_post($output);
} else if ($pagination_style == 'load_more') {
    // Load load more script
    wp_enqueue_script('infinitescroll');
    $button_text = adeline_get_option_value('blog_pagination_loadmore_button_text', '', esc_html__('Load More Posts', 'adeline'));
    $nomore_text = adeline_get_option_value('blog_pagination_loadmore_nomore_text', '', esc_html__('No more posts to load', 'adeline'));
    $last        = adeline_get_option_value('blog_pagination_loadmore_nomore_text', '', esc_html__('End of content', 'adeline'));
    $last        = $last ? $last : esc_html__('End of content', 'adeline');
    // Error text
    $error  = adeline_get_option_value('blog_pagination_loadmore_nomore_text', '', esc_html__('No more pages to load', 'adeline'));
    $error  = $error ? $error : esc_html__('No more pages to load', 'adeline');
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
    $output .= '<div class="load-more-scroll-nav clr">';
    $output .= '<div class="alignleft newer-posts">' . get_previous_posts_link('<i class="dpr-icon-angle-double-left"></i> ' . esc_html__('Newer Posts', 'adeline')) . '</div>';
    $output .= '<div class="alignright older-posts">' . get_next_posts_link(esc_html__('Older Posts', 'adeline') . ' <i class="dpr-icon-angle-double-right"></i>', $dpr_blog_query->max_num_pages) . '</div>';
    $output .= '</div>';
    echo wp_kses_post($output);
} else if ($pagination_style == 'next_prev') {
    $output = '';
    if ($dpr_blog_query->max_num_pages > 1) {
        $output .= '<div class="page-jump clr">';
        $output .= '<div class="alignleft newer-posts">';
        $output .= get_previous_posts_link('<i class="dpr-icon-angle-double-left"></i> ' . esc_html__('Newer Posts', 'adeline'));
        $output .= '</div>';
        $output .= '<div class="alignright older-posts">';
        $output .= get_next_posts_link(esc_html__('Older Posts', 'adeline') . ' <i class="dpr-icon-angle-double-right"></i>', $dpr_blog_query->max_num_pages);
        $output .= '</div>';
        $output .= '</div>';
        echo wp_kses_post($output);
    }
} else {
    adeline_portfolio_numbered_pagination($dpr_blog_query->max_num_pages, adeline_get_option_value('pagination_align', '', 'left'));
}
// No post found
else :
?>
      <p class="portfolio-not-found">
        <?php esc_html_e('You have no blog items', 'adeline');?>
      </p>
      <?php
endif;
?>
      <?php if ('bellow' == adeline_get_option_value('blog_main_content_position', '', 'above')) {
    ?>
      <article class="single-page-article clr">
        <?php
// Get page entry
    get_template_part('template-parts/page/article');
    ?>
      </article>
      <?php
}
endwhile;
?>
      <?php do_action('adeline_after_content_inner');?>
    </div>
    <!-- #content -->

    <?php do_action('adeline_after_content');?>
  </div>
  <!-- #primary -->

  <?php do_action('adeline_after_primary');?>
  <?php do_action('adeline_display_sidebar');?>
</div>
<!-- #dpr-content-wrapper -->

<?php do_action('adeline_after_content_wrap');?>
<?php get_footer();?>
