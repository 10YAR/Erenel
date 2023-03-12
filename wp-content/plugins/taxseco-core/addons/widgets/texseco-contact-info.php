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
 * Contact Tab Widget .
 *
 */
class Taxseco_Contact_Info extends Widget_Base {

	public function get_name() {
		return 'taxsecocontactinfo';
	}

	public function get_title() {
		return __( 'Taxseco Contact Info', 'taxseco' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'taxseco' ];
	}

	protected function register_controls() {


		$this->start_controls_section(
			'contact_information',
			[
				'label' 	=> __( 'Contact Information', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'information_style',
			[
				'label' 		=> __( 'Information Style', 'mechon' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'mechon' ),
					'2' 		=> __( 'Style Two', 'mechon' ),
					'3' 		=> __( 'Style Three', 'mechon' ),
				],
			]
		);


        $this->end_controls_section();


        $this->start_controls_section(
			'phone_section',
			[
				'label' 	=> __( 'Phone Info', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'phone_contact_label',
			[
				'label'     => __( 'Phone Label', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'phone_contact_info',
			[
				'label'     => __( 'Phone Info', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'phone_icon',
			[
				'label'     => __( 'Icon Class For Phone', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->end_controls_section();


        $this->start_controls_section(
			'email_section',
			[
				'label' 	=> __( 'Email Info', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'email_contact_label',
			[
				'label'     => __( 'Email Label', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'email_contact_info',
			[
				'label'     => __( 'Email Info', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'email_icon',
			[
				'label'     => __( 'Icon Class For Email', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->end_controls_section();
        

        $this->start_controls_section(
			'address_section',
			[
				'label' 	=> __( 'Adress Info', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'address_contact_label',
			[
				'label'     => __( 'Address Label', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'address_contact_info',
			[
				'label'     => __( 'Address Info', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'address_icon',
			[
				'label'     => __( 'Icon Class For Address', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->end_controls_section();

         /*-----------------------------------------Icon styling------------------------------------*/

		$this->start_controls_section(
			'icon_style_section',
			[
				'label' 	=> __( 'Icon Style', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'icon_color',
			[
				'label' 		=> __( 'BG Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .info-card_icon i'	=> '--theme-color: {{VALUE}}!important;',
				],
			]
        );
        $this->end_controls_section();

                /*----------------------------------------- Content styling------------------------------------*/

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
					'{{WRAPPER}} .style3 .info-card_link'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'content_h_color',
			[
				'label' 		=> __( 'Hover Color', 'appku' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .style3 .info-card_link:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'content_typography',
		 		'label' 		=> __( 'Typography', 'appku' ),
		 		'selector' 	=> '{{WRAPPER}} .style3 .info-card_link',
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();



        if( $settings['information_style'] == '1' ){
	        echo '<div class="as-widget-about">';
	        	if(!empty($settings['phone_contact_label'] && $settings['phone_contact_info'] && $settings['phone_icon'])){

	        		$phone    	= $settings['phone_contact_info'];

	                $replace        = array(' ','-',' - ');
	                $with           = array('','','');

	                $phonelurl       = str_replace( $replace, $with, $phone );

	        		echo '<h4 class="footer-info-title">'.esc_html($settings['phone_contact_label']).'</h4>';
	        		echo '<p class="footer-info">'.wp_kses_post($settings['phone_icon']).'<a class="text-inherit" href="'.esc_attr( 'tel:'.$phonelurl ).'">'.esc_html($settings['phone_contact_info']).'</a></p>';
	        	}

	        	if(!empty($settings['email_contact_label'] && $settings['email_contact_info'] && $settings['email_icon'])){

	        		$email    	= $settings['email_contact_info'];

	                $email          = is_email( $email );

	                $replace        = array(' ','-',' - ');
	                $with           = array('','','');

	                $emaillurl       = str_replace( $replace, $with, $email );

	        		echo '<h4 class="footer-info-title">'.esc_html($settings['email_contact_label']).'</h4>';
	        		echo '<p class="footer-info">'.wp_kses_post($settings['phone_icon']).'<a class="text-inherit" href="'.esc_attr( 'mailto:'.$emaillurl ).'">'.esc_html($settings['email_contact_info']).'</a></p>';
	        	}

	        	if(!empty($settings['address_contact_label'] && $settings['address_contact_info'] && $settings['address_icon'])){

	        		echo '<h4 class="footer-info-title">'.esc_html($settings['address_contact_label']).'</h4>';
	        		echo '<p class="footer-info">'.wp_kses_post($settings['phone_icon']).esc_html($settings['address_contact_info']).'</p>';
	        	}
		    echo '</div>'; 
		}elseif( $settings['information_style'] == '2' ){
			echo '<!--==============================Contact Info Area==============================-->';
		    echo '<div class="contact-information-area">';
		        echo '<div class="container">';
		            echo '<div class="contact-info-wrap">';
			        	if(!empty($settings['email_contact_label'] && $settings['email_contact_info'] && $settings['email_icon'])){
			        		$email    	= $settings['email_contact_info'];
			                $email          = is_email( $email );
			                $replace        = array(' ','-',' - ');
			                $with           = array('','','');
			                $emaillurl       = str_replace( $replace, $with, $email );
			                echo '<div class="info-card style3">';
			                    echo '<div class="info-card_icon">';
			                        echo wp_kses_post($settings['email_icon']);
			                    echo '</div>';
			                    echo '<div class="info-card_content">';
			                        echo '<p class="info-card_text">'.esc_html($settings['email_contact_label']).'</p>';
			                        echo '<a href="'.esc_attr( 'mailto:'.$emaillurl ).'" class="info-card_link">'.esc_html($settings['email_contact_info']).'</a>';
			                    echo '</div>';
			                echo '</div>';
			        	}
			        	if(!empty($settings['phone_contact_label'] && $settings['phone_contact_info'] && $settings['phone_icon'])){
			        		$phone    	= $settings['phone_contact_info'];
			                $replace        = array(' ','-',' - ');
			                $with           = array('','','');
			                $phonelurl       = str_replace( $replace, $with, $phone );
			                echo '<div class="info-card style3">';
			                    echo '<div class="info-card_icon">';
			                        echo wp_kses_post($settings['phone_icon']);
			                    echo '</div>';
			                    echo '<div class="info-card_content">';
			                        echo '<p class="info-card_text">'.esc_html($settings['phone_contact_label']).'</p>';
			                        echo '<a href="'.esc_attr( 'tel:'.$phonelurl ).'" class="info-card_link">'.esc_html($settings['phone_contact_info']).'</a>';
			                    echo '</div>';
			                echo '</div>';
			        	}
			        	if(!empty($settings['address_contact_label'] && $settings['address_contact_info'] && $settings['address_icon'])){
			                echo '<div class="info-card style3">';
			                    echo '<div class="info-card_icon">';
			                        echo wp_kses_post($settings['address_icon']);
			                    echo '</div>';
			                    echo '<div class="info-card_content">';
			                        echo '<p class="info-card_text">'.esc_html($settings['address_contact_label']).'</p>';
			                        echo '<a href="'.esc_html($settings['address_contact_info']).'" class="info-card_link">'.esc_html($settings['address_contact_info']).'</a>';
			                    echo '</div>';
			                echo '</div>';
			        	}
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}else{
			echo '<div class="z-index-common" data-pos-for=".footer-wrapper" data-sec-pos="bottom-half">';
			echo '<div class="container">';
	            echo '<div class="contact-card" data-bg-src="'.TAXSECO_PLUGDIRURI . 'assets/img/pattern_bg_3.png">';
	            	if(!empty($settings['email_contact_label'] && $settings['email_contact_info'] && $settings['email_icon'])){
			        		$email    	= $settings['email_contact_info'];
			                $email          = is_email( $email );
			                $replace        = array(' ','-',' - ');
			                $with           = array('','','');
			                $emaillurl       = str_replace( $replace, $with, $email );
			                echo '<div class="info-card style3">';
			                    echo '<div class="info-card_icon">';
			                        echo wp_kses_post($settings['email_icon']);
			                    echo '</div>';
			                    echo '<div class="info-card_content">';
			                        echo '<p class="info-card_text">'.esc_html($settings['email_contact_label']).'</p>';
			                        echo '<a href="'.esc_attr( 'mailto:'.$emaillurl ).'" class="info-card_link">'.esc_html($settings['email_contact_info']).'</a>';
			                    echo '</div>';
			                echo '</div>';
			        	}
			        	if(!empty($settings['phone_contact_label'] && $settings['phone_contact_info'] && $settings['phone_icon'])){
			        		$phone    	= $settings['phone_contact_info'];
			                $replace        = array(' ','-',' - ');
			                $with           = array('','','');
			                $phonelurl       = str_replace( $replace, $with, $phone );
			                echo '<div class="info-card style3 active">';
			                    echo '<div class="info-card_icon">';
			                        echo wp_kses_post($settings['phone_icon']);
			                    echo '</div>';
			                    echo '<div class="info-card_content">';
			                        echo '<p class="info-card_text">'.esc_html($settings['phone_contact_label']).'</p>';
			                        echo '<a href="'.esc_attr( 'tel:'.$phonelurl ).'" class="info-card_link">'.esc_html($settings['phone_contact_info']).'</a>';
			                    echo '</div>';
			                echo '</div>';
			        	}
			        	if(!empty($settings['address_contact_label'] && $settings['address_contact_info'] && $settings['address_icon'])){
			                echo '<div class="info-card style3">';
			                    echo '<div class="info-card_icon">';
			                        echo wp_kses_post($settings['address_icon']);
			                    echo '</div>';
			                    echo '<div class="info-card_content">';
			                        echo '<p class="info-card_text">'.esc_html($settings['address_contact_label']).'</p>';
			                        echo '<a href="" class="info-card_link">'.esc_html($settings['address_contact_info']).'</a>';
			                    echo '</div>';
			                echo '</div>';
			        	}
	            echo '</div>';
	        echo '</div>';
	        echo '</div>';
		}
	}
}