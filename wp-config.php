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
define('DB_NAME', 'scpsassam');

/** MySQL database username */
define('DB_USER', 'scpsassam');

/** MySQL database password */
define('DB_PASSWORD', 'scpsassam@123#!');

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
define('AUTH_KEY',         '`|?.>Qu_9iZ4i*S2eZPN|=2jH2qkBJL*K!lFsRA8yLz}}u+eI@d9FiWK6DP^1|dW');
define('SECURE_AUTH_KEY',  '^n]}[<+RQ,T*&sn^NZQ63)#M?i!?fyy.kHW,E!4.A|K1Y`@1;qHC+a/mH5Lhj=$)');
define('LOGGED_IN_KEY',    'bkC{1xZe-;Oin/_:lNaoW8Rl`:%9xG+osVsjJl:)+2J%E95Nm>5A}!praCm:z+}%');
define('NONCE_KEY',        '4^#^*^xgUSmS.T2WA6_MqPcEZOb.WYr]!hvw&)/V7rG4*vqDcr!Vr/P~h/k?gKco');
define('AUTH_SALT',        'n@viqAtS$}Vr/1RfhEQ}TcGr-VJcLA(8(3n0$qG~^Gf:=TC|@,b{z2ZADLrS:;|Y');
define('SECURE_AUTH_SALT', '{tj-O&m2$N@_<)0A@4#%MnL!)J9ILlU!OR!%HA{>.^|OVRLD_L<Q-X.RyS:U;q0s');
define('LOGGED_IN_SALT',   'K]B4~0b3q-oM4B>6{ZAUV^r!y:H*vug,-8u1+Vq}7vPo0:;7Ep2j9i5*F~XwZ]AR');
define('NONCE_SALT',       '`7jv5$bc(v07#SD%czNTF?pcC#E%pGT*HTWC&(6Gz=gZWd_/v`W=tjZcL%n&QM`F');

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
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
