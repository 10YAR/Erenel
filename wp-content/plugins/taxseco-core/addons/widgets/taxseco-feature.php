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
 * Feature Box Widget .
 *
 */
class Taxseco_Feature extends Widget_Base {

	public function get_name() {
		return 'taxsecofeature';
	}

	public function get_title() {
		return __( 'Taxseco Feature', 'taxseco' );
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
				'label' 	=> __( 'Feature', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

         $this->add_control(
			'feature_style',
			[
				'label' 	=> __( 'Feature Style', 'taxseco' ),
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
			'image',
			[
				'label' 		=> __( 'Choose Image', 'taxseco' ),
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
			'steps',
			[
				'label' 		=> __( 'Steps', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'taxseco' ),
					],
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
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if($settings['feature_style'] == '2'): ?>
        <div class="about-feature-wrap">
        	<?php  foreach( $settings['steps'] as $data ): ?>
            <div class="about-feature">
                <div class="about-feature_icon">
                    <?php  echo taxseco_img_tag( array(
								'url'   => esc_url( $data['image']['url'] ),
							) ); ?>
                </div>
                <div class="media-body">
                    <h3 class="about-feature_title"><?php echo esc_html( $data['title'] ); ?></h3>
                    <p class="about-feature_text"><?php echo esc_html( $data['content'] ); ?></p>
                </div>
            </div>
        	<?php endforeach; ?>
        </div>
        <?php else:
        echo '<div class="service-feature-wrap">';
            foreach( $settings['steps'] as $data ) {            
                echo '<div class="service-feature">';
                	if( ! empty( $data['image']['url'] ) ){
	                    echo '<div class="service-feature_icon">';
	                        echo taxseco_img_tag( array(
								'url'   => esc_url( $data['image']['url'] ),
							) );
	                    echo '</div>';
	                }

                    echo '<div class="service-feature_content">';
                    	if( ! empty( $data['title'] ) ){
	                        echo '<h4 class="service-feature_title">'.esc_html( $data['title'] ).'</h4>';
	                    }
	                    if( ! empty( $data['content'] ) ){
	                        echo '<p class="service-feature_text">'.esc_html( $data['content'] ).'</p>';
	                    }
                    echo '</div>';

                echo '</div>';
            }  
        echo '</div>';

    	endif;

	}

}