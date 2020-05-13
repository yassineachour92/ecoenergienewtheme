<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'eco' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '!E a ~GwUcg0G2n^BA4Bd<yKJU2o+)@iFFGA%eb.5)&m&<Cgb5eg2Crb8oaJ]}I1' );
define( 'SECURE_AUTH_KEY',  'pAH5D$#B.?B}i^G:FynlH}#~ab-E`qbm_M_e$!>|S=Z=>BN<3&qYf>Bo7{cQOM8T' );
define( 'LOGGED_IN_KEY',    'W/RjR`y@(RoCYBWkLfof~74q=4x5zflk!$Ki|4z1bMkct]LPo[]Vn?Y $.I_{`=@' );
define( 'NONCE_KEY',        'GfWd21!x<V8%*~^$X0iI7^ecDvQ:<q+O@S@,W_,t:<G=c($d_F(1[q_5/u98mz:<' );
define( 'AUTH_SALT',        'q9AiV&%PApVJ*)!#WluP$G]rIOwTVU9ZY^TiT 1T8A0Y/kCP}`OT0UJ1o,lK:Ljw' );
define( 'SECURE_AUTH_SALT', 'D>t5Tw)j2pt>y_s`7Q qW;7m.(ld)/q@_]i}Fn<oBaojd3SYG]u}$wIQ):R%I6l[' );
define( 'LOGGED_IN_SALT',   '?hmC*<|rL2+jB6c7h[RV9LrS%Hwnatn@,tY0H$CLWi 3&l&%2GF%WDOo% TprLgF' );
define( 'NONCE_SALT',       'YI3I}0]b)2,qNc]&>l,*-EAdq.YJFK5]bw]c)$z9ZCgE($IIS)W~#9HC0A*Y-<i ' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
