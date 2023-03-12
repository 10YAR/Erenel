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
 * Clients Logo Widget .
 *
 */
class Taxseco_Clients_logo extends Widget_Base {

	public function get_name() {
		return 'taxsecoclientslogo';
	}

	public function get_title() {
		return __( 'Taxseco Clients Logo', 'taxseco' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'taxseco' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'clients_section',
			[
				'label' 	=> __( 'Clients Logo', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
  //       $this->add_control(
		// 	'clients_style',
		// 	[
		// 		'label' 	=> __( 'WorkProcess Style', 'taxseco' ),
		// 		'type' 		=> Controls_Manager::SELECT,
		// 		'default' 	=> '1',
		// 		'options' 	=> [
		// 			'1'  		=> __( 'Style One', 'taxseco' ),
		// 			'2' 		=> __( 'Style Two', 'taxseco' ),
		// 			'3' 		=> __( 'Style Three', 'taxseco' ),
		// 			'4' 		=> __( 'Style Four', 'taxseco' ),
		// 		],
		// 	]
		// );

        $repeater = new Repeater();

		$repeater->add_control(
			'logo',
			[
				'label'     => __( 'Logo / Image', 'taxseco' ),
                'type'      => Controls_Manager::MEDIA,
                	'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );

        $this->add_control(
			'logos',
			[
				'label' 		=> __( 'Clients Logo', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'url' => Utils::get_placeholder_image_src(),
					],
				],
			]
		);

        $this->end_controls_section();


        /*-----------------------------------------features content styling------------------------------------*/

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
					'{{WRAPPER}} p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

?>
			<div class="row brand-slide as-carousel">
			<?php foreach( $settings['logos'] as $data ): ?>
				<?php if( ! empty( $data['logo']['url'] ) ): ?>
                <div class="col-auto brand-img">
                    <?php echo taxseco_img_tag( array(
							'url'   => esc_url( $data['logo']['url'] ),
						) ); ?>
                </div>
                <?php endif; ?>
				<?php endforeach; ?>
            </div>
<?php
        
	}

}