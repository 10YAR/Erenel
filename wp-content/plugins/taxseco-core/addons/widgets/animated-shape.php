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
class taxseco_Animated_Image extends Widget_Base {

	public function get_name() {
		return 'taxsecoshapeimage';
	}

	public function get_title() {
		return __( 'taxseco Animated Image', 'taxseco' );
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
				'label' 	=> __( 'Image', 'taxseco' ),
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
			'effect_style',
			[
				'label' 		=> esc_html__( 'Add Styling Attributes', 'taxseco' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
					'jump'  			=> esc_html__( 'Jumping Effect', 'taxseco' ),
					'jump-reverse'  	=> esc_html__( 'Jumping Reverse Effect', 'taxseco' ),
					'movingX'  			=> esc_html__( 'Moving Effect', 'taxseco' ),
					'movingY'  			=> esc_html__( 'Moving Effect', 'taxseco' ),
					'movingTopRight'  			=> esc_html__( 'Moving to Right Effect', 'taxseco' ),
					'movingBottomLeft'  			=> esc_html__( 'Moving to Left Effect', 'taxseco' ),
					'movingX-reverse'	=> esc_html__( 'MovingX Reverse Effect', 'taxseco' ),
					'movingY-reverse'	=> esc_html__( 'MovingY Reverse Effect', 'taxseco' ),
					'rotate'			=> esc_html__( 'Rotate Effect', 'taxseco' ),
					''			=> esc_html__( 'No Effect', 'taxseco' ),
				],
				'default' => [ 'jump'],
			]
		);
		$this->add_control(
			'from_top',
			[
				'label' 		=> __( 'Top', 'taxseco' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
			]
		);
		$this->add_control(
			'from_left',
			[
				'label' 		=> __( 'Left', 'taxseco' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
					],
				],
			]
		);
		$this->add_control(
			'from_right',
			[
				'label' 		=> __( 'Right', 'taxseco' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
					],
				],
			]
		);
		$this->add_control(
			'from_bottom',
			[
				'label' 		=> __( 'Bottom', 'taxseco' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
					],
				],
			]
		);

		$this->add_control(
			'responsive_style',
			[
				'label' 		=> esc_html__( 'Responsive Styling', 'taxseco' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT2,
				'multiple' 		=> true,
				'options' 		=> [
					'z-index-negative'  => esc_html__( 'Z Index Nagative', 'taxseco' ),
					'd-xl-block'  		=> esc_html__( 'Hide From large Device', 'taxseco' ),
					'd-lg-block'  		=> esc_html__( 'Hide From Tablet', 'taxseco' ),
					'd-md-block'  		=> esc_html__( 'Hide From Mobile', 'taxseco' ),
					'd-sm-block'  		=> esc_html__( 'D SM Block', 'taxseco' ),
					'd-none'  			=> esc_html__( 'Display None', 'taxseco' ),
					' '  				=> esc_html__( 'Default', 'taxseco' ),
				],
			]
		);
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper','class','shape-mockup');
        $this->add_render_attribute('wrapper','class', $settings['effect_style']);
        $this->add_render_attribute('wrapper','class', $settings['responsive_style']);

     //    if($settings['from_bottom']['size']){
	    //     $this->add_render_attribute( 'wrapper', 'data-bottom', $settings['from_bottom']['size'] .'%' );
	    // }
	    // if($settings['from_top']['size']){
	    //     $this->add_render_attribute( 'wrapper', 'data-top', $settings['from_top']['size'] .'%' );
	    // }
	    // if($settings['from_right']['size']){
	    //     $this->add_render_attribute( 'wrapper', 'data-right', $settings['from_right']['size'] .'%' );
	    // }
	    // if($settings['from_left']['size']){
	    //     $this->add_render_attribute( 'wrapper', 'data-left', $settings['from_left']['size'] .'%' );
	    // }

	
	    // if($settings['from_top']['size']){
	    //     $this->add_render_attribute( 'wrapper', 'style', 'top: '.$settings['from_top']['size'] .'%; ' );
	    // }
	    // if($settings['from_right']['size']){
	    //     $this->add_render_attribute( 'wrapper', 'style', 'right: '.$settings['from_right']['size'] .'%; ' );
	    // }
	    // if($settings['from_left']['size']){
	    //     $this->add_render_attribute( 'wrapper', 'style', 'left: '.$settings['from_left']['size'] .'%; ' );
	    // }
	    // if($settings['from_bottom']['size']){
	    //     $this->add_render_attribute( 'wrapper', 'style', 'bottom: '.$settings['from_bottom']['size'] .'%; ' );
	    // }


        if($settings['from_bottom']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-bottom', $settings['from_bottom']['size'] .'%' );
	    }
	    if($settings['from_top']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-top', $settings['from_top']['size'] .'%' );
	    }
	    if($settings['from_right']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-right', $settings['from_right']['size'] .'%' );
	    }
	    if($settings['from_left']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-left', $settings['from_left']['size'] .'%' );
	    }




        if( !empty( $settings['image']['id'] ) ) {
            echo '<!-- Image -->';
                echo '<div '.$this->get_render_attribute_string('wrapper').'>';
					echo '<img src="'.esc_url( $settings['image']['url']).'" alt="'.esc_html( get_bloginfo('name') ).'" >';
                echo '</div>';
            echo '<!-- End Image -->';
        }
	}
}