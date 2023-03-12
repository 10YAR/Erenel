<?php
/**

 * Plugin Name: Taxseco Core
 * Description: This is a helper plugin of taxseco theme
 * Version:     1.0
 * Author:      Angfuzsoft
 * Author URI:  http://angfuzsoft.com/
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: taxseco
 */



 // Blocking direct access

if( ! defined( 'ABSPATH' ) ) {

    exit();

}



// Define Constant

define( 'TAXSECO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

define( 'TAXSECO_PLUGIN_INC_PATH', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'TAXSECO_PLUGIN_CMB2EXT_PATH', plugin_dir_path( __FILE__ ) . 'cmb2-ext/' );

define( 'TAXSECO_PLUGIN_WIDGET_PATH', plugin_dir_path( __FILE__ ) . 'inc/widgets/' );

define( 'TAXSECO_PLUGDIRURI', plugin_dir_url( __FILE__ ) );

define( 'TAXSECO_ADDONS', plugin_dir_path( __FILE__ ) .'addons/' );

define( 'TAXSECO_CORE_PLUGIN_TEMP', plugin_dir_path( __FILE__ ) .'taxseco-template/' );



// load textdomain

load_plugin_textdomain( 'taxseco', false, basename( dirname( __FILE__ ) ) . '/languages' );



//include file.

require_once TAXSECO_PLUGIN_INC_PATH .'taxsecocore-functions.php';
require_once TAXSECO_PLUGIN_INC_PATH .'builder/builder.php';
require_once TAXSECO_PLUGIN_INC_PATH . 'MCAPI.class.php';
require_once TAXSECO_PLUGIN_INC_PATH .'taxsecoajax.php';

require_once TAXSECO_PLUGIN_CMB2EXT_PATH . 'cmb2ext-init.php';



//Widget

require_once TAXSECO_PLUGIN_WIDGET_PATH . 'recent-post-widget.php';
require_once TAXSECO_PLUGIN_WIDGET_PATH . 'about-us-widget.php';
require_once TAXSECO_PLUGIN_WIDGET_PATH . 'taxseco-cta.php';



//addons

require_once TAXSECO_ADDONS . 'addons.php';