<?php

/**

 * Single Venue Template

 * The template for a venue. By default it displays venue information and lists

 * events that occur at the specified venue.

 */

if (!defined('ABSPATH')) {

	die('-1');

}

if (!$wp_query = tribe_get_global_query_object()) {

	return;

}

$venue_id = get_the_ID();

$full_address = tribe_get_full_address();

$telephone = tribe_get_phone();

$website_link = tribe_get_venue_website_link();
?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="tribe-events-venue">
  <p class="tribe-events-back"> <a href="<?php echo esc_url(tribe_get_events_link()); ?>" rel="bookmark"><?php printf(esc_html__('&larr; Back to %s', 'adeline'), tribe_get_event_label_plural()); ?></a> </p>
  <div class="tribe-events-venue-meta tribe-clearfix">
    <div class="dpr-adeline-row venue-header clr">
      <div class="col span_1_of_2 left"> 
        
        <!-- Venue Title -->
        
        <?php do_action( 'tribe_events_single_venue_before_title' ) ?>
        <h2 class="tribe-venue-name"><?php echo tribe_get_venue($venue_id); ?></h2>
        <?php do_action( 'tribe_events_single_venue_after_title' ) ?>
        <div class="tribe-events-event-meta"> 
          
          <!-- Venue Meta -->
          
          <?php do_action( 'tribe_events_single_venue_before_the_meta' ) ?>
          <div class="venue-address">
            <?php if ( $full_address ) : ?>
            <address class="tribe-events-address">
            <span class="location"> <?php echo wp_kses_post($full_address); ?> </span>
            </address>
            <?php endif; ?>
            <?php if ( $telephone ): ?>
            <span class="tel"> <?php echo wp_kses_post($telephone); ?> </span>
            <?php endif; ?>
            <?php if ( $website_link ): ?>
            <span class="url"> <?php echo wp_kses_post($website_link); ?> </span>
            <?php endif; ?>
          </div>
          <!-- .venue-address --> 
          
        </div>
        <!-- .tribe-events-event-meta -->
        
        <?php do_action( 'tribe_events_single_venue_after_the_meta' ) ?>
      </div>
      <div class="col span_1_of_2 right">
        <?php if ( tribe_show_google_map_link() && tribe_address_exists() ) : ?>
        
        <!-- Google Map Link --> 
        
        <?php echo tribe_get_map_link_html(); ?>
        <?php endif; ?>
      </div>
    </div>
    <?php

	if (has_post_thumbnail() || tribe_embed_google_map()) {

		echo '<div class="dpr_single_event_map_img_wrap';

		if (has_post_thumbnail() && tribe_embed_google_map()) {

			echo ' with_thumb_and_map';

		}

		echo '">';

		// Venue Featured Image

		if (has_post_thumbnail()) {

			echo '<div class="dpr_single_event_img">' . tribe_event_featured_image($venue_id, (!tribe_embed_google_map() ? 'dpr-full-width-event-image' : 'dpr-half-width-event-image'), false) . '</div>';

		}

		if (tribe_embed_google_map() && tribe_address_exists()) {

			// Venue Map

			echo '<div class="dpr_single_event_map' . (!has_post_thumbnail() ? ' dpr_single_event_full_width' : '') . '">';

			echo tribe_get_embedded_map($venue_id, '100%', '430px');

			echo '</div>';

		}

		echo '</div>';

	}
		?>
    
    <!-- Venue Description -->
    
    <?php if ( get_the_content() ) : ?>
    <div class="tribe-venue-description tribe-events-content">
      <?php the_content(); ?>
    </div>
    <?php endif; ?>
  </div>
  <!-- .tribe-events-venue-meta --> 
  
  <!-- Upcoming event list -->
  
  <?php do_action( 'tribe_events_single_venue_before_upcoming_events' ) ?>
  <?php

	// Use the `tribe_events_single_venue_posts_per_page` to filter the number of events to get here.

	echo tribe_venue_upcoming_events($venue_id, $wp_query -> query_vars);
 ?>
  <?php do_action( 'tribe_events_single_venue_after_upcoming_events' ) ?>
</div>
<!-- .tribe-events-venue -->

<?php

endwhile;

