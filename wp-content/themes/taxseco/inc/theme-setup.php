<?php
/**
 * @Packge     : Taxseco
 * @Version    : 1.0
 * @Author     : Angfuzsoft
 * @Author URI : https://www.angfuzsoft.com/
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'taxseco_setup' ) ){
    function taxseco_setup() {

        // content width
        $GLOBALS['content_width'] = apply_filters( 'taxseco_content_width', 751 );

        // language file
		load_theme_textdomain( 'taxseco', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// title tag
		add_theme_support( 'title-tag' );

		// post thumbnails
		add_theme_support( 'post-thumbnails' );

        add_image_size( 'taxseco-shop-single',555,592,true );
        add_image_size( 'taxseco-shop-single-small-image',150,150,true );

        register_nav_menus( array(
            'primary-menu'      => esc_html__( 'Primary Menu', 'taxseco' ),
        ) );

		//support html5
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style'
			)
		);


        // support post format
        add_theme_support( 'post-formats', array( 'audio', 'video', 'gallery', 'quote') );

		// Custom logo
		add_theme_support( 'custom-logo' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'assets/css/style-editor.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		add_image_size( 'taxseco_80X80', 80, 80, true );

        // support woocommerce
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-slider' );

	}
}
add_action( 'after_setup_theme', 'taxseco_setup' );