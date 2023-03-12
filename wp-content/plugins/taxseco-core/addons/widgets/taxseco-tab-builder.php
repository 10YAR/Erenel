<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Tab Builder Widget .
 *
 */
class Taxseco_Tab_Builder extends Widget_Base {

	public function get_name() {
		return 'taxsecotabbuilder';
	}

	public function get_title() {
		return __( 'Tab Builder', 'taxseco' );
	}

	public function get_icon() {
		return 'as-icon';
    }

    public function get_categories() {
		return [ 'taxseco' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'tab_builder_section',
			[
				'label' 	=> __( 'Tab Builder', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$repeater = new Repeater();

        $repeater->add_control(
			'tab_builder_text',
			[
				'label' 	=> __( 'Tab Builder Title', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Ut fermentum massa justo', 'taxseco' )
			]
        );

		$repeater->add_control(
			'taxseco_tab_builder_option',
			[
				'label'     => __( 'Tab Name', 'taxseco' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $this->taxseco_tab_builder_choose_option(),
				'default'	=> ''
			]
		);

		$this->add_control(
			'tab_builder_repeater',
			[
				'label' 		=> __( 'Tab', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'tab_builder_text'    => __( 'Case', 'taxseco' ),
					],
					[
						'tab_builder_text'    => __( 'Criminal', 'taxseco' ),
					],
				],
				'title_field' 	=> '{{{ tab_builder_text }}}',
			]
		);

      $this->end_controls_section();

      /*-----------------------------------------Tab styling------------------------------------*/

      $this->start_controls_section(
			'general_style',
			[
				'label' 	=> __( 'Tab Style', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tab-menu4 button' => 'color: {{VALUE}}!important;',
                ]
			]
      );

		$this->add_control(
			'title_color2',
			[
				'label' 		=> __( 'Hover Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .tab-menu4 button:hover, .tab-menu4 button.active'	=> 'color: {{VALUE}}!important;',
				],
			]
      );

      $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'title_typography',
		 		'label' 		=> __( 'Typography', 'taxseco' ),
		 		'selector' 	=> '{{WRAPPER}} .tab-menu4 button',
			]
		);

		

		$this->end_controls_section();


    }

	public function taxseco_tab_builder_choose_option(){

		$taxseco_post_query = new WP_Query( array(
			'post_type'				=> 'taxseco_tab_builder',
			'posts_per_page'	    => -1,
		) );

		$taxseco_tab_builder_title = array();
		$taxseco_tab_builder_title[''] = __( 'Select a Tab','taxseco');

		while( $taxseco_post_query->have_posts() ) {
			$taxseco_post_query->the_post();
			$taxseco_tab_builder_title[ get_the_ID() ] =  get_the_title();
		}
		wp_reset_postdata();

		return $taxseco_tab_builder_title;

	}

	protected function render() {

    $settings = $this->get_settings_for_display();
    ?>

	     <div class="nav tab-menu4" id="tab-menu4" role="tablist">
	        <?php foreach( $settings['tab_builder_repeater'] as $key => $data ): 
	    		if($key == 0){
	    			$active = 'active';
	    		}else{
	    			$active = '';
	    		}
	    	?>
	             <button class="<?php echo esc_attr($active); ?>" id="nav-one-tab<?php echo $key; ?>" data-bs-toggle="tab" data-bs-target="#nav-one<?php echo $key; ?>" type="button" role="tab" aria-controls="nav-one" aria-selected="true"><?php echo esc_html( $data['tab_builder_text'] ); ?></button>
	        <?php endforeach; ?>
        </div>

        <div class="tab-content">
            <?php foreach( $settings['tab_builder_repeater'] as $key => $data ): 
	    		if($key == 0){
	    			$active_show = 'show active';
	    		}else{
	    			$active_show = '';
	    		}
	    	?>
            <div class="tab-pane fade <?php echo esc_attr($active_show); ?>" id="nav-one<?php echo $key; ?>" role="tabpanel" aria-labelledby="nav-one-tab<?php echo $key; ?>">
               <?php 
		           	$elementor = \Elementor\Plugin::instance();
		            if( ! empty( $data['taxseco_tab_builder_option'] ) ){
		                echo $elementor->frontend->get_builder_content_for_display( $data['taxseco_tab_builder_option'] );
		            }
            ?>
            </div>
        	<?php endforeach; ?>
        </div>

	<?php

	}
}