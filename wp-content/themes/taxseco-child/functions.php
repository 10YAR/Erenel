<?php
/**
 *
 * @Packge      taxseco
 * @Author      Angfuzsoft
 * @Author URL  https://www.angfuzsoft.com/
 * @version     1.0
 *
 */
/**
 * Enqueue style of child theme
 */
function taxseco_child_enqueue_styles() {
    wp_enqueue_style( 'taxseco-style', get_template_directory_uri() . '/style.css?v='.time() );
    wp_enqueue_style( 'taxseco-child-style', get_stylesheet_directory_uri() . '/style.css?v='.time(),array( 'taxseco-style' ), wp_get_theme()->get('Version'));
}
add_action( 'wp_enqueue_scripts', 'taxseco_child_enqueue_styles', 100000 );

function erenel_enqueue_scripts() {
    wp_enqueue_script( 'booking', get_stylesheet_directory_uri() . '/js/booking.js?v='.time(), array( 'jquery' ), wp_get_theme()->get('Version'), true );
    wp_enqueue_script( 'google-cloud', "https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&callback=initializeMap&key=" . $_ENV['GOOGLE_CLOUD_API_KEY'], array( 'booking' ), wp_get_theme()->get('Version'), true );
    wp_enqueue_script( 'google-captcha', "https://www.google.com/recaptcha/api.js?render=" . $_ENV['CAPTCHA_PUBLIC_API_KEY'], array( 'booking' ), wp_get_theme()->get('Version'), true );
}
add_action( 'wp_enqueue_scripts', 'erenel_enqueue_scripts' );