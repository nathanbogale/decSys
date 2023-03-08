<?php

/**

 * Displays the post header

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}

// Return if quote or link format or title displayed in subheader

if (('quote' == get_post_format() && !is_single()) || ('link' == get_post_format() && !is_single()) || 'post-title' == adeline_get_option_value('blog_single_subheader_title', '', 'post-title')) {

	return;

}

// Heading tag

$heading = adeline_get_option_value('blog_single_headings_tag', '', 'h2');

$heading = $heading ? $heading : 'h2';

$heading = apply_filters('adeline_single_post_heading', $heading);
?>
<?php do_action('adeline_before_single_post_title'); ?>

<header class="entry-header clr"> <<?php echo esc_attr($heading); ?> class="single-post-title entry-title"
  <?php adeline_schema_markup('headline'); ?>
  >
  <?php the_title(); ?>
  </<?php echo esc_attr($heading); ?>><!-- .single-post-title --> 
  
</header>
<!-- .entry-header -->

<?php do_action('adeline_after_single_post_title'); ?>
