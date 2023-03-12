<?php
/**
 * @Packge     : Taxseco
 * @Version    : 1.0
 * @Author     : Angfuzsoft
 * @Author URI : https://www.angfuzsoft.com/
 *
 */


// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit;
}

function taxseco_widgets_init() {

    if( class_exists('ReduxFramework') ) {
        $taxseco_sidebar_widget_title_heading_tag = taxseco_opt('taxseco_sidebar_widget_title_heading_tag');
    } else {
        $taxseco_sidebar_widget_title_heading_tag = 'h3';
    }

    //sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'taxseco' ),
        'id'            => 'taxseco-blog-sidebar',
        'description'   => esc_html__( 'Add Blog Sidebar Widgets Here.', 'taxseco' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget_title">',
        'after_title'   => '</h3>',
    ) );

    // page sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'taxseco' ),
        'id'            => 'taxseco-page-sidebar',
        'description'   => esc_html__( 'Add Page Sidebar Widgets Here.', 'taxseco' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget_title">',
        'after_title'   => '</h3>',
    ) );
    if( class_exists( 'ReduxFramework' ) ){
        // footer widgets register
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 1', 'taxseco' ),
           'id'            => 'taxseco-footer-1',
           'before_widget' => '<div class="col-md-6 col-xl-auto"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 2', 'taxseco' ),
           'id'            => 'taxseco-footer-2',
           'before_widget' => '<div class="col-md-6 col-xl-3"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 3', 'taxseco' ),
           'id'            => 'taxseco-footer-3',
           'before_widget' => '<div class="col-md-6 col-xl-auto"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Footer Widgets Area 4', 'taxseco' ),
           'id'            => 'taxseco-footer-4',
           'before_widget' => '<div class="col-md-6 col-xl-3"><div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div></div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
        register_sidebar( array(
           'name'          => esc_html__( 'Offcanvas Sidebar', 'taxseco' ),
           'id'            => 'taxseco-offcanvas',
           'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
           'after_widget'  => '</div>',
           'before_title'  => '<h3 class="widget_title">',
           'after_title'   => '</h3>',
        ) );
    }
    if( class_exists('woocommerce') ) {
        register_sidebar(
            array(
                'name'          => esc_html__( 'WooCommerce Sidebar', 'taxseco' ),
                'id'            => 'taxseco-woo-sidebar',
                'description'   => esc_html__( 'Add widgets here to appear in your woocommerce page sidebar.', 'taxseco' ),
                'before_widget' => '<div class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget_title">',
                'after_title'   => '</h4>',
            )
        );
    }

}

add_action( 'widgets_init', 'taxseco_widgets_init' );