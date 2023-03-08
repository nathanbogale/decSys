<?php
/**
 * Category for the small image style.
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
if ('post' == get_post_type() && adeline_get_option_value('blog_thumb_image_category') == true) {
    ?>

<div class="blog-item-category clr">
  <?php the_category(' | ', get_the_ID());?>
</div>
<?php
}?>