<?php

/**

 * Single portfolio item video media

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}

// Get post video

// Display video if one exists

if ( adeline_get_portfolio_video_html() != '' ) :
?>

<div class="blog-item-media thumbnail clr">
  <div class="blog-item-video"> <?php echo adeline_get_portfolio_video_html(); ?> </div>
  <!-- blog-item-video --> 
  
</div>
<!-- blog-item-media -->

<?php endif; ?>
