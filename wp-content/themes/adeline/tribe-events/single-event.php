<?php

/**

 * The Events Calendar plugin template.

 *

 * @package Adeline WordPress theme

 */



$events_label_singular = tribe_get_event_label_singular();

$events_label_plural = tribe_get_event_label_plural();



$venue_details = tribe_get_venue_details();



$has_venue = ( $venue_details ) ? ' vcard' : '';

$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';



$event_id = get_the_ID();



if (have_posts()) : the_post();




?>

<div id="tribe-events-content" class="tribe-events-single vevent hentry">
<div id="post-<?php the_ID(); ?>" <?php post_class('dpr_single_event'); ?>>
<?php

tribe_the_notices();
?>
<div class="dpr_single_event_header clearfix">
  <div class="inner_wrap">
    <div class="updated published time-details dpr_events_start_date"> <span class="dpr_event_day"><?php echo tribe_get_start_date(null, false, 'd'); ?></span> <span class="dpr_event_month_week"> <span class="dpr_event_month"><?php echo tribe_get_end_date(null, false, 'F'); ?></span> <span class="dpr_event_week"><?php echo tribe_get_end_date(null, false, 'l'); ?></span> </span> </div>
    <div class="dpr_single_event_header_left clearfix">
      <?php

the_title('<h2 class="tribe-events-single-event-title summary entry-title">', '</h2>');

echo '<div class="tribe-events-schedule updated published clearfix">';
?>
      <div class="updated published time-details dpr_events_start_end_date"> <span class="dpr_event_start"><?php echo tribe_get_start_date(null, false, 'd F Y, H:i'); ?></span> <span class="dpr_event_end"> - <?php echo tribe_get_end_date(null, false, 'd F Y, H:i'); ?></span> </div>
      <?php if ( $venue_details ) : ?>
      
      <!-- Venue Display Info -->
      
      <div class="tribe-events-venue-details"> <?php echo implode(', ', $venue_details); ?> </div>
      <!-- .tribe-events-venue-details -->
      
      <?php endif;

	echo '</div>';
?>
    </div>
    <div class="dpr_single_event_header_right clearfix">
      <div class="tribe-events-back"> <a class="dpr_theme_icon_date" href="<?php echo esc_url(tribe_get_events_link()); ?>"> <?php printf(esc_html__('All %s', 'adeline'), $events_label_plural); ?></a> </div>
      <?php

$dpr_tribe_events_ical = new Tribe__Events__iCal();

$dpr_tribe_events_ical -> single_event_links();
?>
    </div>
  </div>
</div>
<?php

if (has_post_thumbnail() || tribe_embed_google_map()) {

	echo '<div class="dpr_single_event_map_img_wrap';

	if (has_post_thumbnail() && tribe_embed_google_map()) {

		echo ' with_thumb_and_map';

	}

	echo '">';

	if (has_post_thumbnail()) {

		echo '<div class="dpr_single_event_img">' . tribe_event_featured_image($event_id, (!tribe_embed_google_map() ? 'dpr-full-width-event-image' : 'dpr-half-width-event-image'), false) . '</div>';

	}

	if (tribe_embed_google_map()) {

		echo '<div class="dpr_single_event_map' . (!has_post_thumbnail() ? ' dpr_single_event_full_width' : '') . '">';

		tribe_get_template_part('modules/meta/map');

		echo '</div>';

	}

	echo '</div>';

}

do_action('tribe_events_single_event_before_the_content');

echo '<div class="tribe-events-single-event-description dpr_single_event_content tribe-events-content entry-content description">';

the_content();

echo '</div>';

do_action('tribe_events_single_event_after_the_content');

echo '</div>';

do_action('tribe_events_single_event_before_the_meta');

if (!apply_filters('tribe_events_single_event_meta_legacy_mode', false)) {

	tribe_get_template_part('modules/meta');

} else {

	echo tribe_events_single_event_meta();

}
?>

<!-- Event footer -->

<div id="tribe-events-footer"> 
  
  <!-- Navigation -->
  
  <nav class="tribe-events-nav-pagination" aria-label="<?php printf(esc_html__('%s Navigation', 'adeline'), $events_label_singular); ?>">
    <ul class="tribe-events-sub-nav">
      <li class="tribe-events-nav-previous">
        <?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?>
      </li>
      <li class="tribe-events-nav-next">
        <?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?>
      </li>
    </ul>
    
    <!-- .tribe-events-sub-nav --> 
    
  </nav>
</div>

<!-- #tribe-events-footer -->

<?php

$dpr_post_type = get_post_type();

do_action('tribe_events_single_event_after_the_meta');

if (get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option('showComments', false)) {

	comments_template();

}

echo '</div>';

endif;

