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

/**
 *
 * Define constant
 *
 */

// Base URI
if ( ! defined( 'TAXSECO_DIR_URI' ) ) {
    define('TAXSECO_DIR_URI', get_parent_theme_file_uri().'/' );
}

// Assist URI
if ( ! defined( 'TAXSECO_DIR_ASSIST_URI' ) ) {
    define( 'TAXSECO_DIR_ASSIST_URI', get_theme_file_uri('/assets/') );
}


// Css File URI
if ( ! defined( 'TAXSECO_DIR_CSS_URI' ) ) {
    define( 'TAXSECO_DIR_CSS_URI', get_theme_file_uri('/assets/css/') );
}

// Js File URI
if (!defined('TAXSECO_DIR_JS_URI')) {
    define('TAXSECO_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// Base Directory
if (!defined('TAXSECO_DIR_PATH')) {
    define('TAXSECO_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('TAXSECO_DIR_PATH_INC')) {
    define('TAXSECO_DIR_PATH_INC', TAXSECO_DIR_PATH . 'inc/');
}

//TAXSECO framework Folder Directory
if (!defined('TAXSECO_DIR_PATH_FRAM')) {
    define('TAXSECO_DIR_PATH_FRAM', TAXSECO_DIR_PATH_INC . 'taxseco-framework/');
}

//Hooks Folder Directory
if (!defined('TAXSECO_DIR_PATH_HOOKS')) {
    define('TAXSECO_DIR_PATH_HOOKS', TAXSECO_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if( !defined( 'TAXSECO_DEMO_DIR_PATH' ) ){
    define( 'TAXSECO_DEMO_DIR_PATH', TAXSECO_DIR_PATH_INC.'demo-data/' );
}
    
//Demo Data Folder Directory URI
if( !defined( 'TAXSECO_DEMO_DIR_URI' ) ){
    define( 'TAXSECO_DEMO_DIR_URI', TAXSECO_DIR_URI.'inc/demo-data/' );
}