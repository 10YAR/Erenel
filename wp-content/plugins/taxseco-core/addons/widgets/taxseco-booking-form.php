<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
/**
 *
 * Contact Widget .
 *
 */
class Taxseco_Contact_Form extends Widget_Base{

	public function get_name() {
		return 'taxsecocontactform';
	}

	public function get_title() {
		return __( 'Contact Form', 'taxseco' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'taxseco' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'contact_section',
			[
				'label' 	=> __( 'Contact Form', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'form_style',
			[
				'label' 	=> __( 'Form Style', 'taxseco' ),
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
        $this->add_control(
			'contact_form_shortcode',
			[
				'label'     => __( 'Contact Form Shortcode', 'taxseco' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows'		=> 2,
			]
		);  
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		echo '<!-----------------------Start Contact Form----------------------->';
			if( $settings['form_style'] == '1' ){
				$style_class = 'booking-form style2';
			}elseif( $settings['form_style'] == '2' ){
				$style_class = 'booking-form';
			}elseif( $settings['form_style'] == '3' ){
				$style_class = 'booking-form3';
			}else{
				$style_class = 'booking-form4';
			}
			echo '<div class="'.esc_attr($style_class).'">';
            	if( ! empty( $settings['contact_form_shortcode'] ) ){
				    echo do_shortcode( $settings['contact_form_shortcode'] );
				}
	        echo '</div>';
		echo '<!-----------------------End Contact Form----------------------->';
	}
}