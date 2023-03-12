<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Button Widget .
 *
 */
class Taxseco_Group_Button extends Widget_Base {

	public function get_name() {
		return 'taxsecogroupbutton';
	}

	public function get_title() {
		return __( 'Download Button', 'taxseco' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'taxseco' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'button_section',
			[
				'label' 	=> __( 'Button', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->start_controls_tabs(
			'style_tabs3'
		);


		$this->start_controls_tab(
			'style_normal_tab3',
			[
				'label' => esc_html__( 'Button 1', 'appku' ),
			]
		);

        $this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'taxseco' )
			]
        );

        $this->add_control(
			'button_link',
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
			'button_icon',
			[
				'label' 	=> __( 'Button Icon Class', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2
			]
        );
		$this->end_controls_tab();
		//-----------------secound------------------//
		$this->start_controls_tab(
			'style_hover_tab4',
			[
				'label' => esc_html__( 'Button 2', 'appku' ),
			]
		);

		$this->add_control(
			'button_text2',
			[
				'label' 	=> __( 'Button Text', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'taxseco' )
			]
        );

        $this->add_control(
			'button_link2',
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
			'button_icon2',
			[
				'label' 	=> __( 'Button Icon Class', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2
			]
        );

		$this->add_control(
			'button_icon_position2',
			[
				'label' 	=> __( 'Button Icon Position', 'taxseco' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Before Text', 'taxseco' ),
					'2' 		=> __( 'After Text', 'taxseco' ),
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();



        $this->add_responsive_control(
			'button_align',
			[
				'label' 		=> __( 'Alignment', 'taxseco' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'start' 	=> [
						'title' 		=> __( 'Left', 'taxseco' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'taxseco' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'end' 	=> [
						'title' 		=> __( 'Right', 'taxseco' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 		=> 'left',
				'toggle' 		=> true,
			]
        );

        $this->end_controls_section();

        //---------------------------------------Button Style 1---------------------------------------//

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
					'{{WRAPPER}} .download-btn' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_color_hover',
			[
				'label' 		=> __( 'Button Color Hover', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .download-btn:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Button Background Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .download-btn' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_hover_color',
			[
				'label' 		=> __( 'Button Background Hover Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .download-btn:before' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .download-btn',
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border_hover',
				'label' 	=> __( 'Border Hover', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .download-btn:hover',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .download-btn',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .download-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .download-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .download-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Button Shadow', 'taxseco' ),
				'selector' => '{{WRAPPER}} .download-btn',
			]
		);
        $this->end_controls_section();
        
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', ' class', 'download-btn-wrap');
        $this->add_render_attribute( 'wrapper', ' class', esc_attr(  'justify-content-'.$settings['button_align'] ) );
        
		$this->add_render_attribute( 'button1', ' class', 'download-btn' );
		$this->add_render_attribute( 'button2', ' class', 'download-btn' );
		
	   
        echo '<!-- Button -->';
        echo '<div '.$this->get_render_attribute_string('wrapper').'>';
        	
        	if( ! empty( $settings['button_text'] ) ) {
        		if( ! empty( $settings['button_link']['url'] ) ) {
		            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
		        }
		        if( ! empty( $settings['button_link']['nofollow'] ) ) {
		            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
		        }

		        if( ! empty( $settings['button_link']['is_external'] ) ) {
		            $this->add_render_attribute( 'button', 'target', '_blank' );
		        }
                echo '<a '.$this->get_render_attribute_string('button') .$this->get_render_attribute_string('button1').'>';
                    echo wp_kses_post($settings['button_icon']);
                    echo '<div class="text-group">';
                        echo '<span class="small-text">'.esc_html($settings['button_text']).'</span>';
                        echo '<h6 class="big-text">Google Play</h6>';
                    echo '</div>';
                echo '</a>';
	        }
	        if( ! empty( $settings['button_text2'] ) ) {
	        	if( ! empty( $settings['button_link2']['url'] ) ) {
		            $this->add_render_attribute( 'button_l', 'href', esc_url( $settings['button_link2']['url'] ) );
		        }
		        if( ! empty( $settings['button_link']['nofollow'] ) ) {
		            $this->add_render_attribute( 'button_l', 'rel', 'nofollow' );
		        }

		        if( ! empty( $settings['button_link']['is_external'] ) ) {
		            $this->add_render_attribute( 'button_l', 'target', '_blank' );
		        }

                echo '<a '.$this->get_render_attribute_string('button_l') .$this->get_render_attribute_string('button2').'>';
                    if( ! empty( $settings['button_icon2'] )){
						echo wp_kses_post($settings['button_icon2']);
					}
                    echo '<div class="text-group">';
                        echo '<span class="small-text">'.esc_html($settings['button_text2']).'</span>';
                        echo '<h6 class="big-text">App Store</h6>';
                    echo '</div>';
                echo '</a>';
	        }
        echo '</div>';
        echo '<!-- End Button -->';
	}

}