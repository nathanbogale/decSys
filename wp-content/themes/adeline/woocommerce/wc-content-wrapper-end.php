<?php

/**

 * After Container template.

 *

 * @package Adeline WordPress theme */

if (!defined('ABSPATH')) {

	exit ;
	// Exit if accessed directly

}
?>
</article>
<!-- #post -->

<?php do_action('adeline_after_content_inner'); ?>
</div>
<!-- #content -->

<?php do_action('adeline_after_content'); ?>
</div>
<!-- #primary -->

<?php do_action('adeline_after_primary'); ?>
<?php do_action('adeline_display_sidebar'); ?>
</div>
<!-- #content-wrap -->

<?php do_action('adeline_after_content_wrap'); ?>