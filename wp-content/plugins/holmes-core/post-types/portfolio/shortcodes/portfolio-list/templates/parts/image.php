<?php
$thumb_size = $this_object->getImageSize($params);
?>
<div class="mkdf-pli-image">
	<?php if ( has_post_thumbnail() ) {
		$image_src = get_the_post_thumbnail_url( get_the_ID() );
		
		if ( strpos( $image_src, '.gif' ) !== false ) {
			echo get_the_post_thumbnail( get_the_ID(), 'full' );
		}
		elseif ($type == 'small-images'){
            echo get_the_post_thumbnail( get_the_ID(), [150, 150] );
        }
		else {
			echo get_the_post_thumbnail( get_the_ID(), $thumb_size );
		}
	} else { ?>
		<img itemprop="image" class="mkdf-pl-original-image" width="800" height="600" src="<?php echo HOLMES_CORE_CPT_URL_PATH.'/portfolio/assets/img/portfolio_featured_image.jpg'; ?>" alt="<?php esc_attr_e('Portfolio Featured Image', 'holmes-core'); ?>" />
	<?php } ?>
</div>