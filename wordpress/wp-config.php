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
define('DB_NAME', 'OrdinacijaDentalneMedicineIvanKomora');

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

define( 'WP_HOME', 'http://dentalnamedicineivankomora.herokuapp.com/' );
define( 'WP_SITEURL', 'http://dentalnamedicineivankomora.herokuapp.com/' );
define( 'RELOCATE', true );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Y^?ovMbu$<GYtENUrGUm? (87iz0?hi[%H,2ecWth`37jwL/-Wg@Uv[N)U<K|MRH');
define('SECURE_AUTH_KEY',  'RG$=x{34T4!21*/DpluoB+{A73IYWZVl{k;1/OB5iY`T(d:@bb_ed7Lxq%V/J@Lz');
define('LOGGED_IN_KEY',    ':Ulr^=]KmU<](GmcR;/Wz?}(uxeD;VCC6Zvwcn0IHp- iGrpqo*?@>,QkndU`C>Y');
define('NONCE_KEY',        'SakG]~X*]L3$FnbY} O_Ou.$W=]DJP^QQz=YgB^b&$BUQc_{*wIQ$YeDW6h#f|4B');
define('AUTH_SALT',        'jV`mTgcMV0,`#q:nU}]m`IyZd!F*>6XyEp:6qB]*|FWYD87uKR`M=+1M9~nFst;*');
define('SECURE_AUTH_SALT', 'rMnye@<.0 AH($2ItIY.hK ;ot@0|{6Sy&uM/omW<m[v=<PCOM<_N$hTG7uYzsF<');
define('LOGGED_IN_SALT',   '^0kvP<%=9J0{|.j!v^UjMLZo4J)i1n?%b,H/S&r|yqL]sF`fbwo-Ii1X(4Ym)1D~');
define('NONCE_SALT',       '4x`>(^[0h[S<Eu#yo!J_j.!O6iqN$$B(^6H$M&xc8?/3s0=CjgXTbb=,pI|~Njk ');

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
