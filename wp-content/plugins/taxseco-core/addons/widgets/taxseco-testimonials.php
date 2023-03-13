<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Testimonial Slider Widget .
 *
 */
class Taxseco_Testimonial_Slider extends Widget_Base{

	public function get_name() {
		return 'taxsecotestimonialslider';
	}

	public function get_title() {
		return __( 'Testimonial Slider 2', 'taxseco' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'taxseco' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'testimonial_slider_section',
			[
				'label' 	=> __( 'Testimonial Slider', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'testimonial_style',
			[
				'label' 		=> __( 'Testimonial Style', 'taxseco' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'taxseco' ),
					'two' 			=> __( 'Style Two', 'taxseco' ),
					'three' 			=> __( 'Style Three', 'taxseco' ),
				],
			]
		);
		$this->add_control(
			'slider_id',
			[
				'label' 		=> __( 'Slider Id?', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> 'p_001',
				'condition' 	=> [
                    'testimonial_style' => 'one'
                ]
			]
		);

		//----------------------------feddback repeter start--------------------------------//

		$repeater = new Repeater();

		$repeater->add_control(
			'client_image',
			[
				'label' 		=> __( 'Client Image', 'taxseco' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'client_name', [
				'label' 		=> __( 'Client Name', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Rubaida Kanom' , 'taxseco' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'client_designation', [
				'label' 		=> __( 'Client Designation', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Chef Leader' , 'taxseco' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'client_feedback', [
				'label' 		=> __( 'Client Feedback', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ' , 'taxseco' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'client_rating',
			[
				'label' 	=> __( 'Client Rating', 'taxseco' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '5',
				'options' 	=> [
					'one'  		=> __( 'One Star', 'taxseco' ),
					'two' 		=> __( 'Two Star', 'taxseco' ),
					'three' 	=> __( 'Three Star', 'taxseco' ),
					'four' 		=> __( 'Four Star', 'taxseco' ),
					'five' 	 	=> __( 'Five Star', 'taxseco' ),
				],
			]
		);
		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_name' 		=> __( 'Rubaida Kanom', 'taxseco' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'taxseco' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Rubaida Kanom', 'taxseco' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'taxseco' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Rubaida Kanom', 'taxseco' ),
						'client_feedback' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco ', 'taxseco' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
			]
		);

		$this->end_controls_section();


        //-------------------------------general settings-------------------------------//

		$this->start_controls_section(
			'testimonial_general',
			[
				'label' 	=> __( 'General', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'feedback_bg_clr',
			[
				'label' 		=> __( 'Feedback Background Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi_box_body' => 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .testi_box_img::before' => 'background-color: {{VALUE}}!important;',
				],
			]
		);
		$this->end_controls_section();

		 /*-----------------------------------------Feedback styling------------------------------------*/

		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Feedback Styling', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs2'
		);


		$this->start_controls_tab(
			'style_normal_tab2',
			[
				'label' => esc_html__( 'Nmae', 'taxseco' ),
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
				'label' => esc_html__( 'Designation', 'taxseco' ),
			]
		);
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} span'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'taxseco' ),
		 		'selector' 	=> '{{WRAPPER}} span',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		//--------------------three--------------------//

		$this->start_controls_tab(
			'style_hover_tab3',
			[
				'label' => esc_html__( 'Feedback', 'taxseco' ),
			]
		);
		$this->add_control(
			'testi_feedback_color',
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
				'name' 			=> 'testi_feedback_typography',
		 		'label' 		=> __( 'Typography', 'taxseco' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'testi_feedback_margin',
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
			'testi_feedback_padding',
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


		
		echo '<!-----------------------Start Testimonials Area----------------------->';

		if( $settings['testimonial_style'] == 'one' ){

			$this->add_render_attribute( 'wrapper', 'id', $settings['slider_id'] );
			$this->add_render_attribute( 'wrapper', 'class', 'row slider-shadow testi-slider1' );


			echo '<div class="testimonial-wrapper-1 container as-container">';
				echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					foreach( $settings['slides'] as $singleslide ) {
						echo '<div class="col-md-6 col-xl-4">';
		                    echo '<div class="testi-card">';
		                    	if( ! empty( $singleslide['client_feedback'] ) ) {
			                        echo '<p class="testi-card_text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
			                    }
		                        echo '<div class="testi-card_profile">';
		                        	if( ! empty( $singleslide['client_image']['url'] ) ){
			                            echo '<div class="testi-card_img">';
			                                echo taxseco_img_tag( array(
												'url'	=> esc_url( $singleslide['client_image']['url'] ),
											) );
			                            echo '</div>';
			                        }
		                            echo '<div class="testi-card_info">';
		                            	if( ! empty( $singleslide['client_name'] ) ) {
			                                echo '<h3 class="testi-card_name">'.esc_html( $singleslide['client_name'] ).'</h3>';
			                            }
			                            if( ! empty( $singleslide['client_designation'] ) ) {
			                                echo '<span class="testi-card_desig">'.esc_html( $singleslide['client_designation'] ).'</span>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                        echo '<div class="testi-card_icon">';
		                            echo '<i class="fas fa-quote-right"></i>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            }   
	            echo '</div>';
            echo '</div>';
		}elseif( $settings['testimonial_style'] == 'three' ){
		?>
	        <div class="testi-block-area">
	            <div class="row testi-slider2" id="testi1">
	            	<?php foreach( $settings['slides'] as $singleslide ): ?>
	                <div class="col-lg-6">
	                    <div class="testi-block">
	                    	<?php if( ! empty( $singleslide['client_image']['url'] ) ): ?>
	                        <div class="testi-block_img">
	                            <?php echo taxseco_img_tag( array(
										'url'	=> esc_url( $singleslide['client_image']['url'] ),
									) ); ?>
	                            <div class="testi-block_quote">
	                                <img src="<?php echo TAXSECO_PLUGDIRURI ?>assets/img/quote_right_1.png" alt="icon">
	                            </div>
	                        </div>
	                    	<?php endif; ?>
	                        <?php if( ! empty( $singleslide['client_name'] ) ): ?>
	                        <h3 class="testi-block_name"><?php echo esc_html( $singleslide['client_name'] ); ?></h3>
	                        <?php endif; ?>
	                        <?php if( ! empty( $singleslide['client_designation'] ) ): ?>
	                        <div class="testi-block_desig"><?php echo esc_html( $singleslide['client_designation'] ); ?></div>
	                        <?php endif; ?>
	                        <?php if( ! empty( $singleslide['client_feedback'] ) ): ?>
	                        <div class="testi-block_text"><?php echo esc_html( $singleslide['client_feedback'] ); ?></div>
	                    	<?php endif; ?>
	                    </div>
	                </div>
	            	<?php endforeach; ?>
	            </div>
	            <div class="as-icon-box testi-1">
	                <button data-slick-prev="#testi1" class="icon-btn arrow-left"><i class="fas fa-chevron-left"></i></button>
	                <button data-slick-next="#testi1" class="icon-btn arrow-right"><i class="fas fa-chevron-right"></i></button>
	            </div>
	        </div>
		<?php
		}else{
			echo '<div class="row testi-card-slide">';
                foreach( $settings['slides'] as $singleslide ) {
					echo '<div class="col-12">';
		                echo '<div class="testi-box">';
		                	if( ! empty( $singleslide['client_image']['url'] ) ){
			                    echo '<div class="testi-box_img">';
			                        echo taxseco_img_tag( array(
										'url'	=> esc_url( $singleslide['client_image']['url'] ),
									) );
			                        echo '<div class="testi-box_icon">';
			                            echo '<img src="'.TAXSECO_PLUGDIRURI . 'assets/img/quotes_1.svg" alt="quote icon">';
			                        echo '</div>';
			                    echo '</div>';
			                }

		                    echo '<div class="testi-box_content">';
		                        if( ! empty( $singleslide['client_feedback'] ) ) {
			                        echo '<p class="testi-box_text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
			                    }
			                    if( ! empty( $singleslide['client_name'] ) ) {
			                        echo '<h3 class="testi-box_name">'.esc_html( $singleslide['client_name'] ).'</h3>';
			                    }
			                    if( ! empty( $singleslide['client_designation'] ) ) {
			                        echo '<span class="testi-box_desig">'.wp_kses_post( $singleslide['client_designation'] ).'</span>';
			                    }
		                        echo '<div class="testi-box_review">';
                            		if( $singleslide['client_rating'] == 'one' ){
					                	echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
					                }elseif( $singleslide['client_rating'] == 'two' ){
					                	echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
					                }elseif( $singleslide['client_rating'] == 'three' ){
					                	echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
					                }elseif( $singleslide['client_rating'] == 'four' ){
					                	echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
					                }else{
					                	echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
						                echo '<i class="fas fa-star"></i>';
					                }  
                                echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        }
            echo '</div>';
		}
		echo '<!-----------------------End Testimonials Area----------------------->';
	}

}