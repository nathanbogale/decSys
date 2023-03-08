<?php
if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );

class Tw_About_Widgets extends WP_Widget{
    
    function __construct() {
        $widget_opt = array(
            'classname'     => 'yoox_about_us',
            'description'   => 'Yoox About Us Widget.'
        );
        
        parent::__construct('yoox_about_us', esc_html__('Yoox About Us', 'yoox'), $widget_opt);
    }
    
    function widget( $args, $instance ){
        echo $args['before_widget'];
        
            $title = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : '';
            $about_desc = (isset($instance['about_desc']) && $instance['about_desc'] != '') ? $instance['about_desc'] : '';
            $facebooks = (isset($instance['facebooks']) && $instance['facebooks'] != '') ? $instance['facebooks'] : '';
            $penterest = (isset($instance['penterest']) && $instance['penterest'] != '') ? $instance['penterest'] : '';
            $dribbble = (isset($instance['dribbble']) && $instance['dribbble'] != '') ? $instance['dribbble'] : '';
            $behance = (isset($instance['behance']) && $instance['behance'] != '') ? $instance['behance'] : '';
            $youtubes = (isset($instance['youtubes']) && $instance['youtubes'] != '') ? $instance['youtubes'] : '';
            $twitters = (isset($instance['twitters']) && $instance['twitters'] != '') ? $instance['twitters'] : '';
            
        ?>
            <?php if($title != ''): ?>
                    <?php echo $args['before_title'].$title.$args['after_title']; ?>
            <?php endif; ?>
            <div class="textWidget">
                <?php if($about_desc != ''): ?>
                    <p><?php echo wp_kses_post($about_desc); ?></p>
                <?php endif; ?>
                <div class="clearfix"></div>
                <div class="socialIcon">
                    <?php if($facebooks != ''): ?>
                        <a href="<?php echo esc_url($facebooks); ?>"><i class="fa fa-facebook"></i></a>
                    <?php endif; ?>
                    <?php if($twitters != ''): ?>
                        <a href="<?php echo esc_url($twitters); ?>"><i class="fa fa-twitter"></i></a>
                    <?php endif; ?>
                    <?php if($penterest != ''): ?>
                        <a href="<?php echo esc_url($penterest); ?>"><i class="fa fa-pinterest"></i></a>
                    <?php endif; ?>
                    <?php if($youtubes != ''): ?>
                        <a href="<?php echo esc_url($youtubes); ?>"><i class="fa fa-youtube-play"></i></a>
                    <?php endif; ?>
                    <?php if($dribbble != ''): ?>
                        <a href="<?php echo esc_url($dribbble); ?>"><i class="fa fa-dribbble"></i></a>
                    <?php endif; ?>
                    <?php if($behance != ''): ?>
                        <a href="<?php echo esc_url($behance); ?>"><i class="fa fa-behance"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        <?php
        echo $args['after_widget'];
    }
    
    function update ( $new_instance, $old_instance) {
        return $new_instance;
    }
    
    function form($instance){
        $title = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : '';
        $about_desc = (isset($instance['about_desc']) && $instance['about_desc'] != '') ? $instance['about_desc'] : '';
        $facebooks = (isset($instance['facebooks']) && $instance['facebooks'] != '') ? $instance['facebooks'] : '';
        $penterest = (isset($instance['penterest']) && $instance['penterest'] != '') ? $instance['penterest'] : '';
        $dribbble = (isset($instance['dribbble']) && $instance['dribbble'] != '') ? $instance['dribbble'] : '';
        $behance = (isset($instance['behance']) && $instance['behance'] != '') ? $instance['behance'] : '';
        $youtubes = (isset($instance['youtubes']) && $instance['youtubes'] != '') ? $instance['youtubes'] : '';
        $twitters = (isset($instance['twitters']) && $instance['twitters'] != '') ? $instance['twitters'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'yoox' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'about_desc' )); ?>"><?php esc_html_e( 'Description:', 'yoox' ); ?></label>
            <textarea class="widefat" rows="10" id="<?php echo esc_attr($this->get_field_id( 'about_desc' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'about_desc' )); ?>"><?php echo esc_attr( $about_desc ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'facebooks' )); ?>"><?php esc_html_e( 'Facebook:', 'yoox' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'facebooks' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebooks' )); ?>" type="text" value="<?php echo esc_attr( $facebooks ); ?>" /><br/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'twitters' )); ?>"><?php esc_html_e( 'Twitter:', 'yoox' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'twitters' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitters' )); ?>" type="text" value="<?php echo esc_attr( $twitters ); ?>" /><br/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'penterest' )); ?>"><?php esc_html_e( 'Pinterest:', 'yoox' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'penterest' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'penterest' )); ?>" type="text" value="<?php echo esc_attr( $penterest ); ?>" /><br/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'youtubes' )); ?>"><?php esc_html_e( 'Youtube:', 'yoox' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'youtubes' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtubes' )); ?>" type="text" value="<?php echo esc_attr( $youtubes ); ?>" /><br/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'dribbble' )); ?>"><?php esc_html_e( 'Dribbble:', 'yoox' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'dribbble' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'dribbble' )); ?>" type="text" value="<?php echo esc_attr( $dribbble ); ?>" /><br/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'behance' )); ?>"><?php esc_html_e( 'Behance:', 'yoox' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'behance' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'behance' )); ?>" type="text" value="<?php echo esc_attr( $behance ); ?>" /><br/>
        </p>
        <?php
    }
}