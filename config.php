<?php
// HTTP
define('HTTP_SERVER', 'http://localhost/multi_store_api_git/');

// HTTPS
define('HTTPS_SERVER', 'http://localhost/multi_store_api_git/');

// DIR
define('DIR_APPLICATION', '/Applications/XAMPP/xamppfiles/htdocs/multi_store_api_git/catalog/');
define('DIR_SYSTEM', '/Applications/XAMPP/xamppfiles/htdocs/multi_store_api_git/system/');
define('DIR_IMAGE', '/Applications/XAMPP/xamppfiles/htdocs/multi_store_api_git/image/');
define('DIR_STORAGE', DIR_SYSTEM . 'storage/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/theme/');
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_MODIFICATION', DIR_STORAGE . 'modification/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');

define('ONESIGNAL_APP_ID', '<YOUR_APP_ID>');
define('ONESIGNAL_APP_KEY_TOKEN', '<YOUR_APP_KEY_TOKEN>');
define('ONESIGNAL_USER_KEY_TOKEN', '<YOUR_USER_KEY_TOKEN>');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'multi_seller_api2');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');

define('CACHE_HOSTNAME', 'localhost');
define('CACHE_PASSWORD', '');
define('CACHE_PORT', '6379');
define('CACHE_PREFIX', 'redis_');