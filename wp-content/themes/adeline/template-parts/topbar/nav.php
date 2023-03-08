<?php

/**

 * Topbar menu displays inside the topbar "content" area

 *

 * @package Adeline WordPress theme

 */



// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {

	exit;

} 

// Get topbar menu

        if ( has_nav_menu( 'topbar_menu' ) )  {


?>

<div id="dpr-top-bar-nav" class="navigation clr" >
  <?php

	// Display menu

	wp_nav_menu(array('theme_location' => 'topbar_menu', 'fallback_cb' => false, 'container' => false, 'menu_class' => 'dpr-top-bar-menu dropdown-menu sf-menu', 'walker' => new Adeline_Custom_Nav_Walker(), ));
	?>
</div>
<?php } ?>
