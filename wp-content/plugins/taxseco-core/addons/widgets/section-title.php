<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
/**
 *
 * Section Title Widget .
 *
 */
class Taxseco_Section_Title_Widget extends Widget_Base {

	public function get_name() {
		return 'taxsecosectiontitle';
	}

	public function get_title() {
		return __( 'Section Title', 'taxseco' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'taxseco' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_title_section',
			[
				'label'		 	=> __( 'Section Title', 'taxseco' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Section Title', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Title', 'taxseco' )
			]
        );
        $this->add_control(
			'section_title_tag',
			[
				'label' 	=> __( 'Title Tag', 'taxseco' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'span'  => 'span',
				],
				'default' => 'span',
			]
        );

        $this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Section Subtitle', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Subtitle', 'taxseco' ),
			]
        );

        $this->add_control(
			'section_subtitle_tag',
			[
				'label' 	=> __( 'Subitle Tag', 'taxseco' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'p'  => 'P',
					'span'  => 'span',
				],
				'default' 	=> 'h2',
				'condition'	=> ['section_subtitle!' => '']
			]
		);
		$this->add_control(
			'section_description',
			[
				'label' 	=> __( 'Section Description', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Description', 'taxseco' )
			]
        );
        $this->add_responsive_control(
			'section_align',
			[
				'label' 		=> __( 'Alignment', 'taxseco' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 	=> [
						'title' 		=> __( 'Left', 'taxseco' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'taxseco' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'taxseco' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 	=> 'left',
				'toggle' 	=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .title-area' => 'text-align: {{VALUE}};',
                ]
			]
		);

        $this->end_controls_section();

        //-------------------------------------title styling-------------------------------------//

        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' => __( 'Section Title Style', 'taxseco' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' 	=> [
                    'section_title!'    => ''
                ]
			]
		);

        $this->add_control(
			'section_title_color',
			[
				'label' 	=> __( 'Section Title Color', 'taxseco' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title-selector' => 'color: {{VALUE}}!important;',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_title_typography',
				'label' 	=> __( 'Section Title Typography', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .title-selector',
			]
		);

        $this->add_responsive_control(
			'section_title_margin',
			[
				'label' 		=> __( 'Section Title Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .title-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'section_title_padding',
			[
				'label' 		=> __( 'Section Title Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .title-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();


        //-------------------------------------subtitle styling-------------------------------------//

        $this->start_controls_section(
			'section_subtitle_style_section',
			[
				'label' => __( 'Section Subtitle Style', 'taxseco' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
                    'section_subtitle!'    => ''
                ],
			]
		);

		$this->add_control(
			'section_subtitle_color',
			[
				'label' 		=> __( 'Section Subtitle Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .subtitle-selector' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_subtitle_typography',
				'label' 	=> __( 'Section Subtitle Typography', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .subtitle-selector',
			]
        );

        $this->add_responsive_control(
			'section_subtitle_margin',
			[
				'label' 		=> __( 'Section Subtitle Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .subtitle-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

			]
        );
        $this->add_responsive_control(
			'section_subtitle_padding',
			[
				'label' 		=> __( 'Section Subtitle Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .subtitle-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        
        //-------------------------------------description styling-------------------------------------//

        $this->start_controls_section(
			'section_desc_style_section',
			[
				'label' => __( 'Section Description Style', 'taxseco' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' 	=> [
                    'section_description!'    => ''
                ]
			]
		);

		$this->add_control(
			'section_desc_color',
			[
				'label' 		=> __( 'Section Description Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .desc-selector' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_desc_typography',
				'label' 	=> __( 'Section Description Typography', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .desc-selector',
			]
        );

        $this->add_responsive_control(
			'section_desc_margin',
			[
				'label' 		=> __( 'Section Description Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .desc-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_responsive_control(
			'section_desc_padding',
			[
				'label' 		=> __( 'Section Description Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .desc-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'title-area' );


        echo '<div '.$this->get_render_attribute_string( 'wrapper' ).' >';

		if( ! empty( $settings['section_title'] ) ) {
        	echo '<'.esc_attr($settings['section_title_tag']).' class="sub-title title-selector">'.wp_kses_post( $settings['section_title'] ).'</'.esc_attr($settings['section_title_tag']).'>';
		}
		if( !empty( $settings['section_subtitle'] ) ) {
			echo '<'.esc_attr($settings['section_subtitle_tag']).' class="sec-title subtitle-selector">'.wp_kses_post( $settings['section_subtitle'] ).'</'.esc_attr($settings['section_subtitle_tag']).'>';
		}
		if( ! empty( $settings['section_description'] ) ){
			echo taxseco_paragraph_tag( array(
				'text'	=> wp_kses_post( $settings['section_description'] ),
				'class'	=> 'desc-selector mt-n2 mb-35'
			) );
		}		
		echo '</div>';
	}
}