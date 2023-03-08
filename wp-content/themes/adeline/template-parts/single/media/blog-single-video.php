<?php

/**

 * Blog single video format media

 *

 * @package Adeline WordPress theme

 */



// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// Return if DPR Adeline Extensions is not active

if ( ! ADELINE_EXT_ACTIVE ) {

	return;

}





// Display video if one exists and it's not a password protected post

if ( adeline_get_post_video_html() && ! post_password_required() ) : ?>

<div id="post-media" class="thumbnail clr">
  <div class="blog-post-video"> <?php echo adeline_get_post_video_html(); ?> </div>
  <!-- .blog-post-video --> 
  
</div>
<!-- #post-media -->

<?php

// Else display post thumbnail

else :
 ?>
<?php get_template_part('template-parts/single/media/blog-single'); ?>
<?php endif; ?>
