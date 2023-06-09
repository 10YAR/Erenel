<?php
require_once "vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', $_ENV['DB_NAME'] );

/** Database username */
define( 'DB_USER', $_ENV['DB_USER'] );

/** Database password */
define( 'DB_PASSWORD', $_ENV['DB_PASSWORD'] );

/** Database hostname */
define( 'DB_HOST', $_ENV['DB_HOST'] );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_ENV['SITE_URL'] );
    define( 'WP_HOME',    $_ENV['SITE_URL'] );
}



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'k6BOeOJAHQjAEvHayCbL0zVuhYNp3MZ0us8OGojaKIFQ90OWwMr6Nvn86NeL5bJ6' );
define( 'SECURE_AUTH_KEY',  'k1TZDGN4cdLj8jQnci0yrvwAOGVt818s0EvRyKZm9wuGoL81BPyCL0Rr7yJoc8bZ' );
define( 'LOGGED_IN_KEY',    'OEJ4Edm0P5WvgBfBDsgqosH1GcyhW1y0c5DF76BDuCYmZ9p9Giiy91k8cnkomvqP' );
define( 'NONCE_KEY',        'Tv9cukXvMo1Xp4BIdlcuq4dhnX3xSmjqSb8KvcHkN5GDazjIzIBjF0Qb7AR8BuFv' );
define( 'AUTH_SALT',        'WxchVNIEG4FOMiJdlOzckM0HTyJemvpX0NokvmAU8aSkUelawigBiVGSLnM40Kvy' );
define( 'SECURE_AUTH_SALT', '2oAqLUk1CnJgUK7kVHugnnGYAjdviSbeQUSpUuGCrCAA6EfKqIzlO4cWFAkMoJKe' );
define( 'LOGGED_IN_SALT',   'lTJ8McF4ZXVtdXkr8PPhAXU7C0WqRQhjPUZDt8khMVtqBcahOV5UD7eQxfOP8v5V' );
define( 'NONCE_SALT',       'HdcUd9RiqbwihnNbKmJGXqK6O9sUS247eoimrG048ASPwvXW91dWnvW6ElVFw1Mg' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
