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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_mye_in' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '7Ykk.KGP&54+<{l7Xfs0<S/-Lv6pJQyiXlW>6W-Q&jznZ=} Z@%OVv~Nf=~H+~#7' );
define( 'SECURE_AUTH_KEY',  '*):v|7/:QYN^0v7W]ydw^1~(u(0)Oa*Qd&k(qu@+o=4S?$(VasTo+[KOUN9?!yWU' );
define( 'LOGGED_IN_KEY',    '^b>^Rl|XA34?j!sR&%&s%Wto?ye$?[K2G5]XGXH{+-`,dqx?6`1zUqp<N+--#y!d' );
define( 'NONCE_KEY',        '*ng.;%!ke&!`0c2v/2O[dCl6?Rrb,`EBNXP>?(~77s35&&/(1wh![%^>^Mlz,v(w' );
define( 'AUTH_SALT',        'tQv/w&}>ct!0g?Q8k~wU(MIhc}SUy>uC,Y<CbG)pf{GU!7jtRh[Vab;F/$$K3?.o' );
define( 'SECURE_AUTH_SALT', 'v{0]-`6_D$X$cG?O-BP*wmM;aJl36% t?gC1E^W-7W[UIv5R/GNpx;xh8iTKAe,N' );
define( 'LOGGED_IN_SALT',   'Kg^)o68[Ye9LzBqZ] q8>f7)NZ}ynd>ai1Sz<qv.y$ovh m6dQ0pW3|vKIFVjOe<' );
define( 'NONCE_SALT',       '*SoURAN|$K1F,9ko.]=D5]ELp]e3jol2F]h@a!IfNQ---F:z+)g$hg/8VtL2!!Y,' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'mye_in_wp_';

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
