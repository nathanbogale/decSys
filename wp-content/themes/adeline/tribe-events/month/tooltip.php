<?php

/**

 * The Events Calendar plugin template.

 *

 * @package Adeline WordPress theme

 */
?>
<script type="text/html" id="tribe_tmpl_tooltip">

	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip">

	<h3 class="entry-title summary">[[=title]]</h3>

	<div class="duration">

	<span class="tribe-events-abbr updated published dtstart">

	<span><?php echo tribe_get_start_date(null, false, 'M d, Y'); ?></span>

	<span> - <?php echo tribe_get_end_date(null, false, 'M d, Y'); ?></span>

	</span>

	</div>

	[[ if(imageTooltipSrc.length) { ]]

	<div class="tribe-events-event-thumb preloader">

	<img class="full-width" src="[[=imageTooltipSrc]]" alt="[[=title]]" />

	</div>

	[[ } ]]

	<div class="tribe-events-event-body">

	[[ if(excerpt.length) { ]]

	<div class="entry-summary description">[[=raw excerpt]]</div>

	[[ } ]]

	<span class="tribe-events-arrow"></span>

	</div>

	</div>

</script>