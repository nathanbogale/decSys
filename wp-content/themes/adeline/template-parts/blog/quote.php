<?php
/**
 * Blog item quote format
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
$item_shadow          = adeline_get_option_value('blog_entry_shadow', '', '0');
$item_hover_shadow    = adeline_get_option_value('blog_entry_shadow_hover', '', '0');
$item_hover_animation = adeline_get_option_value('blog_entry_hover_animation', '', 'none');
$item_inner_classes   = '';
if (adeline_get_option_value('blog_entry_style', '', 'tiled') == 'tiled') {
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
// Add post classes
$classes = adeline_post_item_classes();
//Generate quote html
$quote_html   = '';
$quote_text   = adeline_get_meta_value(get_the_ID(), 'quote_post_quote_text', '');
$quote_author = adeline_get_meta_value(get_the_ID(), 'quote_post_quote_author', '');
$quote_link   = adeline_get_meta_value(get_the_ID(), 'quote_post_quote_link', '');
//If custom quote
if ($quote_text != '') {
    $quote_html = '<blockquote>';
    $quote_html .= $quote_text;
    if ($quote_author != '') {
        $quote_html .= '<cite>';
        if ($quote_link != '') {
            $quote_html .= '<a href="' . $quote_link . '">';
        }
        $quote_html .= $quote_author;
        if ($quote_link != '') {
            $quote_html .= '</a>';
        }
        $quote_html .= '</cite>';
    }
    $quote_html .= '</blockquote>';
} else {
    $quote_html = apply_filters('the_content', get_the_content());
}
?>

<article id="post-<?php the_ID();?>" <?php post_class($classes);?>>
  <div class="post-quote-wrapper blog-item-inner <?php echo esc_attr($item_inner_classes) ?> ">
    <div class="post-quote-content"> <?php echo wp_kses_post($quote_html); ?> <span class="post-quote-icon dpr-icon-right-quotation-sign"></span> </div>
    <a href="<?php the_permalink();?>">
    <div class="post-quote-author">
      <?php the_title();?>
    </div>
    </a> </div>
</article>
