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
 * Image Widget .
 *
 */
class Taxseco_Deails_Image extends Widget_Base {

	public function get_name() {
		return 'taxsecodetailsimage';
	}

	public function get_title() {
		return __( 'Taxseco Details Image', 'taxseco' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'taxseco' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label' 	=> __( 'Taxi Details Image', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'image',
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
		$this->add_control(
			'rentperhour',
			[
				'label' 		=> __( 'Rent Per Hour', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'A$0.85/km' , 'taxseco' ),
				'rows' 			=> 2,
			]
		);
		$this->add_control(
			'rentperday',
			[
				'label' 		=> __( 'Rent Per Day', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '$16.85/per day' , 'taxseco' ),
				'rows' 			=> 2,
			]
		);
		
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="taxi-details-img">';
        	if(!empty($settings['image']['url'])){
        		echo taxseco_img_tag( array(
                    'url'   => esc_url( $settings['image']['url']  ),
                    'class' => 'taxi-img',
                ));
	        }
	        if(!empty($settings['rentperhour'])){
	            echo '<div class="taxi-rate">';
	                echo '<div class="taxi-rate_icon">';
	                    echo '<img src="'.TAXSECO_PLUGDIRURI . 'assets/img/rate_1.svg" alt="icon">';
	                echo '</div>';
	                echo '<p class="taxi-rate_text">'.esc_html($settings['rentperhour']).'</p>';
	            echo '</div>';
	        }
	        if(!empty($settings['rentperday'])){
	            echo '<div class="taxi-rate">';
	               echo ' <div class="taxi-rate_icon">';
	                   echo ' <img src="'.TAXSECO_PLUGDIRURI . 'assets/img/rate_2.svg" alt="icon">';
	                echo '</div>';
	                echo '<p class="taxi-rate_text">'.esc_html($settings['rentperday']).'</p>';
	            echo '</div>';
	        }
        echo '</div>';
	}

}