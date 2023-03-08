<?php
/**
 * Blog item gallery format media
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Return if DPR Adeline Extensions is not active
if (!ADELINE_EXT_ACTIVE) {
    return;
}
// Get post gallery id's if exist
$gallery_images = adeline_get_gallery_ids(get_the_ID());
// Return standard item style if password protected or there aren't any gallery images
if (post_password_required() || empty($gallery_images)) {
    get_template_part('template-parts/blog/media/post');
    return;
}
// Add images size if blog grid
if ('posts-grid' == adeline_blog_style()) {
    $size = adeline_blog_images_size();
} else {
    $size = 'full';
}
?>

<div class="thumbnail">
  <div class="gallery-format clr">
    <?php
// Loop through each gallery images ID
foreach ($gallery_images as $gallery_image):
    // Get image data
    $gallery_image_title = get_the_title($gallery_image);
    $gallery_image_alt   = get_post_meta($gallery_image, '_wp_attachment_image_alt', true);
    $gallery_image_alt   = $gallery_image_alt ? $gallery_image_alt : $gallery_image_title;
    // Image width
    $img_width  = apply_filters('adeline_blog_item_image_width', absint(intval((adeline_get_option_value('blog_image_width', 'width', '')))));
    $img_height = apply_filters('adeline_blog_item_image_height', absint(intval((adeline_get_option_value('blog_image_height', 'height', '')))));
    // Images url
    $img_url = dpr_get_attachment_image_src($gallery_image, 'full');
    if (ADELINE_EXT_ACTIVE && function_exists('adeline_image_attributes')) {
        $img_atts = adeline_image_attributes($img_url[1], $img_url[2], $img_width, $img_height);
    }
    // If DPR Extension is active and has a custom size
    if (ADELINE_EXT_ACTIVE && function_exists('adeline_resize') && !empty($img_atts)) {
        $gallery_image_html = '<img src="' . adeline_resize($img_url[0], $img_atts['width'], $img_atts['height'], $img_atts['crop'], true, $img_atts['upscale']) . '" alt="' . esc_attr($gallery_image_alt) . '" width="' . $img_width . '" height="' . $img_height . '"/>';
    } else {
        // Image args
        $img_args = array('alt' => $gallery_image_alt);
        if (adeline_get_schema_markup('image')) {
            $img_args['itemprop'] = 'image';
        }
        // Get image output
        $gallery_image_html = wp_get_attachment_image($gallery_image, $size, '', $img_args);
    }
    // Display with lightbox
    if (adeline_get_meta_value(get_the_ID(), 'galery_post_lightbox')) {
        ?>
        <a href="<?php echo esc_url(wp_get_attachment_url($gallery_image)); ?>" title="<?php echo esc_attr($gallery_image_alt); ?>" data-rel="lightcase"> <?php echo wp_kses_post($gallery_image_html); ?> </a>
        <?php
    // Display without lightbox

    } else {
        ?>
        <a href="<?php the_permalink();?>" class="thumbnail-link"> <?php echo wp_kses_post($gallery_image_html); ?> </a>
        <?php
    }
endforeach;
?>
  </div>
</div>
