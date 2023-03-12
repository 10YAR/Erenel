<?php
    /**
     * Class For Builder
     */
    class TaxsecoBuilder{

        function __construct(){
            // register admin menus
        	add_action( 'admin_menu', [$this, 'register_settings_menus'] );

            // Custom Footer Builder With Post Type
			add_action( 'init',[ $this,'post_type' ],0 );

 		    add_action( 'elementor/frontend/after_enqueue_scripts', [ $this,'widget_scripts'] );

			add_filter( 'single_template', [ $this, 'load_canvas_template' ] );

            add_action( 'elementor/element/wp-page/document_settings/after_section_end', [ $this,'taxseco_add_elementor_page_settings_controls' ],10,2 );

		}

		public function widget_scripts( ) {
			wp_enqueue_script( 'taxseco-core',TAXSECO_PLUGDIRURI.'assets/js/taxseco-core.js',array( 'jquery' ),'1.0',true );
		}


        public function taxseco_add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\Page $page ){

			$page->start_controls_section(
                'taxseco_header_option',
                [
                    'label'     => __( 'Header Option', 'taxseco' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );


            $page->add_control(
                'taxseco_header_style',
                [
                    'label'     => __( 'Header Option', 'taxseco' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'taxseco' ),
    					'header_builder'       => __( 'Header Builder', 'taxseco' ),
    				],
                    'default'   => 'prebuilt',
                ]
			);

            $page->add_control(
                'taxseco_header_builder_option',
                [
                    'label'     => __( 'Header Name', 'taxseco' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->taxseco_header_choose_option(),
                    'condition' => [ 'taxseco_header_style' => 'header_builder'],
                    'default'	=> ''
                ]
            );

            $page->end_controls_section();

            $page->start_controls_section(
                'taxseco_footer_option',
                [
                    'label'     => __( 'Footer Option', 'taxseco' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );
            $page->add_control(
    			'taxseco_footer_choice',
    			[
    				'label'         => __( 'Enable Footer?', 'taxseco' ),
    				'type'          => \Elementor\Controls_Manager::SWITCHER,
    				'label_on'      => __( 'Yes', 'taxseco' ),
    				'label_off'     => __( 'No', 'taxseco' ),
    				'return_value'  => 'yes',
    				'default'       => 'yes',
    			]
    		);
            $page->add_control(
                'taxseco_footer_style',
                [
                    'label'     => __( 'Footer Style', 'taxseco' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'taxseco' ),
    					'footer_builder'       => __( 'Footer Builder', 'taxseco' ),
    				],
                    'default'   => 'prebuilt',
                    'condition' => [ 'taxseco_footer_choice' => 'yes' ],
                ]
            );
            $page->add_control(
                'taxseco_footer_builder_option',
                [
                    'label'     => __( 'Footer Name', 'taxseco' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->taxseco_footer_build_choose_option(),
                    'condition' => [ 'taxseco_footer_style' => 'footer_builder','taxseco_footer_choice' => 'yes' ],
                    'default'	=> ''
                ]
            );

			$page->end_controls_section();

        }

		public function register_settings_menus(){
			add_menu_page(
				esc_html__( 'Taxseco Builder', 'taxseco' ),
            	esc_html__( 'Taxseco Builder', 'taxseco' ),
				'manage_options',
				'taxseco',
				[$this,'register_settings_contents__settings'],
				'dashicons-admin-site',
				2
			);

			add_submenu_page('taxseco', esc_html__('Footer Builder', 'taxseco'), esc_html__('Footer Builder', 'taxseco'), 'manage_options', 'edit.php?post_type=taxseco_footer_build');
			add_submenu_page('taxseco', esc_html__('Header Builder', 'taxseco'), esc_html__('Header Builder', 'taxseco'), 'manage_options', 'edit.php?post_type=taxseco_header');
			add_submenu_page('taxseco', esc_html__('Tab Builder', 'taxseco'), esc_html__('Tab Builder', 'taxseco'), 'manage_options', 'edit.php?post_type=taxseco_tab_builder');
		}

		// Callback Function
		public function register_settings_contents__settings(){
            echo '<h2>';
			    echo esc_html__( 'Welcome To Header And Footer Builder Of This Theme','taxseco' );
            echo '</h2>';
		}

		public function post_type() {

			$labels = array(
				'name'               => __( 'Footer', 'taxseco' ),
				'singular_name'      => __( 'Footer', 'taxseco' ),
				'menu_name'          => __( 'Taxseco Footer Builder', 'taxseco' ),
				'name_admin_bar'     => __( 'Footer', 'taxseco' ),
				'add_new'            => __( 'Add New', 'taxseco' ),
				'add_new_item'       => __( 'Add New Footer', 'taxseco' ),
				'new_item'           => __( 'New Footer', 'taxseco' ),
				'edit_item'          => __( 'Edit Footer', 'taxseco' ),
				'view_item'          => __( 'View Footer', 'taxseco' ),
				'all_items'          => __( 'All Footer', 'taxseco' ),
				'search_items'       => __( 'Search Footer', 'taxseco' ),
				'parent_item_colon'  => __( 'Parent Footer:', 'taxseco' ),
				'not_found'          => __( 'No Footer found.', 'taxseco' ),
				'not_found_in_trash' => __( 'No Footer found in Trash.', 'taxseco' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'taxseco_footer_build', $args );

			$labels = array(
				'name'               => __( 'Header', 'taxseco' ),
				'singular_name'      => __( 'Header', 'taxseco' ),
				'menu_name'          => __( 'Taxseco Header Builder', 'taxseco' ),
				'name_admin_bar'     => __( 'Header', 'taxseco' ),
				'add_new'            => __( 'Add New', 'taxseco' ),
				'add_new_item'       => __( 'Add New Header', 'taxseco' ),
				'new_item'           => __( 'New Header', 'taxseco' ),
				'edit_item'          => __( 'Edit Header', 'taxseco' ),
				'view_item'          => __( 'View Header', 'taxseco' ),
				'all_items'          => __( 'All Header', 'taxseco' ),
				'search_items'       => __( 'Search Header', 'taxseco' ),
				'parent_item_colon'  => __( 'Parent Header:', 'taxseco' ),
				'not_found'          => __( 'No Header found.', 'taxseco' ),
				'not_found_in_trash' => __( 'No Header found in Trash.', 'taxseco' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'taxseco_header', $args );

			$labels = array(
				'name'               => __( 'Tab Builder', 'taxseco' ),
				'singular_name'      => __( 'Tab Builder', 'taxseco' ),
				'menu_name'          => __( 'Gesund Tab Builder', 'taxseco' ),
				'name_admin_bar'     => __( 'Tab Builder', 'taxseco' ),
				'add_new'            => __( 'Add New', 'taxseco' ),
				'add_new_item'       => __( 'Add New Tab Builder', 'taxseco' ),
				'new_item'           => __( 'New Tab Builder', 'taxseco' ),
				'edit_item'          => __( 'Edit Tab Builder', 'taxseco' ),
				'view_item'          => __( 'View Tab Builder', 'taxseco' ),
				'all_items'          => __( 'All Tab Builder', 'taxseco' ),
				'search_items'       => __( 'Search Tab Builder', 'taxseco' ),
				'parent_item_colon'  => __( 'Parent Tab Builder:', 'taxseco' ),
				'not_found'          => __( 'No Tab Builder found.', 'taxseco' ),
				'not_found_in_trash' => __( 'No Tab Builder found in Trash.', 'taxseco' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'taxseco_tab_builder', $args );
		}

		function load_canvas_template( $single_template ) {

			global $post;

			if ( 'taxseco_footer_build' == $post->post_type || 'taxseco_header' == $post->post_type || 'taxseco_tab_build' == $post->post_type ) {

				$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

				if ( file_exists( $elementor_2_0_canvas ) ) {
					return $elementor_2_0_canvas;
				} else {
					return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
				}
			}

			return $single_template;
		}

        public function taxseco_footer_build_choose_option(){

			$taxseco_post_query = new WP_Query( array(
				'post_type'			=> 'taxseco_footer_build',
				'posts_per_page'	    => -1,
			) );

			$taxseco_builder_post_title = array();
			$taxseco_builder_post_title[''] = __('Select a Footer','Taxseco');

			while( $taxseco_post_query->have_posts() ) {
				$taxseco_post_query->the_post();
				$taxseco_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $taxseco_builder_post_title;

		}

		public function taxseco_header_choose_option(){

			$taxseco_post_query = new WP_Query( array(
				'post_type'			=> 'taxseco_header',
				'posts_per_page'	    => -1,
			) );

			$taxseco_builder_post_title = array();
			$taxseco_builder_post_title[''] = __('Select a Header','Taxseco');

			while( $taxseco_post_query->have_posts() ) {
				$taxseco_post_query->the_post();
				$taxseco_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $taxseco_builder_post_title;

        }

    }

    $builder_execute = new TaxsecoBuilder();