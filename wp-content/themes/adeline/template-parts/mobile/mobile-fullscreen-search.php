<?php

/**

 * Search for the full screen mobile style.

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

    exit;

}

if ('fullscreen' != adeline_mobile_menu_style()) {

    return;

}
?>

<div id="mobile-search" class="clr">
  <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="header-searchform">
    <input type="search" name="s" value="" autocomplete="off" />
    <label>
      <?php esc_html_e('Type your search', 'adeline');?>
      <
      span><i></i><i></i><i></i></span></label>
  </form>
</div>
