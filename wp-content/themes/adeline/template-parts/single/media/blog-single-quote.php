<?php

/**

 * Blog single quote format

 *

 * @package Adeline WordPress theme

 */



// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



//Generate quote html

$quote_html = '';

$quote_text = adeline_get_meta_value (get_the_ID(), 'quote_post_quote_text', '');

$quote_author = adeline_get_meta_value (get_the_ID(), 'quote_post_quote_author', '');

$quote_link = adeline_get_meta_value (get_the_ID(), 'quote_post_quote_link', '');



	//If custom quote

	if ($quote_text != '') {

		$quote_html = '<blockquote>';

		$quote_html .= $quote_text;

			if($quote_author != '') {

				$quote_html .= '<cite>';

				if($quote_link != '') {

					$quote_html .= '<a href="'.esc_url($quote_link).'">';

				}

				$quote_html .= $quote_author;

				if($quote_link != '') {

					$quote_html .= '</a>';

				}

				$quote_html .= '</cite>';

			}

		$quote_html .= '</blockquote>';

	}



if ($quote_html != '')	{ 


?>

<div class="post-quote-wrapper">
  <div class="post-quote-content"> <?php echo wp_kses_post($quote_html); ?> <span class="post-quote-icon dpr-icon-right-quotation-sign"></span> </div>
</div>
<?php } ?>
