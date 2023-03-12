<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Skill Box Widget .
 *
 */
class Taxseco_Skill_Box extends Widget_Base {

	public function get_name() {
		return 'taxsecoskillbox';
	}

	public function get_title() {
		return __( 'Taxseco Skill', 'taxseco' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'taxseco' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'feature_section',
			[
				'label' 	=> __( 'Skill', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'feature_style',
			[
				'label' 	=> __( 'Skill Style', 'taxseco' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'taxseco' ),
					'2' 		=> __( 'Style Two', 'taxseco' ),
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'parcetige',
			[
				'label'     => __( 'Number', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'bg_image',
			[
				'label' 		=> __( 'Background Image', 'taxseco' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> ['feature_style!' => '2']
			]
		);
        $this->end_controls_section();

        //-------------------------------------subtitle styling-------------------------------------//

        $this->start_controls_section(
			'style',
			[
				'label' => __( 'Style', 'taxseco' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label' 		=> __( 'Bar Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .feature-circle' => '--theme-color: {{VALUE}}!important',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------features styling------------------------------------*/

		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Title Style', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h3'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'appku' ),
		 		'selector' 	=> '{{WRAPPER}} h3',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_content_padding',
			[
				'label' 		=> __( 'Padding', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------number styling------------------------------------*/

		$this->start_controls_section(
			'number_tyle_section',
			[
				'label' 	=> __( 'Number Style', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'overview_number_color',
			[
				'label' 		=> __( 'Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .feature-circle .circle-num'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_number_typography',
		 		'label' 		=> __( 'Typography', 'appku' ),
		 		'selector' 	=> '{{WRAPPER}} .feature-circle .circle-num',
			]
		);

        $this->add_responsive_control(
			'overview_number_margin',
			[
				'label' 		=> __( 'Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .feature-circle .circle-num' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_number_padding',
			[
				'label' 		=> __( 'Padding', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .feature-circle .circle-num' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['feature_style'] == '1' ){

        	echo '<div class="feature-circle" data-bg-src="'.esc_url( $settings['bg_image']['url']  ).'">';
                echo '<div class="progressbar">';
                	if(!empty($settings['parcetige'])){
	                    echo '<div class="circle" data-percent="'.esc_attr($settings['parcetige']).'">';
	                        echo '<div class="circle-num"></div>';
	                    echo '</div>';
	                }
	                if(!empty($settings['title'])){
	                    echo '<h3 class="feature-circle_title">'.esc_html($settings['title']).'</h3>';
	                }
                echo '</div>';
            echo '</div>';
	    }else{
	    	echo '<div class="skill-feature style2">';
	    		if(!empty($settings['title'])){
	                echo '<h5 class="skill-feature_title">'.esc_html($settings['title']).'</h5>';
	            }
                echo '<div class="progress">';
                	if(!empty($settings['parcetige'])){
	                    echo '<div class="progress-bar" style="width: '.esc_attr($settings['parcetige']).'%;">';
	                        echo '<div class="progress-value">'.esc_html($settings['parcetige']).'%</div>';
	                    echo '</div>';
	                }
                echo '</div>';
            echo '</div>';
	    }
	}

}