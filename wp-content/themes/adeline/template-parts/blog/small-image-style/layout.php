<?php
/**
 * Small image style layout
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Get post format
$format = get_post_format();
// Add classes to the blog item post class
$classes = adeline_post_item_classes();
// Inner classes
$inner_classes = array();
// Image position
$position             = adeline_get_option_value('blog_thumb_image_position', '', 'left');
$item_shadow          = adeline_get_option_value('blog_entry_shadow', '', '0');
$item_hover_shadow    = adeline_get_option_value('blog_entry_shadow_hover', '', '0');
$item_hover_animation = adeline_get_option_value('blog_entry_hover_animation', '', 'none');
if ($position == 'alternately') {
    if (adeline_check_item_odd()) {
        $position = 'left';
    } else {
        $position = 'right';
    }
}
$position        = $position ? $position : 'left';
$inner_classes[] = $position . '-position';
if (adeline_get_option_value('blog_entry_style', '', 'tiled') == 'tiled') {
    if ('custom' != $item_shadow && '' != $item_shadow) {
        $inner_classes[] = 'dpr-shadow-' . $item_shadow;
    }

    if ('custom' != $item_hover_shadow && '' != $item_hover_shadow) {
        $inner_classes[] = 'dpr-shadow-onhover-' . $item_hover_shadow;
    }

    if ('none' != $item_hover_animation) {
        $inner_classes[] = $item_hover_animation;
    }

}
// Vertical postion
$ver_position    = adeline_get_option_value('blog_thumb_image_vertical_position', '', 'top');
$ver_position    = $ver_position ? $ver_position : 'top';
$inner_classes[] = $ver_position;
// Turn inner classes into space seperated string
$inner_classes = implode(' ', $inner_classes);
?>

<article id="post-<?php the_ID();?>" <?php post_class($classes);?>>
  <div class="blog-item-inner clr <?php echo esc_attr($inner_classes); ?>">
    <?php
// If image left
if ('left' == $position) {
    // Featured Image
    get_template_part('template-parts/blog/media/post', $format);
}
?>
    <div class="blog-item-content">
      <?php
// Category
get_template_part('template-parts/blog/small-image-style/category');
// Title
get_template_part('template-parts/blog/header');
// Content
get_template_part('template-parts/blog/content');
?>
      <div class="blog-item-bottom clr">
        <?php
// Comments
get_template_part('template-parts/blog/small-image-style/comments');
// Author
get_template_part('template-parts/blog/small-image-style/date');
// Date
get_template_part('template-parts/blog/small-image-style/author');
?>
      </div>
      <!-- .blog-item-bottom -->

    </div>
    <!-- blog-item-content -->

    <?php
// If image right
if ('right' == $position) {
    // Featured Image
    get_template_part('template-parts/blog/media/post', $format);
}
?>
  </div>
  <!-- blog-item-inner -->

</article>
<!-- #post-## -->