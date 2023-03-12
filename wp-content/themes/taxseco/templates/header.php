<?php
/**
 * @Packge     : Taxseco
 * @Version    : 1.0
 * @Author     : Angfuzsoft
 * @Author URI : https://www.angfuzsoft.com/
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) && defined('ELEMENTOR_VERSION') ) {
        if( is_page() || is_page_template('template-builder.php') ) {
            $taxseco_post_id = get_the_ID();

            // Get the page settings manager
            $taxseco_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

            // Get the settings model for current post
            $taxseco_page_settings_model = $taxseco_page_settings_manager->get_model( $taxseco_post_id );

            // Retrieve the color we added before
            $taxseco_header_style = $taxseco_page_settings_model->get_settings( 'taxseco_header_style' );
            $taxseco_header_builder_option = $taxseco_page_settings_model->get_settings( 'taxseco_header_builder_option' );

            if( $taxseco_header_style == 'header_builder'  ) {

                if( !empty( $taxseco_header_builder_option ) ) {
                    $taxsecoheader = get_post( $taxseco_header_builder_option );
                    echo '<header class="header">';
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $taxsecoheader->ID );
                    echo '</header>';
                }
            } else {
                // global options
                $taxseco_header_builder_trigger = taxseco_opt('taxseco_header_options');
                if( $taxseco_header_builder_trigger == '2' ) {
                    echo '<header>';
                    $taxseco_global_header_select = get_post( taxseco_opt( 'taxseco_header_select_options' ) );
                    $header_post = get_post( $taxseco_global_header_select );
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_post->ID );
                    echo '</header>';
                } else {
                    // wordpress Header
                    taxseco_global_header_option();
                }
            }
        } else {
            $taxseco_header_options = taxseco_opt('taxseco_header_options');
            if( $taxseco_header_options == '1' ) {
                taxseco_global_header_option();
            } else {
                $taxseco_header_select_options = taxseco_opt('taxseco_header_select_options');
                $taxsecoheader = get_post( $taxseco_header_select_options );
                echo '<header class="header">';
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $taxsecoheader->ID );
                echo '</header>';
            }
        }
    } else {
        taxseco_global_header_option();
    }