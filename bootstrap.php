<?php

use app\Core\Application;
use app\Core\Container;
use app\Core\Database;

$container = new Container();

$container->bind('Core\Database', function(){
    $config = [
        'db' => [
            'dsn' => $_ENV['DB_DSN'],
            'user' => $_ENV['DB_USER'],
            'pass' => $_ENV['DB_PASSWORD']
        ]
    ];
    return new Database($config['db']); 
});

Application::setContainer($container);