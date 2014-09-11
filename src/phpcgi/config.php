<?
// config.php
// main board configuration file
// keep this file protected, for example, with .htaccess

// database settings
define("DB_TYPE",          "mysql");  // mysql | text
define("DB_HOST",       "hostname");  // database server hostname
define("DB_USER",           "user");  // database server user
define("DB_PASS",        "pass123");  // database server password
define("DB_SEPARATE_TABLES",  true);  // use separate tables for every board?
define("DB_TABLE_PREFIX", "board_");  // database table prefix
define("DB_NAME",        "suhtlus");

// misc settings
define("REQUESTS_PER_SECOND",   10);

?>