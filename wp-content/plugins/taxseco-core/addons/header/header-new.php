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
 * Header New Widget .
 *
 */

class Taxseco_Header_New extends Widget_Base {

	public function get_name() {
		return 'taxsecoheader2';
	}

	public function get_title() {
		return __( 'Header New', 'taxseco' );
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

		$repeater2 = new Repeater();

		$repeater2->add_control(
			'top_menu_name',
			[
				'label' 	=> __( 'Top Menu Name', 'taxseco' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 		=> __( 'Careers', 'taxseco' ),
			]
		);

		$repeater2->add_control(
			'top_menu_link',
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
			'top_menu_lists',
			[
				'label' 		=> __( 'Top Bar Menu', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'top_menu_name' => __( 'Careers','taxseco' ),
					],
				],
				'condition'		=> [ 
					'show_header_top' => [ 'yes' ],
				],
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
				'separator' 		=> 'before',
				'condition'		=> [ 
					'show_header_top' => [ 'yes' ],
				],
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
					'show_header_top' => [ 'yes' ],
					'show_social' => [ 'yes' ],
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
					'show_header_top' => [ 'yes' ],
					'show_social' => [ 'yes' ],
				],
			]
		);

		//----------------------------header middle control---------------------------//

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
			'email_text',
			[
				'label' 		=> __( 'Email Text', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Email Adress:', 'taxseco' ),
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
			'phone_text',
			[
				'label' 		=> __( 'Phone Text:', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Phone Number:', 'taxseco' ),
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
			'button_text',
			[
				'label' 		=> __( 'Button Text', 'taxseco' ),
				'type' 			=> Controls_Manager::TEXT,
				'condition'		=> [ 'show_middle_bar' => [ 'yes' ] ],
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
				'condition'		=> [ 'show_middle_bar' => [ 'yes' ] ],
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
					'{{WRAPPER}} .header-top' => 'background-color: {{VALUE}}!important',
                ],
			]
        );

       $this->add_control(
			'topbar_background_color2',
			[

				'label'     => __( 'Left Background Color', 'taxseco' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-top:before' => 'background-color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_control(
			'topbar_content_color',
			[

				'label'     => __( 'Topbar Menu Color', 'taxseco' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-links li a' => 'color: {{VALUE}}!important;',
                ],
			]
        );

       $this->add_control(
			'topbar_content_hover',
			[

				'label'     => __( 'Topbar Menu Hover', 'taxseco' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-links li a:hover' => 'color: {{VALUE}}!important;',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),

			[
				'name'      => 'topbar_content_typography',
				'label'     => __( 'Content Typography', 'taxseco' ),
                'selectors'  =>[ 
                	'{{WRAPPER}} .header-links li a',
            	]
			]
        );

        $this->add_control(
			'topbar_social_color',
			[

				'label'     => __( 'Social Color', 'taxseco' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-social a, .header-social .social-title' => 'color: {{VALUE}}!important;',
                ],
			]
        );
       $this->add_control(
			'topbar_social_hover',
			[

				'label'     => __( 'Social Hover', 'taxseco' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-social a:hover' => 'color: {{VALUE}}!important;',
                ],
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
					'{{WRAPPER}} .menu-area' => 'background-color: {{VALUE}} !important;',
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
			'top_level_menu_icon_color',
			[
				'label' 			=> __( 'Menu Icon Color', 'taxseco' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul.sub-menu li a:before' => 'color: {{VALUE}} !important;',
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

		$this->end_controls_section();

		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_color_hover',
			[
				'label' 		=> __( 'Button Color Hover', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Button Background Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_hover_color',
			[
				'label' 		=> __( 'Button Background Hover Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn:before' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .as-btn',
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border_hover',
				'label' 	=> __( 'Border Hover', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .as-btn:hover',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'taxseco' ),
                'selector' 	=> '{{WRAPPER}} .as-btn',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Button Border Radius', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .as-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Button Shadow', 'taxseco' ),
				'selector' => '{{WRAPPER}} .as-btn',
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
	                echo '<button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>';
	                if( is_active_sidebar( 'taxseco-offcanvas' ) ) :
	                    dynamic_sidebar( 'taxseco-offcanvas' );
	                endif; 
	            echo '</div>';
	        echo '</div>';
	        echo '<!-- Side menu end -->';
	    echo '<!--==============================Header Area==============================-->';
		?>
		<div class="as-header header-layout6">
			<?php if( $settings['show_header_top'] == 'yes' ): ?>
	        <div class="header-top">
	            <div class="container">
	                <div class="row justify-content-center justify-content-md-between align-items-center gy-2">
	                    <div class="col-auto d-none d-md-block">
	                        <div class="header-links">
	                            <ul>
	                            	 <?php foreach( $settings['top_menu_lists'] as $data ): ?>
	                               		 <li><a href="<?php echo esc_url($data['top_menu_link']['url']); ?>"><?php echo esc_html($data['top_menu_name']); ?></a></li>
	                              	 <?php endforeach; ?>
	                            </ul>
	                        </div>
	                    </div>
                        <?php if( ! empty( $settings['social_icon_list'] ) ): ?>
	                    <div class="col-auto">
	                        <div class="header-social">
	                             <?php if(!empty($settings['social_text'])): ?>
                                    <span class="social-title"><?php echo esc_html($settings['social_text']); ?></span>
                                 <?php endif; ?>
                                  <?php foreach( $settings['social_icon_list'] as $social_icon ):
		                          		$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
		                          		$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : ''; 
		                          	?>
	                            	<a <?php echo wp_kses_post( $social_target.$social_nofollow ); ?> href="<?php echo esc_url( $social_icon['icon_link']['url'] ); ?>">
                                    	<?php \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] ); ?>	</a>
                                   <?php endforeach; ?>
	                        </div>
	                    </div>
	                    <?php endif; ?>
	                </div>
	            </div>
	        </div>
	        <?php endif; ?>

	        <?php if( $settings['show_middle_bar'] == 'yes' ): 
	        	$email    	= $settings['email'];
		    	$phone    	= $settings['phone'];

		        $email          = is_email( $email );

		        $replace        = array(' ','-',' - ');
		        $with           = array('','','');

		        $emailurl       = str_replace( $replace, $with, $email );
		        $phoneurl       = str_replace( $replace, $with, $phone );
			?>
	        <div class="container">
	            <div class="menu-top">
	                <div class="row align-items-center justify-content-between">
	                    <div class="col-sm-auto">
	                        <div class="header-logo">
	                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                	<?php echo taxseco_img_tag( array(
					                	'url' => esc_url( $settings['logo_image']['url'] ),
					                ) ); ?>
                                </a>
	                        </div>
	                    </div>
	                    <div class="col-auto ms-auto d-none d-lg-block">
	                        <div class="info-card-wrap">
	                        	<?php if(!empty($email)): ?>
	                            <div class="info-card">
	                                <div class="info-card_icon">
	                                    <?php echo wp_kses_post($settings['email_icon']); ?>
	                                </div>
	                                <div class="info-card_content">
	                                    <p class="info-card_text"><?php echo esc_html($settings['email_text']); ?></p>
	                                    <a href="<?php echo esc_attr( 'mailto:'.$emailurl ); ?>" class="info-card_link"><?php echo esc_html($email); ?></a>
	                                </div>
	                            </div>
	                             <?php endif; ?>
	                            <?php if(!empty($phone)): ?>
	                            <div class="info-card">
	                                <div class="info-card_icon">
	                                   <?php echo wp_kses_post($settings['phone_icon']); ?>
	                                </div>
	                                <div class="info-card_content">
	                                    <p class="info-card_text"><?php echo esc_html($settings['phone_text']); ?></p>
	                                    <a href="<?php echo esc_attr( 'tel:'.$phoneurl ); ?>" class="info-card_link"><?php echo esc_html($phone); ?></a>
	                                </div>
	                            </div>
	                             <?php endif; ?>
	                        </div>
	                    </div>
	                    <?php if(!empty($settings['button_text'])): ?>
	                    <div class="col-auto ml-20 d-none d-sm-block">
	                        <div class="header-button">
                        		<a href="<?php echo esc_url( $settings['button_url']['url'] ); ?>" class="as-btn"><?php echo esc_html( $settings['button_text'] ); ?></a>
                         	</div>
	                    </div>
                        <?php endif; ?>
	                </div>
	            </div>
	        </div>
	        <?php endif; ?>

	        <div class="sticky-wrapper">
	            <div class="sticky-active">
	                <div class="container">
	                    <div class="menu-area">
	                        <div class="row justify-content-between align-items-center">
	                            <div class="col-auto">
	                                <nav class="main-menu d-none d-lg-block">
	                                   <?php 
                                        if( ! empty( $settings['taxseco_menu_select'] ) ){
											wp_nav_menu( $args );
										}  ?>
	                                </nav>
	                                <button class="as-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
	                            </div>
	                            <div class="col-auto">
	                                <div class="header-button">
	                                    <?php if( ! empty( $settings['show_language'] ) ): ?>
		                                    <div class="dropdown-link">
		                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html__('Language', 'taxseco'); ?></a>
		                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
		                                            <li>
		                                               <?php echo do_shortcode('[gtranslate]'); ?>
		                                            </li>
		                                        </ul>
		                                    </div>
		                                <?php endif; ?>

		                                <?php if( $settings['show_search_btn'] == 'yes' ): ?>
                                        	<button type="button" class="icon-btn searchBoxToggler"><i class="far fa-search"></i></button>
                                    	<?php endif; ?>

                                        <?php if( $settings['off_canvas'] == 'yes' && is_active_sidebar( 'taxseco-offcanvas' )): ?>
                                        	<a href="<?php echo esc_url('#'); ?>" class="icon-btn sideMenuToggler"><i class="far fa-bars"></i></a>
                                        <?php endif; ?>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
		<?php
	}
}