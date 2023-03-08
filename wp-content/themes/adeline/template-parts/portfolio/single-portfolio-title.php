<?php

/**

 * Displays the title

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}
 ?>

<header class="entry-header clr">
  <h2 class="single-portfolio-title entry-title"<?php adeline_schema_markup('headline'); ?>>
    <?php the_title(); ?>
  </h2>
  <!-- .single-portfolio-title --> 
  
</header>
<!-- .entry-header -->