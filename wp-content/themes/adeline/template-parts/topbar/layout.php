<?php

/**

 * Topbar layout

 *

 * @package Adeline WordPress theme

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}

// Classes

$classes = array('clr');

// Add container class if the top bar is not full width

if (true != adeline_get_option_value('top_bar_full_width')) {

	$classes[] = 'container';

}

// If no content

if (adeline_get_option_value('top_bar_content', '', '') == '') {

	$classes[] = 'has-no-content';

}

// Turn classes into space seperated string

$classes = implode(' ', $classes);
?>
<?php do_action('adeline_before_top_bar'); ?>

<div id="dpr-top-bar-wrapper" class="<?php echo esc_attr(adeline_topbar_classes()); ?>">
  <div id="dpr-top-bar" class="<?php echo esc_attr($classes); ?>">
    <?php do_action('adeline_before_top_bar_inner');

	$elements = adeline_top_bar_elements();
		?>
    <div id="dpr-top-bar-inner" class="clr columns-<?php echo sizeof($elements)-1 ?>">
      <?php

			// Loop through elements

			$i = 0;

			foreach ($elements as $element) {

				$extra_class = '';

				if ($i > 0) {

					if ((sizeof($elements) - 1) == 3 && $i == 2)
						$extra_class = ' text-' . esc_attr(adeline_get_option_value('top_bar_middle_column_alignment', '', 'right'));

					echo '<div class="top-bar-column' . esc_attr($extra_class) . '">';

					// Contant

					if ('content' == $element) {

						get_template_part('template-parts/topbar/content');

					}

					// Top bar menu

					if ('menu' == $element) {

						get_template_part('template-parts/topbar/nav');

					}

					// Social

					if ('social' == $element) {

						get_template_part('template-parts/topbar/social');

					}

					echo '</div>';

				}

				$i = $i + 1;

			}
			?>
    </div>
    <!-- #dpr-top-bar-inner -->
    
    <?php do_action('adeline_after_top_bar_inner'); ?>
  </div>
  <!-- #dpr-top-bar --> 
  
</div>
<!-- #dpr-top-bar-wrapper -->

<?php do_action('adeline_after_top_bar'); ?>
