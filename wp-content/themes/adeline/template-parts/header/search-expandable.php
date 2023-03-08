<?php
/**
 * Site header search expandable
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
?>

<div id="searchform-expandable-search" class="header-searchform-wrapper clr">
  <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="header-searchform">
    <input type="search" name="s" autocomplete="off" value="" placeholder="<?php echo esc_attr_e('Type then hit enter to search...', 'adeline'); ?>" />
  </form>
  <span id="searchform-expandable-search-close" class="dpr-icon-close"></span> </div>
<!-- #searchform-expandable-search -->