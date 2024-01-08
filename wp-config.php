<?php
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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_woocommerce' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'l}bb_T-9I`jl?YS+g^-S, $H<YzkyS (L:-2j@K>Do;j)EN{J5C$C5Ua|0elcn.f' );
define( 'SECURE_AUTH_KEY',  '_icS+?9V-]cS@V.*`3x[c;0R>mAj%<0rw+(+.f/_FZZ1Rf}6!?]6F#TaMH~X|~VB' );
define( 'LOGGED_IN_KEY',    ';Ecv8:D.UB)~iV/Njd1&-qYR|r%yb4CB61~(gEY#kGI-5%X5Ud2Z@y8}&4cj0/lG' );
define( 'NONCE_KEY',        'z;g_&J-?]O#dF9lb~*V;[x;?([W]j,]f))_=lFregDL`lIiL)a^F#c{i!e45()nV' );
define( 'AUTH_SALT',        '~:*vvG1D~#tgP$^{ obpoQx[bLiM$vgO],+{h 4J?r2nOSn-VrW`x/2CJ+sXurPl' );
define( 'SECURE_AUTH_SALT', 'Gi#6*0&+l5X/w`!gYKyEwQm&o&a{1`T .dX%rd`lo{{t>hUM|!.X|}EY:u&:/zIP' );
define( 'LOGGED_IN_SALT',   'bapYZbHUo]2bu4$`(_ FTE8C=+h%2sDyvV0CMvlkD#cR_2Hrn^.:hu0%.x`M]~d@' );
define( 'NONCE_SALT',       'dU8XAjR6r<&;pf(t|D[z])`Y3IVWo#(JpX,Tu#V<6=>IVSZ6a7qD>]4d5e;;L]/(' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
