<?php
use app\Core\Application;
use app\Http\Controller\Navcontroller;

$app = new Application();
$app->router->get('/', [Navcontroller::class, 'index']); 

$app->router->get('/about', [Navcontroller::class, 'about']); 

$app->router->resolve();