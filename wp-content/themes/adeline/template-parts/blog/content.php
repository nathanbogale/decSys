<?php
/**
 * Displays post item content
 *
 * @package Adeline WordPress theme
 */
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
?>
<?php do_action('adeline_before_blog_item_content');?>

<div class="blog-item-summary clr"<?php adeline_schema_markup('entry_content');?>>
  <?php
// Display excerpt
if ('300' != adeline_get_option_value('blog_excerpt_length', '', '30')):
?>
  <p>
    <?php
// Display custom excerpt
adeline_excerpt(absint(adeline_get_option_value('blog_excerpt_length', '', '30')));
?>
  </p>
  <?php
// If excerpts are disabled, display full content
else:
    the_content('', '&hellip;');
endif;
?>
</div>
<!-- blog-item-summary -->

<?php do_action('adeline_after_blog_item_content');?>
