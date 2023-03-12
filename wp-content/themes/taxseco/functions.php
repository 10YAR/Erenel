<?php
/**
 * @Packge     : Taxseco
 * @Version    : 1.0
 * @Author     : Angfuzsoft
 * @Author URI : https://www.angfuzsoft.com/
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Include File
 *
 */

// Constants
require_once get_parent_theme_file_path() . '/inc/taxseco-constants.php';

//theme setup
require_once TAXSECO_DIR_PATH_INC . 'theme-setup.php';

//essential scripts
require_once TAXSECO_DIR_PATH_INC . 'essential-scripts.php';

// Woo Hooks
require_once TAXSECO_DIR_PATH_INC . 'woo-hooks/taxseco-woo-hooks.php';

// Woo Hooks Functions
require_once TAXSECO_DIR_PATH_INC . 'woo-hooks/taxseco-woo-hooks-functions.php';

// plugin activation
require_once TAXSECO_DIR_PATH_FRAM . 'plugins-activation/taxseco-active-plugins.php';

// theme dynamic css
require_once TAXSECO_DIR_PATH_INC . 'taxseco-commoncss.php';

// meta options
require_once TAXSECO_DIR_PATH_FRAM . 'taxseco-meta/taxseco-config.php';

// page breadcrumbs
require_once TAXSECO_DIR_PATH_INC . 'taxseco-breadcrumbs.php';

// sidebar register
require_once TAXSECO_DIR_PATH_INC . 'taxseco-widgets-reg.php';

//essential functions
require_once TAXSECO_DIR_PATH_INC . 'taxseco-functions.php';

// helper function
require_once TAXSECO_DIR_PATH_INC . 'wp-html-helper.php';

// Demo Data
require_once TAXSECO_DEMO_DIR_PATH . 'demo-import.php';

// pagination
require_once TAXSECO_DIR_PATH_INC . 'wp_bootstrap_pagination.php';

// taxseco options
require_once TAXSECO_DIR_PATH_FRAM . 'taxseco-options/taxseco-options.php';

// hooks
require_once TAXSECO_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once TAXSECO_DIR_PATH_HOOKS . 'hooks-functions.php';

// Contact form 7
add_filter('wpcf7_autop_or_not', '__return_false');