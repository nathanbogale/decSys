<?php

/**

 * Displays portfolio item featured image

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}

// Return if there isn't a thumbnail defined

if (!has_post_thumbnail()) {

	return;

}

$size = 'full';

// Image args

$img_args = array('alt' => get_the_title(), );

if (adeline_get_schema_markup('image')) {

	$img_args['itemprop'] = 'image';

}
?>

<div class="thumbnail">
  <?php the_post_thumbnail($size, $img_args); ?>
</div>
<!-- .thumbnail -->