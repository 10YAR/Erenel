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
class Taxseco_Group_Image extends Widget_Base {

	public function get_name() {
		return 'taxsecogroupimage';
	}

	public function get_title() {
		return __( 'Taxseco Group Image 2', 'taxseco' );
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
				'label' 	=> __( 'Group Image', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'iamge_style',
			[
				'label' 	=> __( 'Group Style', 'taxseco' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'taxseco' ),
					'2' 		=> __( 'Style Two', 'taxseco' ),
					'3' 		=> __( 'Style Three', 'taxseco' ),
					'4' 		=> __( 'Style Four', 'taxseco' ),
					'5' 		=> __( 'Style Five', 'taxseco' ),
					'6' 		=> __( 'Style Six', 'taxseco' ),
					'7' 		=> __( 'Style Seven', 'taxseco' ),
					'8' 		=> __( 'Style Eight', 'taxseco' ),
				],
			]
		);

        $this->add_control(
			'image1',
			[
				'label' 		=> __( 'Image 1', 'taxseco' ),
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
			'image2',
			[
				'label' 		=> __( 'Image 2', 'taxseco' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> ['iamge_style!' => '7']
			]
		);
		$this->add_control(
			'image3',
			[
				'label' 		=> __( 'Image 3', 'taxseco' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> ['iamge_style' => '3']
			]
		);
		$this->add_control(
			'vdo_url',
			[
				'label' 		=> __( 'Video Url', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'condition'	=> ['iamge_style' => '1']
			]
		);
		$this->add_control(
			'phone_label',
			[
				'label' 		=> __( 'Phone Label', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'condition'	=> ['iamge_style' => '2']
			]
		);
		$this->add_control(
			'phone',
			[
				'label' 		=> __( 'Phone', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'condition'	=> ['iamge_style' => '2']
			]
		);

		$this->add_control(
			'counter_number',
			[
				'label'     => __( 'Counter Number', 'taxseco' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( '25', 'taxseco' ),
				'condition'	=> ['iamge_style' => '8']
			]
		);
		$this->add_control(
			'counter_number_after',
			[
				'label'     => __( 'Counter After Text', 'taxseco' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( '25', 'taxseco' ),
				'condition'	=> ['iamge_style' => '8']
			]
		);
		$this->add_control(
			'counter_text',
			[
				'label'     => __( 'Counter Text', 'taxseco' ),
				'type'      => Controls_Manager::TEXTAREA,
				'rows' 		=> 2,
				'default' 	=> __( 'Years Of Experience', 'taxseco' ),
				'condition'	=> ['iamge_style' => '8']
			]
		);
		
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['iamge_style'] == '1' ){
        	$class = 'img-box2';
        }elseif( $settings['iamge_style'] == '2' ){
        	$class = 'img-box1';
        }elseif( $settings['iamge_style'] == '3' ){
        	$class = 'img-box3';
        }elseif( $settings['iamge_style'] == '4' ){
        	$class = 'img-box4';
        }else{
        	$class = 'ow';
        }

        if($settings['iamge_style'] == '8'){ 
		?>
		<div class="img-box4 style2">
            <div class="img1 1">
                  <?php  echo taxseco_img_tag( array(
	                    'url'   => esc_url( $settings['image1']['url']  ),
	                )); ?>
            </div>
            <div class="img2 2">
                  <?php  echo taxseco_img_tag( array(
	                    'url'   => esc_url( $settings['image2']['url']  ),
	                )); ?>
            </div>
            <div class="as-experience">
                <h3 class="experience-year"><span class="counter-number"><?php echo esc_html( $settings['counter_number'] ); ?></span><?php echo esc_html( $settings['counter_number_after'] ); ?></h3>
                <p class="experience-text"><?php echo esc_html( $settings['counter_text'] ); ?></p>
            </div>
        </div>
			
	    <?php
	    }elseif($settings['iamge_style'] == '7'){ 
	    	?>
	    	<div class="shape-img1">
	            <?php  echo taxseco_img_tag( array(
		                    'url'   => esc_url( $settings['image1']['url']  ),
		                )); ?>
	            <div class="shape"></div>
	        </div>
	    <?php

	    }else{
	    	echo '<div class="'.esc_attr($class).'">';
		        if(!empty($settings['image1']['url'])){
		            echo '<div class="img1">';
		                echo taxseco_img_tag( array(
		                    'url'   => esc_url( $settings['image1']['url']  ),
		                ));
		            echo '</div>';
		        }
		        if(!empty($settings['image2']['url'])){
		            echo '<div class="img2">';
		                echo taxseco_img_tag( array(
		                    'url'   => esc_url( $settings['image2']['url']  ),
		                ));
		            echo '</div>';
		        }
		        if(!empty($settings['image3']['url'])){
		            echo '<div class="img3">';
		                echo taxseco_img_tag( array(
		                    'url'   => esc_url( $settings['image3']['url']  ),
		                ));
		            echo '</div>';
		        }
		        if(!empty($settings['vdo_url'])){
			        echo '<a href="'.esc_url($settings['vdo_url']).'" class="play-btn popup-video"><i class="fas fa-play"></i></a>';
			    }
			    if(!empty($settings['phone_label']  &&  $settings['phone'] )){
				    echo '<div class="info-card">';
		                echo '<div class="info-card_icon text-title"><i class="fas fa-phone"></i></div>';
		                echo '<div class="info-card_content">';
		                    echo '<p class="info-card_text text-white">'.esc_html($settings['phone_label']).'</p>';
		                    echo '<a href="tel:'.esc_url($settings['phone']).'" class="info-card_link text-white">'.esc_html($settings['phone']).'</a>';
		                echo '</div>';
		            echo '</div>';
		        }
	        echo '</div>'; 
	    }



	}

}