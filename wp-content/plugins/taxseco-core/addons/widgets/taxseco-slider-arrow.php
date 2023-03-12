<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
/**
 *
 * Product Widget .
 *
 */
class Taxseco_Slider_Arrow extends Widget_Base {

	public function get_name() {
		return 'taxsecosliderarrow';
	}

	public function get_title() {
		return __( 'Slider Arrow', 'taxseco' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'taxseco' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'slider_arrow_section',
			[
				'label' 	=> __( 'Slider Arrow', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'slider_id',
			[
				'label' 		=> __( 'Slider Id?', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> 'p_001',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'general',
			[
				'label' 	=> __( 'General', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'arrow_color',
			[
				'label' 	=> __( 'Arrow Color', 'taxseco' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-btn.style4' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'arrow_hover_color',
			[
				'label' 	=> __( 'Arrow Hover Color', 'taxseco' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-btn.style4:hover' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'arrow_bg_color',
			[
				'label' 	=> __( 'Arrow Background Color', 'taxseco' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-btn.style4' => 'background-color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'arrow_bg_hover_color',
			[
				'label' 	=> __( 'Arrow Background Hover Color', 'taxseco' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon-btn.style4:hover' => 'background-color: {{VALUE}}',
                ],
			]
        );

		$this->end_controls_section();

    }


	protected function render() {

        $settings = $this->get_settings_for_display();
        
        echo '<div class="icon-box"><button data-slick-prev="#'.esc_attr( $settings['slider_id'] ).'" class="slick-arrow default"><i class="far fa-arrow-left"></i></button>';
        echo '<button data-slick-next="#'.esc_attr( $settings['slider_id'] ).'" class="slick-arrow default"><i class="far fa-arrow-right"></i></button></div>';
	}
}