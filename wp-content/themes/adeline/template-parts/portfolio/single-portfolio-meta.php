<?php

/**

 * Portfolio single meta

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}

// Get meta sections

$sections = adeline_single_portfolio_meta();

// Return if sections are empty

if (empty($sections)) {

	return;

}
 ?>

<ul class="meta clr">
  <?php

	// Loop through meta sections

	foreach ( $sections as $section ) { ?>
  <?php if ( 'author' == $section ) { ?>
  <li class="meta-author"<?php adeline_schema_markup('author_name'); ?>><i class="dpr-icon-user2"></i><?php echo the_author_posts_link(); ?></li>
  <?php } ?>
  <?php if ( 'date' == $section ) { ?>
  <li class="meta-date"<?php adeline_schema_markup('publish_date'); ?>><i class="dpr-icon-clock-2"></i><?php echo get_the_date(); ?></li>
  <?php } ?>
  <?php if ( 'categories' == $section ) { ?>
  <?php if ( $categories = adeline_portfolio_category_meta() ) {?>
  <li class="meta-cat"><i class="dpr-icon-folder-2"></i><?php echo wp_kses_post($categories); ?></li>
  <?php } ?>
  <?php } ?>
  <?php if ( 'comments' == $section && comments_open() && ! post_password_required() ) { ?>
  <li class="meta-comments"><i class="dpr-icon-comment-2-1"></i>
    <?php comments_popup_link(esc_html__('0 Comments', 'adeline'), esc_html__('1 Comment', 'adeline'), esc_html__('% Comments', 'adeline'), 'comments-link'); ?>
  </li>
  <?php } ?>
  <?php } ?>
</ul>
