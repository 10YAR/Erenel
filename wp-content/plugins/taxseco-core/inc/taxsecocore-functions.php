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

/**

 * Admin Custom Login Logo

 */

function taxseco_custom_login_logo() {

    $logo = ! empty( taxseco_opt( 'taxseco_admin_login_logo', 'url' ) ) ? taxseco_opt( 'taxseco_admin_login_logo', 'url' ) : '' ;

    if( isset( $logo ) && ! empty( $logo ) ){

        echo '<style type="text/css">body.login div#login h1 a { background-image:url('.esc_url( $logo ).'); }</style>';
    }
}

add_action( 'login_enqueue_scripts', 'taxseco_custom_login_logo' );

/**
* Admin Custom css
*/

add_action( 'admin_enqueue_scripts', 'taxseco_admin_styles' );

function taxseco_admin_styles() {

  if ( ! empty( $taxseco_admin_custom_css ) ) {
        $taxseco_admin_custom_css = str_replace(array("\r\n", "\r", "\n", "\t", '    '), '', $taxseco_admin_custom_css);
        echo '<style rel="stylesheet" id="taxseco-admin-custom-css" >';
            echo esc_html( $taxseco_admin_custom_css );
        echo '</style>';
    }
}

// share button code

 function taxseco_social_sharing_buttons() {

    // Get page URL

    $URL        = get_permalink();
    $Sitetitle  = get_bloginfo('name');
    // Get page title

    $Title  = str_replace( ' ', '%20', get_the_title());

    // Construct sharing URL without using any script

    $twitterURL     = 'https://twitter.com/share?text='.esc_html( $Title ).'&url='.esc_url( $URL );
    $facebookURL    = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
    $instagram   = 'http://pinterest.com/pin/create/link/?url='.esc_url( $URL ).'&media='.esc_url(get_the_post_thumbnail_url()).'&description='.wp_kses_post(get_the_title());
    $linkedin       = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
    // Add sharing button at the end of page/page content

    $content = '';

    $content .= '<li><a href="'.esc_url( $facebookURL ).'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
    $content .= ' <li><a href="'. esc_url( $twitterURL ) .'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
    $content .= ' <li><a href="'.esc_url( $linkedin ).'" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';
    $content .= ' <li><a href="'.esc_url( $instagram ).'" target="_blank"><i class="fab fa-instagram"></i></a></li>';


    return $content;

};

//Post Reading Time Count

function taxseco_estimated_reading_time() {
    global $post;
    // get the content
    $the_content = $post->post_content;
    // count the number of words
    $words = str_word_count( strip_tags( $the_content ) );
    // rounding off and deviding per 100 words per minute
    $minute = floor( $words / 100 );
    // rounding off to get the seconds
    $second = floor( $words % 100 / ( 100 / 60 ) );
    // calculate the amount of time needed to read
    $estimate = $minute . esc_html__(' Min', 'taxseco') . ( $minute == 1 ? '' : 's' ) . esc_html__(' Read', 'taxseco');
    // create output
    $output = $estimate;
    // return the estimate
    return $output;
}



//add SVG to allowed file uploads

function taxseco_mime_types( $mimes ) {

    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svgz+xml';
    $mimes['exe'] = 'program/exe';
    $mimes['dwg'] = 'image/vnd.dwg';
    return $mimes;
}

add_filter('upload_mimes', 'taxseco_mime_types');



function taxseco_wp_check_filetype_and_ext( $data, $file, $filename, $mimes ) {

    $wp_filetype = wp_check_filetype( $filename, $mimes );
    $ext         = $wp_filetype['ext'];
    $type        = $wp_filetype['type'];
    $proper_filename = $data['proper_filename'];

    return compact( 'ext', 'type', 'proper_filename' );

}

add_filter( 'wp_check_filetype_and_ext', 'taxseco_wp_check_filetype_and_ext', 10, 4 );



// Add Image Size

add_image_size( 'taxseco_85X85', 85, 85, true );
add_image_size( 'taxseco_555X430', 555, 430, true );
add_image_size( 'taxseco_418X365', 418, 365, true );
add_image_size( 'taxseco_395X274', 395, 274, true );
add_image_size( 'taxseco_387X300', 387, 300, true );
add_image_size( 'taxseco_370X280', 370, 280, true );
add_image_size( 'taxseco_544X296', 544, 296, true );

remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );
