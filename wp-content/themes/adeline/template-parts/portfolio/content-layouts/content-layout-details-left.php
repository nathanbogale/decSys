<?php

/**

 * Portfolio single content block details left

 */

// Exit if accessed directly

if (!defined('ABSPATH')) {

	exit ;

}
?>
<?php 



$media_type = adeline_get_option_value( 'portfolio_single_media_type', '', 'image');

$media_width = adeline_get_option_value( 'portfolio_single_media_block_width', '', 'two-thirds');

$use_sticky_columns = adeline_get_option_value( 'portfolio_single_sticky_columns');



switch ($media_width) {

    case 'one-third':

		$details_column_class = 'span_2_of_3';

		$media_column_class = 'span_1_of_3';

        break;

    case "half":

		$details_column_class = 'span_1_of_2';

		$media_column_class = 'span_1_of_2';

        break;

    case "two-thirds":

		$details_column_class = 'span_1_of_3';

		$media_column_class = 'span_2_of_3';

        break;

}



$sticky_class = '';



if ($use_sticky_columns) $sticky_class = 'theia-sidebar'




?>

<div class="entry-content dpr-adeline-row clr"<?php adeline_schema_markup('entry_content'); ?>>
  <div class="col <?php echo esc_attr($details_column_class) ?> single-portfolio-details details-left <?php echo esc_attr($sticky_class) ?>">
    <?php

		// Get description field 1

		get_template_part('template-parts/portfolio/details/details-1');
		?>
    <?php

		// Get description field 2

		get_template_part('template-parts/portfolio/details/details-2');
		?>
    <?php

		// Get description field 3

		get_template_part('template-parts/portfolio/details/details-3');
		?>
  </div>
  <div class="col <?php echo esc_attr($media_column_class) ?> <?php echo esc_attr($sticky_class) ?>">
    <?php

		// Get media

		get_template_part('template-parts/portfolio/media/media-type-' . $media_type);
		?>
  </div>
</div>
<!-- .entry -->