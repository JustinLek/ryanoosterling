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
define('DB_NAME', 'ryanOosterling');

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
define('AUTH_KEY',         '$W/+I *:{S8RM8 rWhDdXciT&(WsR+rit -Es.|EcB [$*PGkm{+Gw-jTx?ai>oA');
define('SECURE_AUTH_KEY',  'yUt-CUyCd3*c-^e^UP>B@=R9eFPU,$u##}g49!U@Ki2Rpqxcp!Djpfc+6/QLm|0[');
define('LOGGED_IN_KEY',    '#g+=?|aZduX4qzRmKD078mLQs#Pb--.EnW^kILw)p=O]L[|}is4-CedCR#,^eNYD');
define('NONCE_KEY',        '&w*b<y=p=vbF},vn})t2|JFyW97n/6[!o8SJ`n[P]0(TeZu&31Jq;uO7HqQ}O<db');
define('AUTH_SALT',        'PBnKK%<|+Sayv+6xd+FbWbPK+QY|K:s/.XM3=j9JjC}9|qYn0>aR11/*hKfaR%r]');
define('SECURE_AUTH_SALT', 'sBvUE;*)! LN)J/tI45-u3-mBv kguz>^tyItY6Iuk,&_E[TQ|SBuO* k$$jkueS');
define('LOGGED_IN_SALT',   'rsy]jE2%rbB_P;2-n9U)`uZ]Y2hSaWI_[5nW+I2z+wA<xZgcqX&n;+O48]*0iQO(');
define('NONCE_SALT',       '2FZOhL`scA}ZHMoYOn6O#~qh1$(t1JTb/?uX[DyU37a#-H?V?8<w2^9RzIu79x-]');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
