<?php

/**

 * Blog single link format media

 *

 * @package Adeline WordPress theme

 */



// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



//Generate link html

$link_html = '';

$link_text = adeline_get_meta_value (get_the_ID(), 'link_post_link_text', '');

$link_target = adeline_get_meta_value (get_the_ID(), 'link_post_link_target', '');

$link_url = adeline_get_meta_value (get_the_ID(), 'link_post_link_url', '');



//If custom link

if ($link_url != '') {

	$link_html = '<a href="'.$link_url.'" target="'.$link_target.'">';

	$link_html .= $link_text;

	$link_html .= '</a>';


?>

<div class="post-link-wrapper">
  <div class="post-link-content"> <?php echo wp_kses_post($link_html); ?> <span class="post-link-icon dpr-icon-paperclip"></span> </div>
</div>
<?php } ?>
