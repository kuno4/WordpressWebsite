<?php
define( 'WP_CACHE', true );
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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'micha798_wp882' );

/** MySQL database username */
define( 'DB_USER', 'micha798_wp882' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         'fbiqheokv2dfjhnyvttq6lrycszvrmaallufuefetkzrxnhc8a6uyygf0zvekg02' );
define( 'SECURE_AUTH_KEY',  '3xcelf0hxklwmaubq8gs1lwbrpk9xj0bgowqzcdyq3qo2zldbmphrcwtpugtp6an' );
define( 'LOGGED_IN_KEY',    'on8mm5sxy8w21mfifde85qelsxeya9tkd2jxto8vpvck2t3lshhqs4smkljuwvhb' );
define( 'NONCE_KEY',        'iy8up1qkhtnigjnn0tvvlqnax1jlaqldenv7lym8mlwxayfoykhacnkndjifyrii' );
define( 'AUTH_SALT',        'fgw9ib1ut6a52qp7r0pyvl33uwunxjuhwpy0ks3gs4tidjscmaggjwnokkgrr4dr' );
define( 'SECURE_AUTH_SALT', 'rqnjlod5pzpct5sfwuckfdju3bipsjar8euzpuy5oe2kpbs8ynk9zo56fhvo8fjz' );
define( 'LOGGED_IN_SALT',   '5iqaxewshl1krkggvhqxpjkuehpu2c97k2o5nazsujujn45ojwdrewgowic9ginb' );
define( 'NONCE_SALT',       'rgjngg7j9zfqjizee9kdrkkjjo3hklzvqaadz5qmg1aqx0a53yhwakf26amaiavl' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpvd_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
