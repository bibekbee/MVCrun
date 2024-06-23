<?php
use app\Core\Application;
use app\Http\Controller\Navcontroller;
use app\Http\Controller\Contactcontroller;
use app\Http\Controller\Logincontroller;
use app\Http\Controller\Registercontroller;
use app\Core\Session;


$app = new Application();
$app->router->get('/', [Navcontroller::class, 'index']); 
$app->router->get('/profile', [Navcontroller::class, 'profile'])->auth('user'); 
$app->router->get('/profile/{id}', [Contactcontroller::class, 'detail']);
$app->router->get('/profile/edit/{id}', [Contactcontroller::class, 'edit']);
$app->router->post('/profile/edit/{id}', [Contactcontroller::class, 'update']);
$app->router->get('/contact', [Contactcontroller::class, 'index']);
$app->router->post('/contact', [Contactcontroller::class, 'store']); 
$app->router->get('/login', [Logincontroller::class, 'index'])->auth('guest'); 
$app->router->post('/login', [Logincontroller::class, 'store']); 
$app->router->get('/register', [Registercontroller::class, 'index'])->auth('guest'); 
$app->router->post('/register', [Registercontroller::class, 'store']); 
$app->router->post('/logout', [Logincontroller::class, 'destroy']); 

$app->router->resolve();
Session::clearFlash();