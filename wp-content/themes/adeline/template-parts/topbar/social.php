<?php

/**

 * Topbar social profiles

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}

// Get social options array

$social_share_options = adeline_social_share();

// Add classes based on topbar style

$classes = '';

// Get theme options

$link_target = adeline_get_option_value('top_bar_social_target', '', 'blank');

$link_target = $link_target ? $link_target : 'blank';
?>

<div id="dpr-top-bar-social" class="clr <?php echo esc_attr($classes); ?>">
  <ul class="clr">
    <?php

		// Loop through social options

		foreach ($social_share_options as $key => $social) {

			// Get URL from the theme options

			$url = $social['link'];

			// Display if there is a value defined

			if ($url) {

				// Display link

				echo '<li class="dpr-adeline-' . esc_attr($key) . '">';

				if (in_array($key, array('skype'))) {

					echo '<a href="skype:' . esc_attr($url) . '?call" title="' . esc_attr($social['label']) . '" target="_self">';

				} else if (in_array($key, array('email'))) {

					echo '<a href="mailto:' . esc_attr($url) . '" title="' . esc_attr($social['label']) . '" target="_self">';

				} else {

					echo '<a href="' . esc_url($url) . '" title="' . esc_attr($social['label']) . '" target="_' . esc_attr($link_target) . '">';

				}

				echo '<span class="' . esc_attr($social['icon_class']) . '"></span>';

				echo '</a>';

				echo '</li>';

			} // End url check

		} // End loop
		?>
  </ul>
</div>
<!-- #dpr-top-bar-social -->