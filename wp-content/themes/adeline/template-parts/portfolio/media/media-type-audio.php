<?php

/**

 * Single portfolio item audio media

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}
?>
<?php if ( adeline_get_portfolio_audio_html() ) : ?>
<div class="thumbnail"><?php echo adeline_get_portfolio_audio_html(); ?></div>
<?php endif; ?>
