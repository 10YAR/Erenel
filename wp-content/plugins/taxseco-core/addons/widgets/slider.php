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
		return __( 'Slider', 'taxseco' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'taxseco_header_elements' ];
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
				],
			]
		);

		/*-----------------------------------------style one ------------------------------------*/

		$repeater = new Repeater();

        $repeater->add_control(
            'banner_img',
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
            'overlay_banner_img',
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
			'banner_title', [
				'label' 		=> __( 'Title 1', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Affordable Prices For' , 'taxseco' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'banner_title2', [
				'label' 		=> __( 'Title 2', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Professional Care' , 'taxseco' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'tag1', [
				'label' 		=> __( 'Tag 1', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Service' , 'taxseco' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'tag2', [
				'label' 		=> __( 'Tag 2', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Repair' , 'taxseco' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'tag3', [
				'label' 		=> __( 'Tag 3', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Estimation' , 'taxseco' ),
				'label_block' 	=> true,
			]
        );
        
        $repeater->add_control(
			'button_text_1',
			[
				'label' 	=> esc_html__( 'First Button Text', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Get More Info', 'taxseco' ),
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
                'default'  	=> esc_html__( 'Latest Projects', 'taxseco' ),
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
			'banners_one',
			[
				'label' 		=> __( 'Sliders', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'banner_title' 		=> __( 'Slider One', 'taxseco' ),
					],
				],
				'title_field' 	=> '{{{ banner_title }}}',
				'condition'	=> ['slider_style' => '1']
			]
		);

		/*-----------------------------------------style two ------------------------------------*/

		$repeater2 = new Repeater();

        $repeater2->add_control(
            'banner_img',
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
            'banner_shape_img',
            [
                'label'     => __( 'Slider Shape Image', 'taxseco' ),
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
            'overlay_banner_img',
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
			'banner_title', [
				'label' 		=> __( 'Title 1', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'The Best Car Repair' , 'taxseco' ),
				'label_block' 	=> true,
			]
        );
        $repeater2->add_control(
			'banner_title2', [
				'label' 		=> __( 'Title 2', 'taxseco' ),
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
						'banner_title' 		=> __( 'Slider One', 'taxseco' ),
					],
				],
				'title_field' 	=> '{{{ banner_title }}}',
				'condition'	=> ['slider_style' => '2']
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
					'{{WRAPPER}} h1' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} h1',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} h1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();
		//---------------------------------------tag Style---------------------------------------//

		$this->start_controls_section(
			'tag_style',
			[
				'label' 	=> __( 'Tag Style', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'tag_color',
			[
				'label' 		=> __( 'Tag Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-meta span' => '--white-color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'tag_typography',
				'label' 	=> __( 'Tag Typography', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .hero-meta span',
			]
        );
        $this->add_responsive_control(
			'tag_margin',
			[
				'label' 		=> __( 'Tag Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-meta span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'tag_padding',
			[
				'label' 		=> __( 'Tag Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-meta span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			echo '<div class="as-hero-wrapper hero-slider-1 as-carousel" data-slide-show="1" data-md-slide-show="1" data-fade="true" data-arrows="true" data-xl-arrows="true">';
				foreach( $settings['banners_one'] as $data ) {
			        echo '<!-- Hero Slide -->';
			        echo '<div class="as-hero-slide">';
			        	if(!empty($data['banner_img']['url'])){
				            echo '<div class="as-hero-bg" data-bg-src="'.esc_url($data['banner_img']['url']).'">';
				            	if(!empty($data['overlay_banner_img']['url'])){
					                echo taxseco_img_tag( array(
			                            'url'   => esc_url( $data['overlay_banner_img']['url']  ),
			                        ));
					            }
				            echo '</div>';
				        }
			            echo '<div class="container">';
			                echo '<div class="row">';
			                    echo '<div class="col">';
			                        echo '<div class="hero-style1">';
			                            echo '<div class="hero-meta">';
			                            	if(!empty($data['tag1'])){
				                                echo '<span data-ani="slideindown" data-ani-delay="0.1s">'.esc_html($data['tag1']).'</span>';
				                            }
				                            if(!empty($data['tag2'])){
				                                echo '<span data-ani="slideindown" data-ani-delay="0.2s">'.esc_html($data['tag2']).'</span>';
				                            }
				                            if(!empty($data['tag3'])){
				                                echo '<span data-ani="slideindown" data-ani-delay="0.3s">'.esc_html($data['tag3']).'</span>';
				                            }
			                            echo '</div>';
			                            if(!empty($data['banner_title'])){
				                            echo '<h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.4s">'.esc_html($data['banner_title']).'</h1>';
				                        }
				                        if(!empty($data['banner_title2'])){
				                            echo '<h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.6s">'.esc_html($data['banner_title2']).'</h1>';
				                        }
			                            echo '<div class="btn-group">';
			                            	if(!empty($data['button_text_1'])){
			                                    echo '<a href="'.esc_url( $data['button_link_1']['url'] ).'" class="as-btn style3" data-ani="slideinup" data-ani-delay="0.5s">'.esc_html($data['button_text_1']).'</a>';
			                                }
			                                if(!empty($data['button_text_2'])){
			                                    echo '<a href="'.esc_url( $data['button_link_2']['url'] ).'" class="as-btn style2" data-ani="slideinup" data-ani-delay="0.6s">'.esc_html($data['button_text_2']).'</a>';
			                                }
			                            echo '</div>';
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            echo '</div>';
			        echo '</div>';
			        echo '<!-- Hero Slide -->';
			    }
		    echo '</div>';
		}else{
			echo '<div class="as-hero-wrapper hero-slider-2 as-carousel" data-slide-show="1" data-md-slide-show="1" data-fade="true" data-arrows="true" data-xl-arrows="true" data-ml-arrows="true" data-lg-arrows="true">';
        		foreach( $settings['banners_two'] as $data ) {
			        echo '<!-- Hero Slide -->';
			        echo '<div class="as-hero-slide">';
			        	if(!empty($data['banner_img']['url'])){
				            echo '<div class="as-hero-bg" data-bg-src="'.esc_url($data['banner_img']['url']).'" data-overlay="title" data-opacity="5">';
				                if(!empty($data['overlay_banner_img']['url'])){
					                echo taxseco_img_tag( array(
			                            'url'   => esc_url( $data['overlay_banner_img']['url']  ),
			                        ));
					            }
				            echo '</div>';
				        }
				        if(!empty($data['banner_shape_img']['url'])){
				            echo '<div class="hero-shape"><img src="'.esc_url($data['banner_shape_img']['url']).'" alt="'.esc_attr('shape','taxseco').'"></div>';
				        }
			            echo '<div class="container">';
			                echo '<div class="hero-style2">';
			                	if(!empty($data['heading'])){
				                    echo '<span class="hero-subtitle" data-ani="slideinup" data-ani-delay="0.1s">'.esc_html($data['heading']).'</span>';
				                }
			                    if(!empty($data['banner_title'])){
		                            echo '<h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.3s">'.esc_html($data['banner_title']).'</h1>';
		                        }
		                        if(!empty($data['banner_title2'])){
		                            echo '<h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.6s">'.esc_html($data['banner_title2']).'</h1>';
		                        }
			                    echo '<div class="btn-group">';
			                    	if(!empty($data['button_text_1'])){
	                                    echo '<a href="'.esc_url( $data['button_link_1']['url'] ).'" class="as-btn style3" data-ani="slideinup" data-ani-delay="0.7s">'.esc_html($data['button_text_1']).'</a>';
	                                }
	                                if(!empty($data['button_text_2'])){
	                                    echo '<a href="'.esc_url( $data['button_link_2']['url'] ).'" class="as-btn style2" data-ani="slideinup" data-ani-delay="0.8s">'.esc_html($data['button_text_2']).'</a>';
	                                }
			                    echo '</div>';
			                echo '</div>';
			            echo '</div>';
			        echo '</div>';
			    }
		        
		    echo '</div>';
		}
	}

}