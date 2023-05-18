<?php
use Sectheater\Http\route ;
use Sectheater\Http\request ;
use Sectheater\Http\response ;
require_once __DIR__ . '/../src/support/helper.php';
require_once base_path() . '/vendor/autoload.php';
require_once base_path() . '/routes/web.php';


$route = new route(new request , new response);
$route->resolve();
// echo "<pre>";
// var_dump($route->request->path());
// echo "</pre>";

// var_dump($route->request->path());
// $route->resolve();


// echo base_path() ;