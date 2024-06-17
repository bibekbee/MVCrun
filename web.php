<?php
use app\Core\Application;
use app\Http\Controller\Navcontroller;
use app\Http\Controller\Contactcontroller;
use app\Core\Session;


$app = new Application();
$app->router->get('/', [Navcontroller::class, 'index']); 
$app->router->get('/about', [Navcontroller::class, 'about']); 
$app->router->get('/contact', [Contactcontroller::class, 'index']);
$app->router->post('/contact', [Contactcontroller::class, 'store']); 

$app->router->resolve();
Session::clearFlash();