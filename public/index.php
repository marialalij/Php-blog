<?php

require '../vendor/autoload.php';
require '../config/dev.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

session_start();
$router = new \App\config\Router();
$router->run();
