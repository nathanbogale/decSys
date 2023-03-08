<?php

/**

 * The Events Calendar plugin template.

 *

 * @package Adeline WordPress theme

 */

function adeline_event_meta_info_col_num() {

	$col_num = 1;

	if (tribe_has_venue()) {

		$col_num += 1;

	}

	if (tribe_has_organizer()) {

		$col_num += 1;

	}

	if (function_exists('tribe_get_custom_fields') && tribe_get_custom_fields()) {

		$col_num += 1;

	}

	return $col_num;

}

$dpr_event_meta_info_col = 'dpr_event_meta_info_col_' . adeline_event_meta_info_col_num();

do_action('tribe_events_single_meta_before');

echo '<div class="tribe-events-single-section tribe-events-event-meta dpr_single_event_meta ' . $dpr_event_meta_info_col . '">';

do_action('tribe_events_single_event_meta_primary_section_start');

tribe_get_template_part('modules/meta/details');

if (tribe_has_venue()) {

	tribe_get_template_part('modules/meta/venue');

}

if (tribe_has_organizer()) {

	tribe_get_template_part('modules/meta/organizer');

}

do_action('tribe_events_single_event_meta_primary_section_end');

echo '</div>';

do_action('tribe_events_single_meta_after');
?>