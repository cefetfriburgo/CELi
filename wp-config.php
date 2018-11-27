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

// ** Configurações do site ** //
define('WP_HOME', 'http://celi.cefet-rj.br/');
define('WP_SITEURL', 'http://celi.cefet-rj.br/');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'celi_wordpress');

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
define('AUTH_KEY',         'P4ukN2)Aw}:p,iO8v?4U[}F`b`ri[+~s8~p0=H2bB=n%fR-ZYF*D_Wr^5]Psx<HP');
define('SECURE_AUTH_KEY',  '8zwa)oXi>D(:}_XfA:(R#|]CG}!G0^e1~[i$-l%@E+cmP%/iq>b0#sgJpb>_[s%j');
define('LOGGED_IN_KEY',    ']^R{W~!J:Xl$<k%~ 7p~dJ2#`d~7Ro$TW5G2RVu6O~**UGp~w8Y._$w+y%Xc>;B?');
define('NONCE_KEY',        '@#wph.._i|UzQ)w>5^nHJ1V4Y1voVAUWosn066&tSsG!=0]eL3?]8WR<Xx~y;9*%');
define('AUTH_SALT',        '511LYXknaV!up8jq=3Ui.0oNB6Xxh,ED,`Q^vwRjbT*o|N]&/KInh*|]&Cz{be`-');
define('SECURE_AUTH_SALT', '?(.>H[%CXWx6]EA,Im-^{r. x<VU`}L,6)P;!sJ|5YS3/i>0@ @<i8(EG0#92#R|');
define('LOGGED_IN_SALT',   'y`k9}E/Izr!tolc?pO}[8OUuA&`>Y{yg4>rXfhmnBbaT(~Vg0zYn;]!4HEqcauKT');
define('NONCE_SALT',       ',WZWmjCh[Au9&ht5+TftqmGBPp^9K#`y|#==2Wpt7_5T.EcN/;/f{+>,0o+e,+#$');

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
