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
define( 'DB_NAME', 'wordpress_pluggin' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '%f/N$~pKu>[t`>0g+G*M^AqKKfG)-q9{#KgoV^7!*gT_M%^|i;;}SAR-@a_|%qSj' );
define( 'SECURE_AUTH_KEY',  'k]B:7WmG7XU@L2_do-4~#X5PrAAv.@f/CtdKtnksas!DhwV8X#IFEE(q3JnO:^ ;' );
define( 'LOGGED_IN_KEY',    '%~A7- baJgm=v3#5qX@k2YJQ7 @Sknm>PWlYK!CBOcTn=eE!HZ3B:$jj)]+<AsL_' );
define( 'NONCE_KEY',        '! DCvOLHM%xM`Jllg!&VRWHT/!SW,}Iy[ ^D34]:[N~[#|j3#+*qah}%m-z|`z }' );
define( 'AUTH_SALT',        'rk !eHV#Wd?troMH1e@|HCOm?IwZj/$8_{D~QI]3BEUlxngV?T$QwEoko37nadUo' );
define( 'SECURE_AUTH_SALT', ',WvIzC^C,XuNd[Ozq7yk+jB/bkuCtd<{$I&}hEce.^J*+@$@_g6m=:^:u&2M{~ol' );
define( 'LOGGED_IN_SALT',   'ZzbAU0GnW,?ZCoi6}R.^GO[)}NV{N4L?70+dfuLcT$DJmgYt4G&3`vHg!L8kc3Yx' );
define( 'NONCE_SALT',       ':Oj-KULZRy?zI3}>aCz<oThV@/n{pD;t_{gxH4,H]XHU@-(9eLGVFQi^vW59sY5Z' );

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
