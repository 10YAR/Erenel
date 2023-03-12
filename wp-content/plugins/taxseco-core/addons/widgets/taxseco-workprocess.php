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
 * WorkProcess Box Widget .
 *
 */
class Taxseco_WorkProcess_Box extends Widget_Base {

	public function get_name() {
		return 'taxsecofeaturebox';
	}

	public function get_title() {
		return __( 'Taxseco WorkProcess', 'taxseco' );
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
				'label' 	=> __( 'WorkProcess', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'feature_style',
			[
				'label' 	=> __( 'WorkProcess Style', 'taxseco' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'taxseco' ),
					'2' 		=> __( 'Style Two', 'taxseco' ),
					'3' 		=> __( 'Style Three', 'taxseco' ),
					'4' 		=> __( 'Style Four', 'taxseco' ),
				],
			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'content',
			[
				'label'     => __( 'Content', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
		$repeater->add_control(
			'class',
			[
				'label'     => __( 'Icon Class', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'steps',
			[
				'label' 		=> __( 'Work Process', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'taxseco' ),
					],
				],
				'condition' => [
					'feature_style!' => ['4']
				]
			]
		);

		$repeater2 = new Repeater();

		$repeater2->add_control(
			'icon',
			[
				'label'     => __( 'Icon / Image', 'taxseco' ),
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
			'title',
			[
				'label'     => __( 'Title', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater2->add_control(
			'content',
			[
				'label'     => __( 'Content', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 4,
			]
        );
        $this->add_control(
			'steps2',
			[
				'label' 		=> __( 'Work Process', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'taxseco' ),
					],
				],
				'condition' => [
					'feature_style' => ['4']
				],
				'title_field' 	=> '{{title}}',
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
        /*-----------------------------------------features content styling------------------------------------*/

		$this->start_controls_section(
			'content_section',
			[
				'label' 	=> __( 'Content Style', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'content_color',
			[
				'label' 		=> __( 'Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'content_typography',
		 		'label' 		=> __( 'Typography', 'appku' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'content_margin',
			[
				'label' 		=> __( 'Margin', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'content_padding',
			[
				'label' 		=> __( 'Padding', 'appku' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['feature_style'] == '1' ){
	        echo '<div class="process-card-wrap">';
	    		$i = 0;
                foreach( $settings['steps'] as $data ) {  
                	$i ++;
	                echo '<div class="process-card">';
	                    echo '<div class="process-card_icon shape-icon">';
		                    if( ! empty( $data['class'] ) ){
		                    	echo '<div class="shape" data-mask-src="'.TAXSECO_PLUGDIRURI . 'assets/img/shape_bg_1.svg"></div>';
		                        echo wp_kses_post($data['class']).'<span class="process-card_num">'.esc_html($i).'</span>';
		                    }
	                    echo '</div>';
	                    if( ! empty( $data['title'] ) ){
		                    echo '<h3 class="process-card_title">'.esc_html( $data['title'] ).'</h3>';
		                }
		                if( ! empty( $data['content'] ) ){
		                    echo '<p class="process-card_text">'.esc_html( $data['content'] ).'</p>';
		                }
	                echo '</div>';
	            }
                echo '<span class="process-line">';
                    echo '<img src="'.TAXSECO_PLUGDIRURI . 'assets/img/process_line_1.png" alt="line">';
                echo '</span>';
            echo '</div>';
	    }elseif( $settings['feature_style'] == '2' ){
	    	echo '<div class="process-box-wrap">';
	    		$i = 0;
                foreach( $settings['steps'] as $data ) {  
                	$i ++;
                	$k = str_pad($i, 2, '0', STR_PAD_LEFT);

                	$class = ($i % 2 == 0) ? 'style2' : '';
	                echo '<div class="process-box '.esc_attr($class).'">';
	                    echo '<div class="process-box_icon">';
	                        if( ! empty( $data['class'] ) ){
		                        echo wp_kses_post($data['class']).'<span class="process-box_num">'.esc_html($k).'</span>';
		                    }
	                    echo '</div>';
	                    if( ! empty( $data['title'] ) ){
		                    echo '<h3 class="process-box_title">'.esc_html( $data['title'] ).'</h3>';
		                }
		                if( ! empty( $data['content'] ) ){
		                    echo '<p class="process-box_text">'.esc_html( $data['content'] ).'</p>';
		                }
	                echo '</div>';
	            }
           	echo '</div>';
	    }elseif( $settings['feature_style'] == '4' ){
	    	?>
	    	 <div class="row as-carousel as-work-1 dot-style2">
	  			<?php foreach( $settings['steps2'] as $data ): ?>
                <div class="col-sm-6 col-lg-4 col-xl-3  ">
                    <div class="feature-box">
                    	<?php if( ! empty( $data['icon']['url'] ) ): ?>
                        <div class="feature-box_icon layer-btn">
                           <?php echo taxseco_img_tag( array(
									'url'   => esc_url( $data['icon']['url'] ),
								) ); ?>
                        </div>
                        <?php endif; ?>
                        <?php if( ! empty( $data['title'] ) ): ?>
                        <h3 class="feature-box_title"><?php echo esc_html( $data['title'] ); ?></h3>
                    	<?php endif; ?>
                        <?php if( ! empty( $data['content'] ) ): ?>
                        	<p class="feature-box_text"><?php echo esc_html( $data['content'] ); ?></p>
                        <?php endif; ?>
                        <?php if( ! empty( $data['icon']['url'] ) ): ?>
                        <div class="feature-box_img">
                            <?php echo taxseco_img_tag( array(
									'url'   => esc_url( $data['icon']['url'] ),
								) ); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            	<?php endforeach; ?>
            </div>

	    	<?php
	    }else{
	    	echo '<div class="row gx-0 justify-content-center">';
	    		$i = 0;
	    		foreach( $settings['steps'] as $data ) {
	    			$i ++;
	    			$class = ($i % 2 == 0) ? 'active' : '';
			    	echo '<div class="col-lg-4 col-md-6">';
		                echo '<div class="feature-card '.esc_attr($class).'">';
		                    echo '<div class="feature-card_icon shape-icon">';
		                        echo '<div class="shape" data-mask-src="'.TAXSECO_PLUGDIRURI . 'assets/img/shape_bg_1.svg"></div>';
		                        if( ! empty( $data['class'] ) ){
		                        	echo wp_kses_post($data['class']);
		                        }
		                    echo '</div>';
		                    if( ! empty( $data['title'] ) ){
			                    echo '<h3 class="feature-card_title">'.esc_html( $data['title'] ).'</h3>';
			                }
			                if( ! empty( $data['content'] ) ){
			                    echo '<p class="feature-card_text">'.esc_html( $data['content'] ).'</p>';
			                }
		                echo '</div>';
		            echo '</div>';
		        }
            echo '</div>';
	    }
	}

}