<?php
/**
 * Search Form for The Vertical Header Style
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
?>

<div id="vertical-searchform" class="header-searchform-wrapper clr">
  <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="header-searchform">
    <input type="search" name="s" autocomplete="off" value="" />
    <label><?php echo esc_html_e('Search...', 'adeline'); ?></label>
    <button class="search-submit"><i class="dpr-icon-magnifier"></i></button>
    <div class="search-bg"></div>
  </form>
</div>
<!-- #vertical-searchform -->