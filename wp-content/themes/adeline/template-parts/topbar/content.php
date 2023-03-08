<?php

/**

 * Topbar content

 *

 * @package Adeline WordPress theme

 */



// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {

    exit;

}



// Get topbar content

$content = adeline_get_option_value('top_bar_content','','');

//$content = adeline_theme_opt_translation( 'top_bar_content', $content );



// Display topbar content

if ( $content != '' || has_nav_menu( 'topbar_menu' )) :
?>

<div id="dpr-top-bar-content">
  <?php

// Check if there is content for the topbar

if ( $content != '' ) :
	?>
  <span class="topbar-content">
  <?php

	// Display top bar content

	echo do_shortcode($content);
		?>
  </span>
  <?php endif; ?>
</div>
<!-- #dpr-top-bar-content -->

<?php endif; ?>
