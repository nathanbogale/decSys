<?php
/**
 * Blog item video format media
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
// Get post video

?>
<?php
// Display video if one exists and it's not a password protected post
if (adeline_get_post_video_html() && !post_password_required()): ?>

<div class="blog-item-media thumbnail clr">
  <div class="blog-item-video"> <?php echo adeline_get_post_video_html(); ?> </div>
  <!-- blog-item-video -->

</div>
<!-- blog-item-media -->

<?php
// Else display post thumbnail
else:
?>
<?php get_template_part('template-parts/blog/media/post');?>
<?php
endif;?>
