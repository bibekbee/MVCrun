<?php
use app\Core\Application;
use app\Http\Controller\Navcontroller;

$app = new Application();
$app->router->get('/', [new Navcontroller(), 'index']); 

$app->router->get('/about', [new Navcontroller(), 'about']); 

$app->router->resolve();