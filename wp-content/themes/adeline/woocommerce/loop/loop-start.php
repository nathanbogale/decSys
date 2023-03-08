<?php

/**

 * Product Loop Start

 *

 * @author 		WooThemes

 * @package 	WooCommerce/Templates

 * @version     9999

 */

// Classes

$wrap_classes = array('products', 'dpr-adeline-row', 'clr');

// List/grid style

if ((adeline_is_woo_shop() || adeline_is_woo_tax()) && adeline_get_option_value('dpr_woo_grid_list', '', true) && 'list' == adeline_get_option_value('woo_products_default_view', '', 'grid')) {

	$wrap_classes[] = 'list';

} else {

	$wrap_classes[] = 'grid';

}

// Responsive columns

$tablet_columns = adeline_get_option_value('woo_products_columns_tablet');

$mobile_columns = adeline_get_option_value('woo_products_columns_mobile');

if (!empty($tablet_columns)) {

	$wrap_classes[] = 'tablet-col';

	$wrap_classes[] = 'tablet-' . $tablet_columns . '-col';

}

if (!empty($mobile_columns)) {

	$wrap_classes[] = 'mobile-col';

	$wrap_classes[] = 'mobile-' . $mobile_columns . '-col';

}

// If infinite scroll

if ('standard' != adeline_get_option_value('woo_products_pagination_style', '', 'standard')) {

	$wrap_classes[] = 'infinite-scroll-wrapper';

}

$wrap_classes = implode(' ', $wrap_classes);
?>

<ul class="<?php echo esc_attr($wrap_classes); ?>">
