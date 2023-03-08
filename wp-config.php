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
define( 'DB_NAME', 'decentral' );

/** MySQL database username */
define( 'DB_USER', 'nathanbogale' );

/** MySQL database password */
define( 'DB_PASSWORD', 'nathanbogale' );

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
define( 'AUTH_KEY',         'lx%Ly`$a4btJC d?=urpjP4VjvDX5tP6RX-{9{Tj8X#`U}VXEz/M`h^Y.x$Op,8w' );
define( 'SECURE_AUTH_KEY',  'cxnE O#LK6m.2ksH/ig3HYXn9ddB2[aGRHz0Eoc5D/OJks[xBkpUH7vZuV(zv/+C' );
define( 'LOGGED_IN_KEY',    'T{$3#NLev+.MSJ>8pOy>@j41wB%y=%byy$|[%m#ge3u8w8`ku,f(>A}N: $h- (4' );
define( 'NONCE_KEY',        'K8$J=y2?PrZGr*!pXi5:l]Aq>?s.2wA|9uCv`yTwHa3^W15|J[`)i:Pj=5X3IL_l' );
define( 'AUTH_SALT',        '|Q!K<RKc!^!A-7`KcQ*az.%SJe?^^~&B9c6|_ZuHKveHbFN`@g8<9?jsds*(-E91' );
define( 'SECURE_AUTH_SALT', '@ny:!c4=@H&f51%)YhK}B9HG^mVUlw{,B@ih~HFUbKa5Hg6_ZF1=qb(O`@]I$:_1' );
define( 'LOGGED_IN_SALT',   'K3faA,@-RcDBn-UJV=sk&K3(m1yqC/ SKC5 ou]_y G7wVLCN2m%/X9v^-h1oS<v' );
define( 'NONCE_SALT',       'A)!1x,2H5cF<@4BPQs[p2$1Z^:O+HuxPJ%?-c;HU,T3Fvr@5!!YjFTmPb:Ov[#(X' );

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
