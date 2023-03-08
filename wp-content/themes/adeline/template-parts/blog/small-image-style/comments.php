<?php
/**
 * Comments for the small image style.
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
if ('post' == get_post_type() && adeline_get_option_value('blog_thumb_image_comments') == true) {
    ?>

<div class="blog-item-comments clr"> <i class="dpr-icon-comment-o"></i>
  <?php comments_popup_link(esc_html__('0 Comments', 'adeline'), esc_html__('1 Comment', 'adeline'), esc_html__('% Comments', 'adeline'), 'comments-link');?>
</div>
<?php
}?>
