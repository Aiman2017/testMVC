<?php

session_start();

require_once '../app/core/bootstrap.php';

Router::getRoute(RequestURL::getURL());
