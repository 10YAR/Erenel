<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Faq Widget .
 *
 */
class Taxseco_Faq extends Widget_Base {

	public function get_name() {
		return 'taxsecofaq';
	}

	public function get_title() {
		return __( 'Faq', 'taxseco' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'taxseco' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'faq_section',
			[
				'label'		 	=> __( 'Faq', 'taxseco' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'faq_style',
			[
				'label' 		=> __( 'Faq Style', 'taxseco' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  		=> __( 'Style One', 'taxseco' ),
					'2' 		=> __( 'Style Two', 'taxseco' ),
				],
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
			'faq_question',
			[
				'label' 	=> __( 'Faq Question', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Ut fermentum massa justo', 'taxseco' )
			]
        );
        $repeater->add_control(
			'bg_image',
			[
				'label' 		=> __( 'Image', 'taxseco' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater->add_control(
			'faq_answer',
			[
				'label' 	=> __( 'Faq Answer', 'taxseco' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna .', 'taxseco' )
			]
        );

		$this->add_control(
			'faq_repeater',
			[
				'label' 		=> __( 'Faq', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'faq_question'    => __( 'If I face issue then how can I contact with you?', 'taxseco' ),
						'faq_answer'      => __( 'Proactively restore professional data and multimedia based collaboration and idea sharing. Credibly top line deliverables and cross platform manufactured products. Dramatically facilitate enabled value with seamless growth strategies. Assertively innovate holistic materials rather than customized users. Intrinsicly monetize client centric meta services before superior testing procedures.', 'taxseco' ),
					],
					[
						'faq_question'    => __( 'When Your Consult Business Begins To Grow?', 'taxseco' ),
                        'faq_answer'      => __( 'Proactively restore professional data and multimedia based collaboration and idea sharing. Credibly top line deliverables and cross platform manufactured products. Dramatically facilitate enabled value with seamless growth strategies. Assertively innovate holistic materials rather than customized users. Intrinsicly monetize client centric meta services before superior testing procedures.', 'taxseco' ),
					],
					[
						'faq_question'    => __( 'Common Misconcep About Building A Team?', 'taxseco' ),
                        'faq_answer'      => __( 'Proactively restore professional data and multimedia based collaboration and idea sharing. Credibly top line deliverables and cross platform manufactured products. Dramatically facilitate enabled value with seamless growth strategies. Assertively innovate holistic materials rather than customized users. Intrinsicly monetize client centric meta services before superior testing procedures.', 'taxseco' ),
					],
				],
				'title_field' 	=> '{{{ faq_question }}}',
				'condition' => [
					'faq_style' => '1',
				]
			]
		);

		$repeater2 = new Repeater();

        $repeater2->add_control(
			'faq_question',
			[
				'label' 	=> __( 'Faq Question', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Ut fermentum massa justo', 'taxseco' )
			]
        );

        $repeater2->add_control(
			'faq_answer',
			[
				'label' 	=> __( 'Faq Answer', 'taxseco' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna .', 'taxseco' )
			]
        );

		$this->add_control(
			'faq_repeater_2',
			[
				'label' 		=> __( 'Faq', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'faq_question'    => __( 'If I face issue then how can I contact with you?', 'taxseco' ),
						'faq_answer'      => __( 'Proactively restore professional data and multimedia based collaboration and idea sharing. Credibly top line deliverables and cross platform manufactured products. Dramatically facilitate enabled value with seamless growth strategies. Assertively innovate holistic materials rather than customized users. Intrinsicly monetize client centric meta services before superior testing procedures.', 'taxseco' ),
					]
				],
				'title_field' 	=> '{{{ faq_question }}}',
				'condition' => [
					'faq_style' => '2',
				]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'faq_style_section',
			[
				'label' => __( 'Faq Style', 'taxseco' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'faq_question_color',
			[
				'label' 	=> __( 'Faq Question Color', 'taxseco' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-accordion .accordion-button' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_question_typography',
				'label' 	=> __( 'Faq Question Typography', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .vs-accordion .accordion-button',
			]
		);

        $this->add_responsive_control(
			'faq_question_margin',
			[
				'label' 		=> __( 'Faq Question Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-accordion .accordion-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'faq_question_padding',
			[
				'label' 		=> __( 'Faq Question Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-accordion .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

		$this->add_control(
			'faq_answer_color',
			[
				'label' 		=> __( 'Faq Answer Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'color: {{VALUE}}',
                ],
				'separator'		=> 'before'
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_answer_typography',
				'label' 	=> __( 'Faq Answer Typography', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .accordion-body p',
			]
        );

        $this->add_responsive_control(
			'faq_answer_margin',
			[
				'label' 		=> __( 'Faq Answer Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'faq_answer_padding',
			[
				'label' 		=> __( 'Faq Answer Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['faq_style'] == '2' ){
		echo '<div class="accordion-area accordion" id="faqAccordion2">';
			$x = 1;
            foreach( $settings['faq_repeater_2'] as $single_data ){
				if( $x == '1' ){
					$ariaexpanded 	= 'true';
					$class 			= 'show';
					$collesed 		= '';
					$is_active 		= 'active';
				}else{
					$ariaexpanded 	= 'false';
					$class 			= '';
					$collesed 		= 'collapsed';
					$is_active 		= '';
				}

				echo '<div class="accordion-card style2 '.esc_attr( $is_active ).'">';
					if( ! empty( $single_data['faq_question'] ) ){
                        echo '<div class="accordion-header" id="collapse-item-2">';
                            echo '<button class="accordion-button '.esc_attr( $collesed ).'" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-'.esc_attr( $x ).'" aria-expanded="'.esc_attr( $ariaexpanded ).'" aria-controls="collapse-'.esc_attr( $x ).'">'.esc_html($single_data['faq_question']).'</button>';
                        echo '</div>';
                    }
                    if( ! empty( $single_data['faq_answer'] ) ){
                        echo '<div id="collapse-'.esc_attr( $x ).'" class="accordion-collapse collapse '.esc_attr( $class ).' " aria-labelledby="collapse-item-'.esc_attr( $x ).'" data-bs-parent="#faqAccordion2">';
                            echo '<div class="accordion-body">';
                            	if(!empty($single_data['bg_image']['url'])){
	                                echo '<div class="faq-img">';
	                                    echo taxseco_img_tag( array(
						                    'url'   => esc_url( $single_data['bg_image']['url']  ),
						                ));
	                                echo '</div>';
	                            }
                                echo '<p class="faq-text">'.wp_kses_post($single_data['faq_answer']).'</p>';
                            echo '</div>';
                        echo '</div>';
                    }
                echo '</div>';
				$x++;
            }
        echo '</div>';

		}else{
			echo '<div class="accordion-area accordion" id="faqAccordion">';
			$x = 1;
            foreach( $settings['faq_repeater'] as $single_data ){
				if( $x == '1' ){
					$ariaexpanded 	= 'true';
					$class 			= 'show';
					$collesed 		= '';
					$is_active 		= 'active';
				}else{
					$ariaexpanded 	= 'false';
					$class 			= '';
					$collesed 		= 'collapsed';
					$is_active 		= '';
				}


				echo '<div class="accordion-card '.esc_attr( $is_active ).'">';
					if( ! empty( $single_data['faq_question'] ) ){
                        echo '<div class="accordion-header" id="collapse-item-2">';
                            echo '<button class="accordion-button '.esc_attr( $collesed ).'" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-'.esc_attr( $x ).'" aria-expanded="'.esc_attr( $ariaexpanded ).'" aria-controls="collapse-'.esc_attr( $x ).'">'.esc_html($single_data['faq_question']).'</button>';
                        echo '</div>';
                    }
                    if( ! empty( $single_data['faq_answer'] ) ){
                        echo '<div id="collapse-'.esc_attr( $x ).'" class="accordion-collapse collapse '.esc_attr( $class ).' " aria-labelledby="collapse-item-'.esc_attr( $x ).'" data-bs-parent="#faqAccordion">';
                            echo '<div class="accordion-body">';
                            	if(!empty($single_data['bg_image']['url'])){
	                                echo '<div class="faq-img">';
	                                    echo taxseco_img_tag( array(
						                    'url'   => esc_url( $single_data['bg_image']['url']  ),
						                ));
	                                echo '</div>';
	                            }
                                echo '<p class="faq-text">'.wp_kses_post($single_data['faq_answer']).'</p>';
                            echo '</div>';
                        echo '</div>';
                    }
                echo '</div>';
				$x++;
            }
        echo '</div>';
		}
        


	}
}