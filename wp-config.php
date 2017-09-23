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
define('DB_NAME', 'E-Store');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '}O|50~pkfU30QF:w#>b Ob.KH?;)QSj+R`V<,dw!bDja5JIH*Glri9-SYuMSst2C');
define('SECURE_AUTH_KEY',  ' )Wf:.>C{PQ#((k#-U98uQ,Yy#~6.-$V-gs9|cEIhBV.UX1egQT4kjepy,}cdSV%');
define('LOGGED_IN_KEY',    'ey5P%vMkGUcls0;8E)L~1FtQXQs$o]L:vxLB/*uN?DW_7Sd0 LB][LA-bF8Fmh]|');
define('NONCE_KEY',        'P:gm-y-:_TZ)f{T#QmtV<qGntk,o|T*Yd^;O=g2J9szj5/k?,}b{:v6 <c5I1O@d');
define('AUTH_SALT',        'Gg]gjyEI>Nd`cB@}!yCrBS#RL _&)5jk}!:a_2q3|Vfb BpFq``u~ j+g]qSRH)2');
define('SECURE_AUTH_SALT', '*jTH5[01QJ#~Y)3N/#y*uoVrY`9`(dv93R-f*6dvY[6mXQ~f/1i5G-wy38Y*6Vpk');
define('LOGGED_IN_SALT',   '&cR<cw6=xN14g]b1xV5EotAB[5{/)@bX`A}}pv(|0W7(UG2P,2g5D$C#=</>#dAp');
define('NONCE_SALT',       'gHJL9<jJ:=c8Uw.QxBoxq4Kw|<O=Yr-%KMuCCS|&6lF1XuHf+bWd.n$pa{bZ18]B');

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
