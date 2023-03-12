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
 * Download Button Box Widget .
 *
 */
class Taxseco_Download_Box extends Widget_Base {

	public function get_name() {
		return 'taxsecodownloadbutton2';
	}

	public function get_title() {
		return __( 'Taxseco Download Button', 'taxseco' );
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
				'label' 	=> __( 'Download Button', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
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
        $repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $repeater->add_control(
			'url',
			[
				'label'     => __( 'File Url', 'taxseco' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'files',
			[
				'label' 		=> __( 'Files', 'taxseco' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' => Utils::get_placeholder_image_src(),
					],
				]
			]
		);
		
		
        
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();


        echo '<div class="widget widget_download  ">';
        	if( ! empty( $settings['title'] ) ){
	            echo '<h4 class="widget_title">'.esc_html( $settings['title'] ).'</h4>';
	        }
            echo '<div class="donwload-media-wrap">';
            	foreach( $settings['files'] as $data ) {
	                echo '<div class="download-media">';
	                    echo '<div class="download-media_icon"><i class="fal fa-file-pdf"></i></div>';
	                    echo '<div class="download-media_info">';
	                    	if( ! empty( $data['title'] ) ){
		                        echo '<h5 class="download-media_title">'.esc_html( $data['title'] ).'</h5>';
		                    }
	                        echo '<span class="download-media_text">'.esc_html__('Download', 'taxseco').'</span>';
	                    echo '</div>';
	                    if( ! empty( $data['url'] ) ){
		                    echo '<a href="'.esc_url($data['url']).'" class="download-media_btn"><i class="far fa-arrow-right"></i></a>';
		                }
	                echo '</div>';
	            }     
            echo '</div>';
        echo '</div>';
	}

}