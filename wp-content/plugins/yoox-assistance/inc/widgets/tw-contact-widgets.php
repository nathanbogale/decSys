<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );

class Tw_Contact_Widgets extends WP_Widget{
    function __construct() {
        $widget_opt = array(
            'classname'     => 'yoox_contact_widget',
            'description'   => 'Yoox Contact Informations.'
        );
        
        parent::__construct('yoox-contacts', esc_html__('Yoox Contact', 'yoox'), $widget_opt);
    }
    
    function widget( $args, $instance ){

        echo wp_kses_post($args['before_widget']);
        if ( !empty( $instance[ 'title' ] ) ) {

            echo wp_kses_post($args[ 'before_title' ]) . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
        }

        $address = '';
        $mobile = '';
        $email = '';
        $webs = '';

        if(isset($instance['address'])){
            $address = $instance['address'];
        }
       
        if(isset($instance['mobile'])){
            $mobile = $instance['mobile'];
        }
        if(isset($instance['email'])){
            $email = $instance['email'];
        }
        if(isset($instance['webs'])){
            $webs = $instance['webs'];
        }
        
        ?>
        <div class="contactDetails">
            <?php if($address != ''): ?>
                <div class="cdItem">
                    <i class="la la-map-marker"></i>
                    <p>
                       <?php echo wp_kses($address, array('br' => array())); ?>
                    </p>
                </div>
            <?php endif; ?>

            <?php if($mobile != ''): ?>
                <div class="cdItem">
                    <i class="la la-phone"></i>
                    <p>
                       <?php echo wp_kses($mobile, array('br' => array())); ?>
                    </p>
                </div>
            <?php endif; ?>

            <?php if($email != ''): ?>
                <div class="cdItem">
                    <i class="la la-envelope"></i>
                    <p>
                       <?php echo wp_kses($email, array('br' => array())); ?>
                    </p>
                </div>
            <?php endif; ?>

            <?php if($webs != ''): ?>
                <div class="cdItem">
                    <i class="la la-globe"></i>
                    <p>
                       <?php echo wp_kses($webs, array('br' => array())); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>    
        <?php
        echo wp_kses_post($args['after_widget']);
    }
    
    
    function update ( $old_instance , $new_instance) {
        return $old_instance;
    }
    
    function form($instance){
        $title = (isset($instance['title'])) ? $instance['title'] : esc_html__( 'Contact', 'yoox' );
        $address = (isset($instance['address'])) ? $instance['address'] : '';
        $email = (isset($instance['email'])) ? $instance['email'] : '';
        $mobile = (isset($instance['mobile'])) ? $instance['mobile'] : '';
        $webs = (isset($instance['webs'])) ? $instance['webs'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'yoox' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'address' )); ?>"><?php esc_html_e( 'Address:' , 'yoox' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'address' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'address' )); ?>"><?php echo esc_html( $address); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'mobile' )); ?>"><?php esc_html_e( 'Mobile:' , 'yoox' ); ?></label>
             <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'mobile' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'mobile' )); ?>"><?php echo esc_html( $mobile); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'email' )); ?>"><?php esc_html_e( 'Email:' , 'yoox' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'email' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'email' )); ?>"><?php echo esc_html( $email); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'webs' )); ?>"><?php esc_html_e( 'Web:' , 'yoox' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'webs' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'webs' )); ?>"><?php echo esc_html( $webs); ?></textarea>
        </p>
        

    <?php
    }
}