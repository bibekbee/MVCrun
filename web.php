<?php
use app\Core\Application;
use app\Http\Controller\Navcontroller;
use app\Http\Controller\Contactcontroller;


$app = new Application();
$app->router->get('/', [Navcontroller::class, 'index']); 
$app->router->get('/about', [Navcontroller::class, 'about']); 
$app->router->get('/contact', [Contactcontroller::class, 'contact']);
$app->router->post('/contact', [Contactcontroller::class, 'store']); 

$app->router->resolve();