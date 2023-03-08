<?php

/**

 * Search result page item read more

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}

// Text

$text = esc_html__('Read More', 'adeline');

$text = apply_filters('adeline_search_readmore_link_text', $text);
?>

<div class="search-entry-readmore clr"> <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($text); ?>"><?php echo esc_html($text); ?></a> </div>
<!-- .search-entry-readmore -->