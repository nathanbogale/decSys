<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

class Tw_Gallery_Widgets extends WP_Widget{
    function __construct() 
    {
        $widget_opt = array(
            'classname'     => 'yoox_rwd',
            'description'   => 'Yoox Recent Works Widgets.'
        );
        
        parent::__construct('yoox-gallery', esc_html__('Yoox Recent Work.', 'yoox'), $widget_opt);
    }
    
    function widget( $args, $instance ){
        $title = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__('Recent Works', 'yoox');
        $nom_of_item = (isset($instance['nom_of_item']) && $instance['nom_of_item'] != '') ? $instance['nom_of_item'] : 6;
        $gord_by = (isset($instance['gord_by']) && $instance['gord_by'] != '') ? $instance['gord_by'] : 'date';
        $gord = (isset($instance['gord']) && $instance['gord'] != '') ? $instance['gord'] : 'DESC';
        
        echo wp_kses_post($args['before_widget']);
        if ( ! empty( $title ) ):
            echo wp_kses_post($args['before_title']) . esc_html($title) . $args['after_title'];
        endif;
        
        $argsu = array(
            'post_type'         => 'folios',
            'post_status'       => 'publish',
            'posts_per_page'    => $nom_of_item,
            'orderby'           => $gord_by,
            'order'             => $gord
        );
        $gal = new WP_Query($argsu);
        if($gal->have_posts()):
        ?>
        <div class="widget_gallery">
            <?php
                while($gal->have_posts()):
                    $gal->the_post();
                    if(has_post_thumbnail()):
                    ?>
                    <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'yoox-sq-xs'); ?></a>
                    <?php
                    endif;
                endwhile;
            ?>
            <div class="clearfix"></div>
        </div>
        <?php
        endif;
        wp_reset_postdata();
        
        echo wp_kses_post($args['after_widget']);
    }
    
    function update ( $new_instance, $old_instance ) {
        return $new_instance;
    }
    
    function form($instance){
        $title = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__('Recent Works', 'yoox');
        $nom_of_item = (isset($instance['nom_of_item']) && $instance['nom_of_item'] != '') ? $instance['nom_of_item'] : 6;
        $gord_by = (isset($instance['gord_by']) && $instance['gord_by'] != '') ? $instance['gord_by'] : 'date';
        $gord = (isset($instance['gord']) && $instance['gord'] != '') ? $instance['gord'] : 'DESC';
        ?>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'yoox' ); ?></label>
	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
        <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'nom_of_item' )); ?>"><?php _e( 'No. Of Items:', 'yoox' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'nom_of_item' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'nom_of_item' )); ?>" type="number" value="<?php echo esc_attr( $nom_of_item ); ?>" />
	</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'gord_by' )); ?>"><?php _e( 'Order By:' , 'yoox' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'gord_by' )); ?>" name="<?php echo esc_attr($this->get_field_id( 'gord_by' )); ?>">
                <option value="date" <?php if($gord_by == 'date'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Date', 'yoox'); ?></option>
                <option value="ID" <?php if($gord_by == 'ID'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('ID', 'yoox'); ?></option>
                <option value="title" <?php if($gord_by == 'title'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Title', 'yoox'); ?></option>
                <option value="rand" <?php if($gord_by == 'rand'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Random', 'yoox'); ?></option>
            </select>
	</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'gord' )); ?>"><?php _e( 'Order:' , 'yoox' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'gord' )); ?>" name="<?php echo esc_attr($this->get_field_id( 'gord' )); ?>">
                <option value="ASC" <?php if($gord == 'ASC'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('ASC', 'yoox'); ?></option>
                <option value="DESC" <?php if($gord == 'DESC'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('DESC', 'yoox'); ?></option>
            </select>
	</p>
        <?php
    }
}