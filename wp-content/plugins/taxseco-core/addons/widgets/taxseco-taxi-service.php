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
class Taxseco_Taxi_Service extends Widget_Base {

	public function get_name() {
		return 'taxsecotaxiservice';
	}

	public function get_title() {
		return __( 'Taxi Service', 'taxseco' );
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
					'6' 		=> __( 'Style Six', 'taxseco' ),
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
				'condition'	=> ['service_style!' => ['3', '4', '5']]
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
				'condition'	=> ['service_style!' => ['3', '4', '5']]
			]
		);

		$this->add_control(
			'service_shape_image',
			[
				'label'     => __( 'Service Shape Image', 'taxseco' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'condition'	=> ['service_style' => ['6']]
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
				'label'         => __( 'Icon Class', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'car_model',
            [
				'label'         => __( 'Car Model', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'Orgin' , 'taxseco' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'details_page',
            [
				'label'         => __( 'Details Page url', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( '#' , 'taxseco' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'info',
            [
				'label'         => __( 'Description', 'taxseco' ),
				'type'          => Controls_Manager::WYSIWYG,
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
				'title_field' 	=> '{{car_model}}',
				'condition'	=> ['service_style' => ['1', '6']]
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
			'service_bg_image',
			[
				'label'     => __( 'Service BG Image', 'taxseco' ),
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
			'car_model',
            [
				'label'         => __( 'Car Model', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'STANDARD' , 'taxseco' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'car_desc',
            [
				'label'         => __( 'Car Description', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 3,
				'default'       => __( 'Dynamically transition orthogo nal catalysts for change before.' , 'taxseco' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'car_features',
            [
				'label'         => __( 'Features List', 'taxseco' ),
				'type'          => Controls_Manager::WYSIWYG,
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
                'rows' 			=> 2,
				'default'		=> __( 'BOOK NOW','taxseco' )
            ]
        );

        $repeater->add_control(
            'button_url',
            [
                'label'         => __( 'Button Url', 'taxseco' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'rows' 			=> 2,
				'default'		=> '#'
            ]
        );

		$this->add_control(
			'slides5',
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
				'title_field' 	=> '{{car_model}}',
				'condition'	=> ['service_style' => ['5']]
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
			'car_model',
            [
				'label'         => __( 'Car Model', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'BMW 15S' , 'taxseco' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'details_page',
            [
				'label'         => __( 'Details Page url', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( '#' , 'taxseco' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'price',
            [
				'label'         => __( 'Rent Par day', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( '$150<span class="day">Day</span>' , 'taxseco' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'qty',
            [
				'label'         => __( 'Available Car', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( '200 cars' ,'taxseco' ),
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
			'slides2',
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
				'title_field' 	=> '{{car_model}}',
				'condition'	=> ['service_style' => '2']
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'type',
            [
				'label'         => __( 'Type', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'Type' , 'taxseco' ),
				'label_block'   => true,
			]
		);
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
			'car_model',
            [
				'label'         => __( 'Car Model', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'BMW 15S' , 'taxseco' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'km_per_hour',
            [
				'label'         => __( 'KM Per Hour', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( '$0.60/km' , 'taxseco' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'doors',
            [
				'label'         => __( 'Car Doors', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '4' , 'taxseco' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'passengers',
            [
				'label'         => __( 'Passangers', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '4' , 'taxseco' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'luggage_carry',
            [
				'label'         => __( 'Laggage Cary', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '4' , 'taxseco' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'seats_heat',
            [
				'label'         => __( 'Heated Seat Available?', 'taxseco' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'taxseco' ),
				'label_off' 	=> __( 'No', 'taxseco' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$repeater->add_control(
			'air_condition',
            [
				'label'         => __( 'Air Condition?', 'taxseco' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'taxseco' ),
				'label_off' 	=> __( 'No', 'taxseco' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

        $repeater->add_control(
			'desc',
            [
				'label'         => __( 'Description', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'Ordinate products whereas friction less markets mlessly seize content technical company support' ,'taxseco' ),
				'label_block'   => true,
			]
		);

        $repeater->add_control(
            'button_text',
            [
                'label'         => __( 'Button Text', 'taxseco' ),
                'type'          => Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'label_block'   => true,
				'default'		=> __( 'Book Now','taxseco' )
            ]
        );

        $repeater->add_control(
            'button_url',
            [
                'label'         => __( 'Button Url', 'taxseco' ),
                'type'          => Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'label_block'   => true,
				'default'		=> '#'
            ]
        );

		$this->add_control(
			'slides3',
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
				'title_field' 	=> '{{car_model}}',
				'condition'	=> ['service_style' => ['3', '4']]
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'service_slider_general_style',
			[
				'label' 	=> __( 'General Style', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'tab_background',
			[
				'label' 		=> __( 'Tab Button Background', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .taxi-tab .as-btn' => 'background-color: {{VALUE}}',
                ]
			]
        );
        $this->add_control(
			'tab_hvr_background',
			[
				'label' 		=> __( 'Tab Button Hover Background', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .taxi-tab .as-btn' => '--theme-color: {{VALUE}}',
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
				'label' => esc_html__( 'Title', 'taxseco' ),
			]
		);
        $this->add_control(
			'overview_title_color',
			[
				'label' 		=> __( 'Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h4'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'taxseco' ),
		 		'selector' 	=> '{{WRAPPER}} h4',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------three--------------------//

		$this->start_controls_tab(
			'style_hover_tab3',
			[
				'label' => esc_html__( 'Button', 'taxseco' ),
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
		



		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['service_style'] !== '3' ){

			if($settings['make_it_slider'] == 'yes'){
				if($settings['slider_arrows'] == 'yes'){
					$this->add_render_attribute( 'wrapper', 'class', 'arrow-wrap row as-carousel-arrow' );
				}else{
					$this->add_render_attribute( 'wrapper', 'class', 'row as-carousel-1' );
				}
			}else{
				$this->add_render_attribute( 'wrapper', 'class', 'row gy-30' );
			}
			
			if( $settings['service_style'] == '1' ){

				echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					foreach( $settings['slides'] as $service_slider ){
						$url = $service_slider['details_page'] ;
	            		if(!empty($url)){
	            			$url_start_tag 	= '<a href="'.esc_url($url).'">';
	            			$url_end_tag 	= '</a>';
	            		}else{
	            			$url_start_tag 	= '';
	            			$url_end_tag 	= '';
	            		} 
		                echo '<div class="col-md-6 col-lg-4">';
		                    echo '<div class="taxi-grid">';
		                    	if( ! empty( $service_slider['service_slider_image']['url'] ) ){
			                        echo '<div class="taxi-grid_img">';
			                            echo taxseco_img_tag( array(
											'url'   => esc_url( $service_slider['service_slider_image']['url'] ),
										) );
			                        echo '</div>';
			                    }
		                        echo '<div class="taxi-grid_content">';
		                        	if( ! empty( $service_slider['service_slider_icon_image'] ) ){
			                            echo '<div class="taxi-grid_icon">';
			                                echo wp_kses_post($service_slider['service_slider_icon_image']);
			                            echo '</div>';
			                        }
		                            echo '<h3 class="taxi-grid_title">'.$url_start_tag.esc_html($service_slider['car_model']).$url_end_tag.'</h3>';
		                            if( ! empty( $service_slider['info'] ) ){
		                            	echo wp_kses_post($service_slider['info']);
		                            }
		                            if( ! empty( $service_slider['button_text'] ) ){
			                            echo '<a href="'.esc_url( $service_slider['button_url'] ).'" class="as-btn">'.esc_html( $service_slider['button_text'] ).'</a>';
			                        }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            }
	            echo '</div>';
			}elseif( $settings['service_style'] == '4' ){
			?>
 			<div class="taxi-tab filter-menu-active">
 				<?php $i = 0;
				foreach( $settings['slides3'] as $service_slider ){
				$i++;
				$active_class = ($i == 1) ? 'active' : ''; ?>
                <button data-filter=".cat<?php echo $i; ?>" class="as-btn <?php echo esc_attr($active_class); ?>" type="button"><?php echo esc_html($service_slider['type']); ?></button>
            	<?php } ?>
            </div>
            <div class="taxi-card-slide">
                <div class="row gy-30 filter-active-cat1">
                	<?php 
                	$i = 0;
                	foreach( $settings['slides3'] as $service_slider ): 
                		$i++; ?>
                    <div class="filter-item cat<?php echo $i; ?>">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-sm-auto order-3 order-md-0">
                            	<?php if( ! empty( $service_slider['doors'] ) ): ?>
                                <div class="taxi-feature">
                                    <div class="taxi-feature_icon">
                                        <img src="<?php echo TAXSECO_PLUGDIRURI ?>assets/img/taxi_f_1_1.svg" alt="png">
                                    </div>
                                    <h3 class="taxi-feature_title"><?php echo esc_html__('Car Doors:', 'taxseco'); ?></h3>
                                    <span class="taxi-feature_info"><?php echo esc_html($service_slider['doors']); ?></span>
                                </div>
                                <?php endif; ?>
                                <?php if( ! empty( $service_slider['passengers'] ) ): ?>
                                <div class="taxi-feature">
                                    <div class="taxi-feature_icon">
                                        <img src="<?php echo TAXSECO_PLUGDIRURI ?>assets/img/taxi_f_1_2.svg" alt="png">
                                    </div>
                                    <h3 class="taxi-feature_title"><?php echo esc_html__('Passengers:', 'taxseco'); ?></h3>
                                    <span class="taxi-feature_info"><?php echo esc_html($service_slider['passengers']); ?></span>
                                </div>
                                <?php endif; ?>
                                <?php if( ! empty( $service_slider['luggage_carry'] ) ): ?>
                                <div class="taxi-feature">
                                    <div class="taxi-feature_icon">
                                        <img src="<?php echo TAXSECO_PLUGDIRURI ?>assets/img/taxi_f_1_3.svg" alt="png">
                                    </div>
                                    <h3 class="taxi-feature_title"><?php echo esc_html__('Luggage Carry:', 'taxseco'); ?></h3>
                                    <span class="taxi-feature_info"><?php echo esc_html($service_slider['luggage_carry']); ?></span>
                                </div>
                                <?php endif; ?>
                                <?php if($service_slider['seats_heat'] == 'yes'): ?>
                                <div class="taxi-feature">
                                    <div class="taxi-feature_icon">
                                        <img src="<?php echo TAXSECO_PLUGDIRURI ?>assets/img/taxi_f_1_4.svg" alt="png">
                                    </div>
                                    <h3 class="taxi-feature_title"><?php echo esc_html__('Heated Seats:', 'taxseco'); ?></h3>
                                    <span class="taxi-feature_info"><?php echo esc_html__('Yes', 'taxseco'); ?></span>
                                </div>
                                <?php endif; ?>
                                <?php if( $service_slider['air_condition'] == 'yes'): ?>
                                <div class="taxi-feature">
                                    <div class="taxi-feature_icon">
                                        <img src="<?php echo TAXSECO_PLUGDIRURI ?>assets/img/taxi_f_1_5.svg" alt="png">
                                    </div>
                                    <h3 class="taxi-feature_title"><?php echo esc_html__('Air Condition:', 'taxseco'); ?></h3>
                                    <span class="taxi-feature_info"><?php echo esc_html__('Yes', 'taxseco'); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php if( ! empty( $service_slider['service_slider_image'] ) ): ?>
                            <div class="col-md-auto">
                                <div class="taxi-img">
                                    <?php echo taxseco_img_tag( array(
											'url'   => esc_url( $service_slider['service_slider_image']['url'] ),
										) ); ?>
                                </div>
                            </div>
                        	<?php endif; ?>
                            <div class="col-sm-auto">
                                <div class="taxi-about">
                                	<?php if( ! empty( $service_slider['km_per_hour'] ) ): ?>
                                    <span class="taxi-about_rate"><?php echo esc_html($service_slider['km_per_hour']); ?></span>
                                    <?php endif; ?>
                                    <?php if( ! empty( $service_slider['car_model'] ) ): ?>
                                    <h4 class="taxi-about_title"><?php echo esc_html($service_slider['car_model']); ?></h4>
                                    <?php endif; ?>
                                    <?php if( ! empty( $service_slider['desc'] ) ): ?>
                                    <p class="taxi-about_text"><?php echo esc_html($service_slider['desc']); ?></p>
                                    <?php endif; ?>
                                    <?php if( ! empty( $service_slider['button_text'] ) ): ?>
                                    <a href="<?php echo esc_url($service_slider['button_url']); ?>" class="as-btn"><span class="btn-text"><?php echo esc_html($service_slider['button_text']); ?></span></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                	<?php endforeach; ?>
                </div>
            </div>
			<?php
			}elseif( $settings['service_style'] == '5' ){
			?>
			<div class="price-box-wrap">
                <div class="row gx-108 justify-content-between as-carousel-2">
                	<?php foreach( $settings['slides5'] as $service_slider ): ?>
                    <div class="col-md-auto">
                        <div class="price-box" data-bg-src="<?php echo esc_html( $service_slider['service_bg_image']['url'] ); ?>">
                        	<?php  if( ! empty( $service_slider['car_model'] ) ): ?>
                            	<div class="price-box_package layer-btn"><?php echo esc_html( $service_slider['car_model'] ); ?></div>
                            <?php endif; ?>
                            <?php  if( ! empty( $service_slider['car_desc'] ) ): ?>
                            	<p class="price-box_text"><?php echo esc_html( $service_slider['car_desc'] ); ?></p>
                            <?php endif; ?>
                            <?php  if( ! empty( $service_slider['car_features'] ) ){
                            	echo wp_kses_post( $service_slider['car_features'] ); 
                            	}
                             ?>
                            <?php  if( ! empty( $service_slider['button_text'] ) ): ?>
                            <a href="<?php echo esc_html( $service_slider['button_url'] ); ?>" class="as-btn style4"><?php echo esc_html( $service_slider['button_text'] ); ?></a>
                        	<?php endif; ?>
                        </div>
                    </div>
                	<?php endforeach; ?>
                </div>
                <div class="line-ani"></div>
                <div class="line-ani"></div>
                <div class="particle" id="particle2"></div>
                <div class="particle" id="particle3"></div>
            </div>
			<?php
			}elseif( $settings['service_style'] == '6' ){
			?>
				 <div class="row as-carousel-1 ">
				 	<?php foreach( $settings['slides'] as $service_slider ): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="taxi-grid">
                            <div class="taxi-grid_img">
                                <?php  echo taxseco_img_tag( array(
										'url'   => esc_url( $service_slider['service_slider_image']['url'] ),
									) ); ?>
                            </div>
                            <div class="taxi-grid_content" data-bg-src="<?php echo esc_url( $settings['service_shape_image']['url'] );?>">
                                <div class="taxi-grid_icon">
                                    <?php echo wp_kses_post($service_slider['service_slider_icon_image']); ?>
                                </div>
                                <h3 class="taxi-grid_title"><a href="<?php echo esc_url( $service_slider['details_page'] ); ?>"><?php echo esc_html($service_slider['car_model']); ?></a></h3>
                                <?php  if( ! empty( $service_slider['info'] ) ){
		                            	echo wp_kses_post($service_slider['info']);
		                            } ?>
                                <a href="<?php echo esc_url( $service_slider['button_url'] ); ?>" class="as-btn style2"><?php echo esc_html( $service_slider['button_text'] );?></a>
                            </div>
                        </div>
                    </div>
                	<?php endforeach; ?>
                </div>
			<?php
			}else{
				echo '<div '.$this->get_render_attribute_string('wrapper').'>';
	                foreach( $settings['slides2'] as $service_slider ){
						$url = $service_slider['details_page'] ;
	            		if(!empty($url)){
	            			$url_start_tag 	= '<a href="'.esc_url($url).'">';
	            			$url_end_tag 	= '</a>';
	            		}else{
	            			$url_start_tag 	= '';
	            			$url_end_tag 	= '';
	            		} 
		                echo '<div class="col-md-6 col-lg-4">';
		                    echo '<div class="taxi-grid style2">';
		                    	if( ! empty( $service_slider['service_slider_image']['url'] ) ){
			                        echo '<div class="taxi-grid_img">';
			                            echo taxseco_img_tag( array(
											'url'   => esc_url( $service_slider['service_slider_image']['url'] ),
										) );
			                        echo '</div>';
			                    }
		                        echo '<div class="taxi-grid_content">';
		                        	if( ! empty( $service_slider['price'] ) ){
			                            echo '<span class="taxi-grid_price">'.wp_kses_post($service_slider['price']).'</span>';
			                        }
		                            echo '<h3 class="taxi-grid_title">'.$url_start_tag.esc_html($service_slider['car_model']).$url_end_tag.'</h3>';
		                            if( ! empty( $service_slider['qty'] ) ){
			                            echo '<p class="taxi-grid_subtitle">'.esc_html( $service_slider['qty'] ).'</p>';
			                        }
		                            if( ! empty( $service_slider['button_text'] ) ){
			                            echo '<a href="'.esc_url( $service_slider['button_url'] ).'" class="as-btn">'.esc_html( $service_slider['button_text'] ).'</a>';
			                        }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            }
	            echo '</div>';
			}
		}else{
			echo '<div class="taxi-tab" data-asnavfor=".taxi-card-slide">';
			$i = 0;
			foreach( $settings['slides3'] as $service_slider ){
				$i++;
				$active_class = ($i == 1) ? 'active' : '';
                echo '<button class="as-btn '.esc_attr($active_class).'" type="button">'.esc_html($service_slider['type']).'</button>';
            }
            echo '</div>';
            echo '<div class="taxi-card-slide">';

            	foreach( $settings['slides3'] as $service_slider ){
	                echo '<div>';
	                    echo '<div class="row justify-content-between align-items-center">';
	                        echo '<div class="col-sm-auto order-3 order-md-0">';
		                        if( ! empty( $service_slider['doors'] ) ){
		                            echo '<div class="taxi-feature">';
			                                echo '<div class="taxi-feature_icon">';
			                                    echo '<img src="'.TAXSECO_PLUGDIRURI . 'assets/img/taxi_f_1_1.svg" alt="png">';
			                                echo '</div>';
			                                echo '<h3 class="taxi-feature_title">'.esc_html__('Car Doors:', 'taxseco').'</h3>';
			                                echo '<span class="taxi-feature_info">'.esc_html($service_slider['doors']).'</span>';
		                            echo '</div>';
		                        }
	                            if( ! empty( $service_slider['passengers'] ) ){
		                            echo '<div class="taxi-feature">';
			                                echo '<div class="taxi-feature_icon">';
			                                    echo '<img src="'.TAXSECO_PLUGDIRURI . 'assets/img/taxi_f_1_2.svg" alt="png">';
			                                echo '</div>';
		                                echo '<h3 class="taxi-feature_title">'.esc_html__('Passengers:', 'taxseco').'</h3>';
		                                echo '<span class="taxi-feature_info">'.esc_html($service_slider['passengers']).'</span>';
		                            echo '</div>';
		                        }
		                        if( ! empty( $service_slider['luggage_carry'] ) ){
		                            echo '<div class="taxi-feature">';
		                                echo '<div class="taxi-feature_icon">';
		                                    echo '<img src="'.TAXSECO_PLUGDIRURI . 'assets/img/taxi_f_1_3.svg" alt="png">';
		                                echo '</div>';
		                                echo '<h3 class="taxi-feature_title">'.esc_html__('Luggage Carry:', 'taxseco').'</h3>';
		                                echo '<span class="taxi-feature_info">'.esc_html($service_slider['luggage_carry']).'</span>';
		                            echo '</div>';
		                        }
		                        if($service_slider['seats_heat'] == 'yes'){
		                            echo '<div class="taxi-feature">';
		                                echo '<div class="taxi-feature_icon">';
		                                   echo ' <img src="'.TAXSECO_PLUGDIRURI . 'assets/img/taxi_f_1_4.svg" alt="png">';
		                                echo '</div>';
		                                echo '<h3 class="taxi-feature_title">'.esc_html__('Heated Seats:', 'taxseco').'</h3>';
		                                echo '<span class="taxi-feature_info">'.esc_html__('Yes', 'taxseco').'</span>';
		                            echo '</div>';
		                        }
		                        if($service_slider['air_condition'] == 'yes'){
		                            echo '<div class="taxi-feature">';
		                                echo '<div class="taxi-feature_icon">';
		                                    echo '<img src="'.TAXSECO_PLUGDIRURI . 'assets/img/taxi_f_1_5.svg" alt="png">';
		                                echo '</div>';
		                                echo '<h3 class="taxi-feature_title">'.esc_html__('Air Condition:', 'taxseco').'</h3>';
		                                echo '<span class="taxi-feature_info">'.esc_html__('Yes', 'taxseco').'</span>';
		                            echo '</div>';
		                        }
	                        echo '</div>';
	                        if( ! empty( $service_slider['service_slider_image'] ) ){
		                        echo '<div class="col-md-auto">';
		                            echo '<div class="taxi-img">';
		                                echo taxseco_img_tag( array(
											'url'   => esc_url( $service_slider['service_slider_image']['url'] ),
										) );
		                            echo '</div>';
		                        echo '</div>';
		                    }

	                        echo '<div class="col-sm-auto">';
	                            echo '<div class="taxi-about">';
	                            	if( ! empty( $service_slider['km_per_hour'] ) ){
		                                echo '<span class="taxi-about_rate">'.esc_html($service_slider['km_per_hour']).'</span>';
		                            }
		                            if( ! empty( $service_slider['car_model'] ) ){
		                                echo '<h4 class="taxi-about_title">'.esc_html($service_slider['car_model']).'</h4>';
		                            }
		                            if( ! empty( $service_slider['desc'] ) ){
		                                echo '<p class="taxi-about_text">'.esc_html($service_slider['desc']).'</p>';
		                            }
		                            if( ! empty( $service_slider['button_text'] ) ){
		                                echo '<a href="'.esc_url($service_slider['button_url']).'" class="as-btn style-skew"><span class="btn-text">'.esc_html($service_slider['button_text']).'</span></a>';
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