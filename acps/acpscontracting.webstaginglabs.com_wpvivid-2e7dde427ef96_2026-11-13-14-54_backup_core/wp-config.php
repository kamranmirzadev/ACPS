<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dboitkf1nle2ag' );

/** Database username */
define( 'DB_USER', 'uoqldpgjpwgcz' );

/** Database password */
define( 'DB_PASSWORD', 'lfnyecoy07mk' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'R#f~[/lRzmj1g^T[S3j(!<i/)lQ~qip2.4/J!};1Q?4Z1hg:7tnb&.?&0&o^[[)b' );
define( 'SECURE_AUTH_KEY',   'qzk]xni8*W#,@}Un>iq;)kfcy*S&YZnBs&N=8+S=/hL=Nn^5.Kn7uuZ{sqvm$.3&' );
define( 'LOGGED_IN_KEY',     '.jBr9,4NyZ4Wj%`=+L2]OuS(@k/u2l--DxLNwE+GR2:R~l1CJCUK+c>vUAfdtN8o' );
define( 'NONCE_KEY',         'E(o,,e_R(nFPT[`=xWvbIM-{(c5d9_`$5GRd+[lh)q=3$<ZEiz(j!TVp1-7+|krv' );
define( 'AUTH_SALT',         ':U=rL4m9#KYeqSZGMp3q5dP[x}g8U>9~R#TXpR7fgC1dc`G#&(l8y:+^pLPi9J {' );
define( 'SECURE_AUTH_SALT',  ')5@U{q9}OJ/p#f@LO8<H9LdeLQ>mUF-^gVC1~qvt]9u>&Lu&uq^(NzU?L1yl%5f/' );
define( 'LOGGED_IN_SALT',    '.sjaP46E@dins1,+>%xO)z5QrMJr.1<,uYY06ZZ#pW!c26~_8g*W7$tMml^=6~Kq' );
define( 'NONCE_SALT',        'r995xT(rX]OF<HaHI.? s-j+w(tj~T0]Wz@KCmp=:DzaO=.Tu&jf$LQ i!]=6jZL' );
define( 'WP_CACHE_KEY_SALT', 'Zvz!t00Tx_8ml1]vHv#V!W6g_2{o!EPVcVKi,8&_NvbO[,v:2M*]Yb8vJ4|fgYXa' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'eyn_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
@include_once('/var/lib/sec/wp-settings-pre.php'); // Added by SiteGround WordPress management system
require_once ABSPATH . 'wp-settings.php';
@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system
