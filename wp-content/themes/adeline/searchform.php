<?php
/**
 * The template for displaying search forms.
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
$unique_id = rand(1,9999);
?>
<form method="get" class="searchform" id="searchform-<?php echo esc_attr($unique_id); ?>" action="<?php echo esc_url(home_url('/')); ?>">
  <input type="text" class="field" name="s" id="s-<?php echo esc_attr($unique_id); ?>" placeholder="<?php esc_attr_e('Search', 'adeline');?>">
</form>
