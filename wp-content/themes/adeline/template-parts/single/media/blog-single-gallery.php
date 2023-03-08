<?php

/**

 * Blog single gallery format media

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}

// Return if DPR Adeline Extensions is not active

if (!ADELINE_EXT_ACTIVE) {

	return;

}

// Get attachments

$gallery_images = adeline_get_gallery_ids(get_the_ID());

// Return standard item style if password protected or there aren't any any gallery images

if (post_password_required() || empty($gallery_images)) {

	get_template_part('template-parts/single/media/blog-single');

	return;

}
 ?>

<div class="thumbnail">
  <div class="gallery-format clr">
    <?php

		// Loop through each attachment ID

		foreach ( $gallery_images as $gallery_image ) :



			// Get attachment data

			$gallery_image_title   = get_the_title( $gallery_image );

			$gallery_image_alt 	= get_post_meta( $gallery_image, '_wp_attachment_image_alt', true );

			$gallery_image_alt 	= $gallery_image_alt ? $gallery_image_alt : $gallery_image_title;



			// Get image output

			$gallery_image_html = wp_get_attachment_image( $gallery_image, 'full', '', array(

		        'alt'           => $gallery_image_alt,

		        'itemprop'      => 'image',

		    ) );



			// Display with lightbox

			if ( adeline_get_meta_value (get_the_ID(), 'galery_post_lightbox') ) :
?>
    <a href="<?php echo esc_url(wp_get_attachment_url($gallery_image)); ?>" title="<?php echo esc_attr($gallery_image_alt); ?>" data-rel="lightcase"> <?php echo wp_kses_post($gallery_image_html); ?></a>
    <?php

// Display single image

else :
?>
    <?php echo wp_kses_post($gallery_image_html); ?>
    <?php endif;

	endforeach;
?>
  </div>
</div>
