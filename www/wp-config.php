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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'guaxinim-blog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Rz1R JIoK,MU(;T(?ep+;O#B~m>{#IQQWVz$OP.6+9=$<j&pP~6(m,gNO^ote<fM');
define('SECURE_AUTH_KEY',  '-o>-*igALBN/GZE*W,67~_{ypL4_M7=0IXGM|QrI_;#7x =R_4~T3BJ?AiwL[[YH');
define('LOGGED_IN_KEY',    '&N`TH+i*)?)5(Q H,7W/-Y1,?!:Bqcr~n.6zI?(AIlg&j*$9EzPzb7EnKu5s;3??');
define('NONCE_KEY',        'ErupH#P8xw!96Tz%]UIpZW|1Lu/YvrrG5%2(n}H/}kc+?KhCg],|T[e_t1bBGJ?B');
define('AUTH_SALT',        'ycF%YjC5`Q|skpi`[K8~FW-?c+^(;_<027Q@eXMVDPXR.DeF>+mQ+SU;s%}fuOY@');
define('SECURE_AUTH_SALT', 'K.]:MHQ,U78r=eyV;HESF8FjKqmv# T@+,Q}mkW1|DiCL++GCy4Bz<.o?*6>g_8F');
define('LOGGED_IN_SALT',   'r>MBVik:?$a&g,-c[e&Hj]u#K%|Jj]ir2e`,I3i}k8r<5? Qjb:$UNs%i{S=@77+');
define('NONCE_SALT',       '&LCgEx4cS(]%jZiwT<g0LE6?!3(jS~!l@^uRx-UF>o AIH;B|hqjfP5b#-nbgK=w');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
