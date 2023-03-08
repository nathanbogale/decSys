<?php

/**

 * Portfolio single content block details bellow

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}
?>
<?php

	$media_type = adeline_get_option_value('portfolio_single_media_type', '', 'image');

	$columns_count = 0;

	$is_column_1 = $is_column_2 = $is_column_3 = false;

	if ('' != adeline_get_option_value('porfolio_single_description_1_content')) {

		$is_column_1 = true;

		$columns_count += 1;

	}

	if ('' != adeline_get_option_value('porfolio_single_description_2_content')) {

		$is_column_2 = true;

		$columns_count += 1;

	}

	if ('' != adeline_get_option_value('porfolio_single_description_short_1_content') || '' != adeline_get_option_value('porfolio_single_description_short_2_content') || '' != adeline_get_option_value('porfolio_single_description_short_3_content') || '' != adeline_get_option_value('porfolio_single_action_button_link')) {

		$is_column_3 = true;

		$columns_count += 1;

	}
?>

<div class="entry-content dpr-adeline-row clr"<?php adeline_schema_markup('entry_content'); ?>>
  <div class="col span_1_of_1">
    <?php

		// Get media

		get_template_part('template-parts/portfolio/media/media-type-' . $media_type);
		?>
  </div>
  <?php if ($is_column_1) {
	?>
  <div class="col span_1_of_<?php echo esc_attr($columns_count) ?> single-portfolio-details details-bellow">
    <?php

		// Get description field 1

		get_template_part('template-parts/portfolio/details/details-1');
		?>
  </div>
  <?php } ?>
  <?php if ($is_column_2) {
	?>
  <div class="col span_1_of_<?php echo esc_attr($columns_count) ?> single-portfolio-details details-bellow">
    <?php

		// Get description field 2

		get_template_part('template-parts/portfolio/details/details-2');
		?>
  </div>
  <?php } ?>
  <?php if ($is_column_3) {
	?>
  <div class="col span_1_of_<?php echo esc_attr($columns_count) ?> single-portfolio-details details-bellow">
    <?php

		// Get description field 3

		get_template_part('template-parts/portfolio/details/details-3');
		?>
  </div>
  <?php } ?>
</div>
<!-- .entry -->