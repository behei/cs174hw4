<?php

define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

define('BASE_URL', "localhost");

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'spreadsheets');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');



