<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Slider Widget.
 *
 */
class Taxseco_Slider extends Widget_Base {

	public function get_name() {
		return 'taxsecoslider';
	}

	public function get_title() {
		return __( 'Taxseco Slider', 'taxseco' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'taxseco' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'slider_section',
			[
				'label' 	=> __( 'Slider', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'slider_style',
			[
				'label' 		=> __( 'Slider Style', 'taxseco' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'taxseco' ),
					'2' 		=> __( 'Style Two', 'taxseco' ),
					'3' 		=> __( 'Style Three', 'taxseco' ),
					'4' 		=> __( 'Style Four', 'taxseco' ),
					'5' 		=> __( 'Style Five', 'taxseco' ),
				],
			]
		);

		/*-----------------------------------------style one ------------------------------------*/

		$repeater = new Repeater();

        $repeater->add_control(
            'slider_img',
            [
                'label'     => __( 'Slider Image', 'taxseco' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $repeater->add_control(
            'overlay_slider_img',
            [
                'label'     => __( 'Overlay Slider Image', 'taxseco' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $repeater->add_control(
			'slider_subtitle', [
				'label' 		=> __( 'Sub Title', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Taxi Driver for Hire' , 'taxseco' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'slider_title1', [
				'label' 		=> __( 'Title 1', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Trusted Cheapest Taxi' , 'taxseco' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'slider_title2', [
				'label' 		=> __( 'Title 2', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Trusted Cheapest Taxi' , 'taxseco' ),
				'label_block' 	=> true,
			]
        );
        
        
        $repeater->add_control(
			'button_text_1',
			[
				'label' 	=> esc_html__( 'First Button Text', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Learn More', 'taxseco' ),
			]
        );

        $repeater->add_control(
			'button_link_1',
			[
				'label' 		=> esc_html__( 'First Button Link', 'taxseco' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'taxseco' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$repeater->add_control(
			'button_text_2',
			[
				'label' 	=> esc_html__( 'Second Button Text', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Find A Taxi', 'taxseco' ),
			]
        );

        $repeater->add_control(
			'button_link_2',
			[
				'label' 		=> esc_html__( 'Second Button Link', 'taxseco' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'taxseco' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		
		$this->add_control(
			'sliders_one',
			[
				'label' 		=> __( 'Sliders', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'slider_title' 		=> __( 'Slider One', 'taxseco' ),
					],
				],
				'title_field' 	=> '{{{ slider_title }}}',
				'condition'	=> ['slider_style' => '1']
			]
		);

		/*-----------------------------------------style two ------------------------------------*/

		$repeater2 = new Repeater();

        $repeater2->add_control(
            'slider_img',
            [
                'label'     => __( 'Slider Image', 'taxseco' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $repeater2->add_control(
            'overlay_slider_img',
            [
                'label'     => __( 'Overlay Slider Image', 'taxseco' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $repeater2->add_control(
			'heading', [
				'label' 		=> __( 'Heading', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Get The Best Car Solution' , 'taxseco' ),
				'label_block' 	=> true,
			]
        );
        $repeater2->add_control(
			'slider_title', [
				'label' 		=> __( 'Title 1', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'The Best Car Repair' , 'taxseco' ),
				'label_block' 	=> true,
			]
        );
        $repeater2->add_control(
			'slider_title2', [
				'label' 		=> __( 'Title 2', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Service Center' , 'taxseco' ),
				'label_block' 	=> true,
			]
        );
        $repeater2->add_control(
			'slider_desc', [
				'label' 		=> __( 'Description', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Service Center' , 'taxseco' ),
				'label_block' 	=> true,
			]
        );
        $repeater2->add_control(
			'button_text_1',
			[
				'label' 	=> esc_html__( 'First Button Text', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Get More Info', 'taxseco' ),
			]
        );

        $repeater2->add_control(
			'button_link_1',
			[
				'label' 		=> esc_html__( 'First Button Link', 'taxseco' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'taxseco' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

		$repeater2->add_control(
			'button_text_2',
			[
				'label' 	=> esc_html__( 'Second Button Text', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Latest Projects', 'taxseco' ),
			]
        );

        $repeater2->add_control(
			'button_link_2',
			[
				'label' 		=> esc_html__( 'Second Button Link', 'taxseco' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'taxseco' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		
		$this->add_control(
			'banners_two',
			[
				'label' 		=> __( 'Sliders', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'slider_title' 		=> __( 'Slider One', 'taxseco' ),
					],
				],
				'title_field' 	=> '{{{ slider_title }}}',
				'condition'	=> ['slider_style' => ['2','3', '4']]
			]
		);

		/*-----------------------------------------style five ------------------------------------*/

        $this->add_control(
            'slider_bg_img',
            [
                'label'     => __( 'Background', 'taxseco' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> [
					'slider_style' => ['5']
				],
            ]
        );

        $this->add_control(
            'slider_img',
            [
                'label'     => __( 'Banner Image', 'taxseco' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> [
					'slider_style' => ['5']
				],
            ]
        );

         $this->add_control(
			'heading_video_link',
			[
				'label' 		=> esc_html__( 'Video Link', 'taxseco' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'taxseco' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'	=> [
					'slider_style' => ['5']
				],
			]
		);

        $this->add_control(
			'heading', [
				'label' 		=> __( 'Heading', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Get The Best Car Solution' , 'taxseco' ),
				'label_block' 	=> true,
				'condition'	=> [
					'slider_style' => ['5']
				],
			]
        );
        $this->add_control(
			'slider_title', [
				'label' 		=> __( 'Title 1', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'The Best Car Repair' , 'taxseco' ),
				'label_block' 	=> true,
				'condition'	=> [
					'slider_style' => ['5']
				],
			]
        );
        $this->add_control(
			'slider_title2', [
				'label' 		=> __( 'Title 2', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Service Center' , 'taxseco' ),
				'label_block' 	=> true,
				'condition'	=> [
					'slider_style' => ['5']
				],
			]
        );
        $this->add_control(
			'slider_desc', [
				'label' 		=> __( 'Description', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Service Center' , 'taxseco' ),
				'label_block' 	=> true,
				'condition'	=> [
					'slider_style' => ['5']
				],
			]
        );

        $this->add_control(
			'button_text_1',
			[
				'label' 	=> esc_html__( 'Button Text 1', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Get More Info', 'taxseco' ),
                'condition'	=> [
					'slider_style' => ['5']
				],
			]
        );

        $this->add_control(
			'button_link_1',
			[
				'label' 		=> esc_html__( 'Button Link 1', 'taxseco' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'taxseco' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'	=> [
					'slider_style' => ['5']
				],
			]
		);

		$this->add_control(
			'button_text_2',
			[
				'label' 	=> esc_html__( 'Button Text 2', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Get More Info', 'taxseco' ),
                'condition'	=> [
					'slider_style' => ['5']
				],
			]
        );

        $this->add_control(
			'button_link_2',
			[
				'label' 		=> esc_html__( 'Button Link 2', 'taxseco' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'taxseco' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'	=> [
					'slider_style' => ['5']
				],
			]
		);

		$this->add_control(
			'show_shape',
			[
				'label' 		=> __( 'Show All Shape?', 'taxseco' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'taxseco' ),
				'label_off' 	=> __( 'No', 'taxseco' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'	=> [
					'slider_style' => ['5']
				],
			]
		);

        $this->end_controls_section();

        //---------------------------------------subTitle Style---------------------------------------//

		$this->start_controls_section(
			'subtitle_style',
			[
				'label' 	=> __( 'Subtitle Style', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> __( 'Subtitle Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-subtitle, {{WRAPPER}} .video-btn' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'subtitle_typography',
				'label' 	=> __( 'Subtitle Typography', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .hero-subtitle, {{WRAPPER}} .video-btn',
			]
        );
        $this->add_responsive_control(
			'subtitle_margin',
			[
				'label' 		=> __( 'Subtitle Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-subtitle, {{WRAPPER}} .video-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label' 		=> __( 'Subtitle Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-subtitle, {{WRAPPER}} .video-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		
		$this->end_controls_section();

		//---------------------------------------Title Style---------------------------------------//

		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-title' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .hero-title',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

		//---------------------------------------Description Style---------------------------------------//

		$this->start_controls_section(
			'desc_style',
			[
				'label' 	=> __( 'Description Style', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> [
					'slider_style' => ['5']
				],
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label' 		=> __( 'Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-text' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'desc_typography',
				'label' 	=> __( 'Typography', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .hero-text',
			]
        );
        $this->add_responsive_control(
			'desc_margin',
			[
				'label' 		=> __( 'Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'desc_padding',
			[
				'label' 		=> __( 'Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();
		

		//---------------------------------------Button Style---------------------------------------//

		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_color_hover',
			[
				'label' 		=> __( 'Button Color Hover', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Button Background Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_hover_color',
			[
				'label' 		=> __( 'Button Background Hover Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn:before' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .as-btn',
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border_hover',
				'label' 	=> __( 'Border Hover', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .as-btn:hover',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .as-btn',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Button Border Radius', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Button Shadow', 'taxseco' ),
				'selector' => '{{WRAPPER}} .as-btn',
			]
		);
        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();

		if( $settings['slider_style'] == '1' ){
			echo '<!--=========Hero Area==========-->';
		    echo '<div class="as-hero-wrapper hero-1">';
		        echo '<div class="hero-slider-1 as-hero-wrapper-area as-carousel">';
		        foreach( $settings['sliders_one'] as $data ) {
		            echo '<div class="as-hero-slide">';
							if(!empty($data['slider_img']['url'])){ 
							    echo '<div class="as-hero-bg" data-bg-src="'.esc_url($data['slider_img']['url']).'">';        
									if(!empty($data['overlay_slider_img']['url'])){
									    echo taxseco_img_tag( array(
									        'url'   => esc_url( $data['overlay_slider_img']['url']  ),
									    ));
									}

							    echo '</div>';
							}

			                echo '<div class="container">';
			                    echo '<div class="hero-style1">';
				                    if(!empty($data['slider_subtitle'])){
				                        echo '<span class="hero-subtitle" data-ani="slideinleft" data-ani-delay="0.1s">'.esc_html($data['slider_subtitle']).'</span>';
									}
									if(!empty($data['slider_title1'])){
				                        echo '<h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.3s">'.wp_kses_post($data['slider_title1']).'</h1>';
									}
									if(!empty($data['slider_title2'])){
				                        echo '<h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.5s">'.wp_kses_post($data['slider_title2']).'</h1>';
				                    }
			                        echo '<div class="btn-group" data-ani="slideinleft" data-ani-delay="0.7s">';
					                   	if(!empty($data['button_text_1'])){			               
					                        echo '<a href="'.esc_url( $data['button_link_1']['url'] ).'" class="as-btn style3 style-skew"><span class="btn-text">'.esc_html($data['button_text_1']).'</span></a>';
					                    }                 	
					                    if(!empty($data['button_text_2'])){
					               
					                        echo '<a href="'.esc_url( $data['button_link_2']['url'] ).'" class="as-btn style2 style-skew"><span class="btn-text">'.esc_html($data['button_text_2']).'</span></a>';
					                    }	                            
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
		            echo '</div>';
				}
		        echo '</div>';
		        echo '<a href="#about-sec" class="scroll-bottom"><i class="far fa-chevron-down"></i></a>';
		        echo '<div class="hero-shape"></div>';
		    echo '</div>';
			echo '<!--======== Hero Section ========-->';
		}elseif( $settings['slider_style'] == '2' ){
			echo '<div class="as-hero-wrapper hero-2">';
		        echo '<div class="hero-slider-2 as-carousel" id="heroSlide2">';
		        	foreach( $settings['banners_two'] as $data ) {
			            echo '<div class="as-hero-slide">';

			            	if(!empty($data['slider_img']['url'])){ 
							    echo '<div class="as-hero-bg" data-bg-src="'.esc_url($data['slider_img']['url']).'">';        
									if(!empty($data['overlay_slider_img']['url'])){
									    echo taxseco_img_tag( array(
									        'url'   => esc_url( $data['overlay_slider_img']['url']  ),
									    ));
									}

							    echo '</div>';
							}

			                echo '<div class="container">';
			                    echo '<div class="hero-style2">';
			                    	if(!empty($data['heading'])){
				                        echo '<span class="hero-subtitle" data-ani="slideindown" data-ani-delay="0.7s">'.esc_html($data['heading']).'</span>';
				                    }
				                    if(!empty($data['slider_title'])){
				                        echo '<h1 class="hero-title" data-ani="slideindown" data-ani-delay="0.4s">'.wp_kses_post($data['slider_title']).'</h1>';
				                    }
				                    if(!empty($data['slider_title2'])){
				                        echo '<h1 class="hero-title" data-ani="slideindown" data-ani-delay="0.1s">'.wp_kses_post($data['slider_title2']).'</h1>';
				                    }
				                    if(!empty($data['slider_desc'])){
				                        echo '<p class="hero-text" data-ani="slideinup" data-ani-delay="0.1s">'.wp_kses_post($data['slider_desc']).'</p>';
				                    }
			                        echo '<div class="btn-group" data-ani="slideinup" data-ani-delay="0.5s">';

			                        	if(!empty($data['button_text_1'])){			               
					                        echo '<a href="'.esc_url( $data['button_link_1']['url'] ).'" class="as-btn style3 style-skew"><span class="btn-text">'.esc_html($data['button_text_1']).'</span></a>';
					                    }                 	
					                    if(!empty($data['button_text_2'])){
					               
					                        echo '<a href="'.esc_url( $data['button_link_2']['url'] ).'" class="as-btn style2 style-skew"><span class="btn-text">'.esc_html($data['button_text_2']).'</span></a>';
					                    }
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            echo '</div>';
			        }
		        echo '</div>';
		        echo '<div class="icon-box">';
		            echo '<button data-slick-prev="#heroSlide2" class="slick-arrow default"><i class="far fa-chevron-left"></i></button>';
		            echo '<button data-slick-next="#heroSlide2" class="slick-arrow default"><i class="far fa-chevron-right"></i></button>';
		        echo '</div>';
		    echo '</div>';
		}elseif( $settings['slider_style'] == '4' ){
		?>
	    <div class="as-hero-wrapper hero-slider-4 as-carousel" data-slide-show="1" data-md-slide-show="1" data-fade="true" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true" data-lg-arrows="true">

	    	<?php foreach( $settings['banners_two'] as $data ): ?>
	        <div class="as-hero-slide">
	            <div class="as-hero-bg" data-bg-src="<?php echo esc_url($data['slider_img']['url']); ?>">
	                <?php if(!empty($data['overlay_slider_img']['url'])){
						    echo taxseco_img_tag( array(
						        'url'   => esc_url( $data['overlay_slider_img']['url']  ),
						    ));
						} ?>
	            </div>
	            <div class="container">
	                <div class="hero-style4">
	                	<?php 
							if(!empty($data['heading'])){
				                    echo '<span class="hero-text" data-ani="slideindown" data-ani-delay=".1s">'.esc_html($data['heading']).'</span>';
				                }
	                	 ?>
	                	<?php if(!empty($data['slider_title'])): ?>
	                    <h1 class="hero-title" data-ani="slideindown" data-ani-delay="0.1s"><?php echo wp_kses_post($data['slider_title']); ?></h1>
	                    <?php endif; ?>

	                    <?php if(!empty($data['slider_title2'])): ?>
	                    <h1 class="hero-title" data-ani="slideindown" data-ani-delay="0.1s"><?php echo wp_kses_post($data['slider_title2']); ?></h1>
	                    <?php endif; ?>

	                    <?php if(!empty($data['slider_desc'])): ?>
	                    <p class="hero-text" data-ani="slideinup" data-ani-delay="0.1s"><?php echo wp_kses_post($data['slider_desc']); ?></p>
	                    <?php endif; ?>

	                    <div class="btn-group" data-ani="slideinup" data-ani-delay="0.1s">
	                    	<?php if(!empty($data['button_text_1'])): ?>
	                        <a href="<?php echo esc_url( $data['button_link_1']['url'] ); ?>" class="as-btn style3"><?php echo esc_html($data['button_text_1']); ?></a>
	                    	<?php endif; ?>

	                        <?php if(!empty($data['button_text_2'])): ?>
	                        <a href="<?php echo esc_url( $data['button_link_2']['url'] ); ?>" class="as-btn style2"><?php echo esc_html($data['button_text_2']); ?></a>
	                        <?php endif; ?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    	<?php endforeach; ?>
	    </div>

		<?php
		}elseif( $settings['slider_style'] == '5' ){
		?>
		<div class="as-hero-wrapper hero-slider-6">
	        <div class="as-hero-slide" data-bg-src="<?php echo esc_url( $settings['slider_bg_img']['url']); ?>">
	           <div class="hero-img">
	                  <?php if(!empty($settings['slider_img']['url'])){
						    echo taxseco_img_tag( array(
						        'url'   => esc_url( $settings['slider_img']['url']  ),
						    ));
						} ?>
					<?php if($settings['show_shape'] == 'yes'): ?>
		                <img src="<?php echo TAXSECO_PLUGDIRURI; ?>assets/img/hero-shape-1.png" alt="<?php echo esc_attr__('Shape', 'taxseco');?>" class="shape-1">
		                <img src="<?php echo TAXSECO_PLUGDIRURI; ?>assets/img/hero-shape-2.png" alt="<?php echo esc_attr__('Shape', 'taxseco');?>" class="shape-2">
		                <img src="<?php echo TAXSECO_PLUGDIRURI; ?>assets/img/hero-shape-3.png" alt="<?php echo esc_attr__('Shape', 'taxseco');?>" class="shape-3">
		                <img src="<?php echo TAXSECO_PLUGDIRURI; ?>assets/img/hero-shape-1.png" alt="<?php echo esc_attr__('Shape', 'taxseco');?>" class="shape-4">
		                <img src="<?php echo TAXSECO_PLUGDIRURI; ?>assets/img/hero-shape-4.png" alt="<?php echo esc_attr__('Shape', 'taxseco');?>" class="shape-5">
		                <img src="<?php echo TAXSECO_PLUGDIRURI; ?>assets/img/hero-shape-5.png" alt="<?php echo esc_attr__('Shape', 'taxseco');?>" class="shape-6">
	            	<?php endif; ?>
	            </div>
	            <div class="container">
	                <div class="hero-style6">
	                    <div class="video-btn">
	                        <a href="<?php echo esc_url( $settings['heading_video_link']['url']); ?>" class="play-btn popup-video"><i class="fas fa-play"></i></a>
	                        <?php echo esc_html($settings['heading']); ?>
	                    </div>

	                    <?php if(!empty($settings['slider_title'])): ?>
	                    	<h1 class="hero-title"><?php echo wp_kses_post($settings['slider_title']); ?></h1>
	                    <?php endif; ?>

	                    <?php if(!empty($settings['slider_title2'])): ?>
	                    	<h1 class="hero-title"><?php echo wp_kses_post($settings['slider_title2']); ?></h1>
	                    <?php endif; ?>

	                    <?php if(!empty($settings['slider_desc'])): ?>
	                   	 	<p class="hero-text"><?php echo wp_kses_post($settings['slider_desc']); ?></p>
	                    <?php endif; ?>

	                    <div class="btn-group">
	                    	<?php if(!empty($settings['button_text_1'])): ?>
	                        	<a href="<?php echo esc_url( $settings['button_link_1']['url'] ); ?>" class="as-btn style3"><?php echo esc_html($settings['button_text_1']); ?></a>
	                    	<?php endif; ?>

	                        <?php if(!empty($settings['button_text_2'])): ?>
	                        	<a href="<?php echo esc_url( $settings['button_link_2']['url'] ); ?>" class="as-btn style2"><?php echo esc_html($settings['button_text_2']); ?></a>
	                        <?php endif; ?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

		<?php
		}else{
			echo '<div class="as-hero-wrapper hero-slider-3 as-carousel">';

				foreach( $settings['banners_two'] as $data ) {
			        echo '<div class="as-hero-slide">';
			            if(!empty($data['slider_img']['url'])){ 
						    echo '<div class="as-hero-bg" data-bg-src="'.esc_url($data['slider_img']['url']).'">';        
								if(!empty($data['overlay_slider_img']['url'])){
								    echo taxseco_img_tag( array(
								        'url'   => esc_url( $data['overlay_slider_img']['url']  ),
								    ));
								}

						    echo '</div>';
						}
			            echo '<div class="container">';
			                echo '<div class="hero-style2">';
			                	if(!empty($data['heading'])){
				                    echo '<span class="hero-subtitle" data-ani="slideindown" data-ani-delay="0.7s">'.esc_html($data['heading']).'</span>';
				                }
				                if(!empty($data['slider_title'])){
				                    echo '<h1 class="hero-title" data-ani="slideindown" data-ani-delay="0.4s">'.wp_kses_post($data['slider_title']).'</h1>';
				                }
				                if(!empty($data['slider_title2'])){
				                    echo '<h1 class="hero-title" data-ani="slideindown" data-ani-delay="0.1s">'.wp_kses_post($data['slider_title2']).'</h1>';
				                }
				                if(!empty($data['slider_desc'])){
				                    echo '<p class="hero-text" data-ani="slideinup" data-ani-delay="0.1s">'.wp_kses_post($data['slider_desc']).'</p>';
				                }
			                    echo '<div class="btn-group" data-ani="slideinup" data-ani-delay="0.5s">';

			                    	if(!empty($data['button_text_1'])){			               
				                        echo '<a href="'.esc_url( $data['button_link_1']['url'] ).'" class="as-btn style3"><span class="btn-text">'.esc_html($data['button_text_1']).'</span></a>';
				                    }                 	
				                    if(!empty($data['button_text_2'])){
				               
				                        echo '<a href="'.esc_url( $data['button_link_2']['url'] ).'" class="as-btn style2"><span class="btn-text">'.esc_html($data['button_text_2']).'</span></a>';
				                    }
			                    echo '</div>';
			               echo ' </div>';
			            echo '</div>';
			        echo '</div>';
			    }
		    echo '</div>';
		}
	}

}