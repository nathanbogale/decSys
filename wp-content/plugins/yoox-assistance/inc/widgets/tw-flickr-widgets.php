<?php
/*-----------------------------------------------------------------------------------*/
/*	Flicker Widget Class
/*-----------------------------------------------------------------------------------*/

class Tw_Flickr_Widgets extends WP_Widget {

	var $defaults;

	function __construct() {
		$widget_ops = array( 'classname' => 'yoox_flickr_widget', 'description' => esc_html__( 'Display your Flickr photostream', 'yoox' ) );
		$control_ops = array( 'id_base' => 'yoox_flickr_widget' );
		parent::__construct( 'yoox_flickr_widget', esc_html__( 'Yoox Flickr Widget', 'yoox' ), $widget_ops, $control_ops );

		

		$this->defaults = array(
			'title' => 'Flickr Widget',
			'id' => '',
			'count' => 9,
			't_width' => 150,
			't_height' => 150
		);

		//Allow themes or plugins to modify default parameters
		$this->defaults = apply_filters( 'yoox_flickr_widget_modify_defaults', $this->defaults );
	}

	


	function widget( $args, $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->defaults );

		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );

		echo wp_kses_post($before_widget);
		if ( ! empty( $title ) ) {
			echo wp_kses_post($before_title) . esc_html($title) . $after_title;
		}

		$photos = $this->get_photos( $instance['id'], $instance['count'] );
		if ( !empty( $photos ) ) {
                        $phot = 1;
			$style = 'style="width: '.$instance['t_width'].'px; height: '.$instance['t_height'].'px;"';
			echo '<div class="widget_gallery">';
			foreach ( $photos as $photo ) {
                if($phot % 3 == 0)
                {
                    echo '<a href="'.$photo['img_url'].'"  title="'.$photo['title'].'" target="_blank"><img  class="noMarginRight" src="'.$photo['img_src'].'" alt="'.$photo['title'].'" '.$style.' /></a>';
                }
                else
                {
                    echo '<a href="'.$photo['img_url'].'"  title="'.$photo['title'].'" target="_blank"><img src="'.$photo['img_src'].'" alt="'.$photo['title'].'" '.$style.' /></a>';
                }
                $phot++;
			}
                        echo '<div class="clearfix"></div></div>';
                        
		}
		echo wp_kses_post($after_widget);
	}


	function get_photos( $id, $count = 6 ) {
		if ( empty( $id ) )
			return false;

		$transient_key = md5( 'mks_flickr_cache_' . $id . $count );
		$cached = get_transient( $transient_key );
		if ( !empty( $cached ) ) {
			return $cached;
		}

		$output = array();
		$rss = 'http://api.flickr.com/services/feeds/photos_public.gne?id='.$id.'&lang=en-us';
		$rss = fetch_feed( $rss );

		if ( is_wp_error( $rss ) ) {
			//check for group feed
			$rss = 'http://api.flickr.com/services/feeds/groups_pool.gne?id='.$id.'&lang=en-us';
			$rss = fetch_feed( $rss );
		}

		if ( !is_wp_error( $rss ) ) {
			$maxitems = $rss->get_item_quantity( $count );
			$rss_items = $rss->get_items( 0, $maxitems );
			foreach ( $rss_items as $item ) {
				$temp = array();
				$temp['img_url'] = esc_url( $item->get_permalink() );
				$temp['title'] = esc_html( $item->get_title() );
				$content =  $item->get_content();
				preg_match_all( "/<IMG.+?SRC=[\"']([^\"']+)/si", $content, $sub, PREG_SET_ORDER );
				$photo_url = str_replace( "_m.jpg", "_n.jpg", $sub[0][1] );
				$temp['img_src'] = esc_url( $photo_url );
				$output[] = $temp;
			}

			set_transient( $transient_key, $output, 60 * 60 * 24 );
		}


		return $output;
	}

	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['id'] = strip_tags( $new_instance['id'] );
		$instance['count'] = absint( $new_instance['count'] );
		$instance['t_width'] = absint( $new_instance['t_width'] );
		$instance['t_height'] = absint( $new_instance['t_height'] );
		return $new_instance;
	}


	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->defaults ); ?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title', 'yoox' ); ?>:</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'id' )); ?>"><?php _e( 'Flickr ID', 'yoox' ); ?>:</label> <small><a href="http://idgettr.com/" target="_blank"><?php _e( 'What\'s my Flickr ID?', 'yoox' ); ?></a></small>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'id' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'id' )); ?>" type="text" value="<?php echo esc_attr( $instance['id'] ); ?>" />
			<small class="howto"><?php _e( 'Example ID: 119450403@N04', 'yoox' ); ?></small>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'count' )); ?>"><?php _e( 'Number of photos', 'yoox' ); ?>:</label>
			<input class="small-text" type="text" value="<?php echo absint( $instance['count'] ); ?>" id="<?php echo esc_attr($this->get_field_id( 'count' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'count' )); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 't_width' )); ?>"><?php _e( 'Thumbnail width', 'yoox' ); ?>:</label>
			<input class="small-text" type="text" value="<?php echo absint( $instance['t_width'] ); ?>" id="<?php echo esc_attr($this->get_field_id( 't_width' )); ?>" name="<?php echo esc_attr($this->get_field_name( 't_width' )); ?>" /> px
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 't_height' )); ?>"><?php _e( 'Thumbnail height', 'yoox' ); ?>:</label>
			<input class="small-text" type="text" value="<?php echo absint( $instance['t_height'] ); ?>" id="<?php echo esc_attr($this->get_field_id( 't_height' )); ?>" name="<?php echo esc_attr($this->get_field_name( 't_height' )); ?>" /> px
		</p>

		<?php
	}
}
