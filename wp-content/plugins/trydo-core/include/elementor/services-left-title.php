<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_Services extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-services';
    }

    public function get_title()
    {
        return esc_html__('Services With Left Title', 'trydo');
    }

    public function get_icon()
    {
        return 'rt-icon';
    }

    public function get_categories()
    {
        return ['trydo'];
    }

    public function get_keywords()
    {
        return ['services', 'main home services', 'left title services', 'trydo'];
    }

    protected function _register_controls()
    {
        // Title and content
        $this->rbt_section_title('services', 'Section - Title and Content', '', 'Services', 'h2', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.', 'text-left');
        $this->rbt_link_controls('services_button', 'Request Custom Service - Link', 'Request Custom Service');

        // Service group
        $this->start_controls_section(
            'services',
            [
                'label' => esc_html__('Services List', 'trydo'),
                'description' => esc_html__( 'Control all the style settings from Style tab', 'trydo' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'service_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'trydo'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'image' => esc_html__('Image', 'trydo'),
                    'icon' => esc_html__('Icon', 'trydo'),
                ],
            ]
        );

        $repeater->add_control(
            'service_image',
            [
                'label' => esc_html__('Upload Image', 'trydo'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'service_icon_type' => 'image'
                ]

            ]
        );
        if (rbt_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'service_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                    'condition' => [
                        'service_icon_type' => 'icon'
                    ]
                ]
            );
        } else {
            $repeater->add_control(
                'service_selected_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-star',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'service_icon_type' => 'icon'
                    ]
                ]
            );
        }
        $repeater->add_control(
            'service_title', [
                'label' => esc_html__('Title', 'trydo'),
                'description' => rbt_get_allowed_html_desc( 'basic' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Service Title', 'trydo'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'service_description',
            [
                'label' => esc_html__('Description', 'trydo'),
                'description' => rbt_get_allowed_html_desc( 'intermediate' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered.',
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'services_link_switcher',
            [
                'label' => esc_html__( 'Add Services link', 'trydo' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'trydo' ),
                'label_off' => esc_html__( 'No', 'trydo' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'services_link_type',
            [
                'label' => esc_html__( 'Service Link Type', 'trydo' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => 'Custom Link',
                    '2' => 'Internal Page',
                ],
                'default' => '1',
                'condition' => [
                    'services_link_switcher' => 'yes'
                ]
            ]
        );
        $repeater->add_control(
            'services_link',
            [
                'label' => esc_html__( 'Service Link link', 'trydo' ),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'https://your-link.com', 'trydo' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'condition' => [
                    'services_link_type' => '1',
                    'services_link_switcher' => 'yes',
                ]
            ]
        );
        $repeater->add_control(
            'services_page_link',
            [
                'label' => esc_html__( 'Select Service Link Page', 'trydo' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'options' => rbt_get_all_pages(),
                'condition' => [
                    'services_link_type' => '2',
                    'services_link_switcher' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'service_list',
            [
                'label' => esc_html__('Services - List', 'trydo'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'service_title' => esc_html__('Business Stratagy', 'trydo'),
                    ],
                    [
                        'service_title' => esc_html__('Website Development', 'trydo')
                    ],
                    [
                        'service_title' => esc_html__('Marketing & Reporting', 'trydo')
                    ],
                    [
                        'service_title' => esc_html__('Mobile Development', 'trydo')
                    ],
                ],
                'title_field' => '{{{ service_title }}}',
            ]
        );
        $this->add_responsive_control(
            'service_align',
            [
                'label' => esc_html__( 'Alignment', 'trydo' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'text-left' => [
                        'title' => esc_html__( 'Left', 'trydo' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'text-center' => [
                        'title' => esc_html__( 'Center', 'trydo' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'text-right' => [
                        'title' => esc_html__( 'Right', 'trydo' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'service_style',
            [
                'label' => esc_html__( 'Select Style', 'trydo' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => esc_html__( 'Style 1', 'trydo' ),
                    '2' => esc_html__( 'Style 2', 'trydo' ),
                ],
                'default' => '1',
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'service_read_more_link_switcher',
            [
                'label' => esc_html__( 'Read More Link', 'trydo' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'trydo' ),
                'label_off' => esc_html__( 'No', 'trydo' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
                'condition' => [
                    'service_style' => '2'
                ]
            ]
        );
        $this->add_control(
            'service_read_more_link_text', [
                'label' => esc_html__('Read More Link Text', 'trydo'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'trydo'),
                'label_block' => true,
                'condition' => [
                    'service_style' => '2'
                ]
            ]
        );
        $this->end_controls_section();





        // Style Component
        $this->rbt_basic_style_controls('sst_before_title', 'Section - Before Title', '.section-title .sub-title');
        $this->rbt_basic_style_controls('sst_title', 'Section - Title', '.section-title .title');
        $this->rbt_basic_style_controls('sst_description', 'Section - Description', '.section-title p');
        // Link style
        $this->rbt_link_controls_style('services_button_style', 'Section - Link', '.rbt-button', 'btn-extra-large', 'btn-transparent');

        $this->rbt_columns('service_columns', 'Service - Columns', '6', '6', '6', '12');
        $this->rbt_icon_style('service_icon', 'Services - Icon/Image/SVG', '.single-service.service__style--4 .icon');
        $this->rbt_basic_style_controls('service_title', 'Service - Title', '.single-service.service__style--4 .content h3.title');
        $this->rbt_basic_style_controls('service_description', 'Service - Description', '.single-service.service__style--4.text-white .content p');

        $this->rbt_section_style_controls('services_area', 'Section Background Style', '.rn-service-area');
        $this->rbt_section_style_controls('services_area_overlay', 'Section Background Style: Overlay', '.rn-service-area.overlay:before');



    }

    protected function render($instance = [])
    {
        $settings = $this->get_settings_for_display();
        ?>
        <!-- Start Service Area  -->
        <div class="rn-service-area ptb--80 bg_image bg_image--3 overlay">
            <div class="container">
                <div class="row">
                    <?php
                    $services_call_class = ($settings['rbt_services_section_title_show'] === 'yes' || $settings['rbt_services_button_button_show'] === 'yes') ? "col-lg-8 col-12 mt_md--50" : "col-lg-12 col-12 mt_md--50";

                    if($settings['rbt_services_section_title_show'] === 'yes' || $settings['rbt_services_button_button_show'] === 'yes'){ ?>
                        <div class="col-lg-4 col-12">
                            <div class="section-title mt--30 mt_md--5 mt_sm--5 mb_md--20 mb_sm--20 <?php echo esc_attr($settings['rbt_services_align']) ?>">
                                <?php $this->rbt_section_title_render('services', $this->get_settings()); ?>

                                <?php if($settings['rbt_services_button_button_show'] === 'yes'){ ?>
                                    <div class="service-btn">
                                        <?php $this->rbt_link_control_render('services_button', $this->get_settings()); ?>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    <?php } ?>
                    <div class="<?php echo esc_attr($services_call_class); ?>">
                        <div class="row service-one-wrapper">

                            <?php foreach ($settings['service_list'] as $item){ ?>
                                <!-- Start Single Service  -->
                                <div class="service-item col-lg-<?php echo esc_attr($settings['rbt_service_columns_for_desktop']); ?> col-md-<?php echo esc_attr($settings['rbt_service_columns_for_laptop']); ?> col-sm-<?php echo esc_attr($settings['rbt_service_columns_for_tablet']); ?> col-<?php echo esc_attr($settings['rbt_service_columns_for_mobile']); ?> elementor-repeater-item-<?php echo $item['_id']; ?>">

                                    <?php
                                    // Link
                                    if ('2' == $item['services_link_type']) {
                                        $link = get_permalink($item['services_page_link']);
                                        $target = '_self';
                                        $rel = 'nofollow';
                                    } else {
                                        $link = !empty($item['services_link']['url']) ? $item['services_link']['url'] : '';
                                        $target = ($item['services_link']['is_external']) ? '_blank' : '';
                                        $rel = !empty($item['services_link']['nofollow']) ? 'nofollow' : '';
                                    }
                                    ?>
                                    <?php if($settings['service_style'] == 2){
                                        ?>
                                        <div class="standard-service <?php echo esc_attr($settings['service_align']); ?>">
                                            <?php if($item['service_icon_type'] !== 'image'){ ?>
                                                <?php if (!empty($item['service_icon']) || !empty($item['service_selected_icon']['value'])) : ?>
                                                    <div class="thumbnai">
                                                        <?php rbt_render_icon($item, 'service_icon', 'service_selected_icon'); ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php } else {
                                                if (!empty($item['service_image'])){ ?>
                                                    <div class="thumbnai">
                                                        <?php echo Group_Control_Image_Size::get_attachment_image_html($item, 'full', 'service_image'); ?>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                            <div class="content">
                                                <?php if(!empty($item['service_title'])){ ?>
                                                    <?php printf('<h5>%1$s</h5>', rbt_kses_basic( $item['service_title' ] ));?>
                                                <?php } ?>
                                                <?php if(!empty($item['service_description'])){ ?>
                                                    <p><?php echo rbt_kses_intermediate($item['service_description']); ?></p>
                                                <?php } ?>
                                                <?php if ($settings['service_read_more_link_switcher'] == 'yes'){ ?>
                                                    <?php if($item['services_link_switcher'] == 'yes'){ ?> <a class="btn-transparent rn-btn-dark"  href="<?php echo esc_url($link); ?>" <?php if($target != ''){ ?> target="<?php echo esc_attr($target); ?>" <?php } ?> <?php if($rel != ''){ ?> rel="<?php echo esc_attr($rel); ?>" <?php } ?>><span class="text"><?php echo esc_html($settings['service_read_more_link_text']); ?></span></a>
                                                    <?php } ?>
                                                <?php } ?>

                                            </div>
                                        </div>
                                        <?php
                                    } else { ?>
                                        <?php if($item['services_link_switcher'] == 'yes'){ ?>
                                            <a href="<?php echo esc_url($link); ?>" <?php if($target != ''){ ?> target="<?php echo esc_attr($target); ?>" <?php } ?> <?php if($rel != ''){ ?> rel="<?php echo esc_attr($rel); ?>" <?php } ?>>
                                        <?php } ?>
                                        <div class="single-service service__style--4 text-white <?php echo esc_attr($settings['service_align']); ?>">
                                            <?php if($item['service_icon_type'] !== 'image'){ ?>
                                                <?php if (!empty($item['service_icon']) || !empty($item['service_selected_icon']['value'])) : ?>
                                                    <div class="icon">
                                                        <?php rbt_render_icon($item, 'service_icon', 'service_selected_icon'); ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php } else {
                                                if (!empty($item['service_image'])){ ?>
                                                    <div class="icon">
                                                        <?php echo Group_Control_Image_Size::get_attachment_image_html($item, 'full', 'service_image'); ?>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                            <?php if(!empty($item['service_title']) || !empty($item['service_description'])){

                                                $this->add_render_attribute('service_title', 'class', 'title');
                                                ?>
                                                <div class="content">
                                                    <?php if(!empty($item['service_title'])){ ?>
                                                        <?php printf('<h3 class="title">%1$s</h3>', rbt_kses_basic( $item['service_title' ] ));?>
                                                    <?php } ?>
                                                    <?php if(!empty($item['service_description'])){ ?>
                                                        <p><?php echo rbt_kses_intermediate($item['service_description']); ?></p>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php if($item['services_link_switcher'] == 'yes'){ ?> </a> <?php } ?>
                                    <?php } ?>
                                </div>
                                <!-- End Single Service  -->
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Service Area  -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_Services());


