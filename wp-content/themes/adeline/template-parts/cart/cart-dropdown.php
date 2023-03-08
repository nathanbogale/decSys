<?php
/**
 * Header cart dropdown
 *
 * @package Adeline WordPress theme
 */
?>

<div id="current-shop-items-dropdown" class="clr" style="display:none;">
  <div id="current-shop-items-inner" class="clr">
    <?php
// Display WooCommerce cart
the_widget('WC_Widget_Cart');
?>
  </div>
  <!-- #current-shop-items-inner -->

</div>
<!-- #current-shop-items-dropdown -->