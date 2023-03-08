<?php

/**

 * Single Organizer Template

 * The template for an organizer. By default it displays organizer information and lists

 * events that occur with the specified organizer.

 */

if (!defined('ABSPATH')) {

	die('-1');

}

$organizer_id = get_the_ID();

$column_count = 1;

if (has_post_thumbnail())
	$column_count = 2;
?>
<?php while ( have_posts() ) : the_post(); ?>

<div class="tribe-events-organizer">
  <p class="tribe-events-back"> <a href="<?php echo esc_url(tribe_get_events_link()); ?>" rel="bookmark"><?php printf(esc_html__('&larr; Back to %s', 'adeline'), tribe_get_event_label_plural()); ?></a> </p>
  <?php do_action( 'tribe_events_single_organizer_before_organizer' ) ?>
  <div class="tribe-events-organizer-meta tribe-clearfix">
    <div class="dpr-adeline-row venue-header clr"> 
      
      <!-- Organizer Content -->
      
      <div class="col span_1_of_<?php echo  esc_attr($column_count)?>"> 
        
        <!-- Organizer Title -->
        
        <?php do_action( 'tribe_events_single_organizer_before_title' ) ?>
        <h1 class="tribe-organizer-name"><?php echo tribe_get_organizer($organizer_id); ?></h1>
        <?php do_action( 'tribe_events_single_organizer_after_title' ) ?>
        
        <!-- Organizer Meta -->
        
        <?php do_action('tribe_events_single_organizer_before_the_meta'); ?>
        <?php echo tribe_get_organizer_details(); ?>
        <?php do_action( 'tribe_events_single_organizer_after_the_meta' ) ?>
        <?php if ( get_the_content() ) { ?>
        <div class="tribe-organizer-description tribe-events-content">
          <?php the_content(); ?>
        </div>
        <?php } ?>
      </div>
      
      <!-- Organizer Featured Image -->
      
      <?php if (has_post_thumbnail() ) { ?>
      <div class="col span_1_of_<?php echo  esc_attr($column_count)?>"> <?php echo tribe_event_featured_image( null, 'full' ) ?> </div>
      <?php } ?>
    </div>
  </div>
  
  <!-- .tribe-events-organizer-meta -->
  
  <?php do_action( 'tribe_events_single_organizer_after_organizer' ) ?>
  
  <!-- Upcoming event list -->
  
  <?php do_action( 'tribe_events_single_organizer_before_upcoming_events' ) ?>
  <?php

		// Use the tribe_events_single_organizer_posts_per_page to filter the number of events to get here.

		echo tribe_organizer_upcoming_events($organizer_id);
 ?>
  <?php do_action( 'tribe_events_single_organizer_after_upcoming_events' ) ?>
</div>
<!-- .tribe-events-organizer -->

<?php

	do_action('tribe_events_single_organizer_after_template');

	endwhile;

