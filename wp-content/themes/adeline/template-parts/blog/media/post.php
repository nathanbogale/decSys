<?php
/**
 * Displays the post item thumbmnail
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Return if there isn't a thumbnail defined
if (!has_post_thumbnail()) {
    return;
}
// Add images size if blog grid
if ('posts-grid' == adeline_blog_style()) {
    $size = adeline_blog_images_size();
} else {
    $size = 'full';
}
// Overlay class
if (is_customize_preview() && false == adeline_get_option_value('blog_image_hover_overlay')) {
    $class = 'no-overlay';
} else {
    $class = 'overlay';
}
// Image args
$img_args = array('alt' => get_the_title());
if (adeline_get_schema_markup('image')) {
    $img_args['itemprop'] = 'image';
}
?>

<div class="thumbnail"> <a href="<?php the_permalink();?>" class="thumbnail-link">
  <?php
// Image width
$img_width  = apply_filters('adeline_blog_item_image_width', absint(intval((adeline_get_option_value('blog_image_width', 'width', '')))));
$img_height = apply_filters('adeline_blog_item_image_height', absint(intval((adeline_get_option_value('blog_image_height', 'height', '')))));
// Images attr
$img_id  = get_post_thumbnail_id(get_the_ID(), 'full');
$img_url = dpr_get_attachment_image_src($img_id, 'full');
if (ADELINE_EXT_ACTIVE && function_exists('adeline_image_attributes')) {
    $img_atts = adeline_image_attributes($img_url[1], $img_url[2], $img_width, $img_height);
}
// If DPR Adeline Extensions is active and has a custom size
if (ADELINE_EXT_ACTIVE && function_exists('adeline_resize') && !empty($img_atts)) {?>
  <img src="<?php echo adeline_resize($img_url[0], $img_atts['width'], $img_atts['height'], $img_atts['crop'], true, $img_atts['upscale']); ?>" alt="<?php the_title_attribute();?>" width="<?php echo esc_attr($img_width); ?>" height="<?php echo esc_attr($img_height); ?>"<?php adeline_schema_markup('image');?> />
  <?php
} else {
    // Display post thumbnail
    the_post_thumbnail($size, $img_args);
}
?>
  <?php
// If overlay
if (is_customize_preview() || true == adeline_get_option_value('blog_image_hover_overlay')) {
    ?>
  <span class="<?php echo esc_attr($class); ?>"></span>
  <?php
}?>
  </a> </div>
<!-- .thumbnail -->