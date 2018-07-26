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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fthrnola_0bf' );

/** MySQL database username */
define( 'DB_USER', 'fthrnola_0bf' );

/** MySQL database password */
define( 'DB_PASSWORD', 'C1D9B8Ff2bi4tr7v6a3m0u5' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         't#(>Z|`wE|GlEN)%Q$;r>]?-j+AGpPpvP-C&&FGlVau&taIdv<P5:9$%45cn.H:K');
define('SECURE_AUTH_KEY',  '(3[4+xF8%q)X|q${l,9[NtY`<Iu6,Y_sB?N^~94@%x?E;N|!p&$jVQa:?538Y?- ');
define('LOGGED_IN_KEY',    'GZ}ccvM$@]*6+6TIQ&{)~F;Ank|@;lM{#k>Me2>i4j_xPx!7I1:V3rFxkDTO@C<a');
define('NONCE_KEY',        'T<6V*ZwyD#wGV&t6TGq{fT(Q9bXRSjzBl@dE|k&bpGu|NQw-tfR?= mK|KjyUpx7');
define('AUTH_SALT',        '-$+YDNf||>2>w5H@yBqrtPfOHv0y&k(0-dP&h]-1nHSeQ-^<uw^f.wR:JmA-P6`&');
define('SECURE_AUTH_SALT', '$JXO56$pelYwd1ZN(Y8kp,hhA`J4G>gRX>w}#(tifN+*NMRqHy*~qHN9ov+7Ada1');
define('LOGGED_IN_SALT',   ')o_}Y7>3svVtaFzb10&|Cd6|fPuG ?UKAX67|<M+Q/qL~7x@|q/SWd.Q4[b|`8]n');
define('NONCE_SALT',       '>G|>RCyE3^z)n;|QMvP/C>S?PH4u`ye%`9-DLZT%w@{|.|4dhzJ^h/2:V$gh4K4k');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = '0bf_';



define( 'AUTOSAVE_INTERVAL',    300  );
define( 'WP_POST_REVISIONS',    5    );
define( 'EMPTY_TRASH_DAYS',     7    );
define( 'WP_AUTO_UPDATE_CORE',  true );
define( 'WP_CRON_LOCK_TIMEOUT', 120  );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
