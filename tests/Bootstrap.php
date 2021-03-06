<?php
/**
* set error level
*/
if (version_compare(PHP_VERSION, '5.4.0', '>=')) {
    error_reporting( E_ALL );
}else {
    error_reporting( E_ALL | E_STRICT);
}

/**
* Setup composer-autoloading
*/
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    include_once __DIR__ . '/vendor/autoload.php';
}