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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '~<=D]z_04IE9wgLFl,~5RNEe(ayS]wPnH? iFeuB.M3.cO6_^NE,}jLs^h9B +?,' );
define( 'SECURE_AUTH_KEY',  '2x4vzmET9jzNc*#zg$<Bj*gPMIrQP>pjBEEtLpBrVF_S3>I7Y2`KKw27o?C2;B*V' );
define( 'LOGGED_IN_KEY',    'A}>u4R5gr7;>GGm:~JKo[vgM{bzth]t3v~O_/}klN1_nD.ydq!xvU==1_<H0n:0d' );
define( 'NONCE_KEY',        '26biz!BZj(/|M&2!l4ipLF}W9AeOYb:?k8M$[qulp;>98T|`O;,?qyN~0Z.O&0ir' );
define( 'AUTH_SALT',        '2sz_lU};z2vIUj#UdDgC-umm^vd5|*!5kEw=~;WFV078i.>26@/Ko1V]mP*Fv0;y' );
define( 'SECURE_AUTH_SALT', 'afGtUGLvLDz=o|o;=fD{B=i(8&9}&z*r}~CPWE1cE:nOWBkR{7GpB[aMIlu@]8+&' );
define( 'LOGGED_IN_SALT',   'POW}?Ab0#-Eq/a(_CV&ZBE6{{jIS|@h*zLD$W+F4i)<od1F`j0V&Z@OdzEM`(&AY' );
define( 'NONCE_SALT',       '1o>&$-:E6&?hTd#&4)(R8^1Mma,YLB>SV:w1DV#0mg]sWlg=|=RzDo 0RLT:O>bE' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
