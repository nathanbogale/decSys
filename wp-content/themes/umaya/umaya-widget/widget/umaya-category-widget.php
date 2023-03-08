<?php

class Umaya_category_widget extends WP_Widget {
    var $settings = array( 'title');

    function __construct() {
        $widget_ops = array('classname' => 'umaya_category_widget cat-widget', 'description' => 'Umaya Category Widget,' );
        parent::__construct('umaya-category', ('Umaya - Category Widget'), $widget_ops);
		$this->alt_option_name = 'umaya_category_widget';
}


function widget($args, $instance) {
        $settings = $this->umaya_get_settings();
        extract( $args, EXTR_SKIP );
		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : ( 'Category' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $instance = wp_parse_args( $instance, $settings );
        extract( $instance, EXTR_SKIP );

      
        echo $before_widget;
		 if ( $title ) echo $before_title . $title . $after_title;
		
		
		if(!get_post_meta(get_the_ID(), 'category', true)):
		$umaya_widget_cat = get_terms('category');
		if($umaya_widget_cat):
		echo '<ul class="list list_center list_margin-20px text-center padding-bottom-10">';
		foreach($umaya_widget_cat as $umaya_widget_cats):
		echo '<li class="list__item"><a class="flip-btn text-color-black js-pointer-small" href="'.esc_url(get_category_link($umaya_widget_cats->term_id)).'" data-text="'.esc_attr($umaya_widget_cats->name).' ('.esc_attr($umaya_widget_cats->count).')">'.esc_attr($umaya_widget_cats->name).' ('.esc_attr($umaya_widget_cats->count).')</a></li>';
		endforeach;
		echo '</ul>';
		endif;
		endif;
		
		
		
       echo $after_widget;      
    }
	
	


function update( $new_instance, $old_instance ) {
        foreach ( array( 'title' ) as $setting )
            $new_instance[$setting] = strip_tags( $new_instance[$setting] );
        // Users without unfiltered_html cannot update this arbitrary HTML field
        if ( !current_user_can( 'unfiltered_html' ) )
            $new_instance['umaya_text'] = $old_instance['umaya_text'];
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

register_widget('Umaya_category_widget');