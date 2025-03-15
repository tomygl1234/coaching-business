<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'muktatma' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'WTlq`hfAY])h<$hWlztdd-HOl!w2: ,r:u~8;L;G}IY}%{b{!`5 b_g?B7K5&TVi' );
define( 'SECURE_AUTH_KEY',  'd_w`B;{3i6C?b;u.`O35[[LAK24~/&.n=bUpL=Hrm;z=`|}<w@e^RBzggk9Lao83' );
define( 'LOGGED_IN_KEY',    '/7Oi6Ee3<Yx30^#Lu(cKXE-x/HL?2hKi<-w;v9h_C@yGf[.^Dg6xW;xlH|*Qwg=b' );
define( 'NONCE_KEY',        'h$o9.Skwb4~&:3;X!`%REG?{Mc!ujP1kQ0cgJ-bQ)Fv:)^>P*>QJX,Q(fdI<st2l' );
define( 'AUTH_SALT',        '#~>^;k0u5%1R@pwh]FW7!LC,->l}SJ*X:GJY;+U&=*`:Gc8E0BIl&K3pkR;(W.]}' );
define( 'SECURE_AUTH_SALT', 'n@bEk[ExckJdzwLn,`[KN2>RX]rFU3/zJEgdAp~5b>:V=$%3f=gQ=KWgY_/< }b[' );
define( 'LOGGED_IN_SALT',   'bGIWMtG!=#8KN^`bl`y-D!Y97X~ljG5Mh&bnI?n*q{;*@F}?:<_qZ>PN.(%Vey%P' );
define( 'NONCE_SALT',       '3iZ#X9+T:Hke+ezN^*-Dr7wX47)@McDB2<vQ`C#`w^LPQ>$ayThI;_vWb<`GBwEx' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
