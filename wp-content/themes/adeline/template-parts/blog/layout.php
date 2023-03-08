<?php
/**
 * Default post item layout
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Get post format
$format = get_post_format();
// Blog style
$style                = adeline_get_option_value('blog_style', '', 'large-image');
$item_shadow          = adeline_get_option_value('blog_entry_shadow', '', '0');
$item_hover_shadow    = adeline_get_option_value('blog_entry_shadow_hover', '', '0');
$item_hover_animation = adeline_get_option_value('blog_entry_hover_animation', '', 'none');
$item_inner_classes   = '';
if (isset($item_hover_animation) && ($item_hover_animation == 'dpr-image-tilt' || $item_hover_animation == 'dpr-item-tilt')) {
    wp_enqueue_script('jquery-tilt', DPR_EXTENSIONS_PLUGIN_URL . 'vc-extend/assets/frontend/js/universal-tilt.min.js', array('jquery'), null, true);
    wp_enqueue_script('dpr-portfolio-scat-grid-hover-animations', DPR_EXTENSIONS_PLUGIN_URL . 'vc-extend/assets/frontend/js/dpr.scat.grid.anim.js', array('jquery'), null, true);
}
if (adeline_get_option_value('blog_entry_style', '', '') == 'tiled') {
    if ('custom' != $item_shadow && '' != $item_shadow) {
        $item_inner_classes .= ' dpr-shadow-' . $item_shadow;
    }
    if ('custom' != $item_hover_shadow && '' != $item_hover_shadow) {
        $item_inner_classes .= ' dpr-shadow-onhover-' . $item_hover_shadow;
    }

    if ('none' != $item_hover_animation) {
        $item_inner_classes .= ' ' . $item_hover_animation;
    }
}
// Custom quote format template
if ('quote' == $format) {
    // Get quote item content
    get_template_part('template-parts/blog/quote');
    return;
}
// Custom link format template
if ('link' == $format) {
    // Get quote item content
    get_template_part('template-parts/blog/link');
    return;
}
// If small image style
if ('small-image' == $style) {
    get_template_part('template-parts/blog/small-image-style/layout');
} else {
    // Add classes to the blog item post class
    $classes = adeline_post_item_classes();
    ?>

<article id="post-<?php the_ID();?>" <?php post_class($classes);?>>
  <div class="blog-item-inner clr <?php echo esc_attr($item_inner_classes); ?>">
    <?php
$elements = adeline_blog_item_elements();
    // Loop through elements
    foreach ($elements as $element) {
        // Featured Image
        if ('featured_image' == $element) {
            get_template_part('template-parts/blog/media/post', $format);
        }
        // Title
        if ('title' == $element) {
            get_template_part('template-parts/blog/header');
        }
        // Meta
        if ('meta' == $element) {
            get_template_part('template-parts/blog/meta');
        }
        // Content
        if ('content' == $element) {
            if ('video' != $format && 'audio' != $format) {
                get_template_part('template-parts/blog/content');
            }
        }
        // Read more button
        if ('read_more' == $element) {
            get_template_part('template-parts/blog/readmore');
        }
    }
    ?>
  </div>
  <!-- blog-item-inner -->

</article>
<!-- #post-## -->

<?php
}
?>
