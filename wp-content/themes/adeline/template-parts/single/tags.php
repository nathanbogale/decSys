<?php

/**

 * Blog single tags

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}

// Display tags
?>
<?php if(has_tag()) {
?>

<div class="post-tags clr">
  <?php the_tags('', '', ''); ?>
</div>
<?php } ?>
