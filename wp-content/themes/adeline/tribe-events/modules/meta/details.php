<?php

/**

 * The Events Calendar plugin template.

 *

 * @package Adeline WordPress theme

 */

$time_format = get_option('time_format', Tribe__Date_Utils::TIMEFORMAT);

$time_range_separator = tribe_get_option('timeRangeSeparator', ' - ');

$start_datetime = tribe_get_start_date();

$start_date = tribe_get_start_date(null, false);

$start_time = tribe_get_start_date(null, false, $time_format);

$start_ts = tribe_get_start_date(null, false, Tribe__Date_Utils::DBDATEFORMAT);

$end_datetime = tribe_get_end_date();

$end_date = tribe_get_display_end_date(null, false);

$end_time = tribe_get_end_date(null, false, $time_format);

$end_ts = tribe_get_end_date(null, false, Tribe__Date_Utils::DBDATEFORMAT);

$cost = tribe_get_formatted_cost();

$website = tribe_get_event_website_link();
?>

<div class="tribe-events-meta-group tribe-events-meta-group-details">
  <h5 class="tribe-events-single-section-title">
    <?php esc_html_e( 'Details', 'adeline' ) ?>
  </h5>
  <div class="dpr_event_meta_info">
    <?php

		do_action( 'tribe_events_single_meta_details_section_start' );



		// All day (multiday) events

		if ( tribe_event_is_all_day() && tribe_event_is_multiday() ) :

			?>
    <div class="dpr_event_meta_info_item"> <span class="dpr_event_meta_info_item_title">
      <?php esc_html_e( 'Start:', 'adeline' ) ?>
      </span> <span class="dpr_event_meta_info_item_descr"> <abbr class="tribe-events-abbr updated published dtstart" title="<?php echo esc_attr( $start_ts ) ?>"> <?php echo esc_html( $start_date ) ?> </abbr> </span> </div>
    <div class="dpr_event_meta_info_item"> <span class="dpr_event_meta_info_item_title">
      <?php esc_html_e( 'End:', 'adeline' ) ?>
      </span> <span class="dpr_event_meta_info_item_descr"> <abbr class="tribe-events-abbr dtend" title="<?php echo esc_attr( $end_ts ) ?>"> <?php echo esc_html( $end_date ) ?> </abbr> </span> </div>
    <?php

		// All day (single day) events

		elseif ( tribe_event_is_all_day() ):
			?>
    <div class="dpr_event_meta_info_item"> <span class="dpr_event_meta_info_item_title">
      <?php esc_html_e( 'Date:', 'adeline' ) ?>
      </span> <span class="dpr_event_meta_info_item_descr"> <abbr class="tribe-events-abbr updated published dtstart" title="<?php echo esc_attr( $start_ts ) ?>"> <?php echo esc_html( $start_date ) ?> </abbr> </span> </div>
    <?php

		// Multiday events

		elseif ( tribe_event_is_multiday() ) :
			?>
    <div class="dpr_event_meta_info_item"> <span class="dpr_event_meta_info_item_title">
      <?php esc_html_e( 'Start:', 'adeline' ) ?>
      </span> <span class="dpr_event_meta_info_item_descr"> <abbr class="tribe-events-abbr updated published dtstart" title="<?php echo esc_attr( $start_ts ) ?>"> <?php echo esc_html( $start_datetime ) ?> </abbr> </span> </div>
    <div class="dpr_event_meta_info_item"> <span class="dpr_event_meta_info_item_title">
      <?php esc_html_e( 'End:', 'adeline' ) ?>
      </span> <span class="dpr_event_meta_info_item_descr"> <abbr class="tribe-events-abbr dtend" title="<?php echo esc_attr( $end_ts ) ?>"> <?php echo esc_html( $end_datetime ) ?> </abbr> </span> </div>
    <?php

		// Single day events

		else :
			?>
    <div class="dpr_event_meta_info_item"> <span class="dpr_event_meta_info_item_title">
      <?php esc_html_e( 'Date:', 'adeline' ) ?>
      </span> <span class="dpr_event_meta_info_item_descr"> <abbr class="tribe-events-abbr updated published dtstart" title="<?php echo esc_attr( $start_ts ) ?>"> <?php echo esc_html( $start_date ) ?> </abbr> </span> </div>
    <div class="dpr_event_meta_info_item"> <span class="dpr_event_meta_info_item_title">
      <?php esc_html_e( 'Time:', 'adeline' ) ?>
      </span> <span class="dpr_event_meta_info_item_descr"> <abbr class="tribe-events-abbr updated published dtstart" title="<?php echo esc_attr( $end_ts ) ?>">
      <?php
	if ($start_time == $end_time) {

		echo esc_html($start_time);

	} else {

		echo esc_html($start_time . $time_range_separator . $end_time);

	}
 ?>
      </abbr> </span> </div>
    <?php endif ?>
    <?php

		// Event Cost

		if ( ! empty( $cost ) ) : ?>
    <div class="dpr_event_meta_info_item"> <span class="dpr_event_meta_info_item_title">
      <?php esc_html_e( 'Cost:', 'adeline' ) ?>
      </span> <span class="dpr_event_meta_info_item_descr tribe-events-event-cost"><?php echo esc_html($cost); ?></span> </div>
    <?php endif ?>
    <?php

		if (get_the_terms(get_the_id(), 'tribe_events_cat')) {

			$dpr_tribe_events_cat_count = sizeof(get_the_terms(get_the_id(), 'tribe_events_cat'));

			echo '<div class="dpr_event_meta_info_item">' . tribe_get_event_categories(get_the_id(), array('before' => '', 'sep' => ', ', 'after' => '', 'label' => null, // An appropriate plural/singular label will be provided

			'label_before' => '<span class="dpr_event_meta_info_item_title">', 'label_after' => '</span>', 'wrap_before' => '<span class="dpr_event_meta_info_item_descr tribe-events-event-categories">', 'wrap_after' => '</span>', )) . '</div>';

		}

		$dpr_event_tags = tribe_meta_event_tags(sprintf(esc_html__('%s Tags:', 'adeline'), tribe_get_event_label_singular()), ', ', false);

		if ($dpr_event_tags) {

			echo '<div class="dpr_event_meta_info_item dpr_event_tags">' . '<dl>' . tribe_meta_event_tags(sprintf(esc_html__('%s Tags:', 'adeline'), tribe_get_event_label_singular()), ', ', false) . '</dl>' . '</div>';

		}
		?>
    <?php

		// Event Website

		if ( ! empty( $website ) ) : ?>
    <div class="dpr_event_meta_info_item"> <span class="dpr_event_meta_info_item_title">
      <?php esc_html_e( 'Website:', 'adeline' ) ?>
      </span> <span class="dpr_event_meta_info_item_descr tribe-events-event-url"> <?php echo wp_kses($website, 'post'); ?></span> </div>
    <?php endif ?>
    <?php do_action( 'tribe_events_single_meta_details_section_end' ) ?>
  </div>
</div>
