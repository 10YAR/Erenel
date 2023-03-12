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

    if( class_exists( 'ReduxFramework' ) ) {
        $taxseco404title        = taxseco_opt( 'taxseco_fof_title' );
        $taxseco404subtitle     = taxseco_opt( 'taxseco_fof_subtitle' );
        $taxseco404description  = taxseco_opt( 'taxseco_fof_description' );
        $taxseco404btntext      = taxseco_opt( 'taxseco_fof_btn_text' );
    } else {
        $taxseco404title        = __( '404', 'taxseco' );
        $taxseco404subtitle     = __( 'Oops! That page can’t be found', 'taxseco' );
        $taxseco404description  = __( 'Sorry, but the page you are looking for does not existing', 'taxseco' );
        $taxseco404btntext      = __( ' Back To Home', 'taxseco');

        
    }

    // get header
    get_header();

    echo '<div class="as-error-wrapper space">';
        echo '<div class="container text-center">';
            echo '<h2 class="error-number">'.esc_html( $taxseco404title ).'</h2>';
            echo '<h3 class="h2">'.esc_html( $taxseco404subtitle ).'</h3>';
            echo '<span class="d-block mb-30">'.esc_html( $taxseco404description ).'</span>';
            echo '<a href="'.esc_url( home_url('/') ).'" class="as-btn"><i class="mr-5 fal fa-home-lg"></i>'.esc_html( $taxseco404btntext ).'</a>';
        echo '</div>';
    echo '</div>';
    //footer
    get_footer();