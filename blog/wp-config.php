<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define( 'DB_NAME', 'i7619086_wp2' );

/** MySQL database username */
define( 'DB_USER', 'i7619086_wp2' );

/** MySQL database password */
define( 'DB_PASSWORD', 'P.u8vvYlbbst0ErhQ7Y22' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'ZZz5vuJZ23dh4X4KzLiDwIqRIvscP9KFbntIEplzc1jzh2BdqB8WYlrnHzdt1nli');
define('SECURE_AUTH_KEY',  'vS1inVtBzXzIfEa0pGSx58O55Wg6TsSKsPclTKftfKZzsuVtsYfM1y38IG2PAxD7');
define('LOGGED_IN_KEY',    'zYYue0p7SEzH5iuPoVhZNBcOfZ7lreqA5GIHmPQWOtX4ywWsIQ4h6A6Jq2fLhx25');
define('NONCE_KEY',        'b5JxcOk0QSb6lWINoQSgGpxu2FfX7CSTi3ZwNOb0kf164Wbe2dCMJcBzF0OtQqbX');
define('AUTH_SALT',        'OkQY22CrDv0FG4FC7Ii2WHEFqsC8HpE7hBXZtgLfx0S05EBoUpJpt8xlbMBQ3tWH');
define('SECURE_AUTH_SALT', 'Ym3915BLYw521qO31vcMobJX0UaSMbYFcGBn6uGYFGV4K6h6NC0jiAAt3kGwJJAY');
define('LOGGED_IN_SALT',   '2a1N4Fh2jFTrB2or62v397i407UeSkKlvMUJUg0RvJlRy4HKZ2zdicwxIthKUL7H');
define('NONCE_SALT',       'Ec0mrx1llYFoXWUsj7YZdW1RVnauT05QWCWUdxcWb4jpmwSS96ldDFrqpFkdKgjm');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed externally by Installatron.
 * If you remove this define() to re-enable WordPress's automatic background updating
 * then it's advised to disable auto-updating in Installatron.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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