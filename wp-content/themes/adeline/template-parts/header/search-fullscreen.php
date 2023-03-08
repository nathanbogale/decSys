<?php
/**
 * Site header search fullscreen
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
$effect = adeline_get_option_value('fullscreen_search_appear_effect', '', 'overlay-hugeinc');
?>

<div id="searchform-fullscreen" class="header-searchform-wrapper clr <?php echo esc_attr($effect) ?>"> <a href="#" class="search-fullscreen-close"><span></span></a>
  <div class="container clr">
    <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="header-searchform">
      <input type="search" name="s" autocomplete="off" value="" />
      <label><?php echo esc_html_e('Type your text and hit enter to search', 'adeline'); ?><
        span><i></i><i></i><i></i></span></label>
    </form>
  </div>
</div>
<!-- #searchform-fullscreen -->