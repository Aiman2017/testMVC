<?php

spl_autoload_register(function ($className) {
    require_once $fileName = '../app/model/' . $className . '.php';
});

require_once 'helpers.php';
require_once 'config.php';
require_once 'Router.php';
require_once 'RequestURL.php';
require_once 'Database.php';
require_once 'Model.php';
require_once 'Controller.php';


