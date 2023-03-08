<?php

/**

 * Post single meta

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}

// Get meta sections

$sections = adeline_blog_single_meta();

// Return if sections are empty

if (empty($sections) || 'post' != get_post_type()) {

	return;

}

// Return if quote or link format

if (('quote' == get_post_format() && !is_single()) || ('link' == get_post_format() && !is_single())) {

	return;

}
 ?>
<?php do_action('adeline_before_single_post_meta'); ?>

<ul class="meta clr">
  <?php

	// Loop through meta sections

	foreach ( $sections as $section ) { ?>
  <?php if ( 'author' == $section ) { ?>
  <li class="meta-author"<?php adeline_schema_markup('author_name'); ?>>
    <?php if ( true == adeline_get_option_value( 'meta_data_icons', '', false ) ) { ?>
    <i class="dpr-icon-user2"></i>
    <?php } ?>
    <?php echo the_author_posts_link(); ?></li>
  <?php } ?>
  <?php if ( 'date' == $section ) { ?>
  <li class="meta-date"<?php adeline_schema_markup('publish_date'); ?>>
    <?php if ( true == adeline_get_option_value( 'meta_data_icons', '', false ) ) { ?>
    <i class="dpr-icon-clock-2"></i>
    <?php } ?>
    <?php echo get_the_date(); ?></li>
  <?php } ?>
  <?php if ( 'category' == $section ) { ?>
  <li class="meta-cat">
    <?php if ( true == adeline_get_option_value( 'meta_data_icons', '', false ) ) { ?>
    <i class="dpr-icon-folder-2"></i>
    <?php } ?>
    <?php the_category(', ', get_the_ID()); ?>
  </li>
  <?php } ?>
  <?php if ( 'comments' == $section && comments_open() && ! post_password_required() ) { ?>
  <li class="meta-comments">
    <?php if ( true == adeline_get_option_value( 'meta_data_icons', '', false ) ) { ?>
    <i class="dpr-icon-comment-2-1"></i>
    <?php } ?>
    <?php comments_popup_link(esc_html__('0 Comments', 'adeline'), esc_html__('1 Comment', 'adeline'), esc_html__('% Comments', 'adeline'), 'comments-link local'); ?>
  </li>
  <?php } ?>
  <?php } ?>
</ul>
<?php do_action('adeline_after_single_post_meta'); ?>
