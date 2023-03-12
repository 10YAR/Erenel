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
 * Service Widget .
 *
 */
class Taxseco_Taxi_Feature extends Widget_Base {

	public function get_name() {
		return 'taxsecotaxifeature';
	}

	public function get_title() {
		return __( 'Taxi Feature', 'taxseco' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'taxseco' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'service_section',
			[
				'label'     => __( 'Frature', 'taxseco' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'show_feature',
            [
				'label'         => __( 'Show Feature Item?', 'taxseco' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'taxseco' ),
				'label_off' 	=> __( 'No', 'taxseco' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$repeater->add_control(
			'icon',
			[
				'label'     => __( 'Icon', 'taxseco' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'title',
            [
				'label'         => __( 'Feature Title', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'value',
            [
				'label'         => __( 'Feature Value', 'taxseco' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
			]
		);

		$this->add_control(
			'featurelists',
			[
				'label' 		=> __( 'Features List', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 	=> __( 'Car Doors:', 'taxseco' ),
					],
					[
						'title' 	=> __( 'Passengers:', 'taxseco' ),
					],
				],
				'title_field' 	=> '{{title}}',
			]
		);

        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		?>
		<div class="taxi-feature-wrap">
			<?php foreach( $settings['featurelists'] as $data ): ?>
				<?php if(!empty($data['show_feature'])): ?>
					<div class="taxi-feature">
						<?php if(!empty($data['icon']['url'])): ?>
						<div class="taxi-feature_icon">
							<?php  echo taxseco_img_tag( array(
									'url'   => esc_url( $data['icon']['url']  ),
								)); ?>
						</div>
						<?php endif; ?>
						<?php if( ! empty( $data['title'] ) ): ?>
							<h3 class="taxi-feature_title"><?php echo esc_html($data['title']); ?></h3>
						<?php endif; ?>
						<?php if( ! empty( $data['value'] ) ): ?>
							<span class="taxi-feature_info"><?php echo esc_html($data['value']); ?></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<?php   
	}
}