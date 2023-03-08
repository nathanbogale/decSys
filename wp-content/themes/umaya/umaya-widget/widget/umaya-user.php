<?php

class Umaya_User_Widget extends WP_Widget {
    var $settings = array( 'title');

    function __construct() {
        $widget_ops = array('description' => 'Use this widget to show user details as a widget.' );
        parent::__construct(false, __('Umaya - User Details', 'umaya'),$widget_ops);
}


function widget($args, $instance) {
        $settings = $this->umaya_get_settings();
        extract( $args, EXTR_SKIP );
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : ( ' ' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $instance = wp_parse_args( $instance, $settings );
        extract( $instance, EXTR_SKIP );

      
        echo $before_widget;
		 if ( $title ) echo $before_title . $title . $after_title; 
		
		echo '<div class="text-center">';
		echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( '', 343 ) );
		echo '<h3 class="headline-xxxxs-off-now headline-xxxs text-color-black margin-top-30">';
		echo get_the_author();
		echo '</h3>';
		echo '<div class="clearfix"></div>';
		echo '<p class="body-text-xs text-color-black margin-top-20">';
		echo get_the_author_meta('description');
		echo '</p>';
		
		echo '<ul class="list list_row list_center padding-top-30">';
		if ( get_the_author_meta('facebook') ) :
		echo '<li class="list__item">
			<a href="'.get_the_author_meta('facebook').'" class="icon-overlay-btn black js-pointer-large">
			<i class="icon-overlay-btn__inner fab fa-facebook-f"></i>
			</a>
			</li>';
		endif;
		if ( get_the_author_meta('twitter') ) :
		echo '<li class="list__item">
			<a href="'.get_the_author_meta('twitter').'" class="icon-overlay-btn black js-pointer-large">
			<i class="icon-overlay-btn__inner fab fa-twitter"></i>
			</a>
			</li>';
		endif;
		if ( get_the_author_meta('instagram') ) :
		echo '<li class="list__item">
			<a href="'.get_the_author_meta('instagram').'" class="icon-overlay-btn black js-pointer-large">
			<i class="icon-overlay-btn__inner fab fa-instagram"></i>
			</a>
			</li>';
		endif;
		if ( get_the_author_meta('tumblr') ) :
		echo '<li class="list__item">
			<a href="'.get_the_author_meta('tumblr').'" class="icon-overlay-btn black js-pointer-large">
			<i class="icon-overlay-btn__inner fab fa-tumblr"></i>
			</a>
			</li>';
		endif;
		if ( get_the_author_meta('pinterest') ) :
		echo '<li class="list__item">
			<a href="'.get_the_author_meta('pinterest').'" class="icon-overlay-btn black js-pointer-large">
			<i class="icon-overlay-btn__inner fab fa-pinterest"></i>
			</a>
			</li>';
		endif;
		if ( get_the_author_meta('youtube') ) :
		echo '<li class="list__item">
			<a href="'.get_the_author_meta('youtube').'" class="icon-overlay-btn black js-pointer-large">
			<i class="icon-overlay-btn__inner fab fa-youtube"></i>
			</a>
			</li>';
		endif;
		echo '</ul>';
		
		echo '</div>';
		
		
       echo $after_widget;      
    }
	
	


function update( $new_instance, $old_instance ) {
        foreach ( array( 'title') as $setting )
            $new_instance[$setting] = strip_tags( $new_instance[$setting] );
        // Users without unfiltered_html cannot update this arbitrary HTML field
        if ( !current_user_can( 'unfiltered_html' ) )
            $new_instance['address'] = $old_instance['address'];
        return $new_instance;
    }


    function umaya_get_settings() {
        // Set the default to a blank string
        $settings = array_fill_keys( $this->settings, '' );
        // Now set the more specific defaults
        return $settings;
    }

    function form($instance) {
        $instance = wp_parse_args( $instance, $this->umaya_get_settings() );
        extract( $instance, EXTR_SKIP );
?>

    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','umaya'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
    </p>
	
	

    <?php 

    }
}

register_widget('Umaya_User_Widget');