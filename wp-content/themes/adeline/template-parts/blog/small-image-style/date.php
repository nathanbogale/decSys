<?php
/**
 * Date for the small image style.
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
if ('post' == get_post_type() && adeline_get_option_value('blog_thumb_image_date') == true) {
    ?>

<div class="blog-item-date clr"> <?php echo get_the_date(); ?> </div>
<?php
}?>
