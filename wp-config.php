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
define( 'DB_NAME', 'sml' );

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
define( 'AUTH_KEY',         'c3N0X#iq<x2=n~,,x0#pab!g4U*Ex==,| =<widK@;?G@y,+5ivxm,O1Dy}V85YK' );
define( 'SECURE_AUTH_KEY',  'grlSz}9[Gp~!Hn);gV! >w<p8l;S6iux7PLQW.RkTrg w!?g}JTo`/PgaBdydP&O' );
define( 'LOGGED_IN_KEY',    'p(83%&@ Ks4uC8E./N;>Q%)@N#Hd8T]9EIhw9!Ls!d#F~HoI{MVQ%O5[3T/bGMfQ' );
define( 'NONCE_KEY',        'YY@j@1|}MJE8Wy[tc(mt0g4NTPSl&heK#7O}Pe$w2W|N3=c]D$mLn)7QcL|%La]d' );
define( 'AUTH_SALT',        'iY8Bb90a!:v*a)S3(-(4vT^Dz~|xy,N(g#,Zz0ev?Pe}>.8qN4EL:lN$P&T3~|E?' );
define( 'SECURE_AUTH_SALT', 'UP<#h#)6*WtUmR*J,U_r7jN[|kfg>_)(*sYO^oX*18nb}|w-k?j%a&1@Eq*fI,zk' );
define( 'LOGGED_IN_SALT',   'sztK0ut~tKif4v@d5pxa|i1@-p$7JWPOf<arj(P/k2|b45fb&OAGB6Tz[b,:i9I7' );
define( 'NONCE_SALT',       'gB&g5}cq//uM0E`=~KiH-hnkxYb-/D&ZpfLzdJ8tMr[:EJL_L]VJL1By;*IS*7NV' );

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
