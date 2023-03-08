<?php
/**
 * Displays the post item header
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Heading tag
$heading = adeline_get_option_value('blog_headings_tag', '', 'h2');
$heading = $heading ? $heading : 'h2';
$heading = apply_filters('adeline_blog_heading', $heading);
?>
<?php do_action('adeline_before_blog_item_title');?>

<header class="blog-item-header clr"> <<?php echo esc_attr($heading); ?> class="blog-item-title entry-title"> <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" rel="bookmark">
  <?php the_title();?>
  </a> </<?php echo esc_attr($heading); ?>><!-- blog-item-title -->

</header>
<!-- blog-item-header -->

<?php do_action('adeline_after_blog_item_title');?>
