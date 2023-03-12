<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Service Widget .
 *
 */
class Taxseco_Service extends Widget_Base {

	public function get_name() {
		return 'taxsecoservice';
	}

	public function get_title() {
		return __( 'Taxseco Service', 'taxseco' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'taxseco' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'service_section',
			[
				'label'     => __( 'Service Slider', 'taxseco' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'service_style',
			[
				'label' 	=> __( 'Service Style', 'taxseco' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'taxseco' ),
					'2' 		=> __( 'Style Two', 'taxseco' ),
					'3' 		=> __( 'Style Three', 'taxseco' ),
					'4' 		=> __( 'Style Four', 'taxseco' ),
					'5' 		=> __( 'Style Five', 'taxseco' ),
				],
			]
		);
		$this->add_control(
			'make_it_slider',
			[
				'label' 		=> __( 'Make It Slider?', 'taxseco' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'taxseco' ),
				'label_off' 	=> __( 'No', 'taxseco' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'slider_id',
			[
				'label' 		=> __( 'Slider Id?', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> 'p_001',
				'condition' 	=> [
                    'service_style' => '2'
                ]
			]
		);
		$this->add_control(
			'slider_arrows',
			[
				'label' 		=> __( 'Arrows ?', 'taxseco' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'taxseco' ),
				'label_off' 	=> __( 'No', 'taxseco' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition' 	=> [ 'make_it_slider' => 'yes' ,'service_style' => '1' ]
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
			'service_slider_image',
			[
				'label'     => __( 'Service Slider Image', 'taxseco' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'service_slider_icon_image',
			[
				'label'     => __( 'Icon Class', 'taxseco' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
			]
		);

        $repeater->add_control(
			'service_title',
            [
				'label'         => __( 'Service Title', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Neurology Specialist' , 'taxseco' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'service_number',
			[
				'label'         => __( 'Service Number', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '01' , 'taxseco' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'service_description',
            [
				'label'         => __( 'Service Description', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'There are many variations injected many alteration humour believable.' ,'taxseco' ),
				'label_block'   => true,
			]
		);

        $repeater->add_control(
            'button_text',
            [
                'label'         => __( 'Button Text', 'taxseco' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
				'default'		=> __( 'View Details','taxseco' )
            ]
        );

        $repeater->add_control(
            'button_url',
            [
                'label'         => __( 'Button Url', 'taxseco' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
				'default'		=> '#'
            ]
        );

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Service Slider', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'service_slider_image' 	=> Utils::get_placeholder_image_src(),
					],
					[
						'service_slider_image' 	=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{service_title}}',
				'condition' => [
					'service_style!'  => ['5']
				]
			]
		);

		$repeater2 = new Repeater();

        $repeater2->add_control(
			'service_slider_image',
			[
				'label'     => __( 'Service Slider Image', 'taxseco' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater2->add_control(
			'service_slider_icon_image',
			[
				'label'     => __( 'Icon', 'taxseco' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater2->add_control(
			'service_title',
            [
				'label'         => __( 'Service Title', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Neurology Specialist' , 'taxseco' ),
				'label_block'   => true,
			]
		);

        $repeater2->add_control(
			'service_description',
            [
				'label'         => __( 'Service Description', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'There are many variations injected many alteration humour believable.' ,'taxseco' ),
				'label_block'   => true,
			]
		);

        $repeater2->add_control(
            'button_text',
            [
                'label'         => __( 'Button Text', 'taxseco' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'rows' => 2,
				'default'		=> __( 'View Details','taxseco' )
            ]
        );

        $repeater2->add_control(
            'button_url',
            [
               'label' 		=> __( 'Link', 'taxseco' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'taxseco' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
            ]
        );

		$this->add_control(
			'slides_2',
			[
				'label' 		=> __( 'Service Slider', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'service_slider_image' 	=> Utils::get_placeholder_image_src(),
					],
					[
						'service_slider_image' 	=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{service_title}}',
				'condition' => [
					'service_style'  => ['5']
				]
			]
		);

        $this->end_controls_section();

		/*-----------------------------------------General styling------------------------------------*/

		$this->start_controls_section(
			'service_slider_general_style',
			[
				'label' 	=> __( 'General Style', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'service_box_background',
			[
				'label' 		=> __( 'Service Box Background', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-box_content,{{WRAPPER}} .service-card_content,{{WRAPPER}} .service-grid_content' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .service-grid, {{WRAPPER}} .feature-grid:before' => '--smoke-color: {{VALUE}} !important',
                ]
			]
        );
		

		$this->end_controls_section();

		/*-----------------------------------------Feedback styling------------------------------------*/

		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Content Styling', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs2'
		);


		$this->start_controls_tab(
			'style_normal_tab2',
			[
				'label' => esc_html__( 'Number', 'taxseco' ),
			]
		);
        $this->add_control(
			'overview_title_color',
			[
				'label' 		=> __( 'Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-box_number,{{WRAPPER}} .service-card_number,{{WRAPPER}} .service-card_subtitle'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'taxseco' ),
		 		'selector' 	=> '{{WRAPPER}} .service-box_number,{{WRAPPER}} .service-card_number,{{WRAPPER}} .service-card_subtitle',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-box_number,{{WRAPPER}} .service-card_number,{{WRAPPER}} .service-card_subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_title_padding',
			[
				'label' 		=> __( 'Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-box_number,{{WRAPPER}} .service-card_number,{{WRAPPER}} .service-card_subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Title', 'taxseco' ),
			]
		);
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-box_title,{{WRAPPER}} .service-card_title,{{WRAPPER}} .service-grid_title, {{WRAPPER}} h3'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'taxseco' ),
		 		'selector' 	=> '{{WRAPPER}} .service-box_title,{{WRAPPER}} .service-card_title,{{WRAPPER}} .service-grid_title, {{WRAPPER}} h3',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-box_title,{{WRAPPER}} .service-card_title,{{WRAPPER}} .service-grid_title, {{WRAPPER}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_content_padding',
			[
				'label' 		=> __( 'Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-box_title,{{WRAPPER}} .service-card_title,{{WRAPPER}} .service-grid_title, {{WRAPPER}} h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();


		//--------------------three--------------------//

		$this->start_controls_tab(
			'style_hover_tab3',
			[
				'label' => esc_html__( 'Description', 'taxseco' ),
			]
		);
		$this->add_control(
			'counter_color',
			[
				'label' 		=> __( 'Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-box_text,{{WRAPPER}} .service-card_text,{{WRAPPER}} .service-grid_text, {{WRAPPER}} p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'counter_typography',
		 		'label' 		=> __( 'Typography', 'taxseco' ),
		 		'selector' 	=> '{{WRAPPER}} .service-box_tex,{{WRAPPER}} .service-card_text,{{WRAPPER}} .service-grid_text, {{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'counter_margin',
			[
				'label' 		=> __( 'Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-box_text,{{WRAPPER}} .service-card_text,{{WRAPPER}} .service-grid_text, {{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'counter_padding',
			[
				'label' 		=> __( 'Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .service-box_text,{{WRAPPER}} .service-card_text,{{WRAPPER}} .service-grid_text, {{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );



		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
   
		// if( ! empty( $settings['slides'] ) ){
			if($settings['make_it_slider'] == 'yes'){
				if($settings['slider_arrows'] == 'yes'){
					$this->add_render_attribute( 'wrapper', 'class', 'row service_slider_4' );
				}else{
					$this->add_render_attribute( 'wrapper', 'class', 'row service_slider_1' );
				}
				if( $settings['service_style'] == '2' ){
					$this->add_render_attribute( 'wrapper', 'id', $settings['slider_id'] );
				}
			}else{
				$this->add_render_attribute( 'wrapper', 'class', 'row gy-30' );
			}

			if( $settings['service_style'] == '1' ){
				echo '<div class="service_1 arrow-wrap">';
					echo '<div '.$this->get_render_attribute_string('wrapper').'>';
	                	foreach( $settings['slides'] as $service_slider ){
	                		echo '<div class="col-md-6 col-lg-4">';
			                    echo '<div class="service-box">';
			                        if( ! empty( $service_slider['service_slider_image']['url'] ) ){
				                        echo '<div class="service-box_img">';
				                            echo taxseco_img_tag( array(
												'url'   => esc_url( $service_slider['service_slider_image']['url'] ),
											) );
				                        echo '</div>';
				                    }
			                        echo '<div class="service-box_content">';
			                        	if( ! empty( $service_slider['service_slider_icon_image'] ) ){
				                            echo '<div class="service-box_icon">'.wp_kses_post($service_slider['service_slider_icon_image']).'</div>';
				                        }
				                        if( ! empty( $service_slider['service_title'] ) ){
				                            echo '<h3 class="service-box_title"><a href="'.esc_url( $service_slider['button_url'] ).'">'.esc_html( $service_slider['service_title'] ).'</a></h3>';
				                        }
			                            if( ! empty( $service_slider['service_description'] ) ){
				                            echo '<p class="service-box_text">'.esc_html( $service_slider['service_description'] ).'</p>';
				                        }
			                        echo '</div>';
			                        if( ! empty( $service_slider['button_text'] ) ){
				                        echo '<a href="'.esc_url( $service_slider['button_url'] ).'" class="as-btn">'.esc_html( $service_slider['button_text'] ).' <i class="fas fa-arrow-right"></i></a>';
				                    }
			                    echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
	            echo '</div>';
			}elseif( $settings['service_style'] == '2' ){
				echo '<div class="service_2 arrow-wrap">';
					echo '<div '.$this->get_render_attribute_string('wrapper').'>';
						foreach( $settings['slides'] as $service_slider ){

							echo '<div class="col-md-6 col-lg-4">';
								if( ! empty( $service_slider['service_slider_image']['url'] ) ){
				                    echo '<div class="service-card" data-bg-src="'.esc_url( $service_slider['service_slider_image']['url'] ).'">';
				                }

			                        echo '<div class="service-card_content">';
			                        	if( ! empty( $service_slider['service_slider_icon_image'] ) ){
				                            echo '<div class="service-card_icon">'.wp_kses_post($service_slider['service_slider_icon_image']).'</div>';
				                        }
			                            if( ! empty( $service_slider['service_number'] ) ){
				                            echo '<span class="service-card_subtitle">'.esc_html( $service_slider['service_number'] ).'</span>';
				                        }
			                            if( ! empty( $service_slider['service_title'] ) ){
				                            echo '<h3 class="service-card_title"><a href="'.esc_url( $service_slider['button_url'] ).'">'.esc_html( $service_slider['service_title'] ).'</a></h3>';
				                        }
			                            if( ! empty( $service_slider['service_description'] ) ){
				                            echo '<p class="service-card_text">'.esc_html( $service_slider['service_description'] ).'</p>';
				                        }
				                        if( ! empty( $service_slider['button_text'] ) ){
				                            echo '<a href="'.esc_url( $service_slider['button_url'] ).'" class="as-btn">'.esc_html( $service_slider['button_text'] ).'</a>';
				                        }
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
			}elseif( $settings['service_style'] == '3' ){
				echo '<div class="service_3">';
					echo '<div '.$this->get_render_attribute_string('wrapper').'>';
						foreach( $settings['slides'] as $service_slider ){
				            echo '<div class="col-md-6 col-lg-4">';
				                echo '<div class="service-grid">';
				                	if( ! empty( $service_slider['service_slider_image']['url'] ) ){
				                        echo '<div class="service-grid_img">';
				                            echo taxseco_img_tag( array(
												'url'   => esc_url( $service_slider['service_slider_image']['url'] ),
											) );
				                        echo '</div>';
				                    }
				                    echo '<div class="service-grid_content">';
			                            if( ! empty( $service_slider['service_title'] ) ){
				                            echo '<h3 class="service-grid_title"><a href="'.esc_url( $service_slider['button_url'] ).'">'.esc_html( $service_slider['service_title'] ).'</a></h3>';
				                        }
				                        if( ! empty( $service_slider['service_description'] ) ){
				                            echo '<p class="service-grid_text">'.esc_html( $service_slider['service_description'] ).'</p>';
				                        }
				                        if( ! empty( $service_slider['button_text'] ) ){
					                        echo '<a href="'.esc_url( $service_slider['button_url'] ).'" class="as-btn style-skew"><span class="btn-text">'.esc_html( $service_slider['button_text'] ).' </span></a>';
					                    }
				                    echo '</div>';
				                echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
			}elseif( $settings['service_style'] == '4' ){
				echo '<div class="service_3">';
					echo '<div '.$this->get_render_attribute_string('wrapper').'>';
						foreach( $settings['slides'] as $service_slider ){
				            echo '<div class="col-md-6 col-lg-4 col-xl-3">';
				                echo '<div class="service-grid">';
				                	if( ! empty( $service_slider['service_slider_image']['url'] ) ){
				                        echo '<div class="service-block_img">';
				                            echo taxseco_img_tag( array(
												'url'   => esc_url( $service_slider['service_slider_image']['url'] ),
											) );
				                        echo '</div>';
				                    }
				                    echo '<div class="service-block_content">';
			                            if( ! empty( $service_slider['service_title'] ) ){
				                            echo '<h3 class="service-block_title"><a href="'.esc_url( $service_slider['button_url'] ).'">'.esc_html( $service_slider['service_title'] ).'</a></h3>';
				                        }
				                        if( ! empty( $service_slider['service_description'] ) ){
				                            echo '<p class="service-block_tex">'.esc_html( $service_slider['service_description'] ).'</p>';
				                        }
				                        if( ! empty( $service_slider['button_text'] ) ){
					                        echo '<a href="'.esc_url( $service_slider['button_url'] ).'" class="layer-btn"><span class="btn-text">'.esc_html( $service_slider['button_text'] ).' </span></a>';
					                    }
				                    echo '</div>';
				                echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
			}else{
			?>
			<div class="row service_slider_1 slider-shadow">
			    <?php foreach( $settings['slides_2'] as $service_slider ): ?>
			    <div class="col-lg-4 col-md-6">
			        <div class="feature-grid">
			            <div class="feature-grid_img">
			                <?php  echo taxseco_img_tag( array(
			    				'url'   => esc_url( $service_slider['service_slider_image']['url'] ),
			    			) ); ?>
			            </div>
			            <div class="feature-grid_icon">
			                <?php  echo taxseco_img_tag( array(
			    				'url'   => esc_url( $service_slider['service_slider_icon_image']['url'] ),
			    			) ); ?>
			            </div>
			            <h3 class="box-title"><?php echo esc_html($service_slider['service_title'] ); ?></h3>
			            <p class="feature-grid_text"><?php echo esc_html($service_slider['service_description'] ); ?></p>
			            <a href="<?php echo esc_url( $service_slider['button_url']['url'] ); ?>" class="as-btn"><?php echo esc_html($service_slider['button_text'] ); ?></a>
			        </div>
			    </div>
				<?php endforeach; ?>
			</div>

			<?php
			}

		// }

	}
}