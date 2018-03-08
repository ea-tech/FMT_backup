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
define('DB_NAME', 'FMT2016');

/** MySQL database username */
define('DB_USER', 'FMT2016');

/** MySQL database password */
define('DB_PASSWORD', 'Welcome@123');

/** MySQL hostname */
define('DB_HOST', 'FMT2016.db.8937522.hostedresource.com');

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
define('AUTH_KEY',         'c wa[@:Q5yq_0n,51*n^rlIz7!LET$s78wQc2cy9UdZAj8e4|=OQr_~h`orQ1rBl');
define('SECURE_AUTH_KEY',  'zN C^ma10u */.6H{I5DP^zi~gdI|V*N{#U5_xg8ipv7Aa$lPrI#LSIYu]p1B*4G');
define('LOGGED_IN_KEY',    '#Zo|/,l6=J9JH]d1$Y,dhXDzJ3lNZrtd,)SX4XO#qhsYY@jf.WE,MO/s7*p~N<TE');
define('NONCE_KEY',        'whz!KtEYL&RQXo%pp:5LZ/zUH(kbamIh E8cmU,Tl`Y*DaQ)h@/Q^%F%!|U0+E|8');
define('AUTH_SALT',        'k3PfD$q7jQ(.@a9Jp^dE6;e}UuF9`2Hm{T={?|nSeS{(Tj,-r-HKbNMtbBbPafn!');
define('SECURE_AUTH_SALT', ']hxr)9mJLwGGQ^9GHC,):i6c^O/k{eYbL?818en:/{snLJq+s,`,(N=?[R%9Mi)I');
define('LOGGED_IN_SALT',   'pxkKt<nyxDG@&owbzpo-n@#mwn$|;jj^9l/5lXrq{jJznPVDhkEk5PCd+)s1fm=4');
define('NONCE_SALT',       'skEYK.Q9aII!x):_(WF>`,|-R;G!wv1O|fXQ~:f>*zLnr/IrO,_q7-rQU@g0)-:p');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'fmt_';

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

define('WPCF7_USE_PIPE', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');