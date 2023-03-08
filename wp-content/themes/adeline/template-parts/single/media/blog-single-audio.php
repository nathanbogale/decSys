<?php

/**

 * Blog single audio format media

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



// Display audio if audio exists and the post isn't protected

if ( adeline_get_post_audio_html() && ! post_password_required()  ) : ?>

<div id="post-media" class="thumbnail clr">
  <?php   	// Image args

	$img_args = array('alt' => get_the_title(), );

	if (adeline_get_schema_markup('image')) {

		$img_args['itemprop'] = 'image';

	}

	if (true == adeline_get_option_value('audio_single_view_thumb')) {

		// Display post thumbnail

		the_post_thumbnail('full', $img_args);

	}
 ?>
  <div class="blog-post-audio clr"><?php echo adeline_get_post_audio_html(); ?></div>
</div>
<?php

// Else display post thumbnail

else :
 ?>
<?php get_template_part('template-parts/single/media/blog-single'); ?>
<?php endif; ?>
