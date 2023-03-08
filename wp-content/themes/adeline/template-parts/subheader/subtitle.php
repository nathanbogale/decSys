<?php

/**

 * The template for displaying the subheader subtitle

 *

 * @package Adeline WordPress theme

 */



// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// Display subtitle if there is one

if ( $subtitle = adeline_get_subheader_subtitle() ) :
?>

<div class="clr subheader-subtitle"> <?php echo do_shortcode($subtitle); ?> </div>
<!-- subheader-subtitle -->

<?php endif; ?>
