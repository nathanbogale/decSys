<?php
/**
 * Blog item link format
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Add post classes
$classes = adeline_post_item_classes();
//Generate link html
$link_html   = '';
$link_text   = adeline_get_meta_value(get_the_ID(), 'link_post_link_text', '');
$link_target = adeline_get_meta_value(get_the_ID(), 'link_post_link_target', '');
$link_url    = adeline_get_meta_value(get_the_ID(), 'link_post_link_url', '');
//If custom link
if ($link_url != '') {
    $link_html = '<a href="' . $link_url . '" target="' . $link_target . '">';
    $link_html .= $link_text;
    $link_html .= '</a>';
} else {
    $link_html = apply_filters('the_content', get_the_content());
}
?>

<article id="post-<?php the_ID();?>" <?php post_class($classes);?>>
  <div class="post-link-wrapper blog-item-inner">
    <div class="post-link-content"> <?php echo wp_kses_post($link_html); ?> <span class="post-link-icon dpr-icon-paperclip"></span> </div>
    <a href="<?php the_permalink();?>">
    <div class="post-link-author">
      <?php the_title();?>
    </div>
    </a> </div>
</article>
