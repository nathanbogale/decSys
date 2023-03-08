<?php

/**

 * Single product template.

 *

 * @package Adeline WordPress theme */

if (!defined('ABSPATH')) {

	exit ;
	// Exit if accessed directly

}

// Get elements

$elements = adeline_single_product_elements();

// Loop through elements

foreach ($elements as $element) {

	do_action('adeline_before_single_product_' . $element);

	// Title

	if ('title' == $element) {

		woocommerce_template_single_title();

	}

	// Rating

	if ('rating' == $element) {

		woocommerce_template_single_rating();

	}

	// Price

	if ('price' == $element) {

		woocommerce_template_single_price();

	}

	// Excerpt

	if ('excerpt' == $element) {

		woocommerce_template_single_excerpt();

	}

	// Quantity & Add to cart button

	if ('quantity-button' == $element) {

		woocommerce_template_single_add_to_cart();

	}

	// Meta

	if ('meta' == $element) {

		woocommerce_template_single_meta();

	}

	// Sharing

	if ('sharing' == $element && ADELINE_EXT_ACTIVE) {

				dpr_add_woo_social_share();

	}

	do_action('adeline_after_single_product_' . $element);

}
