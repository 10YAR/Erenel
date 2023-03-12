<?php
if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.
}

/**
 * Main Taxseco Core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */

final class Taxseco_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */

	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';


	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */

	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated

		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version

		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version

		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}


		// Add Plugin actions

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );


        // Register widget scripts

		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ]);


		// Specific Register widget scripts

		// add_action( 'elementor/frontend/after_register_scripts', [ $this, 'taxseco_regsiter_widget_scripts' ] );
		// add_action( 'elementor/frontend/before_register_scripts', [ $this, 'taxseco_regsiter_widget_scripts' ] );


        // category register

		add_action( 'elementor/elements/categories_registered',[ $this, 'taxseco_elementor_widget_categories' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'taxseco' ),
			'<strong>' . esc_html__( 'Taxseco Core', 'taxseco' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'taxseco' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */

			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'taxseco' ),
			'<strong>' . esc_html__( 'Taxseco Core', 'taxseco' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'taxseco' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(

			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'taxseco' ),
			'<strong>' . esc_html__( 'Taxseco Core', 'taxseco' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'taxseco' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */

	public function init_widgets() {

		// Include Widget files

		require_once( TAXSECO_ADDONS . '/widgets/animated-shape.php' );
		require_once( TAXSECO_ADDONS . '/widgets/button.php' );
		require_once( TAXSECO_ADDONS . '/widgets/texseco-contact-info.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-slider.php' );
		require_once( TAXSECO_ADDONS . '/widgets/section-title.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-group-image.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-service.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-slider-arrow.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-image-box.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-booking-form.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-download-button.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-taxi-service.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-service-tab.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-taxi-details-image.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-taxi-feature.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-blog.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-team.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-team-info.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-progressbar.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-workprocess.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-counterup.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-testimonials.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-download-button-v2.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-feature.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-step.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-faq.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-contact-tab.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-video-thumb.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-clients-logo.php' );
		require_once( TAXSECO_ADDONS . '/widgets/taxseco-tab-builder.php' );
		
		
		

		// Register widget

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \taxseco_Animated_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Contact_Info() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Section_Title_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Group_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Service() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Slider_Arrow() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Contact_Form() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Group_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Taxi_Service() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Taxi_Service_Tab() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Deails_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Taxi_Feature() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Blog_Post() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Team_member_info_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Skill_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_WorkProcess_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Counterup() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Testimonial_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Download_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Feature() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Process_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Faq() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Contact_Tab_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Video_Thumb() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Clients_logo() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Tab_Builder() );
		
		

		// Header Elements

		require_once( TAXSECO_ADDONS . '/header/header.php' );
		require_once( TAXSECO_ADDONS . '/header/header-new.php' );
		

		// Header Widget Register

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Header() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Taxseco_Header_New() );

	}

    public function widget_scripts() {

        wp_enqueue_script(
            'taxseco-frontend-script',
            TAXSECO_PLUGDIRURI . 'assets/js/taxseco-frontend.js',
            array('jquery'),
            false,
            true
		);
	}

	// public function taxseco_regsiter_widget_scripts( ) {

	// 	wp_register_script(
 //            'taxseco-tilt',
 //            TAXSECO_PLUGDIRURI . 'assets/js/tilt.jquery.min.js',
 //            array('jquery'),
 //            false,
 //            true
	// 	);
	// }


    function taxseco_elementor_widget_categories( $elements_manager ) {

        $elements_manager->add_category(
            'taxseco',
            [
                'title' => __( 'Taxseco', 'taxseco' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );

        $elements_manager->add_category(
            'taxseco_footer_elements',
            [
                'title' => __( 'Taxseco Footer Elements', 'taxseco' ),
                'icon' 	=> 'fa fa-plug',
            ]
		);

		$elements_manager->add_category(
            'taxseco_header_elements',
            [
                'title' => __( 'Taxseco Header Elements', 'taxseco' ),
                'icon' 	=> 'fa fa-plug',
            ]
        );
	}
}

Taxseco_Extension::instance();