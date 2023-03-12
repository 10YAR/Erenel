<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Counter Up Widget .
 *
 */
class Taxseco_Counterup extends Widget_Base {

	public function get_name() {
		return 'taxsecocounterup';
	}

	public function get_title() {
		return __( 'Counter Up', 'taxseco' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'taxseco' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Content', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );     

        $this->add_control(
			'counter_style',
			[
				'label' 	=> __( 'Counter Style', 'taxseco' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'taxseco' ),
					'2' 		=> __( 'Style Two', 'taxseco' ),
				],
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'counter_number',
			[
				'label'     => __( 'Counter Number', 'taxseco' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( '25', 'taxseco' ),
			]
		);
		$repeater->add_control(
			'counter_text',
			[
				'label'     => __( 'Counter Text', 'taxseco' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( 'Years Of Experience', 'taxseco' ),
			]
		);
		$repeater->add_control(
			'counter_image',
			[
				'label' 		=> __( 'Counter Image', 'taxseco' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'counter',
			[
				'label' 		=> __( 'Counter', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'counter_text' 		=> __( 'Counter One', 'taxseco' ),
					],
				],
				'title_field' 	=> '{{{ counter_text }}}',
				'condition' => [
					'counter_style' => '1',
				]
			]
		);

		$repeater2 = new Repeater();

		$repeater2->add_control(
			'counter_number',
			[
				'label'     => __( 'Counter Number', 'taxseco' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( '25', 'taxseco' ),
			]
		);

		$repeater2->add_control(
			'counter_after',
			[
				'label'     => __( 'Counter After', 'taxseco' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( '', 'taxseco' ),
			]
		);

		$repeater2->add_control(
			'counter_text',
			[
				'label'     => __( 'Counter Text', 'taxseco' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( 'Years Of Experience', 'taxseco' ),
			]
		);

		$this->add_control(
			'counter2',
			[
				'label' 		=> __( 'Counter', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'counter_text' 		=> __( 'Counter One', 'taxseco' ),
					],
				],
				'title_field' 	=> '{{{ counter_text }}}',
				'condition' => [
					'counter_style' => '2',
				]
			]
		);


		$this->end_controls_section();

        /*-----------------------------------------General styling------------------------------------*/
        $this->start_controls_section(
			'general_styling',
			[
				'label' 	=> __( 'General Styling', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'counter_style' => '2',
				]
			]
        );

         $this->add_control(
			'general_color',
			[
				'label' 		=> __( 'Background', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .counter-box-area'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_responsive_control(
			'general_padding',
			[
				'label' 		=> __( 'Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .counter-box-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
					'{{WRAPPER}} h3'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'taxseco' ),
		 		'selector' 	=> '{{WRAPPER}} h3',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Ttitle', 'taxseco' ),
			]
		);
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'taxseco' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['counter_style'] == '2' ){
    	?>
    		<div class="counter-box-area">
                <div class="row">
                  	<?php foreach( $settings['counter2'] as $data ): ?>
                    <div class="col-sm-6 col-lg-3 counter-box-wrap">
                        <div class="counter-box">
                            <div class="counter-box_content">
                                <h3 class="counter-box_number"><span class="counter-number"><?php echo esc_html( $data['counter_number'] ); ?></span><?php echo esc_html( $data['counter_after'] ); ?></span></h3>
                                <p class="counter-box_text"><?php echo esc_html( $data['counter_text'] ); ?></p>
                            </div>
                        </div>
                    </div>
                	<?php endforeach; ?>
                </div>
            </div>
    	<?php
		}else{
	        echo '<div class="counter-wrap">';
	            echo '<div class="counter-line"></div>';
	            echo '<div class="row gy-40">';
	                foreach( $settings['counter'] as $data ) {	
		                echo '<div class="col-sm-6 col-lg-3">';
		                    echo '<div class="counter-card">';
		                    	if(!empty($data['counter_image']['url'])){
			                        echo '<div class="counter-card_icon">';
			                            echo taxseco_img_tag( array(
						                    'url'   => esc_url( $data['counter_image']['url']  ),
						                ));
			                        echo '</div>';
			                    }
			                    if( ! empty( $data['counter_number'] ) ){
			                        echo '<h3 class="counter-card_number"><span class="counter-number">'.esc_html( $data['counter_number'] ).'</span></h3>';
			                    }
			                    if( !empty( $data['counter_text'] ) ){
			                        echo '<p class="counter-card_text">'.esc_html( $data['counter_text'] ).'</p>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		            }     
	            echo '</div>';
	        echo '</div>';
    	}

	}

}