<?php

chdir(dirname(__DIR__));

define('APP_BASE_PATH', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);

include APP_BASE_PATH . DS . 'vendor' . DS . 'autoload.php';

Safan\Safan::createHandler(\Safan\Handler\HttpHandler::class)->run(
    include(APP_BASE_PATH . DS . 'application' . DS . 'Settings' . DS . 'modules.config.php')
);
