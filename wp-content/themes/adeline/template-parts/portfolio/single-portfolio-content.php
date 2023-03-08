<?php

/**

 * Portfolio single content

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}
?>

<div class="entry-content clr"<?php adeline_schema_markup('entry_content'); ?>>
  <?php the_content(); ?>
</div>
<!-- .entry -->