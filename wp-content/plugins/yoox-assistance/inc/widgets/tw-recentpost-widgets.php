<?php
/**
 * Creates widget with recent post thumbnail
 */

class Tw_Recentpost_Widgets extends WP_Widget
{
    function __construct() 
    {
        $widget_opt = array(
            'classname'     => 'yoox_rp_widget',
            'description'   => 'Yoox Recent Post With Thumbnail'
        );
        
        parent::__construct('yoox-rppwt', esc_html__('Yoox Recent Post', 'yoox'), $widget_opt);
    }
    
    function widget( $args, $instance )
    {
        $title = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( 'Recent Posts', 'yoox' );
        $number_of_posts1 = (isset($instance['number_of_posts1']) && $instance['number_of_posts1'] != '') ? $instance['number_of_posts1'] : 3;
        $ord_by = (isset($instance['ord_by']) && $instance['ord_by'] != '') ? $instance['ord_by'] : 'date';
        $ord = (isset($instance['ord']) && $instance['ord'] != '') ? $instance['ord'] : 'DESC';
        
        
        $title = apply_filters( 'widget_title', $title );
        echo wp_kses_post($args['before_widget']);
        if ( ! empty( $title ) )
        {
            echo wp_kses_post($args['before_title']) . esc_html($title) . $args['after_title'];
        }
        
        
        $stickies = get_option( 'sticky_posts' );
        $querys = array(
            'post_type'         => array('post'),
            'post_status'       => array('publish'),
            'orderby'           => $ord_by,
            'order'             => $ord,
            'posts_per_page'    => $number_of_posts1,
            'post__not_in'      => $stickies
        );
        $tw_query = new WP_Query($querys);
        echo '<div class="yoox_post_widget">';
        if($tw_query->have_posts())
        {
            while($tw_query->have_posts()): $tw_query->the_post();
            ?>
            <div class="ypw_item">
                <?php if(has_post_thumbnail()): ?>
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'yoox-sq-xs'); ?>
                <?php endif; ?>
                <a href="<?php echo get_the_permalink(); ?>"><?php echo substr(wp_kses(get_the_title(), array()), 0, 43) ?></a>
            </div>
            <?php
            endwhile;
        }
        else
        {
            echo '<div class="ypw_item">';
            echo '<a href="#">No post found to display.</a>';
            echo '</div>';
            echo '<div class="clearfix"></div>';
        }
        echo '</div>';
        wp_reset_postdata();
        
        echo wp_kses_post($args['after_widget']);
    }
    
    
    function update ( $new_instance, $old_instance ) 
    {
        return $new_instance;
    }
    
    function form($instance)
    {
        $title = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( 'Recent Posts', 'yoox' );
        $number_of_posts1 = (isset($instance['number_of_posts1']) && $instance['number_of_posts1'] != '') ? $instance['number_of_posts1'] : 3;
        $ord_by = (isset($instance['ord_by']) && $instance['ord_by'] != '') ? $instance['ord_by'] : 'date';
        $ord = (isset($instance['ord']) && $instance['ord'] != '') ? $instance['ord'] : 'DESC';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'yoox' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'number_of_posts1' )); ?>"><?php _e( 'Number Of Posts:' , 'yoox' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number_of_posts1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number_of_posts1' )); ?>" type="text" value="<?php echo esc_attr( $number_of_posts1 ); ?>" />
	</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'ord_by' )); ?>"><?php _e( 'Order By:' , 'yoox' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'ord_by' )); ?>" name="<?php echo esc_attr($this->get_field_id( 'ord_by' )); ?>">
                <option value="date" <?php if($ord_by == 'date'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Date', 'yoox'); ?></option>
                <option value="ID" <?php if($ord_by == 'ID'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('ID', 'yoox'); ?></option>
                <option value="title" <?php if($ord_by == 'title'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Title', 'yoox'); ?></option>
                <option value="rand" <?php if($ord_by == 'rand'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Random', 'yoox'); ?></option>
                <option value="comment_count" <?php if($ord_by == 'comment_count'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Comment Count', 'yoox'); ?></option>
            </select>
	</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'ord' )); ?>"><?php _e( 'Order:' , 'yoox' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'ord' )); ?>" name="<?php echo esc_attr($this->get_field_id( 'ord' )); ?>">
                <option value="ASC" <?php if($ord == 'ASC'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('ASC', 'yoox'); ?></option>
                <option value="DESC" <?php if($ord == 'DESC'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('DESC', 'yoox'); ?></option>
            </select>
	</p>
        
        <?php
    }
}