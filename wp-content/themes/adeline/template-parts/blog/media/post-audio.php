<?php
/**
 * Blog item audio format media
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
?>
<?php if (adeline_get_post_audio_html()):
// Image args
    $img_args = array('alt' => get_the_title());
    if (adeline_get_schema_markup('image')) {
        $img_args['itemprop'] = 'image';
    }
    ?>
  <div class="thumbnail">
    <?php if (true == adeline_get_option_value('audio_archive_view_thumb')) {
        ?>
    <a href="<?php the_permalink();?>" class="thumbnail-link">
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
        if (ADELINE_EXT_ACTIVE && function_exists('adeline_resize') && !empty($img_atts)) {
            ?>
    <img src="<?php echo adeline_resize($img_url[0], $img_atts['width'], $img_atts['height'], $img_atts['crop'], true, $img_atts['upscale']); ?>" alt="<?php the_title_attribute();?>" width="<?php echo esc_attr($img_width); ?>" height="<?php echo esc_attr($img_height); ?>"<?php adeline_schema_markup('image');?> />
    <?php
    } else {
            // Display post thumbnail
            the_post_thumbnail('full', $img_args);
        }
        ?>
    <?php
    // If overlay
        if (is_customize_preview() || true == adeline_get_option_value('blog_image_hover_overlay')) {
            ?>
    <span class="<?php echo esc_attr($class); ?>"></span>
    <?php
    }?>
    </a>
    <?php
    }?>
    <?php echo adeline_get_post_audio_html(); ?> </div>
  <?php
    // Else display post thumbnail
else:
?>
<?php get_template_part('template-parts/blog/media/post');?>
<?php
endif;?>
