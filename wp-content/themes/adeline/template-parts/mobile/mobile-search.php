<?php

/**

 * Mobile search template.

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

    exit;

}
?>

<div id="mobile-menu-search" class="clr">
  <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mobile-searchform">
    <input type="search" name="s" autocomplete="off" placeholder="<?php echo esc_attr(apply_filters('adeline_mobile_searchform_placeholder', esc_html__('Search', 'adeline'))); ?>" />
    <button type="submit" class="searchform-submit"> <span class="icon dpr-icon-magnifier"></span> </button>
  </form>
</div>
<!-- .mobile-menu-search -->