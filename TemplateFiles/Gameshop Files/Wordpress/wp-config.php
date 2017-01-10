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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Raks@1601');

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
define('AUTH_KEY',         'W_~LV!&%Z0>~B_;>/9$gke{Df,wl1*fu~orD{EKcJD+!qrV;SeQcTwZ!ye[)B:Ta');
define('SECURE_AUTH_KEY',  'l[#,X{`F6w)Fn[pkmE_b%M{~Ez(9R+kK4Qsm8-Htm,IM>k#1d39#Qd[qAk#[%CDN');
define('LOGGED_IN_KEY',    '`$yZZ=`S0thk[<fa0>[dz)5(dz}GxO4]BMhAg5cn+`><6Z(*OtLN_E>fMFVxLyyH');
define('NONCE_KEY',        'q:2P>#:^0_{v]iV>v8_mvRQ|sbz?~93);$Pe(gVu:6lSRt+?s`WRPyBJ~:n8x<zY');
define('AUTH_SALT',        '#`!Gjd Edp/WjvyX`1qr|$l57tMGQ2hd).#!~ )]#l?lYg-`$nbeK84Sg:kebl{&');
define('SECURE_AUTH_SALT', '5IWPi @3k`M,epn_F/<YPLyJmfn&`B(o)PdL6,@9~zzMPy80fgG{Efpk_y46 M}f');
define('LOGGED_IN_SALT',   '|a&{Ax Y!:<kL=qy7mkl+{s@-9zyB=xXBHkCg}iKU+LY]q-CHc!tT{*H/fpp%,&7');
define('NONCE_SALT',       'OxR}X@~ANPi[?5R|wQGxq0j/=i<<-`[%5f`3>QV!1F,B2^b9ApT|!)q;YH17+T@e');

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
