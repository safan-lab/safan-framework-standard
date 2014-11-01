<?php

chdir(dirname(__DIR__));
// set application path
define('APP_BASE_PATH', dirname(__DIR__));

$modules_router = include(APP_BASE_PATH . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'Settings' . DIRECTORY_SEPARATOR . 'modules.config.php');

if(isset($modules_router['Safan']) && is_dir($modules_router['Safan'])){
    // set framework path
    define('SAFAN_FRAMEWORK_PATH', APP_BASE_PATH . DIRECTORY_SEPARATOR . $modules_router['Safan']);

    $loader = SAFAN_FRAMEWORK_PATH . DIRECTORY_SEPARATOR . 'Loader' . DIRECTORY_SEPARATOR . 'SplClassLoader.php';
    $framework = SAFAN_FRAMEWORK_PATH . DIRECTORY_SEPARATOR . 'Safan.php';
    require_once($loader);
    require_once($framework);

    $loader = new Safan\Loader\SplClassLoader('Safan', SAFAN_FRAMEWORK_PATH . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
    $loader->register();

    Safan\Safan::createHandler('Safan\Handler\HttpHandler')->run($modules_router);
}
else
    throw new \RuntimeException('Framework was not installed');

