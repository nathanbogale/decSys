<?php
/**
 * Displays post item read more
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Text
$text = esc_html__('Read More', 'adeline');
$text = apply_filters('adeline_post_readmore_link_text', $text);
if ('post' == get_post_type()):
?>
<?php do_action('adeline_before_blog_item_readmore');?>

<div class="blog-item-readmore clr"> <a href="<?php the_permalink();?>" title="<?php echo esc_attr($text); ?>"><?php echo esc_html($text); ?></a> </div>
<!-- blog-item-readmore -->

<?php do_action('adeline_after_blog_item_readmore');?>
<?php
endif;?>
