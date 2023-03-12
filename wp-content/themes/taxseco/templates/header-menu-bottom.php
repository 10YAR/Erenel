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
        exit();
    }

    if( defined( 'CMB2_LOADED' )  ){
        if( !empty( taxseco_meta('page_breadcrumb_area') ) ) {
            $taxseco_page_breadcrumb_area  = taxseco_meta('page_breadcrumb_area');
        } else {
            $taxseco_page_breadcrumb_area = '1';
        }
    }else{
        $taxseco_page_breadcrumb_area = '1';
    }
    
    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array()
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
        'sub'       => array(),
        'sup'       => array(),
    );
    
    if(  is_page() || is_page_template( 'template-builder.php' )  ) {
        if( $taxseco_page_breadcrumb_area == '1' ) {
            echo '<!-- Page title 2 -->';
            echo '<div class="breadcumb-wrapper" data-overlay="title" data-opacity="4">';
                echo '<div class="container">';
                    echo '<div class="row">';
                        echo '<div class="breadcumb-content">';
                            if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {
                                if( !empty( taxseco_meta('page_breadcrumb_settings') ) ) {
                                    if( taxseco_meta('page_breadcrumb_settings') == 'page' ) {
                                        $taxseco_page_title_switcher = taxseco_meta('page_title');
                                    } else {
                                        $taxseco_page_title_switcher = taxseco_opt('taxseco_page_title_switcher');
                                    }
                                } else {
                                    $taxseco_page_title_switcher = '1';
                                }
                            } else {
                                $taxseco_page_title_switcher = '1';
                            }

                            if( $taxseco_page_title_switcher ){
                                if( class_exists( 'ReduxFramework' ) ){
                                    $taxseco_page_title_tag    = taxseco_opt('taxseco_page_title_tag');
                                }else{
                                    $taxseco_page_title_tag    = 'h1';
                                }

                                if( defined( 'CMB2_LOADED' )  ){
                                    if( !empty( taxseco_meta('page_title_settings') ) ) {
                                        $taxseco_custom_title = taxseco_meta('page_title_settings');
                                    } else {
                                        $taxseco_custom_title = 'default';
                                    }
                                }else{
                                    $taxseco_custom_title = 'default';
                                }

                                if( $taxseco_custom_title == 'default' ) {
                                    echo taxseco_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $taxseco_page_title_tag ),
                                            "text"  => esc_html( get_the_title( ) ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                } else {
                                    echo taxseco_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $taxseco_page_title_tag ),
                                            "text"  => esc_html( taxseco_meta('custom_page_title') ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }

                            }
                            if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {

                                if( taxseco_meta('page_breadcrumb_settings') == 'page' ) {
                                    $taxseco_breadcrumb_switcher = taxseco_meta('page_breadcrumb_trigger');
                                } else {
                                    $taxseco_breadcrumb_switcher = taxseco_opt('taxseco_enable_breadcrumb');
                                }

                            } else {
                                $taxseco_breadcrumb_switcher = '1';
                            }

                            if( $taxseco_breadcrumb_switcher == '1' && (  is_page() || is_page_template( 'template-builder.php' ) )) {
                                taxseco_breadcrumbs(
                                    array(
                                        'breadcrumbs_classes' => 'nav',
                                    )
                                );
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<!-- End of Page title -->';
            
        }
    } else {
        echo '<!-- Page title 3 -->';
        if( class_exists( 'ReduxFramework' ) ){
            if (is_shop()){
            $breadcumb_bg_class = 'custom-woo-class';
            }elseif(is_404()){
                $breadcumb_bg_class = 'custom-error-class';
            }elseif(is_search()){
                $breadcumb_bg_class = 'custom-search-class';
            }elseif(is_archive()){
                $breadcumb_bg_class = 'custom-archive-class';
            }else{
                $breadcumb_bg_class = '';
            }
        }else{
            $breadcumb_bg_class = '';
        }

        echo '<div class="breadcumb-wrapper '. esc_attr($breadcumb_bg_class).'" data-overlay="title" data-opacity="4">';
            echo '<div class="container z-index-common">';
                echo '<div class="breadcumb-content">';
                    if( class_exists( 'ReduxFramework' )  ){
                        $taxseco_page_title_switcher  = taxseco_opt('taxseco_page_title_switcher');
                    }else{
                        $taxseco_page_title_switcher = '1';
                    }

                    if( $taxseco_page_title_switcher ){
                        if( class_exists( 'ReduxFramework' ) ){
                            $taxseco_page_title_tag    = taxseco_opt('taxseco_page_title_tag');
                        }else{
                            $taxseco_page_title_tag    = 'h1';
                        }
                        if( class_exists('woocommerce') && is_shop() ) {
                            echo taxseco_heading_tag(
                                array(
                                    "tag"   => esc_attr( $taxseco_page_title_tag ),
                                    "text"  => wp_kses( woocommerce_page_title( false ), $allowhtml ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif ( is_archive() ){
                            echo taxseco_heading_tag(
                                array(
                                    "tag"   => esc_attr( $taxseco_page_title_tag ),
                                    "text"  => wp_kses( get_the_archive_title(), $allowhtml ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif ( is_home() ){
                            $taxseco_blog_page_title_setting = taxseco_opt('taxseco_blog_page_title_setting');
                            $taxseco_blog_page_title_switcher = taxseco_opt('taxseco_blog_page_title_switcher');
                            $taxseco_blog_page_custom_title = taxseco_opt('taxseco_blog_page_custom_title');
                            if( class_exists('ReduxFramework') ){
                                if( $taxseco_blog_page_title_switcher ){
                                    echo taxseco_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $taxseco_page_title_tag ),
                                            "text"  => !empty( $taxseco_blog_page_custom_title ) && $taxseco_blog_page_title_setting == 'custom' ? esc_html( $taxseco_blog_page_custom_title) : esc_html__( 'Latest News', 'taxseco' ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }
                            }else{
                                echo taxseco_heading_tag(
                                    array(
                                        "tag"   => "h1",
                                        "text"  => esc_html__( 'Latest News', 'taxseco' ),
                                        'class' => 'breadcumb-title',
                                    )
                                );
                            }
                        }elseif( is_search() ){
                            echo taxseco_heading_tag(
                                array(
                                    "tag"   => esc_attr( $taxseco_page_title_tag ),
                                    "text"  => esc_html__( 'Search Result', 'taxseco' ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif( is_404() ){
                            echo taxseco_heading_tag(
                                array(
                                    "tag"   => esc_attr( $taxseco_page_title_tag ),
                                    "text"  => esc_html__( '404 PAGE', 'taxseco' ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif( is_singular( 'product' ) ){
                            $posttitle_position  = taxseco_opt('taxseco_product_details_title_position');
                            $postTitlePos = false;
                            if( class_exists( 'ReduxFramework' ) ){
                                if( $posttitle_position && $posttitle_position != 'header' ){
                                    $postTitlePos = true;
                                }
                            }else{
                                $postTitlePos = false;
                            }

                            if( $postTitlePos != true ){
                                echo taxseco_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $taxseco_page_title_tag ),
                                        "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            } else {
                                if( class_exists( 'ReduxFramework' ) ){
                                    $taxseco_post_details_custom_title  = taxseco_opt('taxseco_product_details_custom_title');
                                }else{
                                    $taxseco_post_details_custom_title = __( 'Shop Details','taxseco' );
                                }

                                if( !empty( $taxseco_post_details_custom_title ) ) {
                                    echo taxseco_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $taxseco_page_title_tag ),
                                            "text"  => wp_kses( $taxseco_post_details_custom_title, $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }
                            }
                        }else{
                            $posttitle_position  = taxseco_opt('taxseco_post_details_title_position');
                            $postTitlePos = false;
                            if( is_single() ){
                                if( class_exists( 'ReduxFramework' ) ){
                                    if( $posttitle_position && $posttitle_position != 'header' ){
                                        $postTitlePos = true;
                                    }
                                }else{
                                    $postTitlePos = false;
                                }
                            }
                            if( is_singular( 'product' ) ){
                                $posttitle_position  = taxseco_opt('taxseco_product_details_title_position');
                                $postTitlePos = false;
                                if( class_exists( 'ReduxFramework' ) ){
                                    if( $posttitle_position && $posttitle_position != 'header' ){
                                        $postTitlePos = true;
                                    }
                                }else{
                                    $postTitlePos = false;
                                }
                            }

                            if( $postTitlePos != true ){
                                echo taxseco_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $taxseco_page_title_tag ),
                                        "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            } else {
                                if( class_exists( 'ReduxFramework' ) ){
                                    $taxseco_post_details_custom_title  = taxseco_opt('taxseco_post_details_custom_title');
                                }else{
                                    $taxseco_post_details_custom_title = __( 'Blog Details','taxseco' );
                                }

                                if( !empty( $taxseco_post_details_custom_title ) ) {
                                    echo taxseco_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $taxseco_page_title_tag ),
                                            "text"  => wp_kses( $taxseco_post_details_custom_title, $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }
                            }
                        }
                    }
                    if( class_exists('ReduxFramework') ) {
                        $taxseco_breadcrumb_switcher = taxseco_opt( 'taxseco_enable_breadcrumb' );
                    } else {
                        $taxseco_breadcrumb_switcher = '1';
                    }
                    if( $taxseco_breadcrumb_switcher == '1' ) {
                        taxseco_breadcrumbs(
                            array(
                                'breadcrumbs_classes' => 'nav',
                            )
                        );
                    }
                echo '</div>';                
            echo '</div>';
        echo '</div>';
        echo '<!-- End of Page title -->';
    }