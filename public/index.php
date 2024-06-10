<?php

require_once(__DIR__ . '/../Core/functions.php');
require_once(__DIR__ . '/../vendor/autoload.php');
use app\core\Application;
// echo "hello world";

$app = new Application();

$app->router->get('/', function(){
    echo "Hello World";
}); 

$app->router->resolve();