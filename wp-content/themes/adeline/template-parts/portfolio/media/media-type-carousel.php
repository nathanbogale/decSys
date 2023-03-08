<?php

/**

 * Single portfolio gallery media type

 *

 * @package Adeline WordPress theme

 */



// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// Get post gallery id's if exist

$gallery_images = adeline_get_porftolio_images_ids( get_the_ID() );

$size = 'full';



if (!empty($gallery_images )) {

?>

<div class="gallery-format clr">
  <?php

		// Loop through each gallery images ID

		foreach ( $gallery_images as $gallery_image ) :



			// Get image data

			$gallery_image_title   = get_the_title( $gallery_image );

			$gallery_image_alt 	= get_post_meta( $gallery_image, '_wp_attachment_image_alt', true );

			$gallery_image_alt 	= $gallery_image_alt ? $gallery_image_alt : $gallery_image_title;



	    	// Images url

			$img_url 	= dpr_get_attachment_image_src( $gallery_image, 'full' );



			// Image args

			$img_args = array(

				'alt' => $gallery_image_alt,

			);

			if ( adeline_get_schema_markup( 'image' ) ) {

				$img_args['itemprop'] = 'image';

			}



			// Get image output

			$gallery_image_html = wp_get_attachment_image( $gallery_image, $size, '', $img_args );





			// Display with lightbox

			if ( adeline_get_meta_value (get_the_ID(), 'portfolio_single_gallery_lightbox')) {
?>
  <a href="<?php echo esc_url(wp_get_attachment_url($gallery_image)); ?>" title="<?php echo esc_attr($gallery_image_alt); ?>" data-rel="lightcase"> <?php echo wp_kses_post($gallery_image_html); ?></a>
  <?php

// Display without lightbox

} else {
?>
  <?php echo wp_kses_post($gallery_image_html); ?>
  <?php

}

endforeach;
?>
</div>
<?php } ?>
