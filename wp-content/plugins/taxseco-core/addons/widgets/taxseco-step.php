<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Process Box Widget .
 *
 */
class Taxseco_Process_Box extends Widget_Base {

	public function get_name() {
		return 'taxsecoprocessbox';
	}

	public function get_title() {
		return __( 'Taxseco Process', 'taxseco' );
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
				'label' 	=> __( 'Process', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
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
			'counter',
			[
				'label'     => __( 'Counter', 'taxseco' ),
                'type'      => Controls_Manager::TEXT,
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
        $this->add_control(
			'steps',
			[
				'label' 		=> __( 'Steps', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'counter' 		=> __( '01', 'taxseco' ),
					],
				],
			]
		);
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="service-process-wrap">';

        	foreach( $settings['steps'] as $data ) {	
	            echo '<div class="service-process">';
	            	if( ! empty( $data['counter'] ) ){
		                echo '<div class="service-process_num">'.esc_html( $data['counter'] ).'</div>';
		            }
		            if( ! empty( $data['title'] ) ){
		                echo '<h5 class="service-process_title">'.esc_html( $data['title'] ).'</h5>';
		            }
		            if( ! empty( $data['content'] ) ){
		                echo '<p class="service-process_text">'.esc_html( $data['content'] ).'</p>';
		            }
	            echo '</div>';
	        }
            
       	echo '</div>'; 
	}

}