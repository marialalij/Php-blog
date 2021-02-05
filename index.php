<?php 
require 'vendor/autoload.php';


$router = new AltoRouter();

$router->map('GET','/','template', 'template');

$router->map('GET','/inscriptionview','inscriptionview', 'inscriptionview');
$router->map('GET','/error','error', 'error');
$router->map('GET','/contact','contact', 'contact');


$match = $router->match();

if (is_array($match)) {

   if( is_callable( $match['target'] ) ) {
      call_user_func_array( $match['target'], $match['params']);

   }else {
      $params = $match['params'];
      require "src/view/frontend/{$match['target']}.php";
   }
} else{
   require "src/view/frontend/error.php";
}

