<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
    exit;

class Tw_Google_Map_Widget extends Widget_Base {

    public function get_name() {
        return 'tw-google-map';
    }

    public function get_title() {
        return esc_html__( 'Google Map', 'yoox' );
    }

    public function get_icon() {
        return 'eicon-google-maps';
    }

    public function get_categories() {
        return [ 'yoox-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_tab', [
                'label' =>esc_html__( 'Google Map', 'yoox' ),
            ]
        );
        $this->add_control(
                'map_mode',
                [
                        'label' => esc_html__( 'Map Mode', 'yoox' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => '1',
                        'label_block'       => true,
                        'options' => [
                                '1'       => esc_html__( 'Iframe', 'yoox' ),
                                '2'       => esc_html__( 'Customized', 'yoox' ),
                        ],
                ]
        );
        $this->add_control(
                'map_style',
                [
                        'label' => esc_html__( 'Map Style', 'yoox' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 2,
                        'label_block'       => true,
                        'options' => [
                                1       => esc_html__( 'Default', 'yoox' ),
                                2       => esc_html__( 'Custom', 'yoox' ),
                        ],
                        'condition'     => ['map_mode' => '2']
                ]
        );
        $this->add_control(
                'lati',
                [
                        'label'             => esc_html__( 'Location Latitude', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'label_block'       => true,
                        'default'           => esc_html__( '', 'yoox' ),
                        'placeholder'       => esc_html__( 'Insert your location latitude', 'yoox' ),
                        'condition'         => ['map_mode' => '2']
                ]
        );
        $this->add_control(
                'long',
                [
                        'label'             => esc_html__( 'Location Longitude', 'yoox' ),
                        'type'              => Controls_Manager::TEXT,
                        'label_block'       => true,
                        'default'           => esc_html__( '', 'yoox' ),
                        'placeholder'       => esc_html__( 'Insert your location longitude', 'yoox' ),
                        'condition'         => ['map_mode' => '2']
                ]
        );
        $this->add_control(
                'marker',
                [
                        'label'         => esc_html__( 'Map Marker', 'yoox' ),
                        'type'          => Controls_Manager::MEDIA,
                        'description'   => esc_html__('Upload your map marker. Map marker shold be smallar image.', 'yoox'),
                        'condition'     => ['map_mode' => '2']
                ]
        );
        $this->add_control(
                'map_frame',
                [
                        'label'         => esc_html__( 'Map Frame SRC', 'yoox' ),
                        'type'          => Controls_Manager::TEXTAREA,
                        'description'   => esc_html__('Insert your map iframe SRC here please.', 'yoox'),
                        'condition'     => ['map_mode' => '1']
                ]
        );
        $this->add_control(
                'map_height',
                [
                        'label' => __( 'Map Height', 'yoox' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px', '%' ],
                        'range' => [
                                'px' => [
                                        'min' => 0,
                                        'max' => 2000,
                                        'step' => 1,
                                ],
                                '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                ],
                        ],
                        'description'   => esc_html__('Insert your map height. Default height is 610px.', 'yoox'),
                        'default' => ['610'],
                        'selectors' => [
                                '{{WRAPPER}} .gmap' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                ]
            );
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings   = $this->get_settings();
        $map_mode  = (isset($settings['map_mode']) && $settings['map_mode'] > 0) ? $settings['map_mode'] : 1;
        $map_style  = (isset($settings['map_style']) && $settings['map_style'] > 0) ? $settings['map_style'] : 2;
        $lati       = (isset($settings['lati']) && $settings['lati'] != '') ? $settings['lati'] : '';
        $long       = (isset($settings['long']) && $settings['long'] != '') ? $settings['long'] : '';
        $map_height = (isset($settings['map_height']) && $settings['map_height'] != '') ? $settings['map_height'] : '610';
        $marker     = (isset($settings['marker']['url']) && $settings['marker']['url'] != '') ? $settings['marker']['url'] : '';
        $map_frame  = (isset($settings['map_frame']) && $settings['map_frame'] != '') ? $settings['map_frame'] : '';
        if($map_mode == 2):
            if($lati !='' || $long !=''):
                ?><div data-map-style="<?php echo esc_attr($map_style); ?>" 
                     data-marker="<?php echo esc_url($marker); ?>" 
                     data-lat="<?php echo esc_attr($lati); ?>" 
                     data-lon="<?php echo esc_attr($long); ?>" 
                     class="gmap" id="gmap"></div><?php
            endif;
        else:
            if($map_frame != ''):
            ?>
            <iframe class="gmap" src="<?php echo $map_frame; ?>"></iframe>
            <?php
            endif;
        endif;
        
    }
    
    protected function _content_template() {
        
    }
}