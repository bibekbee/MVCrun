<?php
use app\Core\Application;
use app\Http\Controller\Navcontroller;
use app\Http\Controller\Contactcontroller;
use app\Http\Controller\Logincontroller;
use app\Http\Controller\Registercontroller;
use app\Core\Session;


$app = new Application();
$app->router->get('/', [Navcontroller::class, 'index']); 
$app->router->get('/about', [Navcontroller::class, 'about']); 
$app->router->get('/contact', [Contactcontroller::class, 'index']);
$app->router->post('/contact', [Contactcontroller::class, 'store']); 
$app->router->get('/login', [Logincontroller::class, 'index']); 
$app->router->post('/login', [Logincontroller::class, 'store']); 
$app->router->get('/register', [Registercontroller::class, 'index']); 
$app->router->post('/register', [Registercontroller::class, 'store']); 
$app->router->post('/logout', [Logincontroller::class, 'destroy']); 

$app->router->resolve();
Session::clearFlash();