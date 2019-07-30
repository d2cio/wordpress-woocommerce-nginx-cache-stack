<?php
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '{{=service('db').get('database')}}');

/** MySQL database username */
define('DB_USER', '{{=service('db').get('username')}}');

/** MySQL database password */
define('DB_PASSWORD', '{{=service('db').get('userPassword')}}');

/** MySQL hostname */
define('DB_HOST', '{{=service('db').getMasterAlias()}}');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

$protocol = 'http://';
/** Allow using HTTPS */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
   $_SERVER['HTTPS']='on';
   $protocol = 'https://';
}

/** Allowing using any domain */
if (isset($_SERVER['HTTP_HOST'])) {
  define('WP_SITEURL', $protocol . $_SERVER['HTTP_HOST']);
  define('WP_HOME', $protocol . $_SERVER['HTTP_HOST']);
}

/** Allow install plugins directly (without FTP) */
define('FS_METHOD', 'direct');

/** Define Redis host */
define('WP_REDIS_HOST', '{{=service('cache').getAppAlias()}}');

/** Switching to real cron */
define('DISABLE_WP_CRON', true);

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         '{{=randomString(32)}}');
define('SECURE_AUTH_KEY',  '{{=randomString(32)}}');
define('LOGGED_IN_KEY',    '{{=randomString(32)}}');
define('NONCE_KEY',        '{{=randomString(32)}}');
define('AUTH_SALT',        '{{=randomString(32)}}');
define('SECURE_AUTH_SALT', '{{=randomString(32)}}');
define('LOGGED_IN_SALT',   '{{=randomString(32)}}');
define('NONCE_SALT',       '{{=randomString(32)}}');

$table_prefix  = 'wp_';

define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
