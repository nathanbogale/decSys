<?php

/**

 * The next/previous links to go to another post.

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}

// Only display for standard posts

if ('post' != get_post_type()) {

	return;

}

// Term

$term_tax = adeline_get_option_value('single_post_next_prev_taxonomy', '', 'post_tag');

$term_tax = $term_tax ? $term_tax : 'post_tag';

// Args

$args = array('prev_text' => '<span class="title"><i class="dpr-icon-angle-double-left"></i>' . esc_html__('Prev', 'adeline') . '</span><span class="post-title">%title</span>', 'next_text' => '<span class="post-title">%title</span><span class="title"><i class="dpr-icon-angle-double-right"></i>' . esc_html__('Next', 'adeline') . '</span>', 'in_same_term' => true, 'taxonomy' => $term_tax, 'screen_reader_text' => esc_html__('Continue Reading', 'adeline'), );

// Args

$args = apply_filters('adeline_single_post_next_prev_args', $args);
?>
<?php do_action('adeline_before_single_post_next_prev'); ?>
<?php the_post_navigation($args); ?>
<?php do_action('adeline_after_single_post_next_prev'); ?>