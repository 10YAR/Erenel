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
class Taxseco_Video_Thumb extends Widget_Base {

	public function get_name() {
		return 'taxsecovdothumb';
	}

	public function get_title() {
		return __( 'Taxseco Video Thumb', 'taxseco' );
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
			'video',
			[
				'label'     => __( 'Video URL', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
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
			'phone_label',
			[
				'label'     => __( 'Phone Label', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'phone',
			[
				'label'     => __( 'Phone', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'taxseco' )
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'taxseco' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'taxseco' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);

        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( ! empty( $settings['button_link']['url'] ) ) {
            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
        }
        if( ! empty( $settings['button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
        }
        if( ! empty( $settings['button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'button', 'target', '_blank' );
        }


        echo '<div class="bg-title space position-relative">';
	        echo '<div class="as-video cta-bg-shape">';
	        	if( ! empty( $settings['image']['url'] ) ){
		            echo taxseco_img_tag( array(
						'url'   => esc_url( $settings['image']['url'] ),
					) );
		        }
		        if( ! empty( $settings['video'] ) ){
		            echo '<a href="'.esc_url( $settings['video'] ).'" class="play-btn popup-video"><i class="fas fa-play"></i></a>';
		        }
	        echo '</div>';
	        echo '<div class="cta-wrap container">';
	        	if( ! empty( $settings['title'] ) ){
		           	echo ' <h2 class="sec-title mb-35 text-white">'.wp_kses_post($settings['title']).'</h2>';
		           }
	            echo '<div class="info-card mb-40">';
	                echo '<div class="info-card_icon text-title"><i class="fas fa-phone"></i></div>';
	                echo '<div class="info-card_content">';
	                	if( ! empty( $settings['phone_label'] ) ){
		                    echo '<p class="info-card_text text-white">'.esc_html( $settings['phone_label'] ).'</p>';
		                }
		                if( ! empty( $settings['phone'] ) ){
		                    echo '<a href="tel:'.esc_attr($settings['phone']).'" class="info-card_link">'.esc_html( $settings['phone'] ).'</a>';
		                }
	                echo '</div>';
	            echo '</div>';
	            if(!empty($settings['button_text'])){
		            echo '<a '.$this->get_render_attribute_string('button').' class="as-btn style3 style-skew"><span class="btn-text">'.esc_html( $settings['button_text'] ).'</span></a>';
		        }
	        echo '</div>';
	    echo '</div>';
	}

}