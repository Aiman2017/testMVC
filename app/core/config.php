<?php

define('SERVER_NAME', $_SERVER['SERVER_NAME']);
const DEBUG = 0;
if (SERVER_NAME == 'localhost') {
    define('DBNAME', 'users');
    define('DBHOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('ROOT', 'http://localhost/testMVC/public');

} else {
    define('DBHOST', 'the name of my website');
    define('DBNAME', 'mvc');
    define('USER', 'root');
    define('PASSWORD', '');
    define('ROOT', 'https://yourwebsite.com');
}

const APP_NAME = 'My website';
const APP_DESC = 'BEST website';