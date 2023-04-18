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
define( 'DB_NAME', 'car_booking' );

/** Database username */
define( 'DB_USER', 'myuser' );

/** Database password */
define( 'DB_PASSWORD', 'y_WEDluSb/WStmp(' );

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
define( 'AUTH_KEY',         '.D(4Q)>8_- p~.C).)|{Qr5~m7/>=,sGlf*]r+255kWmuz[oW>Tn&YaXvfw#w^/z' );
define( 'SECURE_AUTH_KEY',  'pL5neKd!/>|gZ#e$?BJhG-+ALQJ@(V1rM^1HwQ1|LEefdA$h<y.~R1{tE)g~2=@S' );
define( 'LOGGED_IN_KEY',    '`iA;.O6gyE&4l}h =w@am8&m`ou!clUKFIfe(>1#=[|U3g&j@q=uD+]O--l; ?OB' );
define( 'NONCE_KEY',        'U:n_1,JTrn;^}q}[n$9 wn&k]^](QwAUO&cj&N#G$zVK261^FLC),iO@$yr,U%o5' );
define( 'AUTH_SALT',        '9/{B<}e`,VC+]93&*0@qhvy4PSq6%d !kuI~<:y$):q;>/Yj>iEYhl)gXHEbYqXW' );
define( 'SECURE_AUTH_SALT', '+/m,n#?*iu8<K_Qd/!*V_GlG}(.er Hj+c+*^m%!yh/y:XnYF/dCpD: mNV!(clq' );
define( 'LOGGED_IN_SALT',   'Cd[CIH#%r)e9V[;b ;jK:niQupyQQ.MsC}3+mr;l.HLie4b>}O0%H*NPls!+0?$-' );
define( 'NONCE_SALT',       '43T^B00tfIb@ls]},33AlwQew~FTkCxPXm&p5(+b0 oU]T*`XfBbTyfitz|cu#hI' );

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
