<?php
use app\Core\Application;
use app\Controller\Navcontroller;

$app = new Application();
$app->router->get('/', [(new Navcontroller()), 'index']); 

$app->router->get('/about', function(){
    echo "About Page";
}); 

$app->router->resolve();