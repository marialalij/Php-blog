<?php 
require '../vendor/autoload.php';

 $router = new App\Router(dirname(__DIR__) . '/view');

 $router
 ->get('template', '/frontend/template', 'blog')
 ->run();