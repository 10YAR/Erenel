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
    wp_enqueue_script( 'flatpickr', get_stylesheet_directory_uri() . '/js/flatpickr.js', array( 'jquery' ), wp_get_theme()->get('Version'), true );
    wp_enqueue_script( 'flatpickr-fr', get_stylesheet_directory_uri() . '/js/flatpickr-fr.js', array( 'jquery', 'flatpickr' ), wp_get_theme()->get('Version'), true );
    wp_enqueue_script( 'momentjs', get_stylesheet_directory_uri() . '/js/moment.js', array( 'jquery' ), wp_get_theme()->get('Version'), true );
    wp_enqueue_script( 'booking', get_stylesheet_directory_uri() . '/js/booking.js?v='.time(), array( 'jquery', 'flatpickr', 'momentjs' ), wp_get_theme()->get('Version'), true );
}
add_action( 'wp_enqueue_scripts', 'erenel_enqueue_scripts' );