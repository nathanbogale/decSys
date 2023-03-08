<?php
/**
 * Author for the small image style.
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
if ('post' == get_post_type() && adeline_get_option_value('blog_thumb_image_author') == true) {
    ?>

<div class="blog-item-author clr"> <i class="dpr-icon-user2"></i><?php echo the_author_posts_link(); ?>&nbsp;&nbsp; </div>
<?php
}?>
