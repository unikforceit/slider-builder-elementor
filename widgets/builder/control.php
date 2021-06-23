<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class slider_builder extends Widget_Base {

   public function get_name() {
      return 'slider-builder';
   }

   public function get_title() {
      return __( 'Slider Builder', 'sliderbuilderelementor' );
   }
    public function get_categories() {
		return [ 'sliderbuilderelementor' ];
	}
   public function get_icon() { 
        return 'eicon-posts-group';
   }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Slider', 'sliderbuilderelementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'query_type',
            [
                'label' => __('Query type', 'sliderbuilderelementor'),
                'type' => Controls_Manager::SELECT,
                'default' => 'category',
                'options' => [
                    'category' => __('Category', 'sliderbuilderelementor'),
                    'individual' => __('Individual', 'sliderbuilderelementor'),
                ],
            ]
        );

        $this->add_control(
            'cat_query',
            [
                'label' => __('Select Slide Category', 'sliderbuilderelementor'),
                'type' => Controls_Manager::SELECT2,
                'options' => sliderbuilderelementor_category_lists('sliders_builder_category'),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type' => 'category',
                ],
                'default' => __( 'sliderbuilderelementor', 'sliderbuilderelementor' ),
            ]
        );

        $this->add_control(
            'id_query',
            [
                'label' => __('Select Slide', 'sliderbuilderelementor'),
                'type' => Controls_Manager::SELECT2,
                'options' => sliderbuilderelementor_post_lists('sliders_builder'),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type' => 'individual',
                ],
            ]
        );
        $this->add_control(
            'total_slide',
            [
                'label' => __( 'Total Slide', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 6,
                ],
            ]
        );
        $this->add_control(
            'trim',
            [
                'label' => __( 'Trim Main Content', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 10,
                ],
            ]
        );
        $this->add_control(
            'btn',
            [
                'label' => __( 'Button', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Read More', 'sliderbuilderelementor'),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'slider_controls',
            [
                'label' => __( 'Slider Controls', 'sliderbuilderelementor' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'd_item',
            [
                'label' => __( 'Item On Desktop', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 3,
                ],
            ]
        );
        $this->add_control(
            't_item',
            [
                'label' => __( 'Item On Tab', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 2,
                ],
            ]
        );
        $this->add_control(
            'm_item',
            [
                'label' => __( 'Item On Mobile', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 1,
                ],
            ]
        );
        $this->add_control(
            'gap',
            [
                'label' => __( 'Item Gap', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'size' => 30,
                ],
            ]
        );
        $this->add_control(
            'speed',
            [
                'label' => __( 'Smart Speed', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 2000,
                        'step' => 10,
                    ],
                ],
                'default' => [
                    'size' => 250,
                ],
            ]
        );
        $this->add_control(
            'centered',
            [
                'label' => __( 'Centered', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'sliderbuilderelementor' ),
                'label_off' => __( 'False', 'sliderbuilderelementor' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'navs',
            [
                'label' => __( 'Nav Arrow', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'sliderbuilderelementor' ),
                'label_off' => __( 'False', 'sliderbuilderelementor' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'dots',
            [
                'label' => __( 'Nav Dots', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'sliderbuilderelementor' ),
                'label_off' => __( 'False', 'sliderbuilderelementor' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label' => __( 'AutoPlay', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'sliderbuilderelementor' ),
                'label_off' => __( 'False', 'sliderbuilderelementor' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'autoplaypause',
            [
                'label' => __( 'Autoplay Pause', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'sliderbuilderelementor' ),
                'label_off' => __( 'False', 'sliderbuilderelementor' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => __( 'Loop', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'sliderbuilderelementor' ),
                'label_off' => __( 'False', 'sliderbuilderelementor' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $this->end_controls_section();

        //  Icon Controls
        $this->start_controls_section(
            'ficon_bs',
            [
                'label' => __( 'Featured Icon', 'sliderbuilderelementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'ficon_show',
            [
                'label' => __( 'Show Icon', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'sliderbuilderelementor' ),
                'label_off' => __( 'False', 'sliderbuilderelementor' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $ficon_b_normal = '{{WRAPPER}} .slider-builder-sections .slider-inner-box .slider-main-thumbnail .icon-container';

        $this->add_responsive_control(
            'ficon_btn_w',
            [
                'label' => __( 'Width', 'sliderbuilderelementor' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px', '%'],
                'selectors' => [
                    $ficon_b_normal => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'ficon_btn_h',
            [
                'label' => __( 'Height', 'sliderbuilderelementor' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px', '%'],
                'selectors' => [
                    $ficon_b_normal => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'ficon_btn_padding',
            [
                'label' => __( 'Padding', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $ficon_b_normal => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ficon_position',
            [
                'label' => __( 'Position', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'absolute' => [
                        'title' => __( 'Absolute', 'sliderbuilderelementor' ),
                        'icon' => 'eicon-image-rollover',
                    ],
                    'relative' => [
                        'title' => __( 'Relative', 'sliderbuilderelementor' ),
                        'icon' => 'eicon-post',
                    ],
                ],
                'selectors' => [
                    $ficon_b_normal => 'position: {{VALUE}};',
                ],
                'toggle' => true,
            ]
        );
        $this->add_responsive_control(
            'ficon_left',
            [
                'label' => __( 'Left', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'ficon_position' => 'absolute',
                ],
                'selectors' => [
                    $ficon_b_normal => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ficon_top',
            [
                'label' => __( 'Top', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'ficon_position' => 'absolute',
                ],
                'selectors' => [
                    $ficon_b_normal => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs('ficon_btn_tab');

        $this->start_controls_tab(
            'ficon_btn_normal',
            [
                'label' => esc_html__( 'Normal', 'sliderbuilderelementor' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ficon_bt',
                'label' =>   esc_html__( 'Typography', 'sliderbuilderelementor' ),
                'selector' => $ficon_b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'ficon_text_shadow',
                'label' => __( 'Text Shadow', 'sliderbuilderelementor' ),
                'selector' => $ficon_b_normal,
            ]
        );
        $this->add_control(
            'ficon_bc',
            [
                'label' =>   esc_html__( 'Color', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    $ficon_b_normal => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ficon_background12',
                'label' => __( 'Background', 'sliderbuilderelementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => $ficon_b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ficon_box_shadow',
                'label' => __( 'Box Shadow', 'sliderbuilderelementor' ),
                'selector' => $ficon_b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'ficon_border',
                'label' => __( 'Border', 'sliderbuilderelementor' ),
                'selector' => $ficon_b_normal,
            ]
        );
        $this->add_responsive_control(
            'ficon_border_radius',
            [
                'label' => __( 'Border Radius', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $ficon_b_normal => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'ficon_btn_hover',
            [
                'label' => esc_html__( 'Hover', 'sliderbuilderelementor' ),
            ]
        );
        $ficon_b_hover = '{{WRAPPER}} .slider-builder-sections .slider-inner-box .slider-main-thumbnail .icon-container:hover';

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ficon_h_bt',
                'label' =>   esc_html__( 'Typography', 'sliderbuilderelementor' ),
                'selector' => $ficon_b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'ficon_text_shadow_h',
                'label' => __( 'Text Shadow', 'sliderbuilderelementor' ),
                'selector' => $ficon_b_hover,
            ]
        );
        $this->add_control(
            'ficon_h_bc',
            [
                'label' =>   esc_html__( 'Color', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    $ficon_b_hover => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ficon_h_background',
                'label' => __( 'Background', 'sliderbuilderelementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => $ficon_b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ficon_box_shadow_h',
                'label' => __( 'Box Shadow', 'sliderbuilderelementor' ),
                'selector' => $ficon_b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'ficon_h_border',
                'label' => __( 'Border', 'sliderbuilderelementor' ),
                'selector' => $ficon_b_hover,
            ]
        );
        $this->add_responsive_control(
            'ficon_h_border_radius',
            [
                'label' => __( 'Border Radius', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $ficon_b_hover => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //  Title Controls
        $this->start_controls_section(
            'title_bs',
            [
                'label' => __( 'Title', 'sliderbuilderelementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_show',
            [
                'label' => __( 'Show Title', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'sliderbuilderelementor' ),
                'label_off' => __( 'False', 'sliderbuilderelementor' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $title_b_normal = '{{WRAPPER}} .slider-builder-sections .slider-inner-box .main-heading h3';

        $this->add_responsive_control(
            'title_btn_w',
            [
                'label' => __( 'Width', 'sliderbuilderelementor' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px', '%'],
                'selectors' => [
                    $title_b_normal => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'title_btn_h',
            [
                'label' => __( 'Height', 'sliderbuilderelementor' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px', '%'],
                'selectors' => [
                    $title_b_normal => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'title_btn_padding',
            [
                'label' => __( 'Padding', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $title_b_normal => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_position',
            [
                'label' => __( 'Position', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'absolute' => [
                        'title' => __( 'Absolute', 'sliderbuilderelementor' ),
                        'icon' => 'eicon-image-rollover',
                    ],
                    'relative' => [
                        'title' => __( 'Relative', 'sliderbuilderelementor' ),
                        'icon' => 'eicon-post',
                    ],
                ],
                'selectors' => [
                    $title_b_normal => 'position: {{VALUE}};',
                ],
                'toggle' => true,
            ]
        );
        $this->add_responsive_control(
            'title_left',
            [
                'label' => __( 'Left', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'title_position' => 'absolute',
                ],
                'selectors' => [
                    $title_b_normal => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_top',
            [
                'label' => __( 'Top', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'title_position' => 'absolute',
                ],
                'selectors' => [
                    $title_b_normal => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ttl_align',
            [
                'label' => __( 'Alignment', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'sliderbuilderelementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'sliderbuilderelementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'sliderbuilderelementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    $title_b_normal => 'text-align: {{VALUE}};',
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );
        $this->start_controls_tabs('title_btn_tab');

        $this->start_controls_tab(
            'title_btn_normal',
            [
                'label' => esc_html__( 'Normal', 'sliderbuilderelementor' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_bt',
                'label' =>   esc_html__( 'Typography', 'sliderbuilderelementor' ),
                'selector' => $title_b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_text_shadow',
                'label' => __( 'Text Shadow', 'sliderbuilderelementor' ),
                'selector' => $title_b_normal,
            ]
        );
        $this->add_control(
            'title_bc',
            [
                'label' =>   esc_html__( 'Color', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    $title_b_normal => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'title_background12',
                'label' => __( 'Background', 'sliderbuilderelementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => $title_b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'title_box_shadow',
                'label' => __( 'Box Shadow', 'sliderbuilderelementor' ),
                'selector' => $title_b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'title_border',
                'label' => __( 'Border', 'sliderbuilderelementor' ),
                'selector' => $title_b_normal,
            ]
        );
        $this->add_responsive_control(
            'title_border_radius',
            [
                'label' => __( 'Border Radius', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $title_b_normal => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_btn_hover',
            [
                'label' => esc_html__( 'Hover', 'sliderbuilderelementor' ),
            ]
        );
        $title_b_hover = '{{WRAPPER}} .slider-builder-sections .slider-inner-box .main-heading h3:hover';

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_h_bt',
                'label' =>   esc_html__( 'Typography', 'sliderbuilderelementor' ),
                'selector' => $title_b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_text_shadow_h',
                'label' => __( 'Text Shadow', 'sliderbuilderelementor' ),
                'selector' => $title_b_hover,
            ]
        );
        $this->add_control(
            'title_h_bc',
            [
                'label' =>   esc_html__( 'Color', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    $title_b_hover => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'title_h_background',
                'label' => __( 'Background', 'sliderbuilderelementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => $title_b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'title_box_shadow_h',
                'label' => __( 'Box Shadow', 'sliderbuilderelementor' ),
                'selector' => $title_b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'title_h_border',
                'label' => __( 'Border', 'sliderbuilderelementor' ),
                'selector' => $title_b_hover,
            ]
        );
        $this->add_responsive_control(
            'title_h_border_radius',
            [
                'label' => __( 'Border Radius', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $title_b_hover => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        //  Info Controls
        $this->start_controls_section(
            'info_bs',
            [
                'label' => __( 'Info', 'sliderbuilderelementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'info_show',
            [
                'label' => __( 'Show Info', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'sliderbuilderelementor' ),
                'label_off' => __( 'False', 'sliderbuilderelementor' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $info_b_normal = '{{WRAPPER}} .slider-builder-sections .slider-inner-box .main-text';

        $this->add_responsive_control(
            'info_btn_w',
            [
                'label' => __( 'Width', 'sliderbuilderelementor' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px', '%'],
                'selectors' => [
                    $info_b_normal => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'info_btn_h',
            [
                'label' => __( 'Height', 'sliderbuilderelementor' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px', '%'],
                'selectors' => [
                    $info_b_normal => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'info_btn_padding',
            [
                'label' => __( 'Padding', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $info_b_normal => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'info_position',
            [
                'label' => __( 'Position', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'absolute' => [
                        'title' => __( 'Absolute', 'sliderbuilderelementor' ),
                        'icon' => 'eicon-image-rollover',
                    ],
                    'relative' => [
                        'title' => __( 'Relative', 'sliderbuilderelementor' ),
                        'icon' => 'eicon-post',
                    ],
                ],
                'selectors' => [
                    $info_b_normal => 'position: {{VALUE}};',
                ],
                'toggle' => true,
            ]
        );
        $this->add_responsive_control(
            'info_left',
            [
                'label' => __( 'Left', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'info_position' => 'absolute',
                ],
                'selectors' => [
                    $info_b_normal => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'info_top',
            [
                'label' => __( 'Top', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'info_position' => 'absolute',
                ],
                'selectors' => [
                    $info_b_normal => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'inf_align',
            [
                'label' => __( 'Alignment', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'sliderbuilderelementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'sliderbuilderelementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'sliderbuilderelementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    $info_b_normal => 'text-align: {{VALUE}};',
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );
        $this->start_controls_tabs('info_btn_tab');

        $this->start_controls_tab(
            'info_btn_normal',
            [
                'label' => esc_html__( 'Normal', 'sliderbuilderelementor' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'info_bt',
                'label' =>   esc_html__( 'Typography', 'sliderbuilderelementor' ),
                'selector' => $info_b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'info_text_shadow',
                'label' => __( 'Text Shadow', 'sliderbuilderelementor' ),
                'selector' => $info_b_normal,
            ]
        );
        $this->add_control(
            'info_bc',
            [
                'label' =>   esc_html__( 'Color', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    $info_b_normal => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'info_background12',
                'label' => __( 'Background', 'sliderbuilderelementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => $info_b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'info_box_shadow',
                'label' => __( 'Box Shadow', 'sliderbuilderelementor' ),
                'selector' => $info_b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'info_border',
                'label' => __( 'Border', 'sliderbuilderelementor' ),
                'selector' => $info_b_normal,
            ]
        );
        $this->add_responsive_control(
            'info_border_radius',
            [
                'label' => __( 'Border Radius', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $info_b_normal => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'info_btn_hover',
            [
                'label' => esc_html__( 'Hover', 'sliderbuilderelementor' ),
            ]
        );
        $info_b_hover = '{{WRAPPER}} .slider-builder-sections .slider-inner-box .main-text:hover';

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'info_h_bt',
                'label' =>   esc_html__( 'Typography', 'sliderbuilderelementor' ),
                'selector' => $info_b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'info_text_shadow_h',
                'label' => __( 'Text Shadow', 'sliderbuilderelementor' ),
                'selector' => $info_b_hover,
            ]
        );
        $this->add_control(
            'info_h_bc',
            [
                'label' =>   esc_html__( 'Color', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    $info_b_hover => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'info_h_background',
                'label' => __( 'Background', 'sliderbuilderelementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => $info_b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'info_box_shadow_h',
                'label' => __( 'Box Shadow', 'sliderbuilderelementor' ),
                'selector' => $info_b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'info_h_border',
                'label' => __( 'Border', 'sliderbuilderelementor' ),
                'selector' => $info_b_hover,
            ]
        );
        $this->add_responsive_control(
            'info_h_border_radius',
            [
                'label' => __( 'Border Radius', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $info_b_hover => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        //  Meta Controls
        $this->start_controls_section(
            'meta_bs',
            [
                'label' => __( 'Meta', 'sliderbuilderelementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'meta_show',
            [
                'label' => __( 'Show Meta', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'sliderbuilderelementor' ),
                'label_off' => __( 'False', 'sliderbuilderelementor' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $meta_b_normal = '{{WRAPPER}} .slider-builder-sections .slider-inner-box .slider-meta';

        $this->add_responsive_control(
            'meta_btn_w',
            [
                'label' => __( 'Width', 'sliderbuilderelementor' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px', '%'],
                'selectors' => [
                    $meta_b_normal => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'meta_btn_h',
            [
                'label' => __( 'Height', 'sliderbuilderelementor' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px', '%'],
                'selectors' => [
                    $meta_b_normal => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'meta_btn_padding',
            [
                'label' => __( 'Padding', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $meta_b_normal => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'meta_position',
            [
                'label' => __( 'Position', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'absolute' => [
                        'title' => __( 'Absolute', 'sliderbuilderelementor' ),
                        'icon' => 'eicon-image-rollover',
                    ],
                    'relative' => [
                        'title' => __( 'Relative', 'sliderbuilderelementor' ),
                        'icon' => 'eicon-post',
                    ],
                ],
                'selectors' => [
                    $meta_b_normal => 'position: {{VALUE}};',
                ],
                'toggle' => true,
            ]
        );
        $this->add_responsive_control(
            'meta_left',
            [
                'label' => __( 'Left', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'meta_position' => 'absolute',
                ],
                'selectors' => [
                    $meta_b_normal => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'meta_top',
            [
                'label' => __( 'Top', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'meta_position' => 'absolute',
                ],
                'selectors' => [
                    $meta_b_normal => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'metaa_align',
            [
                'label' => __( 'Alignment', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'sliderbuilderelementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'sliderbuilderelementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'sliderbuilderelementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    $meta_b_normal => 'text-align: {{VALUE}};',
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();

        //  Button Controls
        $this->start_controls_section(
            'bs',
            [
                'label' => __( 'Button', 'sliderbuilderelementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'btn_show',
            [
                'label' => __( 'Show Button', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'True', 'sliderbuilderelementor' ),
                'label_off' => __( 'False', 'sliderbuilderelementor' ),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );
        $b_normal = '{{WRAPPER}} .slider-builder-sections .slider-inner-box .slider-btn a';

        $this->add_responsive_control(
            'btn_w',
            [
                'label' => __( 'Width', 'sliderbuilderelementor' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px', '%'],
                'selectors' => [
                    $b_normal => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'btn_h',
            [
                'label' => __( 'Height', 'sliderbuilderelementor' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px', '%'],
                'selectors' => [
                    $b_normal => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'btn_padding',
            [
                'label' => __( 'Padding', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $b_normal => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'position',
            [
                'label' => __( 'Position', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'absolute' => [
                        'title' => __( 'Absolute', 'sliderbuilderelementor' ),
                        'icon' => 'eicon-image-rollover',
                    ],
                    'relative' => [
                        'title' => __( 'Relative', 'sliderbuilderelementor' ),
                        'icon' => 'eicon-post',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-builder-sections .slider-inner-box .slider-btn' => 'position: {{VALUE}};',
                ],
                'toggle' => true,
            ]
        );
        $this->add_responsive_control(
            'left',
            [
                'label' => __( 'Left', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'position' => 'absolute',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-builder-sections .slider-inner-box .slider-btn' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top',
            [
                'label' => __( 'Top', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'position' => 'absolute',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-builder-sections .slider-inner-box .slider-btn' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'text_align',
            [
                'label' => __( 'Alignment', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'sliderbuilderelementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'sliderbuilderelementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'sliderbuilderelementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-builder-sections .slider-inner-box .slider-btn' => 'text-align: {{VALUE}};',
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );
        $this->start_controls_tabs('btn_tab');

        $this->start_controls_tab(
            'btn_normal',
            [
                'label' => esc_html__( 'Normal', 'sliderbuilderelementor' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'bt',
                'label' =>   esc_html__( 'Typography', 'sliderbuilderelementor' ),
                'selector' => $b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'text_shadow',
                'label' => __( 'Text Shadow', 'sliderbuilderelementor' ),
                'selector' => $b_normal,
            ]
        );
        $this->add_control(
            'bc',
            [
                'label' =>   esc_html__( 'Color', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    $b_normal => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background12',
                'label' => __( 'Background', 'sliderbuilderelementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => $b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __( 'Box Shadow', 'sliderbuilderelementor' ),
                'selector' => $b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __( 'Border', 'sliderbuilderelementor' ),
                'selector' => $b_normal,
            ]
        );
        $this->add_responsive_control(
            'border_radius',
            [
                'label' => __( 'Border Radius', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $b_normal => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'btn_hover',
            [
                'label' => esc_html__( 'Hover', 'sliderbuilderelementor' ),
            ]
        );
        $b_hover = '{{WRAPPER}} .slider-builder-sections .slider-inner-box .slider-btn a:hover';
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'h_bt',
                'label' =>   esc_html__( 'Typography', 'sliderbuilderelementor' ),
                'selector' => $b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'text_shadow_h',
                'label' => __( 'Text Shadow', 'sliderbuilderelementor' ),
                'selector' => $b_hover,
            ]
        );
        $this->add_control(
            'h_bc',
            [
                'label' =>   esc_html__( 'Color', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    $b_hover => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'h_background',
                'label' => __( 'Background', 'sliderbuilderelementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => $b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_h',
                'label' => __( 'Box Shadow', 'sliderbuilderelementor' ),
                'selector' => $b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'h_border',
                'label' => __( 'Border', 'sliderbuilderelementor' ),
                'selector' => $b_hover,
            ]
        );
        $this->add_responsive_control(
            'h_border_radius',
            [
                'label' => __( 'Border Radius', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $b_hover => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //  Nav Controls
        $this->start_controls_section(
            'nav_bs',
            [
                'label' => __( 'Nav', 'sliderbuilderelementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $nav_b_normal = '{{WRAPPER}} .slider-builder-sections .owl-carousel .owl-nav .owl-prev, 
        {{WRAPPER}} .slider-builder-sections .owl-carousel .owl-nav .owl-next';

        $this->add_responsive_control(
            'nav_btn_w',
            [
                'label' => __( 'Width', 'sliderbuilderelementor' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px', '%'],
                'selectors' => [
                    $nav_b_normal => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'nav_btn_h',
            [
                'label' => __( 'Height', 'sliderbuilderelementor' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px', '%'],
                'selectors' => [
                    $nav_b_normal => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'nav_btn_padding',
            [
                'label' => __( 'Padding', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $nav_b_normal => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'nav_position',
            [
                'label' => __( 'Position', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'absolute' => [
                        'title' => __( 'Absolute', 'sliderbuilderelementor' ),
                        'icon' => 'eicon-image-rollover',
                    ],
                    'relative' => [
                        'title' => __( 'Relative', 'sliderbuilderelementor' ),
                        'icon' => 'eicon-post',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-builder-sections .owl-carousel .owl-nav .owl-prev, 
                    {{WRAPPER}} .slider-builder-sections .owl-carousel .owl-nav .owl-next' => 'position: {{VALUE}};',
                ],
                'toggle' => true,
            ]
        );
        $this->add_control(
            'prev',
            [
                'label' => __( 'Previous', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'nav_position' => 'absolute',
                ],
            ]
        );

        $this->add_responsive_control(
            'nav_left',
            [
                'label' => __( 'Left', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'nav_position' => 'absolute',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-builder-sections .owl-carousel .owl-nav .owl-prev' => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'nav_top',
            [
                'label' => __( 'Top', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'nav_position' => 'absolute',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-builder-sections .owl-carousel .owl-nav .owl-prev' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'next',
            [
                'label' => __( 'Next', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'nav_position' => 'absolute',
                ],
            ]
        );
        $this->add_responsive_control(
            'nav_leftl',
            [
                'label' => __( 'Left', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'nav_position' => 'absolute',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-builder-sections .owl-carousel .owl-nav .owl-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'nav_topl',
            [
                'label' => __( 'Top', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'nav_position' => 'absolute',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-builder-sections .owl-carousel .owl-nav .owl-next' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs('nav_btn_tab');

        $this->start_controls_tab(
            'nav_btn_normal',
            [
                'label' => esc_html__( 'Normal', 'sliderbuilderelementor' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'nav_bt',
                'label' =>   esc_html__( 'Typography', 'sliderbuilderelementor' ),
                'selector' => $nav_b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'nav_text_shadow',
                'label' => __( 'Text Shadow', 'sliderbuilderelementor' ),
                'selector' => $nav_b_normal,
            ]
        );
        $this->add_control(
            'nav_bc',
            [
                'label' =>   esc_html__( 'Color', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    $nav_b_normal => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'nav_background12',
                'label' => __( 'Background', 'sliderbuilderelementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => $nav_b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'nav_box_shadow',
                'label' => __( 'Box Shadow', 'sliderbuilderelementor' ),
                'selector' => $nav_b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'nav_border',
                'label' => __( 'Border', 'sliderbuilderelementor' ),
                'selector' => $nav_b_normal,
            ]
        );
        $this->add_responsive_control(
            'nav_border_radius',
            [
                'label' => __( 'Border Radius', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $nav_b_normal => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'nav_btn_hover',
            [
                'label' => esc_html__( 'Hover', 'sliderbuilderelementor' ),
            ]
        );
        $nav_b_hover = '{{WRAPPER}} .slider-builder-sections .owl-carousel .owl-nav .owl-prev:hover, 
        {{WRAPPER}} .slider-builder-sections .owl-carousel .owl-nav .owl-next:hover';

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'nav_h_bt',
                'label' =>   esc_html__( 'Typography', 'sliderbuilderelementor' ),
                'selector' => $nav_b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'nav_text_shadow_h',
                'label' => __( 'Text Shadow', 'sliderbuilderelementor' ),
                'selector' => $nav_b_hover,
            ]
        );
        $this->add_control(
            'nav_h_bc',
            [
                'label' =>   esc_html__( 'Color', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    $nav_b_hover => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'nav_h_background',
                'label' => __( 'Background', 'sliderbuilderelementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => $nav_b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'nav_box_shadow_h',
                'label' => __( 'Box Shadow', 'sliderbuilderelementor' ),
                'selector' => $nav_b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'nav_h_border',
                'label' => __( 'Border', 'sliderbuilderelementor' ),
                'selector' => $nav_b_hover,
            ]
        );
        $this->add_responsive_control(
            'nav_h_border_radius',
            [
                'label' => __( 'Border Radius', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $nav_b_hover => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //  Dot Nav Controls
        $this->start_controls_section(
            'dot_bs',
            [
                'label' => __( 'Dot Nav', 'sliderbuilderelementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $dot_b_normal = '{{WRAPPER}} .slider-builder-sections .owl-carousel .owl-dots .owl-dot';

        $this->add_responsive_control(
            'dot_btn_w',
            [
                'label' => __( 'Width', 'sliderbuilderelementor' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px', '%'],
                'selectors' => [
                    $dot_b_normal => 'width: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'dot_btn_h',
            [
                'label' => __( 'Height', 'sliderbuilderelementor' ),
                'type' =>  Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],

                ],
                'size_units' => [ 'px', '%'],
                'selectors' => [
                    $dot_b_normal => 'height: {{SIZE}}{{UNIT}};',
                ],

            ]
        );
        $this->add_responsive_control(
            'dot_btn_padding',
            [
                'label' => __( 'Padding', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $dot_b_normal => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dot_position',
            [
                'label' => __( 'Position', 'sliderbuilderelementor' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'absolute' => [
                        'title' => __( 'Absolute', 'sliderbuilderelementor' ),
                        'icon' => 'eicon-image-rollover',
                    ],
                    'relative' => [
                        'title' => __( 'Relative', 'sliderbuilderelementor' ),
                        'icon' => 'eicon-post',
                    ],
                ],
                'selectors' => [
                    $dot_b_normal => 'position: {{VALUE}};',
                ],
                'toggle' => true,
            ]
        );
        $this->add_responsive_control(
            'dot_left',
            [
                'label' => __( 'Left', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'dot_position' => 'absolute',
                ],
                'selectors' => [
                    $dot_b_normal => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dot_top',
            [
                'label' => __( 'Top', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => -500,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'condition' => [
                    'dot_position' => 'absolute',
                ],
                'selectors' => [
                    $dot_b_normal => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs('dot_btn_tab');

        $this->start_controls_tab(
            'dot_btn_normal',
            [
                'label' => esc_html__( 'Normal', 'sliderbuilderelementor' ),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'dot_background12',
                'label' => __( 'Background', 'sliderbuilderelementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => $dot_b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'dot_box_shadow',
                'label' => __( 'Box Shadow', 'sliderbuilderelementor' ),
                'selector' => $dot_b_normal,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'dot_border',
                'label' => __( 'Border', 'sliderbuilderelementor' ),
                'selector' => $dot_b_normal,
            ]
        );
        $this->add_responsive_control(
            'dot_border_radius',
            [
                'label' => __( 'Border Radius', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $dot_b_normal => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'dot_btn_hover',
            [
                'label' => esc_html__( 'Hover', 'sliderbuilderelementor' ),
            ]
        );
        $dot_b_hover = '{{WRAPPER}} .slider-builder-sections .owl-carousel .owl-dots .owl-dot.active, 
        {{WRAPPER}} .slider-builder-sections .owl-carousel .owl-dots .owl-dot:hover';
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'dot_h_background',
                'label' => __( 'Background', 'sliderbuilderelementor' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => $dot_b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'dot_box_shadow_h',
                'label' => __( 'Box Shadow', 'sliderbuilderelementor' ),
                'selector' => $dot_b_hover,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'dot_h_border',
                'label' => __( 'Border', 'sliderbuilderelementor' ),
                'selector' => $dot_b_hover,
            ]
        );
        $this->add_responsive_control(
            'dot_h_border_radius',
            [
                'label' => __( 'Border Radius', 'sliderbuilderelementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    $dot_b_hover => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

       require dirname(__FILE__). '/view.php';
}
    protected function _content_template() {}

    protected function content_template() {}

   public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register_widget_type( new slider_builder() );