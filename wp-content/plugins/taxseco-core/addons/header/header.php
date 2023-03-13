<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Header Widget .
 *
 */
class Taxseco_Header extends Widget_Base {

	public function get_name() {
		return 'taxsecoheader';
	}
	public function get_title() {
		return __( 'Header', 'taxseco' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'taxseco_header_elements' ];
	}
	protected function register_controls() {

		$this->start_controls_section(
			'header_section',
			[
				'label' 	=> __( 'Header', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'header_style',
			[
				'label' 		=> __( 'Header Style', 'taxseco' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'taxseco' ),
					'2' 		=> __( 'Style Two', 'taxseco' ),
					'3' 		=> __( 'Style Three', 'taxseco' ),
				],
			]
		);


		$this->add_control(
			'show_header_top',
			[
				'label' 		=> __( 'Show Top Bar?', 'taxseco' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'taxseco' ),
				'label_off' 	=> __( 'Hide', 'taxseco' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(
			'show_middle_bar',
			[
				'label' 		=> __( 'Show Middle Bar?', 'taxseco' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'taxseco' ),
				'label_off' 	=> __( 'Hide', 'taxseco' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$this->add_control(

			'header_top_middle_bg_image',

			[
				'label' 		=> __( 'Header Top Middle BG Image', 'taxseco' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'topbar_slogan',
			[
				'label' 		=> __( 'Topbar Slogan', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Welcome to Taxseco Online Taxi Services', 'taxseco' ),
				'condition'		=> [ 'show_header_top' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'header_top_right_text_icon',
			[
				'label' 		=> __( 'Button Icon', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '<i class="fas fa-user"></i>', 'taxseco' ),
				'condition'		=> [ 'show_header_top' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'header_top_right_text',
			[
				'label' 		=> __( 'Button Text', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Customer Sign In', 'taxseco' ),
				'condition'		=> [ 'show_header_top' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'header_top_right_text_link',
			[
				'label' 		=> esc_html__( 'Button Link', 'taxseco' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'taxseco' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'		=> [ 'show_header_top' => [ 'yes' ] ],
			]
		);

		//----------------------------header middle control---------------------------//

		$this->add_control(
			'email_icon',
			[
				'label' 		=> __( 'Email Icon', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '<i class="icon-btn fas fa-envelope"></i>', 'taxseco' ),
				'condition'		=> [ 'show_middle_bar' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'email',
			[
				'label' 		=> __( 'Email', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'info@anob-taxi.com', 'taxseco' ),
				'condition'		=> [ 'show_middle_bar' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'phone_icon',
			[
				'label' 		=> __( 'Phone Icon', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '<i class="icon-btn fas fa-phone"></i>', 'taxseco' ),
				'condition'		=> [ 'show_middle_bar' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'phone',
			[
				'label' 		=> __( 'Phone', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '(+49) 0011-52256', 'taxseco' ),
				'condition'		=> [ 'show_middle_bar' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'address_icon',
			[
				'label' 		=> __( 'Address Icon', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '<i class="icon-btn fas fa-location-dot"></i>', 'taxseco' ),
				'condition'		=> [ 'show_middle_bar' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'address',
			[
				'label' 		=> __( 'Address', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '245, Frankfurt. Germany', 'taxseco' ),
				'condition'		=> [ 'show_middle_bar' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'address_url',
			[
				'label' 		=> __( 'Address Url', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '#', 'taxseco' ),
				'condition'		=> [ 'show_middle_bar' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'show_language',
			[
				'label' 		=> __( 'Show Language?', 'taxseco' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'taxseco' ),
				'label_off' 	=> __( 'Hide', 'taxseco' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'show_social',
			[
				'label' 		=> __( 'Show Social?', 'taxseco' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'taxseco' ),
				'label_off' 	=> __( 'Hide', 'taxseco' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'social_text',
			[
				'label' 		=> __( 'Socail Text', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Follow Us:', 'taxseco' ),
				'condition'		=> [ 
					'show_middle_bar' => [ 'yes' ],
					'show_social' => [ 'yes' ],
					'header_style' => [ '3' ],
				],
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'social_icon',
			[
				'label' 	=> __( 'Social Icon', 'taxseco' ),
				'type' 		=> Controls_Manager::ICONS,
				'default' 	=> [
					'value' 	=> 'fab fa-facebook-f',
					'library' 	=> 'solid',
				],
			]
		);

		$repeater->add_control(
			'icon_link',
			[
				'label' 		=> __( 'Link', 'taxseco' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'taxseco' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$this->add_control(

			'social_icon_list',
			[
				'label' 		=> __( 'Social Icon', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_icon' => __( 'Add Social Icon','taxseco' ),
					],
				],
				'condition'		=> [ 
					'show_middle_bar' => [ 'yes' ],
					'show_social' => [ 'yes' ],
				],
			]
		);

		//----------------------------maim menu control----------------------------//

		$this->add_control(

			'logo_image',

			[
				'label' 		=> __( 'Upload Logo', 'taxseco' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'logo_bg_image',

			[
				'label' 		=> __( 'Upload Logo Background Image', 'taxseco' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$menus = $this->taxseco_menu_select();

		if( !empty( $menus ) ){
	        $this->add_control(
				'taxseco_menu_select',
				[
					'label'     	=> __( 'Select Taxseco Menu', 'taxseco' ),
					'type'      	=> Controls_Manager::SELECT,
					'options'   	=> $menus,
					'description' 	=> sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'taxseco' ), admin_url( 'nav-menus.php' ) ),
				]
			);
		}else {
			$this->add_control(
				'no_menu',
				[
					'type' 				=> Controls_Manager::RAW_HTML,
					'raw' 				=> '<strong>' . __( 'There are no menus in your site.', 'taxseco' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'taxseco' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' 		=> 'after',
					'content_classes' 	=> 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}


		$this->add_control(
			'show_search_btn',
			[
				'label' 		=> __( 'Show Search ?', 'taxseco' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'taxseco' ),
				'label_off' 	=> __( 'Hide', 'taxseco' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' 		=> __( 'Button Text', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'button_url',
			[
				'label' 		=> esc_html__( 'Button Link', 'taxseco' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'taxseco' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$this->add_control(
			'off_canvas',
			[
				'label' 		=> __( 'Show Off Canvas ?', 'taxseco' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'taxseco' ),
				'label_off' 	=> __( 'Hide', 'taxseco' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

        $this->end_controls_section();
       //-----------------------------------Topbar Styling-------------------------------------//
        $this->start_controls_section(
			'topbar_styling',
			[
				'label'     => __( 'Topbar Styling', 'taxseco' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'topbar_background_color',
			[

				'label'     => __( 'Background Color', 'taxseco' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-layout2 .header-top' => 'background-color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_control(

			'topbar_content_color',
			[

				'label'     => __( 'Topbar Content Color', 'taxseco' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-layout2 .header-top' => '--body-color: {{VALUE}}!important;',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),

			[
				'name'      => 'topbar_content_typography',
				'label'     => __( 'Content Typography', 'taxseco' ),
                'selectors'  =>[ 
                	'{{WRAPPER}} .header-layout2 .header-top',
            	]
			]
        );

        
        $this->end_controls_section();

        //-----------------------------------Menubar Styling-------------------------------------//
        $this->start_controls_section(
			'menubar_styling',
			[
				'label'     => __( 'Menubar Styling', 'taxseco' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'top_level_menu_bg_color',
			[
				'label' 		=> __( 'Menu Background Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu' => 'background-color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_txt_color',
			[
				'label' 			=> __( 'Menu Text Color', 'taxseco' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_hover_color',
			[
				'label' 			=> __( 'Menu Hover Color', 'taxseco' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu > ul > li > a:hover' => 'background-color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_hover_txt_color',
			[
				'label' 			=> __( 'Menu Hover Text Color', 'taxseco' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul > li > a:hover' => 'color: {{VALUE}} !important;',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_hover_bottom_color',
			[
				'label' 			=> __( 'Menu Bottom Hover Color', 'taxseco' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .menu-style1 > ul > li > a::before' => 'background-color: {{VALUE}} !important;',
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'top_level_menu_typography',
				'label' 		=> __( 'Menu Typography', 'taxseco' ),
                'selector' 		=> '{{WRAPPER}} .main-menu ul > li > a',
			]
		);

        $this->add_responsive_control(
			'top_level_menu_margin',
			[
				'label' 		=> __( 'Menu Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
        );

        $this->add_responsive_control(
			'top_level_menu_padding',
			[
				'label' 		=> __( 'Menu Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
		);

		$this->add_control(
			'top_level_menu_height',
			[
				'label' 		=> __( 'Height', 'taxseco' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 	=> [
					'px' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
						'max'	=> 500
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-menu ul > li > a' => 'height: {{SIZE}}{{UNIT}} !important;line-height: {{SIZE}}{{UNIT}} !important;'
                ]
			]
		);
		$this->end_controls_section();
    }

    public function taxseco_menu_select(){
	    $taxseco_menu = wp_get_nav_menus();
	    $menu_array  = array();
		$menu_array[''] = __( 'Select A Menu', 'evona' );
	    foreach( $taxseco_menu as $menu ){
	        $menu_array[ $menu->slug ] = $menu->name;
	    }
	    return $menu_array;
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $taxseco_avaiable_menu   = $this->taxseco_menu_select();

		if( ! $taxseco_avaiable_menu ){
			return;
		}

		$args = [
			'menu' 			=> $settings['taxseco_menu_select'],
			'menu_class' 	=> 'evona-menu',
			'container' 	=> '',
		];

	    echo '<!--=========================Mobile Menu========================= -->';
	    echo taxseco_mobile_menu();

	    echo taxseco_search_box();

	    echo '<!--============================Sidemenu============================ -->';

	        echo '<!-- Side menu start -->';
	        echo '<div class="sidemenu-wrapper d-none d-lg-block">';
	            echo '<div class="sidemenu-content bg-title">';
	                echo '<button class="closeButton sideMenuCls"><i class="fas fa-times"></i></button>';
	                if( is_active_sidebar( 'taxseco-offcanvas' ) ) :
	                    dynamic_sidebar( 'taxseco-offcanvas' );
	                endif; 
	            echo '</div>';
	        echo '</div>';
	        echo '<!-- Side menu end -->';
	    echo '<!--==============================Header Area==============================-->';

	    if($settings['header_style'] == 1) {
		    echo '<div class="as-header header-layout2">';
                	if( ! empty( $settings['header_top_middle_bg_image']['url'] ) ){
					 	echo '<div class="top-area" data-bg-src="'.esc_url( $settings['header_top_middle_bg_image']['url'] ).'">';
					}  

		        	if( $settings['show_header_top'] == 'yes' ){
			            echo '<div class="header-top">';
			                echo '<div class="container">';
			                    echo '<div class="row justify-content-center justify-content-md-between align-items-center">';
			                    	if(!empty($settings['topbar_slogan'])){
				                        echo '<div class="col-auto">';
				                            echo '<p class="header-notice">'.esc_html($settings['topbar_slogan']).'</p>';
				                        echo '</div>';
				                    }
				                    if(!empty($settings['header_top_right_text'])){
				                        echo '<div class="col-auto d-none d-md-block">';
				                            echo '<div class="header-links">';
				                                echo '<ul>';
				                                    echo '<li>'.wp_kses_post($settings['header_top_right_text_icon']).'<a href="'.esc_url( $settings['header_top_right_text_link']['url'] ).'">'.esc_html($settings['header_top_right_text']).'</a></li>';
				                                echo '</ul>';
				                            echo '</div>';

				                        echo '</div>';
				                    }
			                    echo '</div>';
			                echo '</div>';
			            echo '</div>';
			        }



			        if( $settings['show_middle_bar'] == 'yes' ){
			        	$email    	= $settings['email'];
			        	$phone    	= $settings['phone'];

		                $email          = is_email( $email );

		                $replace        = array(' ','-',' - ');
		                $with           = array('','','');

		                $emailurl       = str_replace( $replace, $with, $email );
		                $phoneurl       = str_replace( $replace, $with, $phone );

			            echo '<div class="menu-top">';
			                echo '<div class="container">';
			                    echo '<div class="row align-items-center justify-content-center justify-content-sm-between">';
			                        echo '<div class="col-auto d-none d-sm-block">';


				                        if(!empty($phone)){	    
				                            echo '<a class="header-link" href="'.esc_attr( 'tel:'.$phoneurl ).'"><span class="icon-btn">'.wp_kses_post($settings['phone_icon']).'</span>'.esc_html($phone).'</a>';
				                        }
				                        if(!empty($email)){	 
				                            echo '<a class="header-link d-none d-lg-inline-block" href="'.esc_attr( 'mailto:'.$emailurl ).'"><span class="icon-btn">'.wp_kses_post($settings['email_icon']).'</span>'.esc_html($email).'</a>';
				                        }
				                        if(!empty($settings['address'])){	
				                            echo '<a class="header-link d-none d-xl-inline-block" href="'.esc_url($settings['address_url']).'"><span class="icon-btn">'.wp_kses_post($settings['address_icon']).'</span>'.esc_html($settings['address']).'</a>';
				                        }
			                        echo '</div>';
			                        if( ! empty( $settings['social_icon_list'] ) ){
				                        echo '<div class="col-auto">';
				                            echo '<div class="as-social">';
				                                foreach( $settings['social_icon_list'] as $social_icon ){
						                          	$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
						                          	$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

						                            echo '<a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

						                            \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

						                          	echo '</a> ';
						                      	}
				                            echo '</div>';
				                        echo '</div>';
				                    }
			                    echo '</div>';
			                echo '</div>';
			            echo '</div>';
			        }


		        echo '</div>';
		        echo '<div class="sticky-wrapper">';
		            echo '<div class="sticky-active">';
		                echo '<div class="menu-area">';
		                    echo '<div class="container">';
		                        echo '<div class="row align-items-center justify-content-between">';
		                        	if( ! empty( $settings['logo_image']['url'] ) ){
							            echo '<div class="col-auto">';
								            echo '<div class="header-logo">';
								                echo '<a href="'.esc_url( home_url( '/' ) ).'">';
													echo taxseco_img_tag( array(
							                        	'url' => esc_url( $settings['logo_image']['url'] ),
							                        ) );
												echo '</a>';

								            echo '</div>';
							            echo '</div>';
							        }
		                            echo '<div class="col-auto">';
		                                echo '<div class="row align-items-center justify-content-between">';
		                                    echo '<div class="col-auto">';
		                                        echo '<nav class="main-menu d-none d-lg-inline-block">';
			                                        if( ! empty( $settings['taxseco_menu_select'] ) ){
														wp_nav_menu( $args );
													} 
		                                        echo '</nav>';
		                                        echo '<button type="button" class="as-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>';
		                                    echo '</div>';
		                                    echo '<div class="col-auto d-none d-xxl-block">';
		                                        echo '<div class="header-button">';
		                                        	if( $settings['show_search_btn'] == 'yes' ){
			                                            echo '<button type="button" class="icon-style2 searchBoxToggler"><i class="fas fa-search"></i></button>';
			                                        }

				                    				if(!empty($settings['button_text'])){
			                                            echo '<a href="'.esc_url( $settings['button_url']['url'] ).'" class="as-btn style6 style-skew"><span class="btn-text">'.esc_html($settings['button_text']).'</span></a>';
			                                        }
			                                        if( $settings['off_canvas'] == 'yes' && is_active_sidebar( 'taxseco-offcanvas' )){
			                                            echo '<a href="'.esc_url('#').'" class="simple-icon sideMenuToggler"><i class="fa-solid fa-grid"></i></a>';
			                                        }

		                                        echo '</div>';
		                                    echo '</div>';
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';		                    
				            if( ! empty( $settings['logo_bg_image']['url'] ) ){
							 	echo '<div class="logo-shape" data-bg-src="'.esc_url( $settings['logo_bg_image']['url'] ).'"></div>';
							} 		                    
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}elseif($settings['header_style'] == 3) {
			?>
			<header class="as-header header-layout1">
				<?php if( $settings['show_header_top'] == 'yes' ): 

			    	$email    	= $settings['email'];
			    	$phone    	= $settings['phone'];

			        $email          = is_email( $email );

			        $replace        = array(' ','-',' - ');
			        $with           = array('','','');

			        $emailurl       = str_replace( $replace, $with, $email );
			        $phoneurl       = str_replace( $replace, $with, $phone );
					?>
		        <div class="header-top">
		            <div class="container">
		                <div class="row justify-content-center justify-content-md-between align-items-center gy-2">
		                    <div class="col-auto d-none d-md-block">
		                        <div class="header-links">
		                            <ul>
		                            	<?php if(!empty($phone)): ?>
		                                <li>
		                                	<?php echo wp_kses_post($settings['phone_icon']); ?>
		                                	<a href="<?php echo esc_attr( 'tel:'.$phoneurl ); ?>"><?php echo esc_html($phone); ?></a>
		                                </li>
		                                <?php endif; ?>
		                                <?php if(!empty($settings['address'])): ?>
		                                <li class="d-none d-xl-inline-block">
		                                	<?php echo wp_kses_post($settings['address_icon']); ?>
		                                	<a href="<?php echo esc_url($settings['address_url']); ?>"><?php echo esc_html($settings['address']); ?></a>
		                                </li>
		                                <?php endif; ?>
		                                <?php if(!empty($email)): ?>
		                                <li>
		                                	<?php echo wp_kses_post($settings['email_icon']); ?>
		                                	<a href="<?php echo esc_attr( 'mailto:'.$emailurl ); ?>"><?php echo esc_html($email); ?></a>
		                                </li>
		                                <?php endif; ?>
		                            </ul>
		                        </div>
		                    </div>
		                    <div class="col-auto">
		                        <div class="header-links">
		                            <ul>
		                            	<?php if( ! empty( $settings['show_language'] ) ): ?>
		                                <li class="d-none d-lg-inline-block">
		                                    <div class="dropdown-link">
		                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html__('Language', 'taxseco'); ?></a>
		                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
		                                            <li>
		                                               <?php echo do_shortcode('[gtranslate]'); ?>
		                                            </li>
		                                        </ul>
		                                    </div>
		                                </li>
		                                <?php endif; ?>
		                                <?php if( ! empty( $settings['social_icon_list'] ) ): ?>
		                                <li>
		                                    <div class="header-social">
		                                    	<?php if(!empty($settings['social_text'])): ?>
		                                        <span class="social-title"><?php echo esc_html($settings['social_text']); ?></span>
		                                        <?php endif; ?>
		                                        <?php foreach( $settings['social_icon_list'] as $social_icon ):
					                          		$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
					                          		$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : ''; 
					                          	?>
		                                        <a <?php echo wp_kses_post( $social_target.$social_nofollow ); ?> href="<?php echo esc_url( $social_icon['icon_link']['url'] ); ?>">
		                                        	<?php \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] ); ?>		                                        </a>
		                                    	<?php endforeach; ?>
		                                    </div>
		                                </li>
		                                <?php endif; ?>
		                            </ul>
		                        </div>

		                    </div>
		                </div>
		            </div>
		        </div>
		    	<?php endif; ?>

		        <div class="sticky-wrapper">
		            <div class="sticky-active">
		                <!-- Main Menu Area -->
		                <div class="menu-area" data-bg-src="<?php echo esc_url( $settings['header_top_middle_bg_image']['url'] ); ?>">
		                    <div class="container">
		                        <div class="row align-items-center justify-content-between">
		                            <div class="col-auto">
		                                <div class="header-logo">
		                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		                                    	<?php echo taxseco_img_tag( array(
								                	'url' => esc_url( $settings['logo_image']['url'] ),
								                ) ); ?>
		                                    </a>
		                                </div>
		                            </div>
		                            <div class="col-auto">
		                                <div class="row align-items-center">
		                                    <div class="col-auto">
		                                        <nav class="main-menu d-none d-lg-inline-block">
		                                            <?php 
		                                            if( ! empty( $settings['taxseco_menu_select'] ) ){
														wp_nav_menu( $args );
													}  ?>
		                                        </nav>
		                                        <button type="button" class="as-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>
		                                    </div>
		                                    <div class="col-auto d-none d-xxl-block">
		                                        <div class="header-button">
		                                        	<?php if( $settings['show_search_btn'] == 'yes' ): ?>
		                                            <button type="button" class="icon-style2 searchBoxToggler"><i class="fas fa-search"></i></button>
		                                        	<?php endif; ?>
		                                        	<?php if(!empty($settings['button_text'])): ?>
		                                            <a href="<?php echo esc_url( $settings['button_url']['url'] ); ?>" class="as-btn style3 style-skew"><span class="btn-text"><?php echo esc_html( $settings['button_text'] ); ?></span></a>
		                                            <?php endif; ?>
		                                            <?php if( $settings['off_canvas'] == 'yes' && is_active_sidebar( 'taxseco-offcanvas' )): ?>
		                                            <a href="<?php echo esc_url('#'); ?>" class="simple-icon sideMenuToggler"><i class="fa-solid fa-grid"></i></a>
		                                            <?php endif; ?>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="logo-shape"></div>
		                </div>
		            </div>
		        </div>
		    </header>
			<?php
		}else{
	    echo '<!--==============================Header Area==============================-->';
	    echo '<div class="as-header header-layout3">';
		if( $settings['show_header_top'] == 'yes' ){
    	$email    	= $settings['email'];
    	$phone    	= $settings['phone'];

        $email          = is_email( $email );

        $replace        = array(' ','-',' - ');
        $with           = array('','','');

        $emailurl       = str_replace( $replace, $with, $email );
        $phoneurl       = str_replace( $replace, $with, $phone );
	        echo '<div class="header-top">';
	            echo '<div class="container">';
	                echo '<div class="row gx-0 justify-content-center justify-content-md-between align-items-center">';
					 	if(!empty($settings['topbar_slogan'])){
					        echo '<div class="col-auto">';	                   
		                        echo '<div class="top-left">';
		                            echo '<p class="header-notice">'.esc_html($settings['topbar_slogan']).'</p>';
		                        echo '</div>';
					        echo '</div>';
					    }

	                    echo '<div class="col-auto d-none d-md-block">';
	                        echo '<div class="top-right">';
	                            echo '<div class="row gx-0 align-items-center justify-content-between">';

	                                echo '<div class="col-auto">';
	                                    echo '<div class="header-links">';
	                                        echo '<ul>';
	                                        	if(!empty($phone)){	 
	                                            	echo '<li class="d-none d-lg-inline-block">'.wp_kses_post($settings['phone_icon']).'<a href="'.esc_attr( 'tel:'.$phoneurl ).'">'.esc_html($phone).'</a></li>';
	                                            }
	                                            if(!empty($settings['address'])){
	                                            echo '<li class="d-none d-xxl-inline-block"><a href="'.esc_url($settings['address_url']).'">'.wp_kses_post($settings['address_icon']).''.esc_html($settings['address']).'</a></li>';
	                                            }
	                                            if(!empty($email)){	 
	                                            echo '<li>'.wp_kses_post($settings['email_icon']).'<a href="'.esc_attr( 'mailto:'.$emailurl ).'">'.esc_html($email).'</a></li>';
	                                            }
	                                        echo '</ul>';
	                                    echo '</div>';
	                                echo '</div>';
			                        if( ! empty( $settings['social_icon_list'] ) ){
				                     echo '<div class="col-auto">';
			                            echo '<div class="header-social">';
			                                foreach( $settings['social_icon_list'] as $social_icon ){
					                          	$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
					                          	$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

					                            echo '<a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

					                            \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

					                          	echo '</a> ';
					                      	}
			                            echo '</div>';
				                    echo '</div>';
				                    }

	                            echo '</div>';
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
		}

	        echo '<div class="sticky-wrapper">';
	            echo '<div class="sticky-active">';
	                echo '<div class="container">';
	                    echo '<div class="row gx-0 justify-content-between">';
							if( ! empty( $settings['logo_image']['url'] ) ){
							    echo '<div class="col-auto">';
							        echo '<div class="header-logo">';
							            echo '<a href="'.esc_url( home_url( '/' ) ).'">';
											echo taxseco_img_tag( array(
							                	'url' => esc_url( $settings['logo_image']['url'] ),
							                ) );
										echo '</a>';

							        echo '</div>';
							    echo '</div>';
							}
	                        echo '<div class="col-auto">';
	                            echo '<div class="menu-area">';
	                                echo '<div class="row gx-0 align-items-center justify-content-between">';
	                                    echo '<div class="col-auto">';
	                                        echo '<nav class="main-menu d-none d-lg-inline-block">';                               
                                          		if( ! empty( $settings['taxseco_menu_select'] ) ){
														wp_nav_menu( $args );
													} 
	                                        echo '</nav>';
	                                        echo '<button type="button" class="as-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>';
	                                    echo '</div>';
	                                    echo '<div class="col-auto d-none d-xxl-block">';
	                                        echo '<div class="header-button">';
			                                 	if( $settings['show_search_btn'] == 'yes' ){
												echo '<button type="button" class="icon-style2 searchBoxToggler"><i class="fas fa-search"></i></button>';
												}
	                                          	if( $settings['off_canvas'] == 'yes' && is_active_sidebar( 'taxseco-offcanvas' )){
												echo '<a href="'.esc_url('#').'" class="simple-icon sideMenuToggler"><i class="fa-solid fa-grid"></i></a>';
												}

	                                        echo '</div>';
	                                    echo '</div>';
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
	    echo '</div>';
		}		
	}
}