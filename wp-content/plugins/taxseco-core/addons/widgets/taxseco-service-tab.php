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
class Taxseco_Taxi_Service_Tab extends Widget_Base {

	public function get_name() {
		return 'taxsecotaxiservicetab';
	}

	public function get_title() {
		return __( 'Taxi Service Tab', 'taxseco' );
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
				'label'     => __( 'Service Tab', 'taxseco' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'service_style',
			[
				'label' 		=> __( 'Service Style', 'taxseco' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  			=> __( 'Style One', 'taxseco' ),
					'2' 			=> __( 'Style Two', 'taxseco' ),
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
				'condition' => [
					'service_style' => '1'
				]
			]
		);
		$this->add_control(
			'all_text', [
				'label' 		=> __( 'All filter label', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'All' , 'taxseco' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
				'condition' => [
					'service_style' => '1'
				]
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'filter_title',
            [
				'label'         => __( 'Filter Title', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'description' 	=> __( 'use comma (,) for seperate the categories' , 'taxseco' ),
				'default'       => __( 'Cat1,Cat2,cat3' , 'taxseco' ),
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
                'separator' => 'after',
			]
		);
        $repeater->add_control(
			'doors_icon',
			[
				'label'     => __( 'Door Icon', 'taxseco' ),
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
			'doors',
            [
				'label'         => __( 'Door Title', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Title' , 'taxseco' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'doors_v',
            [
				'label'         => __( 'Door Value', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '4' , 'taxseco' ),
				'label_block'   => true,
                'separator' => 'after',
			]
		);
        $repeater->add_control(
			'passengers_icon',
			[
				'label'     => __( 'Passengers Icon', 'taxseco' ),
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
			'passengers',
            [
				'label'         => __( 'Passengers Title', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Title' , 'taxseco' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'passengers_v',
            [
				'label'         => __( 'Passengers Value', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '4' , 'taxseco' ),
				'label_block'   => true,
                'separator' => 'after',
			]
		);
        $repeater->add_control(
			'luggage_carry_icon',
			[
				'label'     => __( 'Laggage Cary Icon', 'taxseco' ),
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
			'luggage_carry',
            [
				'label'         => __( 'Laggage Cary Title', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Title' , 'taxseco' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'luggage_carry_v',
            [
				'label'         => __( 'Laggage Cary Value', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '4' , 'taxseco' ),
				'label_block'   => true,
                'separator' => 'after',
			]
		);

        $repeater->add_control(
			'seats_heat_icon',
			[
				'label'     => __( 'Heated Seat Icon', 'taxseco' ),
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
			'seats_heat',
            [
				'label'         => __( 'Heated Seat Title', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Title' , 'taxseco' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'seats_heat_v',
            [
				'label'         => __( 'Heated Seat Value', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '4' , 'taxseco' ),
				'label_block'   => true,
                'separator' => 'after',
			]
		);
        $repeater->add_control(
			'air_condition_icon',
			[
				'label'     => __( 'Air Condition Icon', 'taxseco' ),
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
			'air_condition',
            [
				'label'         => __( 'Air Condition Title', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Title' , 'taxseco' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'air_condition_v',
            [
				'label'         => __( 'Air Condition Value', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '4' , 'taxseco' ),
				'label_block'   => true,
                'separator' => 'after',
			]
		);
        $repeater->add_control(
			'wifi_icon',
			[
				'label'     => __( 'Wift Icon', 'taxseco' ),
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
			'wifi',
            [
				'label'         => __( 'Wift Title', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Title' , 'taxseco' ),
				'label_block'   => true,
			]
		);
        $repeater->add_control(
			'wifi_v',
            [
				'label'         => __( 'Wift Value', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '4' , 'taxseco' ),
				'label_block'   => true,
                'separator' => 'after',
			]
		);

	
		$repeater->add_control(
            'details_page',
            [
                'label'         => __( 'Details Page Url', 'taxseco' ),
                'type'          => Controls_Manager::TEXTAREA,
                'rows' 			=> 2,
                'label_block'   => true,
				'default'		=> '#'
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
				'condition' => [
					'service_style' => '1'
				]
			]
		);		

		$repeater2 = new Repeater();

		$repeater2->add_control(
			'service_bg',
			[
				'label'     => __( 'Filter Background', 'taxseco' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
			]
		);

		$repeater2->add_control(
			'service_icon',
			[
				'label'     => __( 'Service Icon', 'taxseco' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
			]
		);

		$repeater2->add_control(
			'filter_subtitle',
            [
				'label'         => __( 'Filter Subitle', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'Service - 01' , 'taxseco' ),
				'label_block'   => true,
			]
		);		

		$repeater2->add_control(
			'filter_title',
            [
				'label'         => __( 'Filter Title', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'Service - 01' , 'taxseco' ),
				'label_block'   => true,
			]
		);

		$repeater2->add_control(
			'service_image',
			[
				'label'     => __( 'Service Image', 'taxseco' ),
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
			'service_subtitle',
            [
				'label'         => __( 'Subitle', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'Our Service is all time best' , 'taxseco' ),
				'label_block'   => true,
			]
		);		

		$repeater2->add_control(
			'service_title',
            [
				'label'         => __( 'Title', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'Airport Transport' , 'taxseco' ),
				'label_block'   => true,
			]
		);

		$repeater2->add_control(
			'service_desc',
            [
				'label'         => __( 'Description', 'taxseco' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 4,
				'default'       => __( 'Monetize flexible action items before mission critical rabidly intuitive. Credit extend wireless experiences.' , 'taxseco' ),
				'label_block'   => true,
			]
		);

		$repeater2->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'taxseco' )
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
						'service_icon' 	=> Utils::get_placeholder_image_src(),
					]
				],
				'condition' => [
					'service_style' => '2'
				]
			]
		);

        $this->end_controls_section();

        /*-----------------------------------------general styling------------------------------------*/

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
					'{{WRAPPER}} .taxi-box_title'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'taxseco' ),
		 		'selector' 	=> '{{WRAPPER}} .taxi-box_title',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .taxi-box_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .taxi-box_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        if( $settings['service_style'] == '2' ){
        ?>
        	<div class="row slider-shadow" id="slideListTab">
 				<?php foreach( $settings['slides_2'] as $data ): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="service-list" data-bg-src="<?php echo esc_url( $data['service_bg']['url'] ); ?>">
                        <div class="service-list_icon">
                        	<?php  echo taxseco_img_tag( array(
										'url'   => esc_url( $data['service_icon']['url'] ),
									) ); ?>
                        </div>
                        <div class="service-list_content">
                            <span class="service-list_text"><?php echo esc_html($data['filter_subtitle']); ?></span>
                            <h3 class="service-list_title"><?php echo esc_html($data['filter_title']); ?></h3>
                        </div>
                    </div>
                </div>
            	<?php endforeach; ?>
            </div>

            <div class="service-list-area">
                <div class="" id="slideListBox">
                	<?php foreach( $settings['slides_2'] as $data ): ?>
                    <div>
                        <div class="service-list-box">
                            <div class="service-img">
                            	<?php  echo taxseco_img_tag( array(
										'url'   => esc_url( $data['service_image']['url'] ),
									) ); ?>
                            </div>
                            <div class="content">
                                <div class="service-info">
                                    <div class="service-info_icon">
                                       	<?php  echo taxseco_img_tag( array(
											'url'   => esc_url( $data['service_icon']['url'] ),
										) ); ?>
                                    </div>
                                    <div class="service-info_content">
                                        <span class="service-info_text"><?php echo esc_html($data['service_subtitle']); ?></span>
                                        <h3 class="service-info_title"><?php echo esc_html($data['service_title']); ?></h3>
                                    </div>
                                </div>
                                <p class="text"><?php echo esc_html($data['service_desc']); ?></p>
                                <a href="<?php echo esc_url($data['button_url']['url']); ?>" class="as-btn"><?php echo esc_html($data['button_text']); ?></a>
                                <div class="icon-overlay">
                                 	<?php  echo taxseco_img_tag( array(
										'url'   => esc_url( $data['service_icon']['url'] ),
									) ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
             		<?php endforeach; ?>
                </div>
            </div>
        <?php
        }else{

	        if($settings['make_it_slider'] == 'yes'){
				$this->add_render_attribute( 'wrapper', 'class', 'row gy-30 slider-shadow as-carousel-ts-1 arrow-wrap' );
			}else{
				$text = !empty( $settings['all_text'] ) ? $settings['all_text'] : esc_html__( 'All', 'taxseco' );
		    	$filters = array();
		    	foreach( $settings['slides'] as $project ) {
		    		$temp_filters = explode (",", $project['filter_title']);
		    		foreach( $temp_filters as $temp_filter ) {
		    			$filters[strtolower(trim($temp_filter))] = $temp_filter;
		    		}
		    	}
				echo '<div class="taxi-tab filter-menu-active">';
		            echo '<button data-filter="*" class="as-btn active" type="button">' .esc_html( $text ). '</button>';
		            foreach( $filters as $filter ) {
		                echo '<button data-filter=".'.esc_attr( strtolower($filter) ).'" class="as-btn" type="button">'.esc_html( $filter ).'</button>';
		            }
		        echo '</div>';
				$this->add_render_attribute( 'wrapper', 'class', 'row gy-30 filter-active' );
			}

	       	echo '<div '.$this->get_render_attribute_string('wrapper').'>';
	        	foreach( $settings['slides'] as $project ) {
	        		if($settings['make_it_slider'] != 'yes'){

				        $filter_slug = strtolower(str_replace(',', ' ', $project['filter_title']));
		                echo '<div class="col-xl-4 col-md-6 filter-item '.esc_attr( $filter_slug ).'">';
		            }else{
		            	echo '<div class="col-xl-4 col-md-6">';
		            }
	                    echo '<div class="taxi-box">';
		                    if( ! empty( $project['service_slider_image'] ) ){
		                        echo '<div class="taxi-box_img">';
		                            echo taxseco_img_tag( array(
										'url'   => esc_url( $project['service_slider_image']['url'] ),
									) );
		                        echo '</div>';
		                    }
	                        if( ! empty( $project['car_model'] ) ){
	                        	$url = $project['details_page'] ;
				        		if(!empty($url)){
				        			$url_start_tag 	= '<a href="'.esc_url($url).'">';
				        			$url_end_tag 	= '</a>';
				        		}else{
				        			$url_start_tag 	= '';
				        			$url_end_tag 	= '';
				        		} 
		                        echo '<h3 class="taxi-box_title">'.$url_start_tag.esc_html($project['car_model']).$url_end_tag.'</h3>';
		                    }
		                    if( ! empty( $project['km_per_hour'] ) ){
		                        echo '<p class="taxi-box_rate">'.esc_html($project['km_per_hour']).'</p>';
		                    }
	                        if( ! empty( $project['doors'] ) ){
	                            echo '<div class="taxi-feature">';
		                                echo '<div class="taxi-feature_icon">';
	                                    echo taxseco_img_tag( array(
	                                        'url'   => esc_url( $project['doors_icon']['url'] ),
	                                    ) );
		                                echo '</div>';
		                                echo '<h3 class="taxi-feature_title">'.esc_html($project['doors']).'</h3>';
		                                echo '<span class="taxi-feature_info">'.esc_html($project['doors_v']).'</span>';
	                            echo '</div>';
	                        }
	                        if( ! empty( $project['passengers'] ) ){
	                            echo '<div class="taxi-feature">';
		                                echo '<div class="taxi-feature_icon">';
	                                    echo taxseco_img_tag( array(
	                                        'url'   => esc_url( $project['passengers_icon']['url'] ),
	                                    ) );
		                                echo '</div>';
	                                echo '<h3 class="taxi-feature_title">'.esc_html($project['passengers']).'</h3>';
	                                echo '<span class="taxi-feature_info">'.esc_html($project['passengers_v']).'</span>';
	                            echo '</div>';
	                        }
	                        if( ! empty( $project['luggage_carry'] ) ){
	                            echo '<div class="taxi-feature">';
	                                echo '<div class="taxi-feature_icon">';
	                                echo taxseco_img_tag( array(
	                                    'url'   => esc_url( $project['luggage_carry_icon']['url'] ),
	                                ) );
	                                echo '</div>';
	                                echo '<h3 class="taxi-feature_title">'.esc_html($project['luggage_carry']).'</h3>';
	                                echo '<span class="taxi-feature_info">'.esc_html($project['luggage_carry_v']).'</span>';
	                            echo '</div>';
	                        }
	                        if( ! empty( $project['seats_heat'] ) ){
	                            echo '<div class="taxi-feature">';
	                                echo '<div class="taxi-feature_icon">';
	                                echo taxseco_img_tag( array(
	                                    'url'   => esc_url( $project['seats_heat_icon']['url'] ),
	                                ) );
	                                echo '</div>';
	                                echo '<h3 class="taxi-feature_title">'.esc_html($project['seats_heat']).'</h3>';
	                                echo '<span class="taxi-feature_info">'.esc_html($project['seats_heat_v']).'</span>';
	                            echo '</div>';
	                        }
	                        if( ! empty( $project['air_condition'] ) ){
	                            echo '<div class="taxi-feature">';
	                                echo '<div class="taxi-feature_icon">';
	                                echo taxseco_img_tag( array(
	                                    'url'   => esc_url( $project['air_condition_icon']['url'] ),
	                                ) );
	                                echo '</div>';
	                                echo '<h3 class="taxi-feature_title">'.esc_html($project['air_condition']).'</h3>';
	                                echo '<span class="taxi-feature_info">'.esc_html($project['air_condition_v']).'</span>';
	                            echo '</div>';
	                        }
	                        if( ! empty( $project['wifi'] ) ){
		                        echo '<div class="taxi-feature">';
		                            echo '<div class="taxi-feature_icon">';
	                                echo taxseco_img_tag( array(
	                                    'url'   => esc_url( $project['wifi_icon']['url'] ),
	                                ) );
	                                echo '</div>';
		                            echo '<h3 class="taxi-feature_title">'.esc_html($project['wifi']).'</h3>';
		                            echo '<span class="taxi-feature_info">'.esc_html($project['wifi_v']).'</span>';
		                        echo '</div>';
		                    }

		                    if( ! empty( $project['button_text'] ) ){
	                            echo '<a href="'.esc_url($project['button_url']).'" class="as-btn">'.esc_html($project['button_text']).'</a>';
	                        }
	                    echo '</div>';
	                echo '</div>';
	            }
	        echo '</div>';    
        } 

	}
}